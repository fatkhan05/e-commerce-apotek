<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Obat2;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use League\CommonMark\Node\Query\OrExpr;
use Midtrans\Config;
use Midtrans\Snap;
use Symfony\Component\Console\Input\Input;

class CheckOutController extends Controller
{

    public function index()
    {
        $carts = Order::getCartItems();
        $items = Cart::all();

        return view('order.check_out')->with(compact('carts'));
    }

    
                public function checkout(Request $request)
                {            
                        $user_id = Auth::id();
                        $carts = Cart::where('user_id', $user_id)->get();
                        $order_id = Str::random(10);
                        
                        if ($carts->isEmpty()) {
                            return redirect()->back();
                        }

                        $total_price = 0;

                        foreach ($carts as $cart) {
                            $product = Obat2::find($cart->product_id);
                            $cart['obat2'] = $product;
                            $total_price += $cart->amount * $product->harga_obat;
                            
                            $product->update([
                                'stock_obat' => $product->stock_obat - $cart->amount,
                                'total_terjual' => $product->total_terjual + $cart->amount,
                            ]);

                            $order = Order::create([
                                'user_id' => $user_id,
                                'order_id' => $order_id,
                                'product_name' => $product->nama_obat,
                                'quantity' => $cart->amount,
                                'total_price' => $total_price,
                                'snap_token' => null,
                            ]);

                            Transaksi::create([
                                'amount' => $cart->amount,
                                'product_id' => $cart->product_id,
                                'order_id' => $order->id,
                            ]);
                            
                            $cart->delete();
                        }

                        // Set your Merchant Server Key
                        \Midtrans\Config::$serverKey = config('midtrans.server_key');
                        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                        \Midtrans\Config::$isProduction = false;
                        // Set sanitization on (default)
                        \Midtrans\Config::$isSanitized = true;
                        // Set 3DS transaction for credit card to true
                        \Midtrans\Config::$is3ds = true;

                        $params = array(
                            'transaction_details' => array(
                                'order_id' => $order->order_id,
                                'gross_amount' => $order->total_price,
                            ),
                            'customer_details' => array(
                                'name' => 'Fatkhan Akbar',
                                'email' => 'fatkhanakbar46@gmail.com',
                                'phone' => '082264910605'
                            )
                        );
                        
                        $snapToken = \Midtrans\Snap::getSnapToken($params);

                        $order->update(['snap_token' => $snapToken]);
                        
                        return view('order.check_out', compact('snapToken', 'carts', 'order'));
                }   
                
                
                public function callback(Request $request)
                {
                    $serverKey = config('midtrans.server_key');
                    $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
                    if($hashed == $request->signature_key){
                        if($request->transaction_status == 'capture'){
                            $order = Order::where('order_id', $request->order_id)->first();
                            if ($order) {
                                $order->update(['status' => 'Paid']);
                            }
                        }
                    }
                }



                public function invoice($id)
                {
                    // $order = Order::where('id', decrypt($id))->firstOrFail();

                    // if (!$order) {
                    //     abort(404); // Tampilkan halaman 404 jika order tidak ditemukan
                    // }

                    // $subtotal = 0; 
                    // $carts = $order->carts;

                    // if($order && $order->carts) {
                    //     foreach ($carts as $cart) {
                    //         $subtotal += $cart->amount * $cart->obat2->harga_obat;
                    //     }
                    // }
                    
                    // return view('invoice.index', compact('order'));

                    try {
                        $orderID = decrypt($id);
                        $order = Order::findOrFail($orderID);
                        $orders = Order::where('order_id', $order->order_id)->get();
                        $subtotal = 0;
                        $carts = $order->carts;

                        if ($order && $order->carts) {
                            foreach ($carts as $cart) {
                                $subtotal += $cart->amount * $cart->obat2->harga_obat;
                            }
                        }

                        return view('invoice.index', compact('order', 'orders'));
                    } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                        abort(404);
                    }
                }


                public function invoicePdf($id)
                {
                    set_time_limit(120);
                    $order = Order::find($id);

                    if (!$order) {
                        abort(404);
                    }

                    $pdfOptions = new Options();
                    $pdfOptions->setIsRemoteEnabled(true);
                    
                    $pdf = new Dompdf($pdfOptions);
                    $htmlContent = view('invoice.invoice_pdf', compact('order'))->render();

                    $pdf->loadHtml($htmlContent);
                    $pdf->setPaper('A4', 'portrait');
                    
                    // Convert the HTML content to PDF and set the base path for the images
                    $pdf->setHttpContext(stream_context_create([
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ]
                    ]));

                    $pdf->render();

                    $fileName = 'invoice-' . $order->id . '.pdf';

                    return $pdf->stream($fileName, ['Attachment' => false]);
                }


    public function render()
    {
        // $this->fullname = auth()->user()->name;
    }    
    
}

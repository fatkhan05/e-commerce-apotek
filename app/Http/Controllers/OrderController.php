<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Obat2;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat2 = Obat2::all();

        return view('cart.index', compact('obat2'));

        // $obat = Obat::all();

        // return view('cart.index', compact('obat'));
        // ->with('obat', $obat);

    }

    

    // public function checkout()
    // {
    //     $user_id = Auth::id();
    //     $carts = Cart::where('user_id', $user_id)->get();

    //     if ($carts == null)
    //     {
    //         return Redirect::back();
    //     }

    //     $order = Order::create([
    //         'user_id' => $user_id
    //     ]);

    //     foreach ($carts as $cart) {
    //         $product = Obat2::find($cart->product_id);
    //         $product->update([
    //             'stock' => $product->stock - $cart->amount,
    //         ]);

    //         Transaksi::create([
    //             'amount' => $cart->amount,
    //             'product_id' => $cart->product_id,
    //             'order_id' => $order->id,
    //         ]);

    //         $cart->delete();
    //     }

    //     return Redirect::route('show_order', $order);
    // }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang Berhasil diUpdate');
        }
    }

    public function remove(Request $request)
    {
        // $cart = session()->get('cart');

        // if(isset($cart[$id])){
        //      unset($cart[$id]);
        //      session()->put('cart', $cart);
        // }
        // session()->put('cart', $cart);
        // return redirect()->back()->with('success', "Succesfully Removed!");

        if($request->id) {
            $cart = session()->get('cart');
            $cart->delete();
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return 'xownowe';
            // return redirect()->back()->with('success', "Succesfully Removed!");
            // session()->flash('success', 'Product successfully removed!');
        }
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Obat2;
use App\Models\Cart;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth');
     }

     public function index()
     {
        // $carts = Cart::where('user_id', auth()->id())->with('obat2')->get();
        $carts = Cart::getCartItems();
        dd($carts);
        // return view('cart.cart')->with(compact('carts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function addToCart(Request $request) {
    //     $validateData = $request->validate([
    //         'product_id' => 'required|exist:obat2,id',
    //         'amount' => 'required|integer|min:1',
    //     ]);

    //     $cart = new Cart;
    //     $cart->user_id = auth()->id;
    //     $cart->product_id = $validateData['product_id'];
    //     $cart->amount = $validateData['amount'];
    //     $cart->save();

    //     dd($cart->id);
    // } 
        
    

    public function addToCart(Obat2 $obat2, $id){
        $user_id = Auth::id();

        $cart = Cart::where('product_id', $obat2->kode_obat)->where('user_id', Auth::id())->first();
        
        $obat2 = Obat2::findOrFail($id);
        // dd($obat2);
        
        $cart = session()->get('cart', []);
        
        if(!($cart = Session::get('cart'))) {             
            $cart = [
                    'id_obat' => $obat2->id,
                    'kode_obat' => $obat2->kode_obat,
                    'nama_obat' => $obat2->nama_obat,
                    'satuan_obat' => $obat2->satuan_obat,
                    'harga_obat' => $obat2->harga_obat,
                    'quantity' => 1
                ];
            
            } else {
                Cart::create([
                    'user_id' => $user_id,
                    'product_id' => $obat2->kode_obat,
                    'amount' => 1
                ]);

            }   
            // session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
  
        
        if(isset($cart[$id])) {
            $cart[$obat2->id]['quantity']++;
            session()->put('cart', $cart);
        } 
        $cart = [
            'id_obat' => $obat2->id,
            'kode_obat' => $obat2->kode_obat,
            'nama_obat' => $obat2->nama_obat,
            'satuan_obat' => $obat2->satuan_obat,
            'harga_obat' => $obat2->harga_obat,
            'quantity' => 1
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');       
    }

        
    public function store()
    {
        $user_id = Auth::id();
        $carts = Cart::where('user_id', $user_id)->get();
        return view('show_cart', [
            'carts' => $carts,
        ]);

    }

    
    
    public function update_cart(Cart $cart, Request $request)
    {
        $request->validate([
            'amount' => 'required|gte:1|lte:' . $cart->product->stock
        ]);

        $cart->update([
            'amount' => $request->amount
        ]);

        return Redirect::route('cart.index');
    }

    public function delete_cart(Cart $cart)
    {
        $cart->delete();
        return Redirect::route('/cart');
    }

}
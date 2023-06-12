<?php

namespace App\Http\Controllers;

use App\Models\Obat2;
use App\Models\Cart;
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
        $carts = Cart::getCartItems();
        // dd($carts);
        return view('cart.cart')->with(compact('carts'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function addToCart(Obat2 $obat2, $id)
    {
        $user_id = Auth::id();
    
        $obat2 = Obat2::findOrFail($id);
    
        $cart = Cart::where('product_id', $obat2->id)
                    ->where('user_id', $user_id)
                    ->first();
    
        if (!$cart) {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $obat2->id,
                'total_price' => $obat2->harga_obat,
                'amount' => 1
            ]);
        } else {
            $cart->amount++;
            $cart->total_price = $obat2->harga_obat * $cart->amount;
            $cart->save();
        }
    
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
        'amount' => 'required|gte:1|lte:' . $cart->obat2->stock_obat
    ]);

    $cart->update([
        'amount' => $request->amount
    ]);

    return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui');
}

    public function delete_cart($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('cart.index');
    }

}
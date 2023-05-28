<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Obat2;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.check_out');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function check_out(Request $request){
        $jumlah = $request->jumlah;
        $harga_obat = Obat2::findOrFail($request->id_obat)->harga_obat;
        $total_harga = $jumlah * $harga_obat;

        Transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'id_barang' => $request->id_barang,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('chart');
    }


    public function totalProductAmount()
    {
        // $this->cart = Cart::where('kode_obat', auth()->user()->id)->get();
        // foreach ($this->cart as cartItem){
        //     $this-totalProductAmount += $cartItem->obat2->harga_obat * cartItem
        // }
    }


    public function render()
    {
        // $this->fullname = auth()->user()->name;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

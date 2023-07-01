<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Obat2;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderObatController extends Controller
{
    public function order(Request $request)
    {
        $obat = Obat2::find($request->input('id'));
        if(!$obat) {
            return response()->json([
                'error' => 'Obat tidak ditemukan'
            ], 404);
        }

        $order = Order::create([
            'user_id' => $request->user_id,
            'product_id' => $request->id,
            'total_price' => $request->harga_obat,
            'amount' => 1
        ]);

        return response()->json([
            'message' => 'Pemesanan Obat berhasil'
        ], 200);

    }
}

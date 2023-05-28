<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Resources\ObatResource;
use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();

        return new ObatResource(true, 'Data Obat !', $transaksi);

        // $data = Obat::all();

        // $result = ObatResource::collection($data);

        // return $this->sendResponse($result, 'Successfully get Transaksi');
        // return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (StoreTransaksiRequest $request)
    {
        // $data = new ObatResource(Obat::create($request->validated()));

        // return $this->sendResponse($data, 'Successfully store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $transaksi = Transaksi::find($id);

        if(Transaksi){
            return new ObatResource(true, 'Data Ditemukan !', $transaksi);

        }
        else{
            return response()->json([
                'message' => 'Data Not Found'
            ], 422);
        }
        // $cek = Transaksi::find($transaksi->id);
        // if(!$cek){
        //     abort(404, 'Object Not Found');
        // }
        // $data = new ObatResource($cek);

        // return $this->sendResponse($data, 'Successfullly get Transaksi');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTransaksiRequest $request, Transaksi $transaksi)
    {
        $transaksi->update($request->validated());

        // $result = new ObatResource($transaksi);

        // return $this->sendResponse($result, 'Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return response()->noContent();
    }
}

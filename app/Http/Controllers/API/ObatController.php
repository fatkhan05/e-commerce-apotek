<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ObatResource;
use App\Models\Obat2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat2 = Obat2::all();

        return new ObatResource(true, 'Data Obat !', $obat2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|unique:obat2,id',
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            // 'deskripsi' => 'required',
            'satuan_obat' => 'required',
            'harga_obat' => 'required',
            'stock_obat' => 'required',
            // 'image' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),500);
        }else{
            $obat2 = Obat2::create([
            'id' => $request->id,
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            // 'deskripsi' => $request->deskripsi,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stock_obat' => $request->stock_obat,
            // 'image' => $request->image,
            ]);

            return new ObatResource(true, 'Data Berhasil Disimpan !', $obat2);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat2 = Obat2::find($id);

        if($obat2){
            return new ObatResource(true, 'Data Ditemukan !', $obat2);

        }else{
            return response()->json([
                'message' => 'Data Not Found !'
            ], 500);
        }
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
        $validator = Validator::make($request->all(),[
            // 'id' => 'required|unique:obat2,id',
            // 'kode_obat' => 'required',
            'nama_obat' => 'required',
            'satuan_obat' => 'required',
            'harga_obat' => 'required',
            'stock_obat' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),404);
        }else{
            $obat2 = Obat2::find($id);

            if($obat2){
                // $obat2->id = $request->id;
                // $obat2->kode_obat = $request->kode_obat;
                $obat2->nama_obat = $request->nama_obat;
                $obat2->satuan_obat = $request->satuan_obat;
                $obat2->harga_obat = $request->harga_obat;
                $obat2->stock_obat = $request->stock_obat;
                $obat2->image = $request->image;
                $obat2->save();

                return new ObatResource(true, 'Data Berhasil DiUpdate !', $obat2);
            }else{
                return response()->json([
                    'message' => 'Data Not Found !'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat2 = Obat2::find($id);

            if($obat2){
                $obat2->delete();
                return new ObatResource(true, 'Data Berhasil DiHapus !', '');
            }else{
                return response()->json([
                    'message' => 'Data Not Found !'
                ]);
            }
    }

    public function stock(Obat2 $obat2) 
    {
        return response()->json(['stock_obat' => $obat2->stock_obat]);
    }
}

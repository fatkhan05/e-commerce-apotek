<?php

namespace App\Http\Controllers;

use App\Models\Obat2;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat2 = Obat2::orderBy('id')->paginate(5);
        // $obat = Obat::all()->paginate(5);
        return view('obat.index')->with('obat', $obat2);
        // return view('/obat/index', ['obat' => $obat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('id_obat',$request->id_obat);
        Session::flash('kode_obat',$request->kode_obat);
        Session::flash('nama_obat',$request->nama_obat);
        Session::flash('satuan_obat',$request->satuan_obat);
        Session::flash('harga_obat',$request->harga_obat);
        Session::flash('stock_obat',$request->stock_obat);
        $request->validate([
            'id_obat' => 'required|unique:obat,id_obat',
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'satuan_obat' => 'required',
            'harga_obat' => 'required',
            'stock_obat' => 'required',

        ], [
            'id_obat.required' => 'ID OBAT wajib diisi',
            'id_obat.unique' => 'ID OBAT sudah ada dalam database',
            'kode_obat.required' => 'KODE OBAT wajib diisi',
            'nama_obat.required' => 'NAMA OBAT wajib diisi',
            'satuan_obat.required' => 'SATUAN OBAT wajib diisi',
            'harga_obat.required' => 'HARGA OBAT wajib diisi',
            'stock_obat.required' => 'STOCK OBAT wajib diisi',
        ]);

        $data = [
            'id_obat' => $request->id_obat,
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stock_obat' => $request->stock_obat,
        ];
        Obat2::create($data);
        return redirect()->to('obat')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::where('id_obat', $id)->first();
        return view('obat.edit')->with('obat', $obat);
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
        $request->validate([
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'satuan_obat' => 'required',
            'harga_obat' => 'required',
            'stock_obat' => 'required',

        ], [
            'kode_obat.required' => 'KODE OBAT wajib diisi',
            'nama_obat.required' => 'NAMA OBAT wajib diisi',
            'satuan_obat.required' => 'SATUAN OBAT wajib diisi',
            'harga_obat.required' => 'HARGA OBAT wajib diisi',
            'stock_obat.required' => 'STOCK OBAT wajib diisi',
        ]);

        $data = [
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stock_obat' => $request->stock_obat,
        ];
        Obat::where('id_obat', $id)->update($data);
        return redirect()->to('obat')->with('success', 'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::where('id_obat', $id)->delete();
        return redirect()->to('obat')->with('success', 'Berhasil Melakukan Delete Data');
    }
}

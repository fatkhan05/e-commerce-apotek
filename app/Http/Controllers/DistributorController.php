<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor = Distributor::all();

        return view('distributor.distributor')->with('distributor', $distributor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('id_suplier',$request->id_suplier);
        Session::flash('nama_suplier',$request->nama_suplier);
        Session::flash('no_telepon',$request->no_telepon);
        Session::flash('alamat',$request->alamat);
        $request->validate([
            'id_suplier' => 'required|unique:distributor,id_suplier',
            'nama_suplier' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',

        ], [
            'id_suplier.required' => 'ID SUPLIER wajib diisi',
            'id_suplier.unique' => 'ID SUPLIER sudah ada dalam database',
            'nama_suplier.required' => 'NAMA SUPLIER wajib diisi',
            'no_telepon.required' => 'NOMOR TELEPON wajib diisi',
            'no_telepon.numeric' => 'NOMOR TELEPON harus angka',
            'alamat.required' => 'ALAMAT wajib diisi',
        ]);

        $data = [
            'id_suplier' => $request->id_suplier,
            'nama_suplier' => $request->nama_suplier,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,

        ];
        Distributor::create($data);
        return redirect()->to('Distributor')->with('success', 'Berhasil Menambahkan Data');

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
        $distributor = Distributor::where('id_suplier', $id)->first();
        return view('distributor.edit')->with('distributor', $distributor);
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
            'nama_suplier' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required', 
        ], [
            'nama_suplier.required' => 'NAMA SUPLIER wajib diisi',
            'no_telepon.required' => 'NOMOR TELEPON wajib diisi',
            'alamat.required' => 'ALAMAT wajib diisi'
        ]);
        $data = [
            'nama_suplier' => $request->nama_suplier,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ];

        Distributor::where('id_suplier', $id)->update($data);
        return redirect()->to('Distributor')->with('success',  'Berhasil Melakukan Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Distributor::where('id_suplier', $id)->delete();
        return redirect()->to('Distributor')->with('success', 'Berhasil Melakukan Delete Data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Obat2;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Faker\Core\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat2 = Obat2::orderBy('id')->paginate(7);

        return view('obat.index')->with('obat', $obat2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail($id)
    {
        $product = Obat2::find($id);
        return view('obat.obat_detail', compact('product'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {

        Session::flash('id_obat',$request->id_obat);
        Session::flash('kode_obat',$request->kode_obat);
        Session::flash('nama_obat',$request->nama_obat);
        Session::flash('dskripsi',$request->deskripsi);
        Session::flash('satuan_obat',$request->satuan_obat);
        Session::flash('harga_obat',$request->harga_obat);
        Session::flash('stock_obat',$request->stock_obat);
        $request->validate([
            // 'id_obat' => 'required|unique:obat,id_obat',
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'deskripsi' => 'required',
            'satuan_obat' => 'required',
            'harga_obat' => 'required',
            'stock_obat' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,jfif',

        ], [
            'id_obat.unique' => 'ID OBAT sudah ada dalam database',
            'kode_obat.required' => 'KODE OBAT wajib diisi',
            'nama_obat.required' => 'NAMA OBAT wajib diisi',
            'deskripsi.required' => 'DESKRIPSI wajib diisi',
            'satuan_obat.required' => 'SATUAN OBAT wajib diisi',
            'harga_obat.required' => 'HARGA OBAT wajib diisi',
            'stock_obat.required' => 'STOCK OBAT wajib diisi',
            'foto.required' => 'SILAHKAN MASUKKAN FOTO',
            'foto.mimes' => 'FOTO HANYA BEREKSTENSI JPG JPEG PNG GIF',
        ]);

        $imageName = '';
        if($image = $request->file('foto')){
            $imageName = time().'-'.uniqid().'.'. $image->getClientOriginalExtension();
            $image->move('foto', $imageName);
        }

        $data = [
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'deskripsi' => $request->deskripsi,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stock_obat' => $request->stock_obat,
            'image' => $imageName,
        ];
        Obat2::create($data);
        return redirect()->to('Obat')->with('success', 'Berhasil Menambahkan Data');
    }

    
    public function edit($id)
    {
        $obat = Obat2::where('id', $id)->first();
        return view('obat.edit')->with('obat', $obat);
    }

    public function update(Request $request, $id)
    {
        $product = Obat2::findOrFail($id);
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

        $imageName = '';
        $deleteOldImage = 'foto/'.$product->image;
        if($image = $request->file('foto')){
            if(file_exists($deleteOldImage)){
                Storage::delete($deleteOldImage);
            } 
            $imageName = time().'-'.uniqid().'.'. $image->getClientOriginalExtension();
            $image->move('foto', $imageName);
        } else {
            $imageName = $product->image;
        }

        $data = [
            'kode_obat' => $request->kode_obat,
            'nama_obat' => $request->nama_obat,
            'satuan_obat' => $request->satuan_obat,
            'harga_obat' => $request->harga_obat,
            'stock_obat' => $request->stock_obat,
            'image' => $imageName,
        ];

        Obat2::where('id', $id)->update($data);
        return redirect()->to('Obat')->with('success', 'Berhasil Melakukan Update Data');
    }

    public function destroy($id)
    {
        Obat2::where('id', $id)->delete();
        return redirect()->to('Obat')->with('success', 'Berhasil Melakukan Delete Data');
    }
}

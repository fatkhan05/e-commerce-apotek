@extends('layouts.main')
@section('container')
    

<h1><center>Tambah Suplier</center></h1>
<br/>   

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action='{{ url('Distributor') }}' method='post'>
    @csrf 
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('Distributor') }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label"><b>ID SUPLIER</b></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_suplier' value="{{ Session::get('id_suplier') }}" id="id_suplier">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label"><b>NAMA SUPLIER</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_suplier' value="{{ Session::get('nama_suplier') }}" id="nama_suplier">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="no" class="col-sm-2 col-form-label"><b>NOMOR TELEPON</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='no_telepon' value="{{ Session::get('no_telepon') }}" id="no_telepon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label"><b>ALAMAT</b></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}" id="alamat">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
    </form>
    <!-- AKHIR FORM -->


@endsection
@extends('layouts.main')
@section('container')
    <div class="container">

        <h1><center>Tambah Obat</center></h1>
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

    <!-- CREATE START -->
    <form action='{{ url('Obat') }}' method='post' enctype="multipart/form-data">
        @csrf
        <div class="my-3 p-4 bg-body rounded shadow-lg mb-5">
            <a href='{{ url('Obat') }}' class="btn btn-secondary"><i class="fa-solid fa-backward"></i></a>
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kode_obat' value="{{ Session::get('kode_obat') }}" id="kode_obat">
                    {{-- @if ($errors -> has('kode_obat'))
                    <div class="text-danger">
                        {{$errors -> first('kode_obat')}}
                    </div>                
                    @endif --}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_obat" class="col-sm-2 col-form-label">NAMA OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_obat' value="{{ Session::get('nama_obat') }}" id="nama_obat">
                    {{-- @if ($errors -> has('nama_obat'))
                    <div class="text-danger">
                        {{$errors -> first('nama_obat')}}
                    </div>                
                    @endif --}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi_obat" class="col-sm-2 col-form-label">DESKRIPSI OBAT</label>
                <div class="col-sm-10">
                    <input type="textarea" class="form-control" name='deskripsi' value="{{ Session::get('deskripsi') }}" id="deskripsi" style="height: 100%;">
                    <div class="form-floating">
                        {{-- <textarea class="form-control" name="deskripsi" value="{{ Session::get('deskripsi') }}" id="deskripsi" style="height: 100px"></textarea> --}}
                      </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="satuan_obat" class="col-sm-2 col-form-label">SATUAN OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='satuan_obat' value="{{ Session::get('satuan_obat') }}" id="satuan_obat">
                    {{-- @if ($errors -> has('satuan_obat'))
                    <div class="text-danger">
                        {{$errors -> first('satuan_obat')}}
                    </div>                
                    @endif --}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_obat" class="col-sm-2 col-form-label">HARGA OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='harga_obat' value="{{ Session::get('harga_obat') }}" id="harga_obat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock_obat" class="col-sm-2 col-form-label"> <b> STOCK OBAT</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='stock_obat' value="{{ Session::get('stock_obat') }}" id="stock_obat">
                    {{-- @if ($errors -> has('stock_obat'))
                    <div class="text-danger">
                        {{$errors -> first('stock_obat')}}
                    </div>                
                    @endif --}}
                </div>                
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">FOTO</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>                
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- CREATE END -->
        
        
        
    </div>

@endsection

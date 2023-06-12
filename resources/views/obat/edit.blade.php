@extends('layouts.main')
@section('container')
    <h1><center>Edit Obat</center></h1>
    <br/>   

    <!-- START FORM -->
    <form action='{{ url('Obat/'. $obat->id) }}' method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-3 p-4 bg-body rounded shadow-lg">
           
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID OBAT</label>
                <div class="col-sm-10">
                    {{ $obat->id}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kode_obat' value="{{ $obat->kode_obat }}" id="kode_obat">                    
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_obat" class="col-sm-2 col-form-label">NAMA OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_obat' value="{{ $obat->nama_obat }}" id="nama_obat">                    
                </div>
            </div>
            <div class="mb-3 row">
                <label for="satuan_obat" class="col-sm-2 col-form-label">SATUAN OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='satuan_obat' value="{{ $obat->satuan_obat }}" id="satuan_obat">                    
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_obat" class="col-sm-2 col-form-label">HARGA OBAT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='harga_obat' value="{{ $obat->harga_obat }}" id="harga_obat">                    
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock_obat" class="col-sm-2 col-form-label"> <b> STOCK OBAT</b></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='stock_obat' value="{{ $obat->stock_obat }}" id="stock_obat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label"> <b> IMAGE </b></label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" value="{{ $obat->image }}" placeholder="image" id="foto">
                    <img style="width: 10rem; height: 10rem;" src="{{ asset('foto/'.$obat->image) }}" alt="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <a href="{{ url('Obat') }}" class="btn btn-secondary"> >> BACK </a>
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->

    {{--    <form method='post' action="{{ url('Obat') }}">
         @csrf

         <div class="form-group">
            <label>ID OBAT</label>
            <input type="text" name="id" class="form-controll" placeholder="masukkan id obat">
            @if ($errors -> has('id'))
            <div class="text-danger">
                {{$errors -> first('id')}}
            </div>                
            @endif
         </div>

         <div class="form-group">
            <label>KODE OBAT</label>
            <input type="text" name="id" class="form-controll" placeholder="masukkan kode obat">
            @if ($errors -> has('id'))
            <div class="text-danger">
                {{$errors -> first('id')}}
            </div>                
            @endif
         </div>

         <div class="form-group">
            <label>NAMA OBAT</label>
            <input type="text" name="nama" class="form-controll" placeholder="masukkan nama obat">
            @if ($errors -> has('nama'))
            <div class="text-danger">
                {{$errors -> first('nama')}}
            </div>                
            @endif
         </div>
         <div class="form-group">
            <label>SATUAN OBAT</label>
            <input type="text" name="satuan" class="form-controll" placeholder="masukkan satuan obat">
            @if ($errors -> has('satuan'))
            <div class="text-danger">
                {{$errors -> first('satuan')}}
            </div>                
            @endif
         </div>
         <div class="form-group">
            <label>HARGA OBAT</label>
            <input type="text" name="harga" class="form-controll" placeholder="masukkan harga obat">
            @if ($errors -> has('hraga'))
            <div class="text-danger">
                {{$errors -> first('harga')}}
            </div>                
            @endif
         </div> 
         <div class="form-group">
            <label>STOCK OBAT</label>
            <input type="text" name="stock" class="form-controll" placeholder="masukkan stock obat">
            @if ($errors -> has('stock'))
            <div class="text-danger">
                {{$errors -> first('stock')}}
            </div>                
            @endif
         </div>

         <br>

         <div class="form-group">
            <a href="/home" class="btn btn-warning">Back</a>
            <a href="/simpan/obat" class="">Simpan</a>
            <input type="submit" class="btn btn-success" value="Simpan">
         </div>

    </form> --}}
@endsection

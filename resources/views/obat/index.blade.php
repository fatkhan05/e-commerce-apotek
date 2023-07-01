@extends('layouts.main')
@section('container')
    
<div class="container" style="padding: 3rem;">
  <h3><i class="fa-solid fa-hospital"></i> Daftar Obat</h3>

<table class="table table-bordered table-hover table-striped mt-3" >
    <tr>
        <th>Id Obat</th>
        <th>Kode Obat</th>
        <th>Nama Obat</th>
        <th>Satuan Obat</th>
        <th>Harga Obat</th>
        <th>Stock Obat</th>
        <th>IMAGE</th>
        <th>Action</th>
    </tr>

    @foreach ($obat as $o)
    <tr>
        <td>{{$o->id}}</td>
        <td>{{$o->kode_obat}}</td>
        <td>{{$o->nama_obat}}</td>
        <td>{{$o->satuan_obat}}</td>
        <td>{{$o->harga_obat}}</td>
        <td>{{$o->stock_obat}}</td>
        <td>
            @if ($o->image)
                <img style="max-width: 60px; max-height: 60px;" src="{{ url('foto').'/'.$o->image }}"/>
            @endif
        </td>
        {{--  --}}
        <td>
          <a href="{{ url('obat-detail/'.$o->id) }}" class="btn btn-primary"><i data-feather="eye"></i></a>
          <a href="{{ $o->id.'/edit' }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalEdit-{{ $o->id }}"><i data-feather="edit"></i></a>
          <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('Obat/'. $o->id) }}" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger"><i data-feather="trash-2"></i></button>
        </form>
        </td>
    </tr>

    
    @endforeach
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i data-feather="plus-circle"></i>Tambah Obat
    </button>
</table>
{{ $obat->links() }}

        <!-- Modal CREATE START -->
        <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: ;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Obat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Start Form --}}
                <form action='{{ url('Obat') }}' method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="my-3 p-4 rounded mb-3">
                        <div class="mb-3">
                            <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='kode_obat' value="{{ Session::get('kode_obat') }}" id="kode_obat">
                                @if ($errors -> has('kode_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('kode_obat')}}
                                </div>                
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_obat" class="col-sm-2 col-form-label">NAMA OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='nama_obat' value="{{ Session::get('nama_obat') }}" id="nama_obat">
                                @if ($errors -> has('nama_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('nama_obat')}}
                                </div>                
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_obat" class="col-sm-2 col-form-label">DESKRIPSI OBAT</label>
                            <div class="col-sm-12">
                                {{-- <input type="textarea" class="form-control" name='deskripsi' value="{{ Session::get('deskripsi') }}" id="deskripsi" style="height: 100%;"> --}}
                                <div class="form-floating">
                                    @if ($errors -> has('deskripsi'))
                                <div class="text-danger">
                                    {{$errors -> first('deskripsi')}}
                                </div>                
                                @endif
                                    <textarea class="form-control" name="deskripsi" value="{{ Session::get('deskripsi') }}" id="deskripsi" style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="satuan_obat" class="col-sm-2 col-form-label">SATUAN OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='satuan_obat' value="{{ Session::get('satuan_obat') }}" id="satuan_obat">
                                @if ($errors -> has('satuan_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('satuan_obat')}}
                                </div>                
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga_obat" class="col-sm-2 col-form-label">HARGA OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='harga_obat' value="{{ Session::get('harga_obat') }}" id="harga_obat">
                                @if ($errors -> has('harga_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('harga_obat')}}
                                </div>                
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="stock_obat" class="col-sm-2 col-form-label"> <b> STOCK OBAT</b></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='stock_obat' value="{{ Session::get('stock_obat') }}" id="stock_obat">
                                @if ($errors -> has('stock_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('stock_obat')}}
                                </div>                
                                @endif
                            </div>                
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">FOTO</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="foto" id="foto">
                                @if ($errors -> has('foto'))
                                    <div class="text-danger">
                                        {{$errors -> first('foto')}}
                                    </div>                
                                @endif             
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
            {{-- Form End --}}
            </div>
        </div>
        </div>            
        <!-- MODAL CREATE END -->



        <!-- MODAL EDIT START -->
        @foreach ($obat as $ob)
            <div class="modal modal-lg fade" id="exampleModalEdit-{{ $ob->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: ;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Obat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- START FORM -->
                        <form action='{{ url('Obat/'. $ob->id) }}' method='post' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-3 p-4 rounded mb-3">
                        <div class="mb-0 row">
                        <label for="id" class="col-sm-2 col-form-label">ID OBAT</label>
                        <div class="col-sm-10 mt-1">
                            {{ $ob->id}}
                        </div>
                    </div>
                        <div class="mb-3">
                            <label for="kode" class="col-sm-2 col-form-label">Kode Obat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='kode_obat' value="{{ $ob->kode_obat }}" id="kode_obat">
                                {{-- @if ($errors -> has('kode_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('kode_obat')}}
                                </div>                
                                @endif --}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_obat" class="col-sm-2 col-form-label">NAMA OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='nama_obat' value="{{ $ob->nama_obat }}" id="nama_obat">
                                {{-- @if ($errors -> has('nama_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('nama_obat')}}
                                </div>                
                                @endif --}}
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_obat" class="col-sm-2 col-form-label">DESKRIPSI OBAT</label>
                            <div class="col-sm-12">
                                {{-- <input type="textarea" class="form-control" name='deskripsi' value="{{ Session::get('deskripsi') }}" id="deskripsi" style="height: 100%;"> --}}
                                <div class="form-floating">
                                    <textarea class="form-control" name="deskripsi" value="{{ $ob->deskripsi }}" id="deskripsi" style="height: 100px"></textarea>
                                    {{-- @if ($errors -> has('deskripsi'))
                                <div class="text-danger">
                                    {{$errors -> first('deskripsi')}}
                                </div>                
                                @endif --}}
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="satuan_obat" class="col-sm-2 col-form-label">SATUAN OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='satuan_obat' value="{{ $ob->satuan_obat }}" id="satuan_obat">
                                {{-- @if ($errors -> has('satuan_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('satuan_obat')}}
                                </div>                
                                @endif --}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga_obat" class="col-sm-2 col-form-label">HARGA OBAT</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='harga_obat' value="{{ $ob->harga_obat }}" id="harga_obat">
                                {{-- @if ($errors -> has('harga_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('harga_obat')}}
                                </div>                
                                @endif --}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="stock_obat" class="col-sm-2 col-form-label"> <b> STOCK OBAT</b></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name='stock_obat' value="{{ $ob->stock_obat }}" id="stock_obat">
                                {{-- @if ($errors -> has('stock_obat'))
                                <div class="text-danger">
                                    {{$errors -> first('stock_obat')}}
                                </div>                
                                @endif --}}
                            </div>                
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="col-sm-2 col-form-label">FOTO</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="foto" id="foto" value="{{ $ob->image }}">
                                <img style="width: 10rem; height: 10rem; margin-top: 15px;" src="{{ asset('foto/'.$ob->image) }}" alt="">
                                {{-- @if ($errors -> has('foto'))
                                    <div class="text-danger">
                                        {{$errors -> first('foto')}}
                                    </div>                
                                @endif              --}}
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
                <!-- AKHIR FORM -->
            </div>
            </div>
        </div>
        </div>
        @endforeach
        <!-- MODAL EDIT END -->

</div>

@endsection



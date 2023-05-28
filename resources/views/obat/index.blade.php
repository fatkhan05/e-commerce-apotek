@extends('layouts.main')
@section('container')
    
<div class="container" style="padding: 3rem;">
  <h1>Daftar Obat</h1>

<table class="table table-bordered table-hover table-striped mt-3" >
    <tr>
        <th>Id Obat</th>
        <th>Kode Obat</th>
        <th>Nama Obat</th>
        <th>Satuan Obat</th>
        <th>Harga Obat</th>
        <th>Stock Obat</th>
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
          <a href="#" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
          <a href="{{ url('Obat/'.$o->id_obat.'/edit')}}"class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
          <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('Obat/'. $o->id_obat) }}" method="post">
            @csrf
            @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
        </form>
        </td>
    </tr>

    
    @endforeach
    <a href="/Obat/create" class="btn btn-success"><i class="fa-solid fa-plus"></i> Tambah Obat </a>
</table>
{{ $obat->links() }}
</div>

@endsection



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
          <a href="{{ url('Obat/'.$o->id.'/edit')}}"class="btn btn-success"><i data-feather="edit"></i></a>
          <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('Obat/'. $o->id) }}" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger"><i data-feather="trash-2"></i></button>
        </form>
        </td>
    </tr>

    
    @endforeach
    <a href="/Obat/create" class="btn btn-success"><i data-feather="plus-circle"></i> Tambah Obat </a>
</table>
{{ $obat->links() }}
</div>

@endsection



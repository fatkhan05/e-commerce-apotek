@extends('layouts.main')
@section('container')


<div class="container" style="padding: 3rem;">
    <h3> <i data-feather="users"></i> Data Suplier</h3>
  
  <table class="table table-bordered table-hover table-striped mt-3">
      <tr>
          <th>Id Suplier</th>
          <th>Nama Suplier</th>
          <th>No Telepon</th>
          <th>Alamat</th>
          <th>Action</th>
      </tr>
  
      @foreach ($distributor as $d)
      <tr>
          <td>{{$d->id_suplier}}</td>
          <td>{{$d->nama_suplier}}</td>
          <td>{{$d->no_telepon}}</td>
          <td>{{$d->alamat}}</td>
          
          <td>
            <a href="{{ url('Distributor/'.$d->id_suplier.'/edit')}}"class="btn btn-warning"><i data-feather="edit"></i></a>
            <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('Distributor/'. $d->id_suplier) }}" method="post">
              @csrf
              @method('DELETE')
                  <button type="submit" name="submit" class="btn btn-danger"><i data-feather="trash-2"></i></button>
          </form>
          </td>
      </tr>
      
      
      @endforeach
      <a href="/Distributor/create" class="btn btn-primary">Tambah Suplier</a>
    </table>
    {{-- {{ $distributor->links() }} --}}
    
  </div>
  
  <div class="row mt-5">
    <h3>Maps</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1663.225364600534!2d112.44853720548262!3d-7.483037470841584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78128791ae235d%3A0xc4eea3feb0c0127f!2sCV.%20NATUSI%20Software%20dan%20Hardware!5e0!3m2!1sid!2sid!4v1680050551849!5m2!1sid!2sid" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  @endsection
@extends('layouts.main')
@section('container')
<div class="container">

    <h1 class="p-4"><center>Transaksi Penjualan</center></h1>
    
    <form action="{{ url('Transaksi') }}}"></form>
    <table  class="table table-bordered table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Id Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $o)
                <td>{{ $o->id_transaksi }}</td>
                <td>{{ $o->id_barang }}</td>
                <td>{{ $o->id_pembeli }}</td>
                <td>{{ $o->tanggal }}</td>
                <td>{{ $o->keterangan }}</td>
            @endforeach
        </tbody>
    </table>
    
</div>
    
      
@endsection
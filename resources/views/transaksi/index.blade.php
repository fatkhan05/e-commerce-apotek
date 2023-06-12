@extends('layouts.main')
@section('container')
<div class="container">

    <h1 class="p-4"><center>Transaksi Penjualan</center></h1>
    
    <form action="{{ url('Transaksi') }}}"></form>
    <table  class="table table-bordered table-hover table-striped mt-3 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Id Transaksi</th>
                <th>Id Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Opsi</th>
            </tr>
        </thead>

            @php
                $no = 1;
            @endphp
            @foreach ($transaksi as $o)
            <tr>
                <td>{{ $o->id }}</td>
                <td>{{ $o->order_id }}</td>
                <td>{{ $o->product_id }}</td>
                <td>{{ $o->amount }}</td>
                <td>{{ $o->created_at }}</td>
                <td>
                    <a href="{{ route('print.pdf', ['id' => $o->id]) }}" target="blank" class="btn btn-success rounded-pill">Capture</a>
                </td>
            </tr>
            @endforeach
    </table>
    
</div>
    
      
@endsection
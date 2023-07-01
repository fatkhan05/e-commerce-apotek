@extends('layouts.main')
@section('container')
<div class="container">

    <h3 class="p-4 text"><i class="fa-regular fa-file-lines"></i> Transaksi Penjualan</h3>
    
<form action="{{ url('Transaksi') }}"></form>
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
                $order_id = 1;
            @endphp
            @foreach ($transaksi as $o) 
                <tr>
                    <td>{{ $o->id }}</td>
                    <td>{{ $o->order_id }}</td>
                    <td>{{ $o->product_id }}</td>
                    <td>{{ $o->amount }}</td>
                    <td>{{ $o->created_at }}</td>
                    <td>
                        <a href="{{ url('invoice', encrypt($o->id)) }}" class="btn btn-primary rounded-pill">Detail</a>
                        <a href="{{ route('print.pdf', ['id' => $o->id]) }}" target="blank" class="btn btn-success rounded-pill">Capture</a>
                    </td>
                </tr>
            @endforeach
    </table>
    {{ $transaksi->links() }}
    
</div>
    
      
@endsection
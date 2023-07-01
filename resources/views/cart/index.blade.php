@extends('layouts.main')
@section('container')

<div class="container">

    <h1 class="p-4 text-center">Pemesanan Obat</h1>
    
<a href="{{ url('Cart/cart') }}" class="btn btn-primary"><i data-feather="shopping-cart"></i></a>

    <table class="table table-bordered table-hover table-striped mt-3">
        <thead>
            <tr>
                <th>Id Obat</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Satuan Obat</th>
                <th>Harga Obat</th>
                <th>Stock Obat</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($obat2 as $o)
    <tr>
        <td>{{$o->id}}</td>
        <td>{{$o->kode_obat}}</td>
        <td>{{$o->nama_obat}}</td>
        <td>{{$o->satuan_obat}}</td>
        <td>{{$o->harga_obat}}</td>
        <td>{{$o->stock_obat}}</td>
        
        <td class="text-center">
            <form action="{{ route('cart.add', ['obat2' => $o->id, 'id' => $o->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $o->id }}">
                <button type="submit" class="rounded-pill">Add To Cart</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    

</div>
    @endsection
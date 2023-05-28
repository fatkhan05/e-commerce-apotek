@extends('layouts.main')
@section('container')

<div class="container">

    <h1 class="mt-4"><center>Pemesanan Obat</center></h1>
    
<a href="{{ url('Cart/cart') }}" class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i></a>

<form action="{{ url('Order') }}" method="POST">
    @csrf

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
            <form action="{{ route('add_to_cart', $o->id) }}" method="POST">
                {{-- @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button> --}}
                    {{-- <div class="input-group mb-3"> --}}
                        {{-- <input type="number" class="form-control" aria-describedby="basic-addon2"
                        name="amount" value=1> --}}
                        {{-- <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add to
                                cart</button>
                            </div> --}}
                            {{-- </div> --}}
                        </form >
                        {{-- <form action="{{ route('add_to_cart', $o->id) }}" method="POST">
                            <input class="btn btn-primary" type="submit" value="Add To Cart">
                        </form> --}}

                        <form action="{{ route('add_to_cart', $o->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $o->id }}">
                            {{-- <input type="hidden" name="kode_obat" value="{{ $o->kode_obat }}">
                            <input type="hidden" name="nama_obat" value="{{ $o->nama_obat }}">
                            <input type="hidden" name="satuan_obat" value="{{ $o->satuan_obat }}">
                            <input type="hidden" name="harga_obat" value="{{ $o->harga_obat }}">
                            <input type="hidden" name="stock_obat" value="{{ $o->stock_obat }}"> --}}
                            <button type="submit" class="rounded-pill">Add To Cart</button>
                            {{-- <a href="{{ route('add_to_cart', $o->id) }}" method="POST" class="btn btn-primary">Add To Cart</a> --}}
                        </form>
                    </td>
    </tr>
    @endforeach
    </table>
    

</div>
    @endsection
@extends('layouts.main')

@section('container')
    <div class="box shadow-sm" style="height: 20px; width: 100%; background-color: #fff;">
        {{-- <div class="flexbox">
            <a href=""> <i class="fa-solid fa-house-chimney"></i> Home </a>
            <a href=""> <i class="fa-solid fa-users"></i> Suplier </a>
            <a href=""> <i class="fa-solid fa-hospital" ></i> Obat </a>
            <a href=""> <i class="fa-sharp fa-solid fa-cart-shopping"></i> Penjualan </a>
            <a href=""> <i class="fa-solid fa-cart-shopping"></i></i> Pembelian </a>
            <a href=""> <i class="fa-solid fa-cart-shopping"></i> </a>
            <a href=""> <i data-feather="file-text"></i> </a>
            <a href=""> <i data-feather="file-text"></i> </a>
        </div> --}}
    </div>

{{-- Card Start --}}
<div class="px-5 mt-5 mb-5" style="margin-top: 10rem;">
    <div class="row">
        <div class="card mb-4" style="height: 50px; width: 100%; background-color: #abdfc7; border:#fff;">
            <div class="flex-container">
                <div class="me-3"> <i class="fa-solid fa-circle-info"></i> </div>
                <div> <span>Selamat Datang</span> {{ Auth::user()->name }}. Anda Login Sebagai Admin </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow" style="height: 7rem; width: 20rem; background-color: white; border-color: #EEEEEE;">
                <div class="row px-3 text-success">
                    <div class="col mt-4 ">
                        <h3>{{ $totalDistributor }}</h3>
                        <h6>Suplier</h6>
                    </div>
                    <div class="col mt-4 text-end">
                        <h1> <i class="fa-solid fa-users"></i> </h1>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col">
            <div class="card shadow" style="height: 7rem; width: 20rem; background-color: white; border-color: #EEEEEE;">
                <div class="row px-3 text-success">
                    <div class="col mt-4">
                        <h3>{{ $totalData }}</h3>
                        <h6>Obat</h6>
                    </div>
                    <div class="col mt-4 text-end">
                        <h1><i class="fa-solid fa-hospital" ></i></h1>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col">
            <div class="card shadow" style="height: 7rem; width: 20rem; background-color: white; border-color: #EEEEEE;">
                <div class="row px-3 text-success">
                    <div class="col mt-4">
                        <h3>{{ $totalUser }}</h3>
                        <h6>Pengguna Aplikasi</h6>
                    </div>
                    <div class="col mt-4 text-end">
                        <h1><i class="fa-solid fa-user"></i></h1>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col">
            <div class="card shadow" style="height: 7rem; width: 20rem; background-color: white; border-color: #EEEEEE;">
                <div class="row px-3 text-success">
                    <div class="col mt-4">
                        <h3>-</h3>
                        <h6>Backup Database</h6>
                    </div>
                    <div class="col mt-4 text-end">
                        <h1><i class="fa-solid fa-database"></i></h1>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <hr class="mt-5">
</div>
{{-- Card End --}}

    {{-- Table Konfirmasi Order Start --}}

        <div class="px-5">
        <div class="card shadow p-3" style="height: 34rem; width: 100%;">
                    <div class="card mb-2" style="height: 50px; width: 100%; background-color: #abdfc7; border: #fff;">
                        <div class="flex-container">
                            {{-- <div class="me-3"> <i class="fa-solid fa-cart-shopping"></i> </div> --}}
                            <div> Total Orders </div>
                        </div>
                    </div>
                    <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td> <b> Id </b> </td>
                                    <td> <b> User Id </b> </td>
                                    <td> <b> Order Id </b> </td>
                                    <td> <b> Product Name </b> </td>
                                    <td> <b> Quantity </b> </td>
                                    <td> <b> Total Price </b> </td>
                                    <td> <b> Status </b> </td>
                                    <td> <b> Konfirmasi</b> </td>
                                </tr>
                            </thead>
                            <tbody style="font-size: 15px;">
                                @foreach ($order as $items)
                                <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{{ $items->user_id }}</td>
                                        <td>{{ $items->order_id }}</td>
                                        <td>{{ $items->product_name }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>{{ $items->total_price }}</td>
                                        <td>{{ $items->status }}</td>
                                        <td>
                                            @if ($items->status === 'Unpaid')
                                            <a href="{{ route('orders.confirm', ['id' => $items->id]) }}" class="btn btn-primary">Confirm</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {{ $order->links() }}
                </div>
            </div>

    {{-- Table Konfirmasi Order End --}}

    {{-- First Table Start --}}
    <div class="px-5">
        <hr class="mb-5 mt-5">
        <div class="card shadow p-3" style="height: 18rem; width: 100%;">
                    <div class="card mb-2" style="height: 50px; width: 100%; background-color: #abdfc7; border: #fff;">
                        <div class="flex-container">
                            <div class="me-3"> <i class="fa-solid fa-cart-shopping"></i> </div>
                            <div> Pembelian Obat </div>
                        </div>
                    </div>
                    <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><h5> <b> Bulan Januari 2023 </b> </h5></td>
                                    <td><h5> <b> Tahun 2023 </b> </h5></td>
                                    <td><h5> <b> Penjualan Keseluruhan </b> </h5></td>
                                </tr>
                            </thead>
                            <tbody style="font-size: 19px;">
                                <tr>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder }}</span></td>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder }}</span> </td>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder * 2 }}</span> </td>
                                </tr>
                                <tr>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
    {{-- First Table End --}}

    {{-- Second Table Start --}}
            <div class="px-5 mb-5 mt-5">
                <div class="card shadow p-3" style="height: 18rem; width: 100%;">
                    <div class="card mb-2" style="height: 50px; width: 100%; background-color: #abdfc7; border: #fff;">
                        <div class="flex-container">
                            <div class="me-3"> <i class="fa-solid fa-cart-shopping"></i> </div>
                            <div> Penjualan Obat </div>
                        </div>
                    </div>
                    <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><h5> <b> Bulan Januari 2023 </b> </h5></td>
                                    <td><h5> <b> Tahun 2023 </b> </h5></td>
                                    <td><h5> <b> Penjualan Keseluruhan </b> </h5></td>
                                </tr>
                            </thead>
                            <tbody style="font-size: 19px;">
                                <tr>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder }}</span></td>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder }}</span> </td>
                                    <td><span class="me-4">Jumlah Pembelian</span> : <span class="total">{{ $totalOrder * 2 }}</span> </td>
                                </tr>
                                <tr>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                    <td><span style="margin-right: 2.6rem;">Total Pembelian </span> : <span class="total">Rp. {{ $totalAmount }}</span> </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
    {{-- Second Table End --}}
    
    
    {{-- Tird Table Start --}}
    @php
        $totalTerjual = 0;
    @endphp

    @foreach ($transaksi as $t)
        @php
            $totalTerjual += $t->quantity;
        @endphp
    @endforeach
            <div class="px-5 mt-5 mb-5">
                <div class="row">
                    <div class="col-12 me-3">
                        <div class="card shadow p-3" style="height: 30rem; ">
                            <div class="card mb-2" style="height: 50px; width: 100%; background-color: #abdfc7; border: #fff;">
                            <div class="flex-container">
                                <div class="me-3"> <i class="fa-solid fa-circle-info"></i> </div>
                                <div> Sisa Stock Obat </div>
                            </div>
                            </div>
                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <td><h5><b>No.</b></h4></td>
                                        <td><h5><b>Obat</b></h5></td>
                                        <td><h5><b>Stock</b></h5></td>
                                        <td><h5><b>Terjual</b></h5></td>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 18px;">
                                    @foreach ($obat as $o)
                                        <tr>
                                            <td>{{ $o->id }}</td>
                                            <td>{{ $o->nama_obat }}</td>
                                            <td>{{ $o->stock_obat }}</td>
                                            <td>{{ $o->total_terjual }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $obat->links() }}
                        </div>
                    </div>
                </div>
            </div>
    {{-- Tird Table End --}}

    {{-- Footer Start --}}
            <div class="px-5">
                <hr>
                <div class="text-center">
                    <h6>&copy 2023 Created By <span class="text-success">Fatkhan</span></h6>
                </div>
            </div>
    {{-- Footer End --}}


@endsection
@extends('layouts.main3')
@section('content')
<h2>Detail Invoice</h2>
    <div class="box p-4">
        
        <h2>Invoice #{{ $order->order_id }}</h2>

        <div class="subject mb-0 me-4 ms-1">
            <div class="row">
                <div class="col-5">
                    <p>From : </p>
                    <span><b>Fatkhan Akbar</b></span>
                    <p class="text-muted mb-0">fatkhakabar46@gmail.com</p>
                    <p class="text-muted">Dsn Josari, Salamrejo, Kec. Karangam, Kota Trenggalek, Jawa Timur 66361</p>
                </div>
                <div class="col-4">
                    <p>To : </p>
                    <span><b>{{ Auth::user()->name }}</b></span>
                </div>
                <div class="col-3">
                    <img src="{{ $order->image }}" alt="GAMBAR PRODUCT">
                </div>
            </div>
        </div>
        <hr>

        <table class="table table-hover table-condensed">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Status</th>
                </tr>
            </thead>

            @php
                $no = 1;
                $subtotal = 0;
                $subtotal += $order->total_price * $order->quantity;
                $totalAkhir = $subtotal;
                @endphp
                
        @foreach ($orders as $o)
            <tr class="text-center">
                <td data-th="Id">
                    <div class="row">
                        <div class="col-sm-11">
                            <h4 class="normagin">{{ $no++ }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Product Name">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="normagin">{{ $o->product_name }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">
                    <div class="row">
                        <div class="col-sm-13">
                            <h4 class="normagin">{{ $o->total_price }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Quantity">
                    <div class="row">
                        <div class="col-sm-11">
                            <h4 class="normagin">{{ $o->quantity }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Subtotal">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="normagin">{{ $o->total_price }}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Status">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="normagin">{{ $o->status }}</h4>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
        <div class="row">
            <div class="col">
                <a href="{{ route('print.pdf', ['id' => $order->id]) }}" target="blank" class="btn btn-primary rounded-pill">Download</a>
            </div>
            <div class="col">
                <h2 class="text-end"> Total Rp.{{ $totalAkhir }}</h2>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="p-5">
    <img src="/img/logo.png" style="height: 30px; width: 30px;"  alt="">
    <h3 class="ms-4">Apotek Merderka</h3>
    <span class="text-muted ms-4">fatkhanakbar46@gmail.com</span>
    <p class="text-muted">Dsn Josari, Salamrejo, Kec. Karangam, Kota Trenggalek, Jawa Timur 66361</p>

    <br>

        <div class="ms-4">
            <h5 class="mb-0"><b>Invoice Number</b></h5>
        <p class="mb-0">{{ $order->order_id }}</p>
        <span>Issue Date : <b>{{$order->created_at->format('d M, Y')}}</b></span>
        <p> Due Date :<b> {{date('d M, Y', strtotime("+1 day", strtotime($order->created_at)))}}</b></p>

        <br>

        <h5 class="mb-0"><b>Billed to</b></h5>
        <p>{{Auth::user()->name}}</p>
        </div>

        <br>

        <h5><b>Item Detail</b></h5>

        <div class="overflow-auto mt-2">
            <table class="table table-hover table-condensed">
                <thead class="table align-middle mb-0 bg-white">
                    <tr>
                        <th>Invoice</th>
                    <th>Product Name</th>
                    <th>Date Time</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>#{{ $order->order_id }}</p>
                    </td>
                    <td>
                        <p>{{ $order->product_name }}</p>
                    </td>
                    <td>
                        <p>{{ $order->created_at }}</p>
                    </td>
                    <td>
                        <p>Rp.{{ $order->total_price }}</p>
                    </td>
                    <td>
                        <p>{{ $order->quantity }}</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <br>

        <hr style="color: rgb(179, 176, 176)">

        <div class="">
            <h5 class="mb-0"><b>Total Amount</b></h5>
            <span>Rp. {{ $order->total_price }}</span>
        </div>
        
    </div>
    </div> --}}
@extends('layouts.main3')
<div class="p-5">
{{-- <img src="{{asset('img/logo.png')}}" style="height: 40px; width: 40px;"  alt=""> --}}
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
    </div>
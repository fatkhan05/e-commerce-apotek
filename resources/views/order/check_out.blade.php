@extends('layouts.main')
@section('container')

<div class="container">
    

    <div class="row">
        <div class="col-md-12 mt-3">
    {{-- <a href="{{ url('/Cart/cart') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a> --}}
    <h3>CheckOut</h3>
    <hr>
</div>

        @php
            $total = 0;
        @endphp

<div class=" mt-2">
</div>
<div class="">
    <div class="card shadow">
        <div class="card-body">


                <div class="container">

                    <table class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    
                    
                @php
                    $total_price = 0;
                @endphp

                <?php $no = 1; ?>

                @foreach ($carts as $ct)

                @php
                $total_price += $ct['obat2']['harga_obat'] * $ct['amount'];
                @endphp
                
                <tr data-id="">
                    <td data-th="No">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="normagin">{{ $no++ }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Kode Obat">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $ct['obat2']['kode_obat'] }}</h4>
                                {{-- <h4 class="nomargin">{{ $cart->obat2->kode_obat }}</h4> --}}
                            </div>
                        </div>
                    </td>
                    <td data-th="Nama Obat">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $ct['obat2']['nama_obat'] }}</h4>
                            </div>
                        </div>
                    </td>                    
                    <td data-th="Jumlah">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $ct['amount'] }}</h4>
                            </div>
                        </div>
                    </td>                    
                    <td data-th="Harga">
                        <div class="row">                          
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $ct['obat2']['harga_obat'] * $ct['amount'] }}</h4>
                            </div>
                        </div>
                    </td>                    
                </tr>
                @endforeach
            </table>
        </div>

                <hr>
                <div class="row text-primary">
                    <div class="col text-end ms-5">
                        <h4>Total Price Rp. {{ $total_price }}</h4>
                    </div>
                </div>
                <hr>
                <ul>
                    <li>Pesanan akan di proses selama 1-2 hari</li>
                </ul>

                <form id="pay-button" action="https://api.sandbox.midtrans.com/v1/transactions" method="POST">
                    @csrf
                    <input type="hidden" name="snapToken" value="{{ $snapToken }}">
                    <button class="btn btn-primary rounded-pill" type="submit">Bayar Sekarang</button>
                </form>
                {{-- <form action="{{ route('Order')}}" method="POST">
                    @csrf
                    <input type="hidden" name="snapToken" value="{{ $snapToken }}">
                    <button class="btn btn-primary rounded-pill" type="submit" id="pay-button">Bayar Sekarang</button>
                </form> --}}
                
                
                
                {{-- <form action="{{ route('Order') }}"https://app.midtrans.com/snap/v1/transactions method="GET" >
                    @csrf
                    <button id="pay-button" class="btn btn-primary rounded-pill" >Check Out</button>
                </form> --}}
            

   

    {{-- <div class="card mb-5">
        <div class="card-body shadow">
            <h4 class="text-primary">Basic information</h4>
            <hr>
            <div class="row">
                <div class="col-6 mb-3">
                    <h6>Nama</h6>
                  <input type="text" type="hidden" class="form-control" placeholder="Nama" aria-label="First name">
                  @error('fullname') <small class="text-danger">{{ $message }}</small>                   
                  @enderror
                </div>
                <div class="col-6 mb-3">
                    <h6>Nomor Telepon</h6>
                    <input type="text" type="hidden" class="form-control" placeholder="Nomor Telepon" aria-label="Phone number">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <input type="email" type="hidden" class="form-control" placeholder="Email" aria-label="Email address">
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col mb-3">
                    <h6>Alamat</h6>
                    <textarea class="form-control" type="hidden"  id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('address') <small class="text-danger">{{$message}}</small> @enderror
                </div>
            </div>
            <br>
            
        </div>
    </div> --}}
    
</div>

</div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
                    <script type="text/javascript"> 

                        // var payButton = document.getElementById('pay-button');
                        // var snap_token = "{{ $snapToken }}";

                        // payButton.addEventListener('click', function () {
                        // // Kirim permintaan ke server Midtrans untuk membuat link pembayaran
                        // fetch('https://api.sandbox.midtrans.com/v1/transactions', {
                        //     method: 'POST',
                        //     headers: {
                        //     'Accept': 'application/json',
                        //     'Authorization': 'Basic' + btoa('SB-Mid-server-3A3TtJoYq6JW5ymG7pqGgSOj'),
                        //     'Content-Type': 'application/json',
                        //     },
                        //     body: JSON.stringify({
                        //     transaction_details: {
                        //         order_id: 'concert-ticket-01',
                        //         gross_amount: 100000
                        //     },
                        //     usage_limit: 2
                        //     })
                        // })
                        // .then(function(response) {
                        //     return response.json();
                        // })
                        // .then(function(data) {
                        //     // Tangani data respons dari server Midtrans
                        //     console.log(data);
                        //     // Redirect ke halaman pembayaran atau lakukan tindakan lain
                        //     window.location.href = data.redirect_url;
                        // })
                        // .catch(function(error) {
                        //     // Tangani kesalahan yang terjadi selama permintaan
                        //     console.log(error);
                        // });
                        // });

                        // // Fungsi untuk menangani respons setelah pembayaran selesai di halaman Snap
                        // function handlePaymentResult(result) {
                        // if (result.status_code === '200') {
                        //     // Pembayaran berhasil
                        //     alert('Payment success!');
                        //     console.log(result);
                        // } else if (result.status_code === '201') {
                        //     // Pembayaran dalam proses
                        //     alert('Payment pending!');
                        //     console.log(result);
                        // } else {
                        //     // Pembayaran gagal atau dibatalkan
                        //     alert('Payment failed!');
                        //     console.log(result);
                        // }
                        // }



                        
                         // For example trigger on button clicked, or any time you need
                    var payButton = document.getElementById('pay-button');
                    var snap_token = "{{ $snapToken}}";
                    var order_id = "{{ $order }}"
                    payButton.addEventListener('click', function () {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                        window.snap.pay('{{ $snapToken }}', {
                        onSuccess: function(result){
                            /* You may add your own implementation here */
                            // alert("payment success!"); 
                            window.location.href = '/invoice/{{ encrypt($order->id) }}'
                            console.log(result);
                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            alert("wating your payment!"); console.log(result);
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            alert("payment failed!"); console.log(result);
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                        })
                    });
                </script>
    
</div>
@endsection
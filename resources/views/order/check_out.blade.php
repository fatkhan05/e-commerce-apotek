@extends('layouts.main')
@section('container')

<div class="row">
<div class="col-md-12">
    {{-- <a href="{{ url('/Cart/cart') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a> --}}
    <h3>CheckOut</h3>
    <hr>
</div>

        @php
            $total_price = 0;
        @endphp

<div class="col-md-12 mt-2">
</div>
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <div class="row text-primary">
                <div class="col">
                    <h4>Item Total Amount :</h4>
                </div>

                {{-- @if ($order->is_paid == true)
                        <p class="card-text">Paid</p>
                    @else
                        <p class="card-text">Unpaid</p>
                @endif
                @foreach ($order->transaksi_penjualan as $transaksi)
                @php
                    $total_price += $transaksi->obat2->harga_obat * $transaksi->amount;
                @endphp                    
                @endforeach --}}
                <div class="col text-end">
                    <h4>Rp. </h4>
                </div>
            </div>
            <section class="col-md-6">
                
                
            </section>
            <hr>
            <ul>
                <li>Pesanan akan di proses selama 3-5 hari</li>
            </ul>
            @if(!empty($pesanan))
            <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($cart as $ct)
                    <tr>
                        <td>{{ $no++ }}</td>
                        {{-- <td>
                            <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                        </td> --}}
                        <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                        <td>{{ $pesanan_detail->jumlah }} pcs</td>
                        <td align="right">Rp. {{ number_format($pesanan_detail->obat2->harga_obat) }}</td>
                        <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                        <td>
                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                        <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                        <td>
                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                <i class="fa fa-shopping-cart"></i> Check Out
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <br>

   

    <div class="card mb-5">
        <div class="card-body shadow">
            <h4 class="text-primary">Basic information</h4>
            <hr>
            <div class="row">
                <div class="col-6 mb-3">
                    <h6>Full Name</h6>
                  <input type="text" wire:model.defer="fullname" class="form-control" placeholder="First name" aria-label="First name">
                  @error('fullname') <small class="text-danger">{{ $message }}</small>                   
                  @enderror
                </div>
                <div class="col-6 mb-3">
                    <h6>Phone Number</h6>
                    <input type="text" wire:model.defer="phone" class="form-control" placeholder="Phone number" aria-label="Phone number">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-6 mb-3">
                    <h6>Email Address</h6>
                    <input type="email" wire:model.defer="email" class="form-control" placeholder="Email address" aria-label="Email address">
                    @error('email') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col-6 mb-3">
                    <h6>Pin Code(Zip Code)</h6>
                    <input type="text" wire:model.defer="pincode" class="form-control" placeholder="Enter Pin code" aria-label="Pin code">
                    @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="col mb-3">
                    <h6>Full Address</h6>
                    <textarea class="form-control" wire:model.defer="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('address') <small class="text-danger">{{$message}}</small> @enderror
                </div>
              </div>
              <br>
              <h6>Pilih Metode Pembayaran</h6>
              <div class="row">
                <div class="col-6 mb-4">
                    <a href="#" class="btn btn-primary"><b>Cash on Delivery</b></a>
                    <a href="#" class="btn btn-outline-secondary text-primary  ms-3"><b>Online Payment</b></a>
                </div>
              </div>

        </div>
    </div>

    

</div>

</div>
    
@endsection
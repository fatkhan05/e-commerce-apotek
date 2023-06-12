@extends('layouts.main')
@section('container')
    <div class="container p-5 items-center" style="margin-top: 2rem; margin-left: 13rem;">
        {{-- <div class="card shadow " style="max-width: 700px; height: 400px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset('img/paracetamol.jpg')}}" class="img-fluid rounded-start" alt="..." style="height: 24.9rem; width: 20rem;">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title">{{ $product->nama_obat }}</h3>
                  <p >Paracetamol is a commonly used medication for pain relief and reducing fever. It belongs to the class of analgesic (pain reliever) and antipyretic (fever reducer) drugs. Paracetamol is widely </p>
                  <p class="text-muted">Last updated 3 mins ago</p>
                  <input type="number" name="" id="">
                  <div class="row mb-3">
                    <div class="col">
                      <h3><b>IDR {{ $product->harga_obat }}</b></h3>
                    </div>
                    <div class="col">
                      @csrf
                      <form action="{{ route('cart.add', ['obat2' => $product->id, 'id' => $product->id]) }}" method="POST">
                      <input type="hidden" name="id" value="{{ $product->id }}">
                      <button type="submit" class="">Add To Cart</button>
                    </form>
                    </div>
                  </div>                  
                </div>                
              </div>           
            </div>
          </div> --}}

          <div class="card" style="height: 29rem; width: 55rem">
            <div class="card-header">Product Detail</div>
            <div class="row">
              <div class="col-5">
                <img src="{{ url('foto').'/'.$product->image }}" alt="" style="height: 26.3rem; width: 23rem;">
                {{-- <img src="{{asset('img/paracetamol.jpg')}}" alt="" style="height: 26.3rem; width: 23rem;"> --}}
              </div>
              <div class="col mt-3 ms-2 me-4">
                <h1 class="ms-0">{{ $product->nama_obat }}</h1>
                <p class="mb-0">Paracetamol is a commonly used medication for pain relief and reducing fever. It belongs to the class of analgesic (pain reliever) and antipyretic (fever reducer) drugs. Paracetamol is widely </p>
                <h3>IDR. {{ $product->harga_obat }}</h3>
                <hr>
                <span>{{ $product->stock_obat }} left</span>
                <form action="{{ route('cart.add', ['obat2' => $product->id, 'id' => $product->id]) }}" method="post" class="mt-4">
                  @csrf
                  <div class="input-group mb-3">
                      <input type="number" class="form-control" aria-describedby="basic-addon2"
                          name="amount" value=1>
                      <div class="input-group-append">
                          <button class="btn btn-outline-success ms-3" type="submit">Add to
                              cart</button>
                      </div>
                  </div>
              </form>
              </div>
            </div>
          </div>
    </div>
@endsection
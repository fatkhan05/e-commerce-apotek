@extends('layouts.main')
@section('container')
    
<section class="hero" id="home">
        <div class="row">
        <div class="col">
            <h1 class="header">Kami Siap 24 Jam Untuk Anda</h1>
            <p>Jangan Khawatir, Semua kebutuhan Anda Akan Dilayani Oleh Profesional Team Yang Ahli Dibidangnya</p>
            <a href="" class="btn btn-primary rounded-pill">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="col">
            <img class="img" src="/img/dokter2.jpg" alt="">
        </div>
    </div>
</section>


<div class="box position-relative">
        <div class="image">
            <img src="{{ asset('img/tim-dokter.png') }}" alt="Ilustrasi Tim Dokter" class="mb-5">
        </div>
        <div class="content">
            <h1>Tanya Dokter</h1>
            <p>Dengan Tenaga Ahli Kami Siap 24 Jam Untuk Anda</p>
            <a href="" class="btn btn-light rounded-pill">Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
            {{-- <button class="rounded-pill">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button> --}}
        </div>
</div>

<section>

</section>
@endsection
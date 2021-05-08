@extends('guest.template.master')

@section('content')

    <br><br><br><br><br><br><br>
    <section id="hero" class="d-flex align-items-center">
        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
            <h1>Website Donasi Buku</h1>
            <h2>Setiap Buku yang Dibagikan Merupakan Jendela Pengetahuan Baru</h2>
            <a href="/login" class="btn-get-started scrollto">Mulai Donasi</a>
            <img src="{{asset('guest/assets/img/book.png')}}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
        </div>
    </section>
    <br><br><br>

@endsection

@extends('guest.template.master')

@section('content')

    <br><br><br>
    <section id="feature" class="features">
        <div class="container">
            <div class="section-title">
                <h2>{{$berita->judul}}</h2>
            </div>
            <div class="row justify-content-center">
                <img src="{{asset('storage/berita/'.$berita->gambar)}}" class="img" style="height: 500px; width: auto;">
            </div>
            <br>
            <div class="row">
                {{$berita->isi}}
            </div>
        </div>
    </section>

@endsection
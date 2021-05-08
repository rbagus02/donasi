@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Salurkan Donasi Buku</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="/{{$buku->id}}/simpan-salurkan" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Donatur : {{$buku->users->name}}</p>
                <p>Judul Buku : {{$buku->judul}}</p>
                <br>
                <p>Masukkan penerima donasi buku</p>
                <div class="input-group">
                    <input type="text" name="penerima" class="form-control" placeholder="Masukkan Penerima" aria-describedby="basic-addon2">
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Salurkan</span>
                </button>
            </form>
        </div>
    </div>

@endsection
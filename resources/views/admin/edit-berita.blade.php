@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Edit Berita</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <form action="/{{$berita->id}}/simpan-edit-berita" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Judul</p>
                <div class="input-group">
                    <input type="text" name="judul" class="form-control" value="{{$berita->judul}}" placeholder="Masukkan Judul Berita" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Gambar</p>
                <div class="input-group">
                    <input type="file" name="gambar" class="form-control" value="" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Isi</p>
                <div class="input-group">
                    <input type="text" name="isi" class="form-control" value="{{$berita->isi}}" placeholder="Masukkan Isi Berita" aria-describedby="basic-addon2">
                </div>
                <br>
                <button type="submit" class="btn btn-warning btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan Berita</span>
                </button>
            </form>
        </div>
    </div>

@endsection
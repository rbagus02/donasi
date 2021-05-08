@extends('users.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Edit Pengajuan Donasi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <form action="/{{$buku->id}}/simpan-edit-pengajuan-users" method="POST" enctype="multipart/form-data">
                @csrf
                <p>Judul Buku</p>
                <div class="input-group">
                    <input type="text" name="judul" class="form-control" value="{{$buku->judul}}" placeholder="Masukkan Judul Buku" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Kategori Buku</p>
                <div class="input-group">
                    <input type="text" name="kategori" class="form-control" value="{{$buku->kategori}}" placeholder="Masukkan Kategori" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Deskripsi / Sipnosis Buku</p>
                <div class="input-group">
                    <input type="text" name="deskripsi" class="form-control" value="{{$buku->deskripsi}}" placeholder="Masukkan Deskripsi Buku" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Jumlah Buku yang Didonasikan</p>
                <div class="input-group">
                    <input type="text" name="jumlah" class="form-control" value="{{$buku->jumlah}}" placeholder="Masukkan Jumlah Buku" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Foto Halaman Depan Buku</p>
                <div class="form-group">
                    <input type="file" name="foto_depan" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <br>
                <p>Foto Halaman Belakang Buku</p>
                <div class="form-group">
                    <input type="file" name="foto_belakang" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <br>
                <p>Foto Bagian Samping Buku</p>
                <div class="form-group">
                    <input type="file" name="foto_samping" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <br>
                <button type="submit" class="btn btn-warning btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan</span>
                </button>
            </form>
        </div>
    </div>

@endsection
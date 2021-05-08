@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Edit Profil Pengguna</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <form action="/{{$admin->id}}/simpan-profil-admin" method="POST">
                @csrf
                <p>Nama Pengguna</p>
                <div class="input-group">
                    <input type="text" name="name" class="form-control" value="{{$admin->name}}" placeholder="Masukkan Nama" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Username</p>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" value="{{$admin->username}}" aria-describedby="basic-addon2" readonly>
                </div>
                <br>
                <p>Password</p>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" value="" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Nomor Telepon</p>
                <div class="input-group">
                    <input type="text" name="nomor_telp" class="form-control" value="{{$admin->nomor_telp}}" placeholder="Masukkan Nomor Telepon" aria-describedby="basic-addon2">
                </div>
                <br>
                <p>Alamat</p>
                <div class="input-group">
                    <input type="text" name="alamat" class="form-control" value="{{$admin->alamat}}" placeholder="Masukkan Alamat" aria-describedby="basic-addon2">
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Simpan Profil</span>
                </button>
            </form>
        </div>
    </div>

@endsection
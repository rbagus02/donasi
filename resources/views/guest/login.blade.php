@extends('guest.template.master')

@section('content')

    <br><br><br>
    <section id="feature" class="features">
        <div class="container" style="padding-left: 20%; padding-right:20%;">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    @if (session('berhasil'))
                            <div class="alert alert-primary" role="alert">
                                {{session('berhasil')}}
                            </div>
                    @endif
                    <form action="/postlogin" method="POST">
                        @csrf
                        <p>Username</p>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" value="" placeholder="Masukkan Username" aria-describedby="basic-addon2">
                        </div>
                        <br>
                        <p>Password</p>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" value="" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Login</span>
                        </button>
                    </form>
                    <br>
                    <a class="btn btn-primary btn-block" href="#" data-toggle="modal" data-target="#daftarModal">Daftar Akun</a>
                </div>
            </div>
        </div>
        <div class="modal" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Akun</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/tambah-pengguna" method="POST">
                            @csrf
                            <p>Nama Pengguna</p>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" value="" placeholder="Masukkan Nama Pengguna" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Username</p>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control" value="" placeholder="Masukkan Username" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Password</p>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" value="" placeholder="Masukkan Password" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="hidden" name="role" class="form-control" value="2" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="nomor_telp" class="form-control" value="" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group">
                                <input type="hidden" name="alamat" class="form-control" value="" aria-describedby="basic-addon2">
                            </div>
                            <button type="submit" class="btn btn-primary btn-icon-split btn-lg">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Daftar Akun</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </section>

@endsection

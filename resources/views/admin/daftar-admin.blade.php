@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success btn-icon-split" href="#" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Admin</span>
            </a>
        </div>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/tambah-admin" method="POST">
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
                            <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Admin</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Data yang diinputkan tidak sesuai.
                            </div>
                        @endif
                        @if (session('berhasil'))
                            <div class="alert alert-success" role="alert">
                                {{session('berhasil')}}
                            </div>
                        @endif
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($admin as $admin)
                        <?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->username}}</td>
                            <td>
                                <a href="/{{$admin->id}}/hapus-admin" class="btn btn-secondary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
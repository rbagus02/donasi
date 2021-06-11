@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6><br>
            <a href="/{{auth()->user()->id}}/edit-profil-admin" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-user-cog"></i>
                </span>
                <span class="text">Edit Profil Pengguna</span>
            </a>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Data yang diinputkan tidak sesuai.
                            </div>
                        @endif
                        @if (session('berhasil'))
                            <div class="alert alert-warning" role="alert">
                                {{session('berhasil')}}
                            </div>
                        @endif
                        <tr>
                            <td>Nama Pengguna</td>
                            <td>{{$admin->name}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{$admin->username}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>{{$admin->nomor_telp}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$admin->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
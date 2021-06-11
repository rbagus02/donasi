@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Daftar Pengguna</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        @if (session('hapus'))
                            <div class="alert alert-secondary" role="alert">
                                {{session('hapus')}}
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
                        @foreach ($user as $user)
                        <?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>
                                <a href="/{{$user->id}}/detail-pengguna" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href="/{{$user->id}}/hapus-pengguna" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#hapusModal{{$user->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                            <div class="modal fade" id="hapusModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengguna</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$user->id}}/hapus-pengguna" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p>Yakin ingin menghapus pengguna ?</p>
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </span>
                                                    <span class="text">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-secondary btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Ya</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
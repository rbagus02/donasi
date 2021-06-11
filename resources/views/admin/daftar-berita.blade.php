@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Daftar Berita</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success btn-icon-split" href="#" data-toggle="modal" data-target="#tambahberita">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Berita</span>
            </a>
        </div>
        <div class="modal fade" id="tambahberita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/tambah-berita" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p>Judul</p>
                            <div class="input-group">
                                <input type="text" name="judul" class="form-control" value="" placeholder="Masukkan Judul Berita" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Gambar</p>
                            <div class="input-group">
                                <input type="file" name="gambar" class="form-control" value="" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Isi</p>
                            <div class="input-group">
                                <input type="text" name="isi" class="form-control" value="" placeholder="Masukkan Isi Berita" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Berita</span>
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
                        @if (session('hapus'))
                            <div class="alert alert-secondary" role="alert">
                                {{session('hapus')}}
                            </div>
                        @endif
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($berita as $berita)
                        <?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$berita->judul}}</td>
                            <td>
                                <a href="/{{$berita->id}}/detail-berita" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href="/{{$berita->id}}/edit-berita" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-cog"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="#" class="btn btn-secondary btn-icon-split"data-toggle="modal" data-target="#hapusModal{{$berita->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                            <div class="modal fade" id="hapusModal{{$berita->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Berita</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$berita->id}}/hapus-berita" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p>Yakin ingin menghapus berita ?</p>
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
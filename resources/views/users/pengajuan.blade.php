@extends('users.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Pengajuan Donasi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-success btn-icon-split" href="#" data-toggle="modal" data-target="#tambahModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pengajuan</span>
            </a>
        </div>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan Donasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/tambah-pengajuan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p>Judul Buku</p>
                            <div class="input-group">
                                <input type="text" name="judul" class="form-control" value="" placeholder="Masukkan Judul Buku" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Kategori Buku</p>
                            <div class="input-group">
                                <input type="text" name="kategori" class="form-control" value="" placeholder="Masukkan Kategori" aria-describedby="basic-addon2">
                            </div>
                            <br>
                            <p>Deskripsi / Sipnosis Buku</p>
                            <div class="input-group">
                                <textarea type="text" name="deskripsi" class="form-control" value="" placeholder="Masukkan Deskripsi Buku" aria-describedby="basic-addon2"></textarea>
                            </div>
                            <br>
                            <p>Jumlah Buku yang Didonasikan</p>
                            <div class="input-group">
                                <input type="text" name="jumlah" class="form-control" value="" placeholder="Masukkan Jumlah Buku" aria-describedby="basic-addon2">
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
                            <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
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
                            <th>Donatur</th>
                            <th>Judul Buku</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($buku as $buku)
                        <?php $no++ ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$buku->users->name}}</td>
                            <td>{{$buku->judul}}</td>
                            <td>
                                @if($buku ->status == 1)Pengajuan
                                @elseif($buku ->status == 2)Pengajuan Ditolak
                                @elseif($buku ->status == 3)Pengajuan Disetujui / Menunggu Penyerahan
                                @elseif($buku ->status == 4)Belum Disalurkan
                                @elseif($buku ->status == 5)Sudah Disalurkan
                                @endif
                            </td>
                            <td>{{$buku->created_at}}</td>
                            <td>
                                <a href="/{{$buku->id}}/detail-pengajuan-users" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href="/{{$buku->id}}/edit-pengajuan-users" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-cog"></i>
                                    </span>
                                    <span class="text">Edit</span>
                                </a>
                                <a href="/{{$buku->id}}/hapus-pengajuan-users" class="btn btn-secondary btn-icon-split">
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
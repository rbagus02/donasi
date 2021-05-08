@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Pengajuan Donasi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
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
                                <a href="/{{$buku->id}}/detail-pengajuan-admin" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#setujuiModal{{$buku->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Setujui</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#tolakModal{{$buku->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-times"></i>
                                    </span>
                                    <span class="text">Tolak</span>
                                </a>
                                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#hapusModal{{$buku->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">Hapus</span>
                                </a>
                            </td>
                            <div class="modal fade" id="setujuiModal{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Setujui Pengajuan Donasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$buku->id}}/disetujui" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p>Yakin ingin menyutujui pengajuan ?</p>
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </span>
                                                    <span class="text">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Ya</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="tolakModal{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tolak Pengajuan Donasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$buku->id}}/ditolak" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p>Yakin ingin menolak pengajuan ?</p>
                                                <br>
                                                <button type="submit" class="btn btn-secondary btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </span>
                                                    <span class="text">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-danger btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                    <span class="text">Ya</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapusModal{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Pengajuan Donasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$buku->id}}/hapus-pengajuan-admin" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <p>Yakin ingin menghapus pengajuan ?</p>
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
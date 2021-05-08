@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Penyerahan Donasi Buku</h1>

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
                            <td>
                                <a href="/{{$buku->id}}/detail-pengajuan-admin" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-search-plus"></i>
                                    </span>
                                    <span class="text">Detail</span>
                                </a>
                                <a href="/{{$buku->id}}/diterima" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Diterima</span>
                                </a>
                            </td>
                        </tr>
                        @if(isset($buku->id))
                            <div class="modal fade" id="diterimaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Terima Pengajuan</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/{{$buku->id}}/diterima" method="POST">
                                                @csrf
                                                <br>
                                                <p>Yakinkah buku sudah diterima ?</p>
                                                <div class="input-group">
                                                    <input type="hidden" name="status" class="form-control" value="" aria-describedby="basic-addon2">
                                                </div>
                                                <br>
                                                <button type="button" class="btn btn-secondary btn-icon-split btn-lg" data-dismiss="modal" aria-label="Close">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-angle-left"></i>
                                                    </span>
                                                    <span class="text">Batal</span>
                                                </button>
                                                <button type="submit" class="btn btn-success btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                    <span class="text">Diterima</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
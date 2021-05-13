@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Donasi Buku Belum Disalurkan</h1>

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
                        @if (session('terima'))
                            <div class="alert alert-success" role="alert">
                                {{session('terima')}}
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
                                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#terimaModal{{$buku->id}}">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-share-square"></i>
                                    </span>
                                    <span class="text">Salurkan</span>
                                </a>
                            </td>
                            @if(isset($buku->id))
                                <div class="modal fade" id="terimaModal{{$buku->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Salurkan pengajuan donasi buku</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/{{$buku->id}}/simpan-salurkan" method="POST">
                                                    @csrf
                                                    <p>Masukkan penerima donasi buku</p>
                                                    <div class="input-group">
                                                        <input type="text" name="penerima" class="form-control" placeholder="Masukkan Penerima" aria-describedby="basic-addon2">
                                                    </div>
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
                                                        <span class="text">Ya</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
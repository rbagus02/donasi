@extends('users.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Belum Disalurkan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
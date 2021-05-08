@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Nama Pengguna</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>{{$user->nomor_telp}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$user->alamat}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Donasi Buku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Donatur</th>
                            <th>Judul Buku</th>
                            <th>Status</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Penerimaan</th>
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
                                @if($buku ->status == 1)-
                                @elseif($buku ->status == 2)-
                                @elseif($buku ->status == 3)-
                                @elseif($buku ->status == 4)-
                                @elseif($buku ->status == 5){{$buku->updated_at}}
                                @endif
                            </td>
                            <td>
                                <a href="/{{$buku->id}}/detail-pengajuan-admin" class="btn btn-primary btn-icon-split">
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
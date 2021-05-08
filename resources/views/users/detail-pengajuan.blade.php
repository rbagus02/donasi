@extends('users.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Detail Pengajuan</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    
                    </thead>
                    <tbody>
                        <tr>
                            <td>Donatur</td>
                            <td>{{$buku->users->name}}</td>
                        </tr>
                        <tr>
                            <td>Judul Buku</td>
                            <td>{{$buku->judul}}</td>
                        </tr>
                        <tr>
                            <td>Kategori Buku</td>
                            <td>{{$buku->kategori}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi / Sinopsis Buku</td>
                            <td>{{$buku->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Buku</td>
                            <td>{{$buku->jumlah}}</td>
                        </tr>
                        <tr>
                            <td>Foto Halaman Depan</td>
                            <td>
                                <img src="{{asset('storage/buku/'.$buku->foto_depan)}}" class="img-thumbnail" style="max-height: 300px; max-widht: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto Halaman Belakang</td>
                            <td>
                                <img src="{{asset('storage/buku/'.$buku->foto_belakang)}}" class="img-thumbnail" style="max-height: 300px; max-widht: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td>Foto Bagian Samping Buku</td>
                            <td>
                                <img src="{{asset('storage/buku/'.$buku->foto_samping)}}" class="img-thumbnail" style="max-height: 300px; max-widht: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                @if($buku ->status == 1)Pengajuan
                                @elseif($buku ->status == 2)Pengajuan Ditolak
                                @elseif($buku ->status == 3)Pengajuan Disetujui / Menunggu Penyerahan
                                @elseif($buku ->status == 4)Belum Disalurkan
                                @elseif($buku ->status == 5)Sudah Disalurkan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Penerima Buku</td>
                            <td>
                                @if($buku ->status == 1)-
                                @elseif($buku ->status == 2)-
                                @elseif($buku ->status == 3)-
                                @elseif($buku ->status == 4)-
                                @elseif($buku ->status == 5){{$buku->penerima}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>{{$buku->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Penerimaan</td>
                            <td>
                                @if($buku ->status == 1)-
                                @elseif($buku ->status == 2)-
                                @elseif($buku ->status == 3)-
                                @elseif($buku ->status == 4)-
                                @elseif($buku ->status == 5){{$buku->updated_at}}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
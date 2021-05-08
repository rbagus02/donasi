@extends('admin.template.master')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Detail Berita</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    
                    </thead>
                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td>{{$berita->judul}}</td>
                        </tr>
                        <tr>
                            <td>Gambar</td>
                            <td><img src="{{asset('storage/berita/'.$berita->gambar)}}" class="img-thumbnail" style="max-height: 300px; max-widht: auto;"></td>
                        </tr>
                        <tr>
                            <td>Isi Berita</td>
                            <td>{{$berita->isi}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembuatan</td>
                            <td>{{$berita->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
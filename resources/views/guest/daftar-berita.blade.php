@extends('guest.template.master')

@section('content')

    <br><br><br>
    <section id="feature" class="features">
        <div class="container">
            <div class="section-title">
                <h2>Berita</h2>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th colspan="3">Berita</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 0;
                                ?>
                                @foreach ($berita as $berita)
                                <?php $no++ ?>
                                <tr>
                                    <th rowspan="2">{{$no}}.</th>
                                    <th colspan="3">{{$berita->judul}}</th>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('storage/berita/'.$berita->gambar)}}" class="img-thumbnail" style="max-height: 200px; max-width: auto;"></td>
                                    <td>{{substr($berita['isi'], 0, 100)}}</td>
                                    <td>
                                        <a href="/{{$berita->id}}/berita-selengkapnya" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-search-plus"></i>
                                            </span>
                                            <span class="text">Selengkapnya</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

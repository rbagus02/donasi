@extends('guest.template.master')

@section('content')

    <br><br><br>
    <section id="feature" class="features">
        <div class="container">
            <div class="section-title">
                <h2>Penerima Donasi</h2>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Penerima Donasi Buku</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Donatur</th>
                                    <th>Judul Buku</th>
                                    <th>Penerima Buku</th>
                                    <th>Tanggal Penerimaan</th>
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
                                    <td>{{$buku->penerima}}</td>
                                    <td>{{$buku->updated_at}}</td>
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

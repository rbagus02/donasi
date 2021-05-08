<html>
    <head>

    </head>
    <body>
        <div class="kotak">
            <h1>Formulir Pengajuan Donasi Buku</h1>
            <table class="table table-bordered" width="100%" cellspacing="40px" style="font-size: 20px">
                <tbody>
                    <tr>
                        <td>Donatur</td>
                        <td>: {{$buku->users->name}}</td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>: {{$buku->judul}}</td>
                    </tr>
                    <tr>
                        <td>Kategori Buku</td>
                        <td>: {{$buku->kategori}}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi / Sinopsis Buku</td>
                        <td>: {{$buku->deskripsi}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Buku</td>
                        <td>: {{$buku->jumlah}}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td>: {{$buku->created_at}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Purwokerto, {{$buku->created_at}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Calon Donatur</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>---------------</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>{{$buku->users->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
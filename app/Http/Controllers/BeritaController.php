<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function berita()
    {
        $berita = Berita::all();
        return view('admin.daftar-berita',['berita' => $berita]);
    }

    public function tambahberita(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'isi' => 'required',
        ]);
        if ($request->hasFile('gambar')) {
            $ext = $request->file('gambar')->getClientOriginalExtension();

            $namafile = "berita_".time().'.'.$ext;
            $request->file('gambar')->storeAs('public/berita',$namafile);
        
            Berita::create([
                'judul' => $request->judul,
                'gambar' => $namafile,
                'isi' => $request->isi,
            ]);
            return redirect('/daftar-berita')->with('berhasil','Berita berhasil ditambahkan.');
        } else {
            return "Tidak ada";
        }
    }

    public function hapus($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return redirect('/daftar-berita')->with('berhasil','Berita berhasil dihapus.');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('admin/edit-berita',['berita' => $berita]);
    }

    public function detail($id)
    {
        $berita = Berita::find($id);
        return view('admin/detail-berita',['berita' => $berita]);
    }

    public function simpanedit(Request $request,$id)
    {
        $berita=Berita::find($id);
        $berita->update([
            'judul' => $request->judul,
            'gambar' => $request->gambar,
            'isi' => $request->isi,
        ]);
        if ($request->hasFile('gambar')) {
            $ext = $request->file('gambar')->getClientOriginalExtension();
            $namafile = "berita_".time().'.'.$ext;
            $request->file('gambar')->storeAs('public/berita',$namafile);
            $berita->gambar = $namafile;
            $berita->save();
        }else{
            return "Tidak ada";
        }
        return redirect('/daftar-berita')->with('berhasil','Berita berhasil diedit.');
    }

    public function liat_berita()
    {
        $berita = Berita::all();
        return view('guest.daftar-berita',['berita' => $berita]);
    }

    public function liat_berita_selengkapnya($id)
    {
        $berita = Berita::find($id);
        return view('guest.berita-lengkap',['berita' => $berita]);
    }
}

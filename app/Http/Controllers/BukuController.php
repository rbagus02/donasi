<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;

class BukuController extends Controller
{
    public function pengajuan_users()
    {
        $buku = Buku::where('status', 1)->where('users_id', auth()->user()->id)->get();
        return view('users.pengajuan',['buku' => $buku]);
    }

    public function tambah_pengajuan(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
            'foto_depan' => 'required',
            'foto_belakang' => 'required',
            'foto_samping' => 'required',
        ]);
        
        if ($request->hasFile('foto_depan','foto_belakang','foto_samping')) {
            $ext = $request->file('foto_depan')->getClientOriginalExtension();
            $namadepan = "foto_depan_".time().'.'.$ext;
            $request->file('foto_depan')->storeAs('public/buku',$namadepan);

            $ext = $request->file('foto_belakang')->getClientOriginalExtension();
            $namabelakang = "foto_belakang_".time().'.'.$ext;
            $request->file('foto_belakang')->storeAs('public/buku',$namabelakang);
            
            $ext = $request->file('foto_samping')->getClientOriginalExtension();
            $namasamping = "foto_samping_".time().'.'.$ext;
            $request->file('foto_samping')->storeAs('public/buku',$namasamping);
        
            Buku::create([
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'jumlah' => $request->jumlah,
                'foto_depan' => $namadepan,
                'foto_belakang' => $namabelakang,
                'foto_samping' => $namasamping,
                'status' => 1,
                'penerima' => '',
                'users_id' => auth()->user()->id,
            ]);
            return redirect('/pengajuan-users')->with('berhasil','Pengajuan Donasi berhasil ditambahkan.');
        } else {
            return "Tidak ada";
        }
    }

    public function hapus_pengajuan_users($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/pengajuan-users')->with('hapus','Pengajuan berhasil dihapus.');
    }

    public function hapus_pengajuan_ditolak_users($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/pengajuan-users-ditolak')->with('hapus','Pengajuan berhasil dihapus.');
    }

    public function edit_pengajuan_users($id)
    {
        $buku = Buku::find($id);
        return view('users.edit-pengajuan',['buku' => $buku]);
    }

    public function detail_pengajuan_users($id)
    {
        $buku = Buku::find($id);
        return view('users.detail-pengajuan',['buku' => $buku]);
    }

    public function simpan_edit_pengajuan_users(Request $request,$id)
    {
        $buku=Buku::find($id);
        $buku->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'foto_depan' => $request->foto_depan,
            'foto_belakang' => $request->foto_belakang,
            'foto_samping' => $request->foto_samping,
        ]);
        if ($request->hasFile('foto_depan','foto_belakang','foto_samping')) {
            $ext = $request->file('foto_depan')->getClientOriginalExtension();
            $namadepan = "foto_depan_".time().'.'.$ext;
            $request->file('foto_depan')->storeAs('public/buku',$namadepan);

            $ext = $request->file('foto_belakang')->getClientOriginalExtension();
            $namabelakang = "foto_belakang_".time().'.'.$ext;
            $request->file('foto_belakang')->storeAs('public/buku',$namabelakang);
            
            $ext = $request->file('foto_samping')->getClientOriginalExtension();
            $namasamping = "foto_samping_".time().'.'.$ext;
            $request->file('foto_samping')->storeAs('public/buku',$namasamping);

            $buku->foto_depan = $namadepan;
            $buku->foto_belakang = $namabelakang;
            $buku->foto_samping = $namasamping;
            $buku->save();
        }else{
            return "Tidak ada";
        }
        return redirect('/pengajuan-users')->with('berhasil','Pengajuan Donasi berhasil diedit.');
    }

    public function pengajuan_users_ditolak()
    {
        $buku = Buku::where('status', 2)->where('users_id', auth()->user()->id)->get();
        return view('users.pengajuan-ditolak',['buku' => $buku]);
    }

    public function penyerahan_users()
    {
        $buku = Buku::where('status', 3)->where('users_id', auth()->user()->id)->get();
        return view('users.penyerahan',['buku' => $buku]);
    }

    public function belum_disalurkan_users()
    {
        $buku = Buku::where('status', 4)->where('users_id', auth()->user()->id)->get();
        return view('users.belum-disalurkan',['buku' => $buku]);
    }

    public function sudah_disalurkan_users()
    {
        $buku = Buku::where('status', 5)->where('users_id', auth()->user()->id)->get();
        return view('users.sudah-disalurkan',['buku' => $buku]);
    }
    
    public function penerima()
    {
        $buku = Buku::where('status', 5)->get();
        return view('guest.penerima-donasi',['buku' => $buku]);
    }
}

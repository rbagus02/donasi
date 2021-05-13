<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;

class BukuAdminController extends Controller
{
    public function riwayat_admin()
    {
        $buku = Buku::all();
        return view('admin.index',['buku' => $buku]);
    }

    public function pengajuan_admin()
    {
        $buku = Buku::where('status', 1)->get();
        return view('admin.pengajuan',['buku' => $buku]);
    }

    public function det_pengajuan_admin($id)
    {
        $buku = Buku::find($id);
        return view('admin.detail-pengajuan',['buku' => $buku]);
    }

    public function disetujui($id)
    {
        $buku = Buku::find($id);
        Buku::where('id', $id)->update([
            'status' => 3,
        ]);
        return redirect('/penyerahan-admin')->with('setuju','Pengajuan berhasil disetujui');
    }

    public function ditolak(Request $request,$id)
    {
        $buku = Buku::find($id);
        Buku::where('id', $id)->update([
            'status' => 2,
        ]);
        return redirect('/pengajuan-ditolak-admin')->with('tolak','Pengajuan berhasil ditolak');
    }

    public function hapus_pengajuan_admin($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/pengajuan-admin')->with('hapus','Pengajuan berhasil dihapus.');
    }

    public function penolakan_admin()
    {
        $buku = Buku::where('status', 2)->get();
        return view('admin.pengajuan-ditolak',['buku' => $buku]);
    }

    public function hapus_pengajuan_ditolak_admin($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/pengajuan-ditolak-admin')->with('hapus','Pengajuan berhasil dihapus.');
    }

    public function penyerahan_admin()
    {
        $buku = Buku::where('status', 3)->get();
        return view('admin.penyerahan',['buku' => $buku]);
    }

    public function diterima(Request $request,$id)
    {
        $buku = Buku::find($id);
        Buku::where('id', $id)->update([
            'status' => 4,
        ]);
        return redirect('/belum-disalurkan-admin')->with('terima','Pengajuan berhasil diterima');
    }

    public function belum_admin()
    {
        $buku = Buku::where('status', 4)->get();
        return view('admin.belum-disalurkan',['buku' => $buku]);
    }

    public function salurkan($id)
    {
        $buku = Buku::find($id);
        return view('admin.salurkan',['buku' => $buku]);
    }

    public function simpan_salurkan(Request $request,$id)
    {
        $buku = Buku::find($id);
        $request->validate([
            'penerima' => 'required',
        ]);
        Buku::where('id', $id)->update([
            'status' => 5,
            'penerima' => $request->penerima,
        ]);
        return redirect('/sudah-disalurkan-admin')->with('berhasil','Pengajuan berhasil disalurkan');
    }

    public function sudah_admin()
    {
        $buku = Buku::where('status', 5)->get();
        return view('admin.sudah-disalurkan',['buku' => $buku]);
    }
}

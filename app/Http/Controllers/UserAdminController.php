<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;

class UserAdminController extends Controller
{
    public function daftarpengguna()
    {
        $users = User::where('role',2)->get();
        return view('admin.daftar-pengguna',['user' => $users]);
    }

    public function hapuspengguna($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/daftar-pengguna')->with('berhasil','Akun pengguna berhasil dihapus.');
    }

    public function detailpengguna($id)
    {
        $users = User::find($id);
        $buku = Buku::where('users_id', $id)->get();
        return view('admin/detail-pengguna',[
            'user' => $users,
            'buku' => $buku,
        ]);
    }

    public function daftaradmin()
    {
        $admins = User::where('role',1)->get();
        return view('admin.daftar-admin',['admin' => $admins]);
    }

    public function tambahadmin(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:255',
            'username' => 'required|unique:users|min:6|max:255',
            'password' => 'required|min:6|max:255',
        ]);
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 1,
        ]);
        return redirect('/daftar-admin')->with('berhasil','Admin berhasil ditambahkan.');
    }
    
    public function hapusadmin($id)
    {
        $admins = User::find($id);
        $admins->delete();
        return redirect('/daftar-admin')->with('hapus','Admin berhasil dihapus.');
    }

    public function editadmin($id)
    {
        $admins = User::find($id);
        return view('admin/edit-profil-admin',['admin' => $admins]);
    }

    public function detailadmin($id)
    {
        $admins = User::find($id);
        return view('admin/detail-profil-admin',['admin' => $admins]);
    }

    public function simpaneditadmin(Request $request,$id)
    {
        $admins = User::find($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 1,
            'nomor_telp' => $request->nomor_telp,
            'alamat' => $request->alamat,
        ]);
        return redirect('/halaman-admin')->with('berhasil','Admin berhasil diedit.');
    }
}

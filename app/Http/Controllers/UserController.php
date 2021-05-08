<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;

class UserController extends Controller
{
    public function tambahpengguna(Request $request)
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
            'role' => 2,
        ]);
        return redirect('/login')->with('berhasil','Akun pengguna berhasil terdaftar silahkan login.');
    }

    public function editpengguna($id)
    {
        $users = User::find($id);
        return view('users/edit-profil-pengguna',['user' => $users]);
    }

    public function simpaneditpengguna(Request $request,$id)
    {
        $users = User::find($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 2,
            'nomor_telp' => $request->nomor_telp,
            'alamat' => $request->alamat,
        ]);
        return redirect('/halaman-users')->with('berhasil','Akun pengguna berhasil diedit.');
    }

    public function riwayatpengguna()
    {
        $users = User::find(auth()->user()->id);
        $buku = Buku::where('users_id', auth()->user()->id)->get();
        return view('users.index',[
            'buku' => $buku,
            'user' => $users
        ]);
    }
}

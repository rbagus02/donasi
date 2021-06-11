<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Routing\RouteGroup;

###############################################
#################### Guest ####################
###############################################

Route::get('/', function () {
    return view('guest/index');
});

Route::get('/tentang-kami', function () {
    return view('guest/tentang-kami');
});

Route::get('/penerima-donasi', 'App\Http\Controllers\BukuController@penerima');

Route::get('/berita', 'App\Http\Controllers\BeritaController@liat_berita');
Route::get('/{id}/berita-selengkapnya', 'App\Http\Controllers\BeritaController@liat_berita_selengkapnya');

Route::get('/bantuan', function () {
    return view('guest/bantuan');
});

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::post('/tambah-pengguna', 'App\Http\Controllers\UserController@tambahpengguna');

###############################################
#################### Guest ####################
###############################################



###############################################
#################### Admin ####################
###############################################
Route::group(['middleware' => ['auth','checkRole:1']],function(){
    Route::get('/halaman-admin', 'App\Http\Controllers\BukuAdminController@riwayat_admin');

    Route::get('/pengajuan-admin', 'App\Http\Controllers\BukuAdminController@pengajuan_admin');
    Route::post('/{id}/hapus-pengajuan-admin', 'App\Http\Controllers\BukuAdminController@hapus_pengajuan_admin');
    Route::get('/{id}/detail-pengajuan-admin', 'App\Http\Controllers\BukuAdminController@det_pengajuan_admin');
    Route::post('/{id}/disetujui', 'App\Http\Controllers\BukuAdminController@disetujui');
    Route::post('/{id}/ditolak', 'App\Http\Controllers\BukuAdminController@ditolak');

    Route::get('/pengajuan-ditolak-admin', 'App\Http\Controllers\BukuAdminController@penolakan_admin');
    Route::post('/{id}/hapus-pengajuan-ditolak-admin', 'App\Http\Controllers\BukuAdminController@hapus_pengajuan_ditolak_admin');

    Route::get('/penyerahan-admin', 'App\Http\Controllers\BukuAdminController@penyerahan_admin');
    Route::post('/{id}/diterima', 'App\Http\Controllers\BukuAdminController@diterima');

    Route::get('/belum-disalurkan-admin', 'App\Http\Controllers\BukuAdminController@belum_admin');
    Route::post('/{id}/simpan-salurkan', 'App\Http\Controllers\BukuAdminController@simpan_salurkan');

    Route::get('/sudah-disalurkan-admin', 'App\Http\Controllers\BukuAdminController@sudah_admin');

    Route::get('/daftar-berita','App\Http\Controllers\BeritaController@berita');
    Route::post('/tambah-berita', 'App\Http\Controllers\beritaController@tambahberita');
    Route::post('/{id}/hapus-berita', 'App\Http\Controllers\BeritaController@hapus');
    Route::get('/{id}/edit-berita', 'App\Http\Controllers\BeritaController@edit');
    Route::get('/{id}/detail-berita', 'App\Http\Controllers\BeritaController@detail');
    Route::post('/{id}/simpan-edit-berita', 'App\Http\Controllers\BeritaController@simpanedit');

    Route::get('/daftar-pengguna','App\Http\Controllers\UserAdminController@daftarpengguna');
    Route::post('/{id}/hapus-pengguna', 'App\Http\Controllers\UserAdminController@hapuspengguna');
    Route::get('/{id}/detail-pengguna', 'App\Http\Controllers\UserAdminController@detailpengguna');

    Route::get('/daftar-admin','App\Http\Controllers\UserAdminController@daftaradmin');
    Route::post('/tambah-admin', 'App\Http\Controllers\UserAdminController@tambahadmin');
    Route::post('/{id}/hapus-admin', 'App\Http\Controllers\UserAdminController@hapusadmin');
    Route::get('/{id}/edit-profil-admin', 'App\Http\Controllers\UserAdminController@editadmin');
    Route::get('/{id}/detail-profil-admin', 'App\Http\Controllers\UserAdminController@detailadmin');
    Route::post('/{id}/simpan-profil-admin', 'App\Http\Controllers\UserAdminController@simpaneditadmin');
});


###############################################
#################### Admin ####################
###############################################



###############################################
#################### Users ####################
###############################################
Route::group(['middleware' => ['auth','checkRole:2']],function(){
    Route::get('/halaman-users', 'App\Http\Controllers\UserController@riwayatpengguna');
    
    Route::get('/{id}/edit-profil-pengguna', 'App\Http\Controllers\UserController@editpengguna');
    Route::post('/{id}/simpan-profil-pengguna', 'App\Http\Controllers\UserController@simpaneditpengguna');

    Route::get('/pengajuan-users', 'App\Http\Controllers\BukuController@pengajuan_users');
    Route::post('/tambah-pengajuan', 'App\Http\Controllers\BukuController@tambah_pengajuan');
    Route::post('/{id}/hapus-pengajuan-users', 'App\Http\Controllers\BukuController@hapus_pengajuan_users');
    Route::get('/{id}/edit-pengajuan-users', 'App\Http\Controllers\BukuController@edit_pengajuan_users');
    Route::get('/{id}/detail-pengajuan-users', 'App\Http\Controllers\BukuController@detail_pengajuan_users');
    Route::post('/{id}/simpan-edit-pengajuan-users', 'App\Http\Controllers\BukuController@simpan_edit_pengajuan_users');
    
    Route::get('/pengajuan-users-ditolak', 'App\Http\Controllers\BukuController@pengajuan_users_ditolak');
    Route::post('/{id}/hapus-pengajuan-ditolak-users', 'App\Http\Controllers\BukuController@hapus_pengajuan_ditolak_users');

    Route::get('/penyerahan-users', 'App\Http\Controllers\BukuController@penyerahan_users');
    Route::get('/{id}/pdf', 'App\Http\Controllers\DownloadController@pdf');
    Route::get('/{id}/liat-pdf', 'App\Http\Controllers\DownloadController@liat_pdf');
    
    Route::get('/belum-disalurkan-users', 'App\Http\Controllers\BukuController@belum_disalurkan_users');

    Route::get('/sudah-disalurkan-users', 'App\Http\Controllers\BukuController@sudah_disalurkan_users');
    
    Route::get('/bantuan-users', function () {
        return view('users/bantuan');
    });
});


###############################################
#################### Users ####################
###############################################
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Buku;

class DownloadController extends Controller
{
    public function pdf($id)
    {
        $buku = Buku::find($id);
        $pdf = PDF::loadView('users.download',['buku'=>$buku]);
        return $pdf->download('Formulir_Pengajuan_Donasi.pdf');
    }

    public function liat_pdf($id)
    {
        $buku = Buku::find($id);
        return view('users.download',['buku'=>$buku]);
    }
}

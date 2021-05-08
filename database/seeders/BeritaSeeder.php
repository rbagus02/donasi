<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berita = [
            [
                'judul' => 'Pembagian Buku Di Perpustakaan Grendeng',
                'gambar' => '',
                'isi' => 'Menceritakan tentang kegiatan rekreasi di sore hari.',
            ],
            [
                'judul' => 'Pembagian Buku Di Perpustakaan Karangwangkal',
                'gambar' => '',
                'isi' => 'Menceritakan tentang kegiatan rekreasi di malam hari.',
            ],
            [
                'judul' => 'Pembagian Buku Di Perpustakaan Pabuaran',
                'gambar' => '',
                'isi' => 'Menceritakan tentang kegiatan rekreasi di siang hari.',
            ],
            [
                'judul' => 'Pembagian Buku Di Perpustakaan Bancarkembar',
                'gambar' => '',
                'isi' => 'Menceritakan tentang kegiatan rekreasi di dini hari.',
            ],
        ];


        foreach($berita as $berita){
            Berita::create($berita);
        }
    }
}

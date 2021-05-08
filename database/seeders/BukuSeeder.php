<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku = [
            [
                'judul' => 'Jalan Jalan Sore',
                'kategori' => 'fiksi',
                'deskripsi' => 'Menceritakan tentang kegiatan rekreasi di sore hari.',
                'jumlah' => '5',
                'foto_depan' => 'coba',
                'foto_belakang' => 'coba',
                'foto_samping' => 'coba',
                'status' => '1',
                'penerima' => '',
                'users_id' => '3',
            ],
            [
                'judul' => 'Jalan Jalan Malam',
                'kategori' => 'fiksi',
                'deskripsi' => 'Menceritakan tentang kegiatan rekreasi di malam hari.',
                'jumlah' => '6',
                'foto_depan' => 'coba',
                'foto_belakang' => 'coba',
                'foto_samping' => 'coba',
                'status' => '2',
                'penerima' => '',
                'users_id' => '4',
            ],
            [
                'judul' => 'Jalan Jalan Malam',
                'kategori' => 'fiksi',
                'deskripsi' => 'Menceritakan tentang kegiatan rekreasi di malam hari.',
                'jumlah' => '6',
                'foto_depan' => 'coba',
                'foto_belakang' => 'coba',
                'foto_samping' => 'coba',
                'status' => '3',
                'penerima' => '',
                'users_id' => '5',
            ],
            [
                'judul' => 'Jalan Jalan Malam',
                'kategori' => 'fiksi',
                'deskripsi' => 'Menceritakan tentang kegiatan rekreasi di malam hari.',
                'jumlah' => '6',
                'foto_depan' => 'coba',
                'foto_belakang' => 'coba',
                'foto_samping' => 'coba',
                'status' => '4',
                'penerima' => 'Perpustakaan Grendeng',
                'users_id' => '6',
            ],
        ];

        foreach($buku as $buku){
            Buku::create($buku);
        }
    }
}

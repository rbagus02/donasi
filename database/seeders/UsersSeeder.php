<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin 1',
                'username' => 'rbagus01',
                'password' => Hash::make('coba1'),
                'role' => '1',
                'nomor_telp' => '',
                'alamat' => '',
            ],
            [
                'name' => 'Admin 2',
                'username' => 'rbagus02',
                'password' => Hash::make('coba1'),
                'role' => '1',
                'nomor_telp' => '',
                'alamat' => '',
            ],
            [
                'name' => 'Pengguna 1',
                'username' => 'rbagus03',
                'password' => Hash::make('coba1'),
                'role' => '2',
                'nomor_telp' => '081903121999',
                'alamat' => 'Jalan Kenanga Nomor 2',
            ],
            [
                'name' => 'Pengguna 2',
                'username' => 'rbagus04',
                'password' => Hash::make('coba1'),
                'role' => '2',
                'nomor_telp' => '081903121999',
                'alamat' => 'Jalan Kenanga Nomor 2',
            ],
            [
                'name' => 'Pengguna 3',
                'username' => 'rbagus05',
                'password' => Hash::make('coba1'),
                'role' => '2',
                'nomor_telp' => '081903121999',
                'alamat' => 'Jalan Kenanga Nomor 2',
            ],
            [
                'name' => 'Pengguna 4',
                'username' => 'rbagus06',
                'password' => Hash::make('coba1'),
                'role' => '2',
                'nomor_telp' => '081903121999',
                'alamat' => 'Jalan Kenanga Nomor 2',
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}

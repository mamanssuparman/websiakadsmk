<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insert = [
            'nuptk'             => '-',
            'nip'               => '-',
            'nama'              => 'Mimin',
            'alamat'            => 'Cikawung Cintaratu',
            'jeniskelamin'      => 'Laki-laki',
            'pendidikanterakhir'=> 'S1',
            'jabatan'           => 'Tenaga Pendidik',
            // 'tugastambahan'     => '',
            'role'              => 'Super Admin',
            'photos'            => 'defaultuser.jpg',
            'statususers'       => 'Active',
            'email'             => 'omenartcorp2@gmail.com',
            'password'          => Hash::make('1234567')
        ];
        User::create($insert);
    }
}

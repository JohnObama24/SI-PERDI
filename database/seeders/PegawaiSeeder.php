<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pegawai;
class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                Pegawai::create([
            'nama_lengkap' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), // jangan lupa pakai hash
            'role' => 'admin',
        ]);
    }
}

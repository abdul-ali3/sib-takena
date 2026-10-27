<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Fotografer;
use App\Models\PaketLayanan;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Role (Sesuai SKPL 2.1)
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'fotografer']);
        Role::create(['name' => 'pimpinan']);
        Role::create(['name' => 'pelanggan']);

        // 2. Buat User Admin
        $admin = User::create([
            'name' => 'Admin Takena',
            'email' => 'admin@takena.com',
            'password' => bcrypt('password123'),
            'role' => 'admin'
        ]);
        $admin->assignRole('admin');

        // 3. Buat User & Data Fotografer
        $fotoUser = User::create([
            'name' => 'Budi Santoso',
            'email' => 'fotografer@takena.com',
            'password' => bcrypt('password123'),
            'role' => 'fotografer'
        ]);
        $fotoUser->assignRole('fotografer');
        Fotografer::create([
            'user_id' => $fotoUser->id,
            'nama' => 'Budi Santoso',
            'no_telepon' => '081234567890',
            'email' => 'fotografer@takena.com',
            'spesialisasi' => 'Prewedding & Wedding',
            'status_aktif' => true
        ]);

        // 4. Buat User & Data Pelanggan
        $pelangganUser = User::create([
            'name' => 'Siti Pelanggan',
            'email' => 'pelanggan@takena.com',
            'password' => bcrypt('password123'),
            'role' => 'pelanggan'
        ]);
        $pelangganUser->assignRole('pelanggan');
        Pelanggan::create([
            'user_id' => $pelangganUser->id,
            'nama_lengkap' => 'Siti Pelanggan',
            'no_telepon' => '081298765432',
            'email' => 'pelanggan@takena.com',
            'alamat' => 'Jl. El Tari, Kota Kupang'
        ]);

        // 5. Buat Data Paket Layanan (Dummy agar tabel booking tidak error)
        PaketLayanan::create([
            'nama_paket' => 'Paket Prewedding Basic',
            'harga' => 2500000,
            'durasi_menit' => 240,
            'status_aktif' => true
        ]);
        PaketLayanan::create([
            'nama_paket' => 'Paket Wisuda',
            'harga' => 750000,
            'durasi_menit' => 90,
            'status_aktif' => true
        ]);
    }
}
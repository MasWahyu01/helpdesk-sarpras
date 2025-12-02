<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Admin
        User::create([
            'name' => 'Admin Sarpras',
            'email' => 'admin@yadika.sch.id',
            'password' => Hash::make('password'), // Password: password
            'role' => 'admin',
        ]);

        // 2. Buat Akun Siswa (Contoh)
        User::create([
            'name' => 'Siswa Yadika',
            'email' => 'siswa@yadika.sch.id',
            'password' => Hash::make('password'), // Password: password
            'role' => 'siswa',
        ]);

        // 3. Buat Kategori Kerusakan
        Category::create(['name' => 'Fasilitas Kelas (Meja/Kursi)']);
        Category::create(['name' => 'Kelistrikan & Lampu']);
        Category::create(['name' => 'Kamar Mandi / Air']);
        Category::create(['name' => 'Perangkat Elektronik (AC/Proyektor)']);
        Category::create(['name' => 'Bangunan (Pintu/Jendela/Lantai)']);
    }
}
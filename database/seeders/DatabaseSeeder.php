<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@kampus.ac.id',
            'password' => Hash::make('admin123'), // Password default: password
            'role' => 'admin',
            'identity_number' => 'ADM001',
            'prodi' => 'Sistem Informasi',
            'is_active' => true,
        ]);

        // 2. Buat Akun DOSEN (5 Orang)
        $dosenNames = ['Dr. Budi Santoso', 'Siti Aminah, M.Kom', 'Rudi Hermawan, M.T', 'Prof. Andi Wijaya', 'Dewi Sartika, M.Cs'];

        foreach ($dosenNames as $index => $name) {
            User::create([
                'name' => $name,
                'email' => 'dosen' . ($index + 1) . '@kampus.ac.id', // dosen1@kampus.ac.id, dst.
                'password' => Hash::make('dosen123'),
                'role' => 'dosen',
                'identity_number' => '1980010' . ($index + 1), // NIP Dummmy
                'prodi' => 'Teknik Informatika',
                'is_active' => true,
            ]);
        }

        // 3. Buat Akun MAHASISWA (10 Orang)
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'Mahasiswa ' . $i,
                'email' => 'mhs' . $i . '@kampus.ac.id', // mhs1@kampus.ac.id, dst.
                'password' => Hash::make('mahasiswa123'),
                'role' => 'mahasiswa',
                'identity_number' => '202400' . $i, // NIM Dummy
                'prodi' => 'Teknik Informatika',
                'is_active' => true,
            ]);
        }

        $this->command->info('Data Dummy Berhasil Dibuat!');
        $this->command->info('Login Admin: admin@kampus.ac.id | admin123');
        $this->command->info('Login Dosen: dosen1@kampus.ac.id | dosen123');
        $this->command->info('Login Mhs: mhs1@kampus.ac.id | mahasiswa123');
    }
}

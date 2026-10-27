<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biodata;

class BiodataSeeder extends Seeder
{
    public function run(): void
    {
        Biodata::create([
            'nama_lengkap' => 'Fitri Mutia',
            // Menggabungkan alamat, NIM, Kelas, dan Skill di satu kolom
            'alamat' => 'Umban Sari. | NIM: 2555301075 | Kelas: 2 TI A | Skill: Desain & Pemrograman',
            'tanggal_lahir' => '2005-01-01', // Ganti dengan tanggal lahirmu (format: YYYY-MM-DD)
            'no_hp' => '081234567890',
            // PASTIKAN NAMA FILE INI SAMA PERSIS dengan yang kamu paste di folder public tadi
            'photo' => 'fotoku.jpg', 
        ]);
    }
}
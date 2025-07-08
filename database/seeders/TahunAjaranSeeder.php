<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::create([
            'id_tahun_ajaran' => 1,
            'tahun_ajaran' => '2023/2024 Ganjil',
            'is_aktif' => false,
        ]);

        TahunAjaran::create([
            'id_tahun_ajaran' => 2,
            'tahun_ajaran' => '2023/2024 Genap',
            'is_aktif' => true,
        ]);
    }
}
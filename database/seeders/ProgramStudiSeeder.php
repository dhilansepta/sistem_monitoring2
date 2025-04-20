<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $program_studis = [
            [
                'nama_prodi' => 'Teknik Informatika',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Teknik Mesin',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Geologi',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Teknik Industri',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Teknik Kimia',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Teknik Pangan',
                'is_aktif' => true
            ],
            [
                'nama_prodi' => 'Teknik Elektro',
                'is_aktif' => true
            ]
        ];

        foreach ($program_studis as $prodi) {
            ProgramStudi::create($prodi);
        }
    }
} 
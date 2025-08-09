<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubKriteria::create([
            'id_kriteria' => 1,
            'nama_sub_kriteria' => 'A1',
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama_sub_kriteria' => 'B1',
        ]);

        SubKriteria::create([
            'id_kriteria' => 2,
            'nama_sub_kriteria' => 'C1',
        ]);
    }
}

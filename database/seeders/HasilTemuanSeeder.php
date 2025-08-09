<?php

namespace Database\Seeders;

use App\Models\HasilTemuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HasilTemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HasilTemuan::create([
            'id_sub_kriteria' => 1,
            'hasil_temuan' => 'Hasil Temuan 1',
            'status_tahun_lalu' => 'Belum ada standar ini pada tahun lalu',
            'status_tahun_ini' => 'Belum ada standar ini pada tahun lalu',
        ]);

        HasilTemuan::create([
            'id_sub_kriteria' => 1,
            'hasil_temuan' => 'Hasil Temuan 2',
            'status_tahun_lalu' => 'Belum ada standar ini pada tahun lalu',
            'status_tahun_ini' => 'Belum ada standar ini pada tahun lalu',
        ]);

        HasilTemuan::create([
            'id_sub_kriteria' => 2,
            'hasil_temuan' => 'Hasil Temuan 3',
            'status_tahun_lalu' => 'Belum ada standar ini pada tahun lalu',
            'status_tahun_ini' => 'Belum ada standar ini pada tahun lalu',
        ]);

        HasilTemuan::create([
            'id_sub_kriteria' => 3,
            'hasil_temuan' => 'Hasil Temuan 4',
            'status_tahun_lalu' => 'Belum ada standar ini pada tahun lalu',
            'status_tahun_ini' => 'Belum ada standar ini pada tahun lalu',
        ]);
    }
}

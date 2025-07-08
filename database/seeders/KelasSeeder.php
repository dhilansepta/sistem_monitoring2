<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'kode_kelas'       => 1,
                'nama_kelas'       => 'R',
                'id_matkul_dibuka' => 'MK00000001',
                'id_tahun_ajaran'  => 2,
            ],
            [
                'kode_kelas'       => 2,
                'nama_kelas'       => 'R',
                'id_matkul_dibuka' => 'MK00000002',
                'id_tahun_ajaran'  => 2,
            ],
            [
                'kode_kelas'       => 3,
                'nama_kelas'       => 'R',
                'id_matkul_dibuka' => 'MK00000012',
                'id_tahun_ajaran'  => 2,
            ],
        ]);
    }
}

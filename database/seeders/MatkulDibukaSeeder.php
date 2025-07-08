<?php

namespace Database\Seeders;

use App\Models\MatkulDibuka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MatkulDibukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD001',
            'kode_matkul' => 'IF1101',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Pengenalan Program Studi Teknik Informatika',
            'bobot_sks' => 2,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD002',
            'kode_matkul' => 'IF1121',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Algoritma Pemrograman 1',
            'bobot_sks' => 3,
            'praktikum' => 1,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD003',
            'kode_matkul' => 'IF1101',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Pengenalan Program Studi Teknik Informatika',
            'bobot_sks' => 2,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD004',
            'kode_matkul' => 'IF1121',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Algoritma Pemrograman 1',
            'bobot_sks' => 3,
            'praktikum' => 1,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD005',
            'kode_matkul' => 'TP1101',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Matkul Tekpang1',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);
        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD006',
            'kode_matkul' => 'TP1102',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Matkul Tekpang2',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);

       MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD007',
            'kode_matkul' => 'TP1101',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Matkul Tekpang1',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);
        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD008',
            'kode_matkul' => 'TP1102',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Matkul Tekpang2',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD009',
            'kode_matkul' => 'MT1101',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Matkul Material1',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD010',
            'kode_matkul' => 'MT1102',
            'id_tahun_ajaran' => 1,
            'nama_matkul' => 'Matkul Material2',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD011',
            'kode_matkul' => 'MT1101',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Matkul Material1',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);

        MatkulDibuka::create([
            'id_matkul_dibuka' => 'MD012',
            'kode_matkul' => 'MT1102',
            'id_tahun_ajaran' => 2,
            'nama_matkul' => 'Matkul Material2',
            'bobot_sks' => 3,
            'praktikum' => 0,
        ]);
    }
}
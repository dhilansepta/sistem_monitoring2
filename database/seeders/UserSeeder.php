<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1=User::create([
            'nama'      => 'Andika Setiawan S.Kom., M.Cs.',
            'email'     => 'andika.setiawan@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'kaprodi',
            'prodi_id'  => 1,
        ]);
        $user1->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        $user2=User::create([
            'nama'      => 'Eko Dwi Nugroho, S.Kom., M.Cs.',
            'email'     => 'eko.nugroho@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmp',
            'prodi_id'  => 1,
        ]);
        $user2->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        User::create([
            'nama'      => 'Ade Setiawan, S.Si',
            'email'     => 'ade.setiawan@staff.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'admin',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Ir. Hira Laksmiwati Soemitro M.Sc.',
            'email'     => 'hira@informatika.org',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Rajif Agung Yunmar S.Kom., M.Cs.',
            'email'     => 'rajif@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Raidah Hanifah S.T., M.T.',
            'email'     => 'raidah.hanifah@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Rahman Indra Kesuma S.Kom., M.Cs.',
            'email'     => 'rahman.indra@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Arkham Zahri Rakhman S.Kom., M.Eng.',
            'email'     => 'arkham@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Hafiz Budi Firmansyah S.Kom., M.Sc.',
            'email'     => 'hafiz.budi@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Imam Ekowicaksono S.Si., M.Si.',
            'email'     => 'imam.wicaksono@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'I Wayan Wiprayoga Wisesa S.Kom., M.Kom.',
            'email'     => 'wayan.wisesa@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Hartanto Tantriawan S.Kom., M.Kom',
            'email'     => 'hartanto.tantriawan@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Angga Wijaya S.Si., M.Si.',
            'email'     => 'angga.wijaya@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Amirul Iqbal S.Kom., M.Eng.',
            'email'     => 'amirul.iqbal@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Mohamad Idris S.Si., M.Sc.',
            'email'     => 'mohamad.idris@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Arief Ichwani S.Kom., M.Cs.',
            'email'     => 'arief.ichwani@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Martin C.T. Manullang S.T., M.T.',
            'email'     => 'martin.manullang@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Ir. Mugi Praseptiawan S.T., M.Kom',
            'email'     => 'mugi.praseptiawan@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Meida Cahyo Untoro S.Kom., M.Kom',
            'email'     => 'cahyo.untoro@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Aidil Afriansyah S.Kom., M.Kom',
            'email'     => 'aidil.afriansyah@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Andre Febrianto, S.Kom., M.Eng.',
            'email'     => 'andre.febrianto@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Ilham Firman Ashari, S.Kom., M.T',
            'email'     => 'firman.ashari@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Muhammad Habib Algifari, S.Kom., M.T.I.',
            'email'     => 'muhammad.algifari@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Radhinka Bagaskara, S.Si.Kom., M.Si., M.Sc.',
            'email'     => 'radhinka.bagaskara@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Winda Yulita, M.Cs. ',
            'email'     => 'winda.yulita@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen', 
            'prodi_id'  => 1,
        ]);

        User::create([
            'nama'      => 'Miranti Verdiana, M.Si.',
            'email'     => 'miranti.verdiana@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 1,
        ]);

        $user3=User::create([
            'nama'      => 'Testing kaprodi',
            'email'     => 'kaprodi@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'kaprodi',
            'prodi_id'  => 1,
        ]);

        $user3->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        $user4=User::create([
            'nama'      => 'Testing gkmp',
            'email'     => 'gkmp@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmp',
            'prodi_id'  => 1,
        ]);

        $user4->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        User::create([
            'nama'      => 'Testing dosen',
            'email'     => 'dosen@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
        ]);

        User::create([
            'nama'      => 'Testing admin',
            'email'     => 'admin@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'admin',
        ]);

        $user5=User::create([
            'nama'      => 'Kaprodi Prodi Pangan',
            'email'     => 'kaprodi@pangan.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'kaprodi',
            'prodi_id'  => 2,
        ]);

        $user5->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

         $user6=User::create([
            'nama'      => 'gkmp Prodi Pangan',
            'email'     => 'gkmp@pangan.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmp',
            'prodi_id'  => 2,
        ]);

        $user6->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        User::create([
            'nama'      => 'dosen1 Prodi Pangan',
            'email'     => 'dosen1@pangan.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);
        
        User::create([
            'nama'      => 'dosen2 Prodi Pangan',
            'email'     => 'dosen2@pangan.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);

        User::create([
            'nama'      => 'dosen3 Prodi Pangan',
            'email'     => 'dosen3@pangan.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);

        $user7=User::create([
            'nama'      => 'Kaprodi Prodi Material',
            'email'     => 'kaprodi@material.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'kaprodi',
            'prodi_id'  => 2,
        ]);

        $user7->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

         $user8=User::create([
            'nama'      => 'gkmp Prodi Material',
            'email'     => 'gkmp@material.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmp',
            'prodi_id'  => 2,
        ]);

        $user8->aktif_role()->create([
            'is_dosen'  => 0,
        ]);

        User::create([
            'nama'      => 'dosen1 Prodi Material',
            'email'     => 'dosen1@material.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);
        
        User::create([
            'nama'      => 'dosen2 Prodi Material',
            'email'     => 'dosen2@material.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);

        User::create([
            'nama'      => 'dosen3 Prodi Material',
            'email'     => 'dosen3@material.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'dosen',
            'prodi_id'  => 2,
        ]);


        // Menambahkan user GKMF untuk testing
        $user = User::create([
            'nama'      => 'Testing GKMF',
            'email'     => 'gkmf@itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmf',
        ]);

        $user->aktif_role()->create([
            'is_dosen'  => 0,
        ]);
    }
}
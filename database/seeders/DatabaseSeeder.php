<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DokumenKelas;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TahunAjaranSeeder::class,
            ProgramStudiSeeder::class,
            UserSeeder::class,
            BadgeSeeder::class,
            DokumenPerkuliahanSeeder::class,
            MataKuliahSeeder::class,
            MatkulDibukaSeeder::class,
            // KelasSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
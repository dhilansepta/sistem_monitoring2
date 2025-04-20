<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'nama'      => 'Andika Setiawan S.Kom., M.Cs.',
            'email'     => 'andika.setiawan@if.itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'kaprodi',
            'prodi_id' => '1',
        ]);
        
        $user = User::create([
            'nama'      => 'Testing GKMF',
            'email'     => 'gkmf@itera.ac.id',
            'password'  => Hash::make('password'),
            'role'      => 'gkmf',
        ]);
    }
   
}
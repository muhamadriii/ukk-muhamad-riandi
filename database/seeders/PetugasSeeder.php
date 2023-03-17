<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;
use App\Models\Village;
use Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Village::create([
            'name' => 'megamendung'
        ]);

        Petugas::create([
            'village_id' => '1',
            'name' => 'riandi',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'level' => 'admin',
            'telp' => '08817237133',
        ]);
    }
}

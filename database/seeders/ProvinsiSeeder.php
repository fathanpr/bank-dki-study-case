<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::create([
            'nama_provinsi' => 'DKI Jakarta',
        ]);

        Provinsi::create([
            'nama_provinsi' => 'Jawa Barat',
        ]);

        Provinsi::create([
            'nama_provinsi' => 'Banten',
        ]);
    }
}

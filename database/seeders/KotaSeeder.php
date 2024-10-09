<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //DKI Jakarta
        Kota::create([
            'nama_kota' => 'Kota Jakarta Utara',
            'provinsi_id' => 1,
        ]);

        Kota::create([
            'nama_kota' => 'Kota Jakarta Barat',
            'provinsi_id' => 1,
        ]);

        //Jawa Barat
        Kota::create([
            'nama_kota' => 'Kab. Karawang',
            'provinsi_id' => 2,
        ]);

        Kota::create([
            'nama_kota' => 'Kab. Majalengka',
            'provinsi_id' => 2,
        ]);

        //Banten
        Kota::create([
            'nama_kota' => 'Kota Tangerang',
            'provinsi_id' => 3,
        ]);

        Kota::create([
            'nama_kota' => 'Kota Serang',
            'provinsi_id' => 3,
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Jakarta Barat
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Kembangan',
            'kota_id' => 1,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Kalideres',
            'kota_id' => 1,
        ]);

        //Jakarta Utara
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Cilincing',
            'kota_id' => 2,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Koja',
            'kota_id' => 2,
        ]);

        //Karawang
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Telukjambe Timur',
            'kota_id' => 3,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Telukjambe Barat',
            'kota_id' => 3,
        ]);

        //Majalengka
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Majalengka',
            'kota_id' => 4,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Jatiwangi',
            'kota_id' => 4,
        ]);

        //Tangerang
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Ciledug',
            'kota_id' => 5,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Karawaci',
            'kota_id' => 5,
        ]);

        //Serang
        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Serang',
            'kota_id' => 6,
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Kec. Walantaka',
            'kota_id' => 6,
        ]);
    }
}

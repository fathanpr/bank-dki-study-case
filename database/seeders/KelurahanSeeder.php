<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Kec. Kembangan
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Kembangan Selatan',
            'kecamatan_id' => 1,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Kembangan Utara',
            'kecamatan_id' => 1,
        ]);

        //Kec. Kalideres
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Kamal',
            'kecamatan_id' => 2,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Kalideres',
            'kecamatan_id' => 2,
        ]);

        //Kec. Cilincing
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Cilincing',
            'kecamatan_id' => 3,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Marunda',
            'kecamatan_id' => 3,
        ]);

        //Kec. Koja
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Koja Selatan',
            'kecamatan_id' => 4,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Koja Utara',
            'kecamatan_id' => 4,
        ]);

        //Kec. Telukjambe Timur
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Telukjambe Timur',
            'kecamatan_id' => 5,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Telukjambe Barat',
            'kecamatan_id' => 5,
        ]);

        //Kec. Telukjambe Barat
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Telukjambe Barat',
            'kecamatan_id' => 6,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Telukjambe Timur',
            'kecamatan_id' => 6,
        ]);

        //Kec. Majalengka
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Tonjong',
            'kecamatan_id' => 7,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Sindangkasih',
            'kecamatan_id' => 7,
        ]);

        //Kec. Jatiwangi
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Jatiwangi',
            'kecamatan_id' => 8,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Pinangraja',
            'kecamatan_id' => 8,
        ]);

        //Kec. Ciledug
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Ciledug',
            'kecamatan_id' => 9,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Cireundeu',
            'kecamatan_id' => 9,
        ]);

        //Kec. Karawaci
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Karawaci',
            'kecamatan_id' => 10,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Bojong Jaya',
            'kecamatan_id' => 10,
        ]);

        //Kec. Serang
        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Serang',
            'kecamatan_id' => 11,
        ]);

        Kelurahan::create([
            'nama_kelurahan' => 'Kel. Walantaka',
            'kecamatan_id' => 11,
        ]);
    }
}

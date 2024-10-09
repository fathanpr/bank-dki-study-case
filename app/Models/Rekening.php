<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekenings';
    protected $primaryKey = 'id_rekening';

    protected $fillable = [
        'nama',
        'pekerjaan_id',
        'tempat_lahir',
        'tanggal_lahir',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'nama_jalan',
        'rt',
        'rw',
        'nominal_setor',
        'status_approval',
    ];
}

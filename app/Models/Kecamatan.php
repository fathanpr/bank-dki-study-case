<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';
    protected $primaryKey = 'id_kecamatan';

    protected $fillable = [
        'nama_kecamatan',
        'kota_id',
    ];
}

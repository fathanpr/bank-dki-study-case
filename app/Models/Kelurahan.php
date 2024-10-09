<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahans';
    protected $primaryKey = 'id_kelurahan';

    protected $fillable = [
        'nama_kelurahan',
        'kecamatan_id',
    ];
}

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

    public static function getData($dataFilter)
    {
        $data = self::select(
            'id_kelurahan',
            'nama_kelurahan',
        );

        if (isset($dataFilter['kecamatan_id'])) {
            $data->where('kecamatan_id', $dataFilter['kecamatan_id']);
        }

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_kelurahan', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
}

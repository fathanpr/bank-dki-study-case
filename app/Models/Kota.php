<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    protected $table = 'kotas';
    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'nama_kota',
        'provinsi_id',
    ];

    public static function getData($dataFilter)
    {
        $data = self::select(
            'id_kota',
            'nama_kota',
        );

        if (isset($dataFilter['provinsi_id'])) {
            $data->where('provinsi_id', $dataFilter['provinsi_id']);
        }

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_kota', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
}

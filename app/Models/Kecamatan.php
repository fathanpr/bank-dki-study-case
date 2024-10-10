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

    public static function getData($dataFilter)
    {
        $data = self::select(
            'id_kecamatan',
            'nama_kecamatan',
        );

        if (isset($dataFilter['kota_id'])) {
            $data->where('kota_id', $dataFilter['kota_id']);
        }

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_kecamatan', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
}

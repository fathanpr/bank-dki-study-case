<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $table = 'provinsis';
    protected $primaryKey = 'id_provinsi';

    protected $fillable = [
        'nama_provinsi',
    ];

    public static function getData($dataFilter)
    {
        $data = self::select(
            'id_provinsi',
            'nama_provinsi',
        );

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_provinsi', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
}

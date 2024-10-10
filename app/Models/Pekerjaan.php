<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaans';
    protected $primaryKey = 'id_pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
    ];

    public static function getData($dataFilter)
    {
        $data = self::select(
            'id_pekerjaan',
            'nama_pekerjaan',
        );

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('nama_pekerjaan', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
}

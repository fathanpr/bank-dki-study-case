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
        'kode_cabang',
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

    private static function _query($dataFilter)
    {
        $data = self::select(
            'rekenings.id_rekening',
            'rekenings.nama',
            'rekenings.tempat_lahir',
            'rekenings.tanggal_lahir',
            'rekenings.nama_jalan',
            'rekenings.rt',
            'rekenings.rw',
            'rekenings.nominal_setor',
            'rekenings.status_approval',
            'pekerjaans.nama_pekerjaan',
            'provinsis.nama_provinsi',
            'kotas.nama_kota',
            'kecamatans.nama_kecamatan',
            'kelurahans.nama_kelurahan',
        );

        if($dataFilter['kode_cabang']) {
            $kode_cabang = $dataFilter['kode_cabang'];
            $data->where('kode_cabang', $kode_cabang);
        }

        $data->leftJoin('pekerjaans', 'rekenings.pekerjaan_id', 'pekerjaans.id_pekerjaan')
            ->leftJoin('provinsis', 'rekenings.provinsi_id', 'provinsis.id_provinsi')
            ->leftJoin('kotas', 'rekenings.kota_id', 'kotas.id_kota')
            ->leftJoin('kecamatans', 'rekenings.kecamatan_id', 'kecamatans.id_kecamatan')
            ->leftJoin('kelurahans', 'rekenings.kelurahan_id', 'kelurahans.id_kelurahan');

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('rekenings.nama', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.tempat_lahir', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.tanggal_lahir', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.nama_jalan', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.rt', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.rw', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.nominal_setor', 'ILIKE', "%{$search}%")
                    ->orWhere('rekenings.status_approval', 'ILIKE', "%{$search}%")
                    ->orWhere('pekerjaans.nama_pekerjaan', 'ILIKE', "%{$search}%")
                    ->orWhere('provinsis.nama_provinsi', 'ILIKE', "%{$search}%")
                    ->orWhere('kotas.nama_kota', 'ILIKE', "%{$search}%")
                    ->orWhere('kecamatans.nama_kecamatan', 'ILIKE', "%{$search}%")
                    ->orWhere('kelurahans.nama_kelurahan', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }

    public static function getData($dataFilter, $settings)
    {
        return self::_query($dataFilter)->offset($settings['start'])
            ->limit($settings['limit'])
            ->orderBy($settings['order'], $settings['dir'])
            ->get();
    }

    public static function countData($dataFilter)
    {
        return self::_query($dataFilter)->count();
    }
}

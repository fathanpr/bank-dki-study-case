<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    public function index()
    {
        $dataPage = [
            'title' => 'SIPR - Pembukaan Rekening',
            'page' => 'pembukaan-rekening',
        ];

        return view('pengajuan.index', $dataPage);
    }

    public function store(Request $request)
    {
        $dataValidate = [
            'nama' => ['required', 'unique:rekenings,nama', 'regex:/^[a-zA-Z\s]+$/'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required', 'date:Y-m-d'],
            'jenis_kelamin' => ['required', 'in:laki-laki,wanita'],
            'pekerjaan' => ['required'],
            'provinsi' => ['required'],
            'kota' => ['required'],
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'jalan' => ['required'],
            'rt' => ['required', 'numeric'],
            'rw' => ['required', 'numeric'],
            'nominal_setor' => ['required', 'numeric']
        ];

        $validator = Validator::make(request()->all(), $dataValidate);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => $errors], 402);
        }

        $nama = $request->nama;
        $tempat_lahir = $request->tempat_lahir;
        $tanggal_lahir = $request->tanggal_lahir;
        $jenis_kelamin = $request->jenis_kelamin;
        $pekerjaan_id = $request->pekerjaan;
        $provinsi_id = $request->provinsi;
        $kota_id = $request->kota;
        $kecamatan_id = $request->kecamatan;
        $kelurahan_id = $request->kelurahan;
        $nama_jalan = $request->jalan;
        $rt = $request->rt;
        $rw = $request->rw;
        $nominal_setor = $request->nominal_setor;
        $kode_cabang = Auth::user()->kode_cabang;


        DB::beginTransaction();
        try{
            Rekening::create([
                'nama' => $nama,
                'kode_cabang' => $kode_cabang,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'pekerjaan_id' => $pekerjaan_id,
                'provinsi_id' => $provinsi_id,
                'kota_id' => $kota_id,
                'kecamatan_id' => $kecamatan_id,
                'kelurahan_id' => $kelurahan_id,
                'nama_jalan' => $nama_jalan,
                'nominal_setor' => $nominal_setor,
                'rt' => $rt,
                'rw' => $rw
            ]);

            DB::commit();
            return response()->json(['message' => 'Berhasil Mengajukan Pembukaan Rekening'],200);
        } catch(Throwable $error){
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], 500);
        }
    }
}

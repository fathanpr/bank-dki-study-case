<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApprovalController extends Controller
{
    public function index()
    {
        $dataPage = [
            'title' => 'SIPR - Approval Pembukaan Rekening',
            'page' => 'approval-pembukaan-rekening',
        ];

        return view('approval.index', $dataPage);
    }

    public function datatable(Request $request)
    {
        $columns = array(
            0 => 'nama',
            1 => 'pekerjaans.nama_pekerjaan',
            2 => 'tempat_lahir',
            3 => 'tanggal_lahir',
            5 => 'nominal_setor',
            6 => 'status_approval',
        );

        $totalData = Rekening::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = (!empty($request->input('order.0.column'))) ? $columns[$request->input('order.0.column')] : $columns[0];
        $dir = (!empty($request->input('order.0.dir'))) ? $request->input('order.0.dir') : "DESC";

        $settings['start'] = $start;
        $settings['limit'] = $limit;
        $settings['dir'] = $dir;
        $settings['order'] = $order;

        $dataFilter = [];

        $search = $request->input('search.value');
        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $cabangFilter = auth()->user()->kode_cabang ? auth()->user()->kode_cabang : null;
        if ($cabangFilter) {
            $dataFilter['kode_cabang'] = $cabangFilter;
        }

        $rekenings = Rekening::getData($dataFilter, $settings);
        $totalFiltered = Rekening::countData($dataFilter);

        $dataTable = [];

        if (!empty($rekenings)) {
            foreach ($rekenings as $data) {

                $role = auth()->user()->role;
                $canApprove = $data->status_approval == 'Menunggu Approval' && $role == 'supervisi' ? true : false;

                $nestedData['nama'] = $data->nama;
                $nestedData['pekerjaan'] = $data->nama_pekerjaan;
                $nestedData['tempat_lahir'] = $data->tempat_lahir;
                $nestedData['tanggal_lahir'] = $data->tanggal_lahir;
                $nestedData['alamat'] = $data->nama_jalan.', RT '.$data->rt.'/ RW'.$data->rw.', '.$data->nama_kelurahan.', '.$data->nama_kecamatan.', '.$data->nama_kota.', '.$data->nama_provinsi;
                $nestedData['nominal_setor'] = 'Rp ' . number_format($data->nominal_setor, 0, ',', '.');
                $nestedData['status_approval'] = '<span class="'.($data->status_approval == 'Menunggu Approval' ? 'badge badge-warning' : 'badge badge-success').'">'.$data->status_approval.'</span>';
                $nestedData['aksi'] = $canApprove ? '<button class="btn btn-sm btn-success btnApprove" data-id-rekening="'.$data->id_rekening.'">Approve</button>' : '-';

                $dataTable[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $dataTable,
            "order" => $order,
            "dir" => $dir,
            "column" => $request->input('order.0.column')
        );

        return response()->json($json_data, 200);
    }

    public function approve(Request $request)
    {
        $dataValidate = [
            'id_rekening' => 'required|exists:rekenings,id_rekening',
        ];

        $validator = Validator::make(request()->all(), $dataValidate);
        
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['message' => $errors], 402);
        }

        DB::beginTransaction();
        try{
            $rekening = Rekening::find($request->id_rekening);
            $rekening->status_approval = 'Disetujui';
            $rekening->save();
            DB::commit();
            return response()->json(['message' => 'Pengajuan rekening berhasil di Approve!'], 200);
        } catch (Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], 500);
        }
    }
}

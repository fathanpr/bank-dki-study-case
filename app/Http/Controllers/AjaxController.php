<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_provinsi(Request $request){
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');

        $dataFilter = [];
        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $provinsi = Provinsi::getData($dataFilter);
        $data = $provinsi->simplePaginate(10);
        $morePages = true;

        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $prov) {
            $dataProvinsi[] = [
                'id' => $prov->id_provinsi,
                'text' => $prov->nama_provinsi
            ];
        }

        $results = array(
            "results" => $dataProvinsi,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results, 200);
    }

    public function get_kota(Request $request){
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');
        $provinsi_id = $request->input('provinsiId');

        $dataFilter = [];

        if (!empty($provinsi_id)) {
            $dataFilter['provinsi_id'] = $provinsi_id;
        }

        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $kota = Kota::getData($dataFilter);
        $data = $kota->simplePaginate(10);
        $morePages = true;

        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $prov) {
            $dataKota[] = [
                'id' => $prov->id_kota,
                'text' => $prov->nama_kota
            ];
        }

        $results = array(
            "results" => $dataKota,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results, 200);
    }

    public function get_kecamatan(Request $request){
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');
        $kota_id = $request->input('kotaId');

        $dataFilter = [];

        if (!empty($kota_id)) {
            $dataFilter['kota_id'] = $kota_id;
        }

        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $kecamatan = Kecamatan::getData($dataFilter);
        $data = $kecamatan->simplePaginate(10);
        $morePages = true;

        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $prov) {
            $dataKecamatan[] = [
                'id' => $prov->id_kecamatan,
                'text' => $prov->nama_kecamatan
            ];
        }

        $results = array(
            "results" => $dataKecamatan,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results, 200);
    }

    public function get_kelurahan(Request $request){
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');
        $kecamatan_id = $request->input('kecamatanId');

        $dataFilter = [];

        if (!empty($kecamatan_id)) {
            $dataFilter['kecamatan_id'] = $kecamatan_id;
        }

        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $kelurahan = Kelurahan::getData($dataFilter);
        $data = $kelurahan->simplePaginate(10);
        $morePages = true;

        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $prov) {
            $dataKelurahan[] = [
                'id' => $prov->id_kelurahan,
                'text' => $prov->nama_kelurahan
            ];
        }

        $results = array(
            "results" => $dataKelurahan,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results, 200);
    }

    public function get_pekerjaan(Request $request){
        $search = $request->input('search');
        $page = $request->input("page");
        $idCats = $request->input('catsProd');
        $adOrg = $request->input('adOrg');

        $dataFilter = [];
        if (!empty($search)) {
            $dataFilter['search'] = $search;
        }

        $pekerjaan = Pekerjaan::getData($dataFilter);
        $data = $pekerjaan->simplePaginate(10);
        $morePages = true;

        $pagination_obj = json_encode($data);
        if (empty($data->nextPageUrl())) {
            $morePages = false;
        }

        foreach ($data->items() as $prov) {
            $dataPekerjaan[] = [
                'id' => $prov->id_pekerjaan,
                'text' => $prov->nama_pekerjaan
            ];
        }

        $results = array(
            "results" => $dataPekerjaan,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results, 200);
    }
}

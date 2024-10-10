@extends('layouts.app')

@section('title', $title)

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="rekening-table" class="table table-striped table-bordered display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Pekerjaan</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Nominal Setor</th>
                                        <th>Status Approval</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

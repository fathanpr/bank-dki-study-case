@extends('layouts.app')

@section('title', $title)

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">Form Pengajuan Pembukaan Rekening</div> --}}
                    <div class="card-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row d-flex">
                                    <label for="nama">Nama <span class="text-danger">*</span></label>
                                </div>
                                <div class="row d-flex mb-3">
                                    <small class="fw-bold" style="opacity: .3">Note : Nama tidak boleh mengandung simbol
                                        maupun
                                        angka, serta ditulis
                                        tanpa gelar apapun.</small>
                                </div>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
                                <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                <select class="form-control" name="provinsi" id="provinsi" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <select class="form-control" name="kota" id="kota" disabled>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
                                <select class="form-control" name="kecamatan" id="kecamatan" disabled>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
                                <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="jalan">Jalan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="jalan" id="jalan" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="RT">RT</label>
                                                <input type="text" class="form-control" name="rt" id="rt"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="RW">RW</label>
                                                <input type="text" class="form-control" name="rw" id="rw"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal_setor">Nominal Setor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nominal_setor" id="nominal_setor">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // LOADING USING SWAL
    let loadingSwal;
    function loadingSwalShow() {
        loadingSwal = Swal.fire({
            imageHeight: 300,
            showConfirmButton: false,
            title: '<i class="fas fa-sync-alt fa-spin" style="font-size:4rem"></i>',
            allowOutsideClick: false,
            background: 'rgba(0, 0, 0, 0)'
        });
    }

    function loadingSwalClose() {
        loadingSwal.close();
    }

    // SHOW TOAST
    function showToast(options) {
        const toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        toast.fire({
            icon: options.icon || "success",
            title: options.title
        });
    }

    

    // SELECT OPTION
    $('#jenis_kelamin').select2({
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Pilih Jenis Kelamin'
    });

    $('#pekerjaan').select2({
        theme: 'bootstrap4',
        width: '100%',
        placeholder: 'Pilih Pekerjaan',
        ajax: {
            url: base_url + "/ajax/get-pekerjaan",
            type: "post",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    search: params.term || "",
                    page: params.page || 1,
                };
            },
            cache: true,
        },
    });

    selectProvinsi();
    function selectProvinsi(){
        $('#provinsi').select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Pilih Provinsi',
            ajax: {
                url: base_url + "/ajax/get-provinsi",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term || "",
                        page: params.page || 1,
                    };
                },
                cache: true,
            },
        });
    };

    function selectKota(provinsiId){
        $('#kota').prop('disabled', false).select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Pilih kota',
            ajax: {
                url: base_url + "/ajax/get-kota",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term || "",
                        page: params.page || 1,
                        provinsiId: provinsiId
                    };
                },
                cache: true,
            },
        });
    }

    function selectKecamatan(kotaId){
        $('#kecamatan').prop('disabled', false).select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Pilih Kecamatan',
            ajax: {
                url: base_url + "/ajax/get-kecamatan",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term || "",
                        page: params.page || 1,
                        kotaId: kotaId
                    };
                },
                cache: true,
            },
        });
    }

    function selectKelurahan(kecamatanId){
        $('#kelurahan').prop('disabled', false).select2({
            theme: 'bootstrap4',
            width: '100%',
            placeholder: 'Pilih Kelurahan',
            ajax: {
                url: base_url + "/ajax/get-kelurahan",
                type: "post",
                dataType: "json",
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term || "",
                        page: params.page || 1,
                        kecamatanId: kecamatanId
                    };
                },
                cache: true,
            },
        });
    }

    //ON CHANGE EVENT
    function resetSelect2(element) {
        if (element.data('select2')) {
            element.empty().prop('disabled', true).select2('destroy');
        } else {
            element.empty();
        }
    }

    $('#provinsi').on('change', function(){
        var provinsiId = $(this).val();
        resetSelect2($('#kecamatan'));
        resetSelect2($('#kelurahan'));
        $('#kota').empty();
        selectKota(provinsiId);
    });

    $('#kota').on('change', function(){
        var kotaId = $(this).val();
        resetSelect2($('#kelurahan'));
        $('#kecamatan').empty();
        selectKecamatan(kotaId);
    });

    $('#kecamatan').on('change', function(){
        var kecamatanId = $(this).val();
        $('#kelurahan').val('').trigger('change');
        selectKelurahan(kecamatanId);
    })

    //RUPIAH FORMATTER
    $('#nominal_setor').on('input', function () {
        let value = $(this).val().replace(/[^0-9]/g, '');
        if (value.startsWith('0')) {
            value = value.substring(1);
        }
        if (value === '0') {
            value = '';
        }
        $(this).val(value ? 'Rp. ' + parseInt(value).toLocaleString('id-ID') : '');
    });

    //RT dan RW
    $('#rt, #rw').on('input', function () {
        let value = $(this).val().replace(/[^0-9]/g, '');
        $(this).val(value);
    });

    //RESET FORM
    function resetForm(){
        $('#nama').val('');
        $('#tempat_lahir').val('');
        $('#tanggal_lahir').val('');
        $('#jenis_kelamin').val('laki-laki').trigger('change');
        $('#pekerjaan, #provinsi').val(null).trigger('change');
        resetSelect2($('#kota'))
        resetSelect2($('#kecamatan'))
        resetSelect2($('#kelurahan'))
        $('#jalan').val('');
        $('#rt').val('');
        $('#rw').val('');
        $('#nominal_setor').val('');
    }

    //FORM SUBMIT
    $('form').on('submit', function (e) {
        e.preventDefault();
        loadingSwalShow();
        let url = base_url + '/pembukaan-rekening/store';
        let nominalSetor = $('#nominal_setor').val();
        var formData = new FormData($(this)[0]);
        
        function convertRupiahToNumber(rupiah) {
            return parseInt(rupiah.replace(/[^0-9]/g, ''), 10);
        }
        formData.set('nominal_setor', convertRupiahToNumber(nominalSetor));

        $.ajax({
            url: url,
            data: formData,
            method: "POST",
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                loadingSwalClose();
                showToast({ title: data.message });
                resetForm();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                loadingSwalClose();
                showToast({ icon: "error", title: jqXHR.responseJSON.message });
            },
        });
    });
});

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

    //DATATABLE KARYAWAN
    function refreshTable(){
        rekeningTable.search("").draw();
    }

    var columnsTable = [
        { data: "nama" },
        { data: "pekerjaan" },
        { data: "tempat_lahir" },
        { data: "tanggal_lahir" },
        { data: "alamat" },
        { data: "nominal_setor" },
        { data: "status_approval" },
        { data: "aksi" },
    ];

    var rekeningTable = $("#rekening-table").DataTable({
        search: {
            return: true,
        },
        order: [[0, "DESC"]],
        processing: true,
        serverSide: true,
        ajax: {
            url: base_url + "/approval-pembukaan-rekening/datatable",
            dataType: "json",
            type: "POST",
            data: function (dataFilter) {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.responseJSON.data) {
                    var error = jqXHR.responseJSON.data.error;
                    Swal.fire({
                        icon: "error",
                        title: " <br>Application error!",
                        html:
                            '<div class="alert alert-danger text-left" role="alert">' +
                            "<p>Error Message: <strong>" +
                            error +
                            "</strong></p>" +
                            "</div>",
                        allowOutsideClick: false,
                        showConfirmButton: true,
                    }).then(function () {
                        refreshTable();
                    });
                } else {
                    var message = jqXHR.responseJSON.message;
                    var errorLine = jqXHR.responseJSON.line;
                    var file = jqXHR.responseJSON.file;
                    Swal.fire({
                        icon: "error",
                        title: " <br>Application error!",
                        html:
                            '<div class="alert alert-danger text-left" role="alert">' +
                            "<p>Error Message: <strong>" +
                            message +
                            "</strong></p>" +
                            "<p>File: " +
                            file +
                            "</p>" +
                            "<p>Line: " +
                            errorLine +
                            "</p>" +
                            "</div>",
                        allowOutsideClick: false,
                        showConfirmButton: true,
                    }).then(function () {
                        refreshTable();
                    });
                }
            },
        },
        responsive: true,
        rowReorder: {
            selector: 'td:nth-child(2)'
        },

        columns: columnsTable,
        columnDefs: [
            {
                orderable: false,
                targets: [-1, -4],
            },
            {
                targets: [-2, -1],
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
        ],
    })

    //Approve & Change Status
    $('#rekening-table').on('click', '.btnApprove', function(){
        let idRekening = $(this).data('id-rekening');
        let url = base_url + '/approval-pembukaan-rekening/approve';

        Swal.fire({
            title: "Approve Rekening",
            text: "Apakah anda yakin untuk mengapprove rekening ini ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Approve Pengajuan Ini!",
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                loadingSwalShow();
                let formData = new FormData();
                formData.append('id_rekening', idRekening);
                $.ajax({
                    url: url, 
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        loadingSwalClose();
                        showToast({ title: data.message });
                        refreshTable();
                    },
                    error: function(jqXHR) {
                        loadingSwalClose();
                        showToast({ icon: "error", title: jqXHR.responseJSON.message });
                    }
                });
            }
        });
    })
});
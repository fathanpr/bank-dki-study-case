<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PengajuanController;



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'auth'], function () {

    //Ajax
    Route::group(['prefix' => 'ajax'], function () {
        Route::post('/get-provinsi', [AjaxController::class, 'get_provinsi']);
        Route::post('/get-kota', [AjaxController::class, 'get_kota']);
        Route::post('/get-kecamatan', [AjaxController::class, 'get_kecamatan']);
        Route::post('/get-kelurahan', [AjaxController::class, 'get_kelurahan']);
        Route::post('/get-pekerjaan', [AjaxController::class, 'get_pekerjaan']);
    });

    //Pengajuan Pembukaan Rekening
    Route::group(['prefix' => 'pembukaan-rekening'], function () {
        Route::get('/', [PengajuanController::class, 'index'])->name('pembukaan-rekening');
        Route::post('/store', [PengajuanController::class, 'store'])->name('pembukaan-rekening.store');
    });

    //Approval Pembukaan Rekening
    Route::group(['prefix' => 'approval-pembukaan-rekening'], function () {
        Route::get('/', [ApprovalController::class, 'index'])->name('approval-pembukaan-rekening');
        Route::post('/datatable', [ApprovalController::class, 'datatable'])->name('approval-pembukaan-rekening.datatable');
        Route::post('/approve', [ApprovalController::class, 'approve'])->name('approval-pembukaan-rekening.approve');
    });
});

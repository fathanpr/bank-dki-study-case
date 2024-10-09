<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pembukaan-rekening', [PengajuanController::class, 'index'])->name('pembukaan-rekening');
Route::get('/approval-pembukaan-rekening', [ApprovalController::class, 'index'])->name('approval-pembukaan-rekening');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



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

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;

Route::get('/', function () {
    return view('login_page');
});

Route::post('/login', [IndexController::class, 'login'])->name('login');
Route::get('/main_dashboard', [indexController::class, 'index'])->name('main_dashboard');
Route::get('/mahasiswa_swali', [indexController::class, 'indexMahasiswa'])->name('mahasiswa_wali');
Route::get('/mahasiswa_mengulang', [indexController::class, 'indexMengulang'])->name('mahasiswa_mengulang');
Route::get('/mahasiswa_watchList', [indexController::class, 'indexWatchList'])->name('mahasiswa_watchList');
Route::get('/profile_mhs', [indexController::class, 'indexProfile'])->name('profile_mhs');
<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\is_admin;
use App\Models\Pendaftaran;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Route;

Route::get('/', [PengumumanController::class, 'index'])->name('home');
Route::get('/home', [PengumumanController::class, 'index2']);

Route::get('/signup', [UserController::class, 'create']);
Route::post('/signup', [UserController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/wait', fn() => view('wait'))->name('wait');

Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/akun', [PendaftaranController::class, 'show'])->name('akun.show');
        
    Route::get('/pendaftaran', fn() => view('/Pendaftaran/pendaftaran', ["title" => "pendaftaran"]))->name('pendaftaran');
    Route::post('/store', [PendaftaranController::class, 'store']);
    
    Route::get('/', [PengumumanController::class, 'index'])->name('home');
    
    
});

Route::middleware(['is_admin'])->group(function () {
    Route::get('/updatestatus', [MahasiswaController::class, 'index']);
    Route::get('/updatestatus/{id}', [MahasiswaController::class, 'show']);
    Route::post('/updatestatus/{id}', [MahasiswaController::class, 'update']);

    Route::get('/pengumuman', fn() => view('/Pengumuman/pengumuman', ["title" => "pengumuman"]))->name('pengumuman')->middleware(is_admin::class);
    Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');

    Route::get('/{id}/edit', [PengumumanController::class, 'edit']);
    Route::put('/{id}', [PengumumanController::class, 'update']);
    Route::delete('/{id}', [PengumumanController::class, 'destroy']);

    Route::get('/updateakun', [UserController::class, 'show']);
    Route::post('/updateakun', [UserController::class, 'update']);
});
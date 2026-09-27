<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('home');
});

Route::resource('books', BukuController::class);
Route::resource('members', MemberController::class);

// --- TUGAS PERTEMUAN 2: Route Group /admin ---
Route::prefix('admin')->group(function () {
    Route::get('/info', function () {
        return 'Halaman Informasi Admin Perpustakaan Digital';
    });
});
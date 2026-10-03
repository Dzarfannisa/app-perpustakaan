<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController; // Tambahkan ini

Route::get('/', function () {
    return view('home');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BukuController::class);
Route::resource('members', MemberController::class);

Route::resource('loans', LoanController::class);
Route::post('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])->name('loans.kembalikan');

Route::prefix('admin')->group(function () {
    Route::get('/info', function () {
        return 'Halaman Informasi Admin Perpustakaan Digital';
    });
});
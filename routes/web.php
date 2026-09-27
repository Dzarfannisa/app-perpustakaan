<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('home');
});

Route::resource('books', BukuController::class);
Route::resource('members', MemberController::class);
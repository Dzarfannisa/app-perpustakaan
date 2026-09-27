<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('books.index');
    }

    public function create()
    {
        return view('books.create');
    }
}
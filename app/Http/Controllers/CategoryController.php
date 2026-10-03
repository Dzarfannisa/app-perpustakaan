<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    // Method store ditaruh di sini (di dalam class):
    public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
    ]);

    Category::create([
        'name' => $request->nama_kategori, // Petakan nama_kategori ke kolom 'name' di database
    ]);

    return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
}
}
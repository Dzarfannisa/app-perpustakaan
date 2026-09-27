<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
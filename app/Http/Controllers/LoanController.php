<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'book'])->latest()->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function show($id)
    {
        $loan = Loan::with(['member', 'book'])->findOrFail($id);
        return view('loans.show', compact('loan'));
    }

    // Method untuk fitur "Kembalikan Buku"
    public function kembalikan($id)
    {
        $loan = Loan::findOrFail($id);

        $loan->update([
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => now()->toDateString(),
        ]);

        return redirect()->route('loans.index')->with('success', 'Buku berhasil dikembalikan!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    public function index()
    {
        // Ambil semua data anggota dari database
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        // Simpan data inputan ke database
        Member::create($request->validated());

        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }
}
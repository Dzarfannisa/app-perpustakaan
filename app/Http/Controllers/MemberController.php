<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;

class MemberController extends Controller
{
    public function index()
    {
        return view('members.index');
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        return redirect()->route('members.index')->with('success', 'Data anggota berhasil disimpan!');
    }
}
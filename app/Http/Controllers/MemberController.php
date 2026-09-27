<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $members = Member::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('nim', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('members.index', compact('members', 'search'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        Member::create($request->validated());
        return redirect()->route('members.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|unique:members,nim,' . $member->id,
            'email'         => 'required|email|unique:members,email,' . $member->id,
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|in:Aktif,Non-Aktif',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
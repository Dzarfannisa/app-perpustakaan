<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'          => 'required|string|max:255',
            'nim'           => 'required|string|max:50',
            'email'         => 'required|email',
            'nomor_telepon' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'status'        => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'          => 'Nama anggota wajib diisi.',
            'nim.required'           => 'NIM wajib diisi.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'status.required'        => 'Status anggota wajib dipilih.',
        ];
    }
}
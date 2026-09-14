<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan untuk membuat request ini.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Dapatkan aturan validasi yang berlaku untuk request ini.
     */
    public function rules(): array
    {
        // Menangkap objek user atau ID user dari rute URL secara aman
        $user = $this->route('user');
        $userId = is_object($user) ? $user->id : $user;

        return [
            'name'      => 'required|string|max:100',
            'email'     => [
                'required',
                'email',
                // PENTING: Menggunakan tanda -> bukan => agar tidak memicu error global
                Rule::unique('users')->ignore($userId),
            ],
            'password'  => 'nullable|min:8',
            'role_id'   => 'required',
            'is_active' => 'nullable'
        ];
    }

    /**
     * Kostumisasi pesan error jika validasi gagal.
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'Nama wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email ini sudah digunakan oleh akun lain.',
            'password.min'      => 'Password baru minimal harus 8 karakter.',
            'role_id.required'  => 'Role wajib dipilih.',
        ];
    }
}

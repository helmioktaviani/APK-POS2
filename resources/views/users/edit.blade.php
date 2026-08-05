@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<h1>Edit Akun User</h1>

<div style="background: #fff; padding: 30px; border: 1px solid #dee2e6; border-radius: 8px; max-width: 600px; box-shadow: 0 2px 4px rgba(0,0,0,.02);">
    <!-- Mengarah ke route update, pastikan menggunakan method POST dan dibantu @method('POST') sesuai file web.php Anda -->
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf

        <!-- NAMA -->
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" required>
        </div>

        <!-- EMAIL -->
        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Alamat Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" required>
        </div>

        <!-- PASSWORD CADANGAN -->
        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Password Baru (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" id="password" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" placeholder="Masukkan password baru">
        </div>

        <!-- PILIHAN ROLE -->
        <div style="margin-bottom: 25px;">
            <label for="role_id" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Role / Hak Akses</label>
            <select name="role_id" id="role_id" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; background-color: #fff;" required>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <button type="submit" class="btn btn-primary">Update Akun</button>
            <a href="{{ route('admin.users') }}" class="btn btn-warning" style="text-decoration: none;">Kembali</a>
        </div>
    </form>
</div>

@endsection

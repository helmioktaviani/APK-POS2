@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

<h1>Edit Produk</h1>

<div style="background: #fff; padding: 30px; border: 1px solid #dee2e6; border-radius: 8px; max-width: 600px; box-shadow: 0 2px 4px rgba(0,0,0,.02);">
    <form action="{{ route('produk.update', $produk) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- FOTO SAAT INI -->
        <div class="mb-3" style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Foto Saat Ini</label>
            @if($produk->foto)
                <img src="{{ asset('storage/'.$produk->foto) }}" width="120" style="display: block; margin-bottom: 10px; border: 1px solid #dee2e6; padding: 5px; border-radius: 4px;">
            @else
                <span style="color: #6c757d; font-style: italic; display: block; margin-bottom: 10px;">Tidak ada foto</span>
            @endif
        </div>

        <!-- INPUT UPLOAD GAMBAR -->
        <div class="mb-3" style="margin-bottom: 20px;">
            <label for="foto" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Ganti Gambar</label>
            <input type="file" name="foto" id="foto" class="form-control" style="width: 100%; box-sizing: border-box;">
        </div>

        <!-- INPUT NAMA PRODUK -->
        <div class="mb-3" style="margin-bottom: 20px;">
            <label for="nama" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Nama Produk</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $produk->nama) }}" class="form-control" style="width: 100%; box-sizing: border-box;" required>
        </div>

        <!-- INPUT HARGA BELI -->
        <div class="mb-3" style="margin-bottom: 20px;">
            <label for="harga_beli" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Harga Beli</label>
            <input type="number" name="harga_beli" id="harga_beli" value="{{ old('harga_beli', $produk->harga_beli) }}" class="form-control" style="width: 100%; box-sizing: border-box;" required>
        </div>

        <!-- INPUT HARGA JUAL -->
        <div class="mb-3" style="margin-bottom: 20px;">
            <label for="harga_jual" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Harga Jual</label>
            <input type="number" name="harga_jual" id="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}" class="form-control" style="width: 100%; box-sizing: border-box;" required>
        </div>

        <!-- INPUT STOK -->
        <div class="mb-3" style="margin-bottom: 25px;">
            <label for="stok" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', $produk->stok) }}" class="form-control" style="width: 100%; box-sizing: border-box;" required>
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('produk.index') }}" class="btn btn-warning" style="text-decoration: none;">Kembali</a>
        </div>
    </form>
</div>

@endsection

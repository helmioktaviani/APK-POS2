@extends('layouts.app')

@section('title', 'Tambah Penjualan')

@section('content')

<h1>Tambah Transaksi Penjualan</h1>

<div style="background: #fff; padding: 30px; border: 1px solid #dee2e6; border-radius: 8px; max-width: 600px; box-shadow: 0 2px 4px rgba(0,0,0,.02);">
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <!-- INPUT TOTAL PEMBAYARAN -->
        <div style="margin-bottom: 20px;">
            <label for="total_pembayaran" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Total Pembayaran (Rp)</label>
            <input type="number" name="total_pembayaran" id="total_pembayaran" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" placeholder="Contoh: 50000" required>
        </div>

        <!-- PILIHAN METODE PEMBAYARAN -->
        <div style="margin-bottom: 20px;">
            <label for="metode_pembayaran" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; background-color: #fff;" required>
                <option value="">-- Pilih Metode --</option>
                <option value="tunai">Tunai (Cash)</option>
                <option value="non-tunai">Non-Tunai (QRIS/Transfer)</option>
            </select>
        </div>

        <!-- PILIHAN STATUS -->
        <div style="margin-bottom: 25px;">
            <label for="status" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Status Pembayaran</label>
            <select name="status" id="status" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; background-color: #fff;" required>
                <option value="selesai">Selesai</option>
                <option value="pending">Pending</option>
            </select>
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-warning" style="text-decoration: none;">Kembali</a>
        </div>
    </form>
</div>

@endsection

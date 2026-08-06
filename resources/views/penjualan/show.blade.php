@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detail Transaksi #{{ $penjualan->id }}</h1>
        <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Transaksi</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Tanggal:</strong> {{ $penjualan->created_at->translatedFormat('d-m-Y H:i:s') }}</p>
                    <p><strong>Kasir:</strong> {{ $penjualan->user->name ?? 'Sistem' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Metode Pembayaran:</strong> <span class="badge bg-info text-dark">{{ $penjualan->metode_pembayaran }}</span></p>
                    <p><strong>Status:</strong> <span class="badge bg-success">{{ $penjualan->status }}</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Daftar Produk Yang Dibeli</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th class="text-end">Harga Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penjualan->itemPenjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->produk->nama ?? 'Produk Telah Dihapus' }}</td>
                            <td class="text-end">Rp {{ number_format($item->harga ?? 0) }}</td>
                            <td class="text-center">{{ $item->jumlah }}</td>
                            <td class="text-end">Rp {{ number_format(($item->harga ?? 0) * $item->jumlah) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada rincian item untuk transaksi ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="table-lightfw-bold">
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total Pembayaran:</strong></td>
                            <td class="text-end text-primary"><strong>Rp {{ number_format($penjualan->total_pembayaran) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

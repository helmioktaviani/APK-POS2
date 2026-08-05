@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@if(session('errors'))
    <div class="alert alert-danger">
        {{ session('errors') }}
    </div>
@endif

<h1>Daftar Transaksi Penjualan</h1>

<a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Create</a>

<form action="{{ route('penjualan.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search penjualan"
        >
        <button class="btn btn-outline-secondary" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($penjualan as $sale)
        <tr>
            <th scope="row">{{ $penjualan->firstItem() + $loop->index }}</th>
            <td>{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
            <td>{{ $sale->user->name ?? 'Sistem' }}</td>
            <td>Rp {{ number_format($sale->total_pembayaran) }}</td>
            <td>{{ $sale->metode_pembayaran }}</td>
            <td>{{ $sale->status }}</td>
            <td class="d-flex gap-1">
                <a href="" class="btn btn-sm btn-primary">Detail</a>
                
                @can('update', $sale)
                <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan
                
                <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-muted py-4">Data Tidak Ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $penjualan->links() }}

@endsection

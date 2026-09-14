@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<style>
    h1 {
        font-size: 20px;
        font-weight: 600;
        padding-left: 10px;
        border-left: 5px solid #89D7B7;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #89D7B7;
        border-color: #89D7B7;
        color: #1f2d27;
        font-weight: 600;
    }
    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #6fc7a2;
        border-color: #6fc7a2;
        color: #1f2d27;
    }
    .btn-primary:active {
        background-color: #5ab88f !important;
        border-color: #5ab88f !important;
    }

    .form-control:focus {
        border-color: #89D7B7;
        box-shadow: 0 0 0 0.2rem rgba(137, 215, 183, 0.35);
    }

    .btn-outline-secondary {
        border-color: #89D7B7;
        color: #1f2d27;
    }
    .btn-outline-secondary:hover {
        background-color: #89D7B7;
        border-color: #89D7B7;
        color: #1f2d27;
    }

    .table thead th {
        background-color: #eafaf3;
        color: #1f2d27;
        border-bottom: 2px solid #89D7B7;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: #f2fbf7;
    }

    .pagination .page-link {
        color: #1f2d27;
    }
    .pagination .page-item.active .page-link {
        background-color: #89D7B7;
        border-color: #89D7B7;
        color: #1f2d27;
    }
    .pagination .page-link:hover {
        background-color: #eafaf3;
        border-color: #89D7B7;
    }
</style>

<h1>Halaman Produk</h1>

{{-- PERBAIKAN: Fungsi @can dihapus agar tombol Create selalu muncul --}}
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Create</a>

<form action="{{ route('produk.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="Search nama produk"
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
            <th scope="col">User</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produk as $product)
        <tr>
            <th scope="row">{{ $produk->firstItem() + $loop->index }}</th>
            <td>{{ $product->user->name ?? 'Tidak ada user' }}</td>
            <td>
                {{-- PERBAIKAN: Mengecek apakah file foto benar-benar ada di storage fisik --}}
                @if($product->foto && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->foto))
                    <img src="{{ asset('storage/'.$product->foto) }}" width="50" class="img-thumbnail">
                @else
                    {{-- Ikon alternatif jika data gambar kosong atau rusak akibat seeder --}}
                    <span class="badge bg-secondary">No Photo</span>
                @endif
            </td>
            <td>{{ $product->nama }}</td>
            <td>Rp {{ number_format($product->harga_beli) }}</td>
            <td>Rp {{ number_format($product->harga_jual) }}</td>
            <td>{{ $product->stok }}</td>
            <td>
                <div class="d-flex gap-1">
                    {{-- PERBAIKAN: Fungsi @can dihapus agar tombol Edit selalu bisa diakses --}}
                    <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>

                    {{-- PERBAIKAN: Fungsi @can dihapus agar tombol Hapus selalu bisa diakses --}}
                    <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline m-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center text-muted py-4">Data tidak tersedia.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $produk->links() }}

@endsection

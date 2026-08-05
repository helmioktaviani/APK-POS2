@extends('layouts.app')

@section('title', 'Produk')

@section('content')

<h1>Halaman Produk</h1>

@can('create', App\Models\Produk::class)
<a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Create</a>
@endcan

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
                @if($product->foto)
                    <img src="{{ asset('storage/'.$product->foto) }}" width="50" class="img-thumbnail">
                @else
                    <span class="text-muted">No Photo</span>
                @endif
            </td>
            <td>{{ $product->nama }}</td>
            <td>Rp {{ number_format($product->harga_beli) }}</td>
            <td>Rp {{ number_format($product->harga_jual) }}</td>
            <td>{{ $product->stok }}</td>
            <td class="d-flex gap-1">
                @can('update', $product)
                <a href="{{ route('produk.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan
                
                @can('delete', $product)
                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                        Hapus
                    </button>
                </form>
                @endcan
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

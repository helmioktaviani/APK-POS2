<!-- memanggil file app.blade.php -->
@extends('layouts.app')

<!-- mengirimkan nilai ke title untuk ditampilkan -->
@section('title', 'Dashboard')

<!-- batas awal isi konten -->
@section('content')

<!-- GAYA TAMBAHAN MANDIRI UNTUK KOLOM DASHBOARD -->
<style>
    .grid-2 { display: flex; gap: 20px; margin-bottom: 20px; }
    .grid-item { flex: 1; min-width: 0; }
    .card-box { background: #fff; padding: 20px; border: 1px solid #dee2e6; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,.02); }
    .card-title-text { font-weight: 600; color: #6c757d; margin-bottom: 10px; font-size: 14px; }
    .card-value { margin: 0; color: #212529; font-size: 24px; font-weight: bold; }
    h2 { font-size: 20px; font-weight: 600; margin-top: 25px; margin-bottom: 15px; color: #212529; }
</style>

<div>
    <h1 style="margin-bottom: 25px; font-size: 28px;">
        Ringkasan Hari Ini
        <small class="text-muted" style="font-size: 1.5rem; font-weight: normal; color: #6c757d;">
            ({{ $tanggalHariIni->translatedFormat('l, d F Y') }})
        </small>
    </h1>

    @can('viewAny', App\Models\User::class)
    <!-- SEKTOR 1: TODAY'S SALES -->
    <h2>Today's Sales</h2>
    <div class="grid-2">
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total Nilai Penjualan Hari Ini</div>
                <h3 class="card-value">Rp {{ number_format($ringkasan['total_penjualan']) }}</h3>
            </div>
        </div>
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Jumlah Transaksi Hari Ini</div>
                <h3 class="card-value">{{ $ringkasan['total_transaksi'] }}</h3>
            </div>
        </div>
    </div>

    <!-- SEKTOR 2: CASH & PAYMENT STATUS -->
    <h2>Cash & Payment Status</h2>
    <div class="grid-2">
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total pembayaran tunai</div>
                <h3 class="card-value">Rp {{ number_format($ringkasan['total_cash']) }}</h3>
            </div>
        </div>
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total pembayaran non-tunai</div>
                <h3 class="card-value">Rp {{ number_format($ringkasan['total_non_tunai']) }}</h3>
            </div>
        </div>
    </div>
    @endcan

    <!-- SEKTOR 3: CRITICAL INVENTORY STATUS -->
    <h2>Critical Inventory Status</h2>
    <div class="grid-2">
        <div class="grid-item">
            <h3 style="font-size: 16px; margin-bottom: 10px;">Daftar produk stok rendah</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkStokRendah as $index => $produk)
                        <tr>
                            <td>{{ $produkStokRendah->firstItem() + $index }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $produkStokRendah->links() }}
        </div>

        <div class="grid-item">
            <h3 style="font-size: 16px; margin-bottom: 10px;">Produk habis stok</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkStokHabis as $index => $produk)
                        <tr>
                            <td>{{ $produkStokHabis->firstItem() + $index }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $produkStokHabis->links() }}
        </div>
    </div>

    <!-- SEKTOR 4: BEST SELLER PRODUCTS -->
    <h2>Best Seller Products</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Unit Terjual</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produkTerlaris as $produk)
                <tr>
                    <td>{{ $produk->nama }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>{{ $produk->total_terjual }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                        Tidak ada data penjualan hari ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- batas Akhir isi konten -->
@endsection

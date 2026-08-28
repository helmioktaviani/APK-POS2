<!-- memanggil file app.blade.php -->


<!-- mengirimkan nilai ke title untuk ditampilkan -->
<?php $__env->startSection('title', 'Dashboard'); ?>

<!-- batas awal isi konten -->
<?php $__env->startSection('content'); ?>

<!-- GAYA TAMBAHAN MANDIRI UNTUK KOLOM DASHBOARD -->
<style>
    .grid-2 { display: flex; gap: 20px; margin-bottom: 20px; }
    .grid-item { flex: 1; min-width: 0; }

    .card-box {
        background: #fff;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-left: 4px solid #89D7B7;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,.02);
        transition: box-shadow .2s ease;
    }
    .card-box:hover {
        box-shadow: 0 4px 10px rgba(137, 215, 183, .25);
    }

    .card-title-text { font-weight: 600; color: #6c757d; margin-bottom: 10px; font-size: 14px; }
    .card-value { margin: 0; color: #212529; font-size: 24px; font-weight: bold; }

    h2 {
        font-size: 20px;
        font-weight: 600;
        margin-top: 25px;
        margin-bottom: 15px;
        color: #212529;
        padding-left: 10px;
        border-left: 5px solid #89D7B7;
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

<div>
    <h1 style="margin-bottom: 25px; font-size: 28px;">
        Ringkasan Hari Ini
        <small class="text-muted" style="font-size: 1.5rem; font-weight: normal; color: #6c757d;">
            (<?php echo e($tanggalHariIni->translatedFormat('l, d F Y')); ?>)
        </small>
    </h1>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewAny', App\Models\User::class)): ?>
    <!-- SEKTOR 1: TODAY'S SALES -->
    <h2>Today's Sales</h2>
    <div class="grid-2">
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total Nilai Penjualan Hari Ini</div>
                <h3 class="card-value">Rp <?php echo e(number_format($ringkasan['total_penjualan'])); ?></h3>
            </div>
        </div>
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Jumlah Transaksi Hari Ini</div>
                <h3 class="card-value"><?php echo e($ringkasan['total_transaksi']); ?></h3>
            </div>
        </div>
    </div>

    <!-- SEKTOR 2: CASH & PAYMENT STATUS -->
    <h2>Cash & Payment Status</h2>
    <div class="grid-2">
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total pembayaran tunai</div>
                <h3 class="card-value">Rp <?php echo e(number_format($ringkasan['total_cash'])); ?></h3>
            </div>
        </div>
        <div class="grid-item">
            <div class="card-box">
                <div class="card-title-text">Total pembayaran non-tunai</div>
                <h3 class="card-value">Rp <?php echo e(number_format($ringkasan['total_non_tunai'])); ?></h3>
            </div>
        </div>
    </div>
    <?php endif; ?>

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
                    <?php $__empty_1 = true; $__currentLoopData = $produkStokRendah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($produkStokRendah->firstItem() + $index); ?></td>
                            <td><?php echo e($produk->nama); ?></td>
                            <td><?php echo e($produk->stok); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($produkStokRendah->links()); ?>

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
                    <?php $__empty_1 = true; $__currentLoopData = $produkStokHabis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($produkStokHabis->firstItem() + $index); ?></td>
                            <td><?php echo e($produk->nama); ?></td>
                            <td><?php echo e($produk->stok); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                                Seluruh produk berada dalam kondisi stok aman.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($produkStokHabis->links()); ?>

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
            <?php $__empty_1 = true; $__currentLoopData = $produkTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($produk->nama); ?></td>
                    <td><?php echo e($produk->stok); ?></td>
                    <td><?php echo e($produk->total_terjual); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="text-muted text-center" style="padding: 15px;">
                        Tidak ada data penjualan hari ini.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- batas Akhir isi konten -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2-1\resources\views/dashboard.blade.php ENDPATH**/ ?>
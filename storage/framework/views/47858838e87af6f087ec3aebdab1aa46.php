

<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detail Transaksi #<?php echo e($penjualan->id); ?></h1>
        <a href="<?php echo e(route('penjualan.index')); ?>" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Informasi Transaksi</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Tanggal:</strong> <?php echo e($penjualan->created_at->translatedFormat('d-m-Y H:i:s')); ?></p>
                    <p><strong>Kasir:</strong> <?php echo e($penjualan->user->name ?? 'Sistem'); ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Metode Pembayaran:</strong> <span class="badge bg-info text-dark"><?php echo e($penjualan->metode_pembayaran); ?></span></p>
                    <p><strong>Status:</strong> <span class="badge bg-success"><?php echo e($penjualan->status); ?></span></p>
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
                        <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->produk->nama ?? 'Produk Telah Dihapus'); ?></td>
                            <td class="text-end">Rp <?php echo e(number_format($item->harga ?? 0)); ?></td>
                            <td class="text-center"><?php echo e($item->jumlah); ?></td>
                            <td class="text-end">Rp <?php echo e(number_format(($item->harga ?? 0) * $item->jumlah)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada rincian item untuk transaksi ini.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot class="table-lightfw-bold">
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total Pembayaran:</strong></td>
                            <td class="text-end text-primary"><strong>Rp <?php echo e(number_format($penjualan->total_pembayaran)); ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/penjualan/show.blade.php ENDPATH**/ ?>
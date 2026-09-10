 

<?php $__env->startSection('title', 'Penjualan'); ?> 

<?php $__env->startSection('content'); ?> 

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

<?php if(session('errors')): ?> 
<div class="alert alert-danger"> 
    <?php echo e(session('errors')); ?> 
</div> 
<?php endif; ?> 

<h1>Daftar Transaksi Penjualan</h1> 
<a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-primary mb-3">Create</a> 

<form action="<?php echo e(route('penjualan.index')); ?>" method="GET" class="mb-3"> 
    <div class="input-group"> 
        <input type="text" name="search" value="<?php echo e(request()->search); ?>" class="form-control" placeholder="Search penjualan"> 
        <button class="btn btn-outline-secondary" type="submit"> Search </button> 
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
        <?php $__empty_1 = true; $__currentLoopData = $penjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
        <tr> 
            <th scope="row"><?php echo e($penjualan->firstItem() + $loop->index); ?></th> 
            <td><?php echo e($sale->created_at->translatedFormat('d-m-Y H:i:s')); ?></td> 
            <td><?php echo e($sale->user->name ?? 'Sistem'); ?></td> 
            <td>Rp <?php echo e(number_format($sale->total_pembayaran)); ?></td> 
            <td><?php echo e($sale->metode_pembayaran); ?></td> 
            <td><?php echo e($sale->status); ?></td> 
            <td class="d-flex gap-1"> 
                <a href="<?php echo e(route('penjualan.show', $sale)); ?>" class="btn btn-sm btn-primary">Detail</a> 
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $sale)): ?> 
                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" class="btn btn-sm btn-warning">Edit</a> 
                <?php endif; ?> 
                
                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>" method="POST" class="d-inline"> 
                    <?php echo csrf_field(); ?> 
                    <?php echo method_field('DELETE'); ?> 
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')"> Hapus </button> 
                </form> 
            </td> 
        </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
        <tr> 
            <td colspan="7" class="text-center text-muted py-4">Data Tidak Ditemukan</td> 
        </tr> 
        <?php endif; ?> 
    </tbody> 
</table> 

<?php echo e($penjualan->links()); ?> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/penjualan/index.blade.php ENDPATH**/ ?>
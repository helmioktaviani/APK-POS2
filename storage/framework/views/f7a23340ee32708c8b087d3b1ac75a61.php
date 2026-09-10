

<?php $__env->startSection('title', 'Produk'); ?>

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

<h1>Halaman Produk</h1>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
<a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary mb-3">Create</a>
<?php endif; ?>

<form action="<?php echo e(route('produk.index')); ?>" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="<?php echo e(request('search')); ?>"
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
        <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <th scope="row"><?php echo e($produk->firstItem() + $loop->index); ?></th>
            <td><?php echo e($product->user->name ?? 'Tidak ada user'); ?></td>
            <td>
                <?php if($product->foto): ?>
                    <img src="<?php echo e(asset('storage/'.$product->foto)); ?>" width="50" class="img-thumbnail">
                <?php else: ?>
                    <span class="text-muted">No Photo</span>
                <?php endif; ?>
            </td>
            <td><?php echo e($product->nama); ?></td>
            <td>Rp <?php echo e(number_format($product->harga_beli)); ?></td>
            <td>Rp <?php echo e(number_format($product->harga_jual)); ?></td>
            <td><?php echo e($product->stok); ?></td>
            <td class="d-flex gap-1">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>
                <a href="<?php echo e(route('produk.edit', $product)); ?>" class="btn btn-sm btn-warning">Edit</a>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>
                <form action="<?php echo e(route('produk.destroy', $product)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                        Hapus
                    </button>
                </form>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="8" class="text-center text-muted py-4">Data tidak tersedia.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php echo e($produk->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/produk/index.blade.php ENDPATH**/ ?>
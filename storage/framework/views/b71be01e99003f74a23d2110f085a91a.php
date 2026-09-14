 

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <h4 class="mb-0">Tambah Produk</h4>
        </div>
        <div class="card-body">
            
            
            <form action="<?php echo e(route('produk.store')); ?>" method="POST" enctype="multipart/form-data">
                
                <?php echo $__env->make('produk._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/produk/create.blade.php ENDPATH**/ ?>
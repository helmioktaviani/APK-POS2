

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>

<h1>Edit Akun User</h1>

<div style="background: #fff; padding: 30px; border: 1px solid #dee2e6; border-radius: 8px; max-width: 600px; box-shadow: 0 2px 4px rgba(0,0,0,.02);">
    <!-- Mengarah ke route update, pastikan menggunakan method POST dan dibantu <?php echo method_field('POST'); ?> sesuai file web.php Anda -->
    <form action="<?php echo e(route('admin.users.update', $user)); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- NAMA -->
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Nama Lengkap</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name', $user->name)); ?>" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" required>
        </div>

        <!-- EMAIL -->
        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Alamat Email</label>
            <input type="email" name="email" id="email" value="<?php echo e(old('email', $user->email)); ?>" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" required>
        </div>

        <!-- PASSWORD CADANGAN -->
        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Password Baru (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" id="password" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;" placeholder="Masukkan password baru">
        </div>

        <!-- PILIHAN ROLE -->
        <div style="margin-bottom: 25px;">
            <label for="role_id" style="display: block; font-weight: 600; margin-bottom: 8px; color: #495057;">Role / Hak Akses</label>
            <select name="role_id" id="role_id" class="form-control" style="width: 100%; padding: 8px 12px; border: 1px solid #ced4da; border-radius: 4px; background-color: #fff;" required>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>" <?php echo e($user->role_id == $role->id ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($role->name)); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- TOMBOL AKSI -->
        <div style="display: flex; gap: 10px; align-items: center;">
            <button type="submit" class="btn btn-primary">Update Akun</button>
            <a href="<?php echo e(route('admin.users')); ?>" class="btn btn-warning" style="text-decoration: none;">Kembali</a>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/users/edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Users'); ?>

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

<h1>Halaman Users</h1>
<a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary mb-3">Create</a>

<form action="<?php echo e(route('admin.users')); ?>" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="<?php echo e(request('search')); ?>"
            class="form-control"
            placeholder="Search username or email"
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($users->firstItem() + $loop->index); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->role->name); ?></td>
            <td>
                <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-sm btn-warning">
                    Edit Akun
                </a>
                ||
                <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo e($users->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/users/index.blade.php ENDPATH**/ ?>
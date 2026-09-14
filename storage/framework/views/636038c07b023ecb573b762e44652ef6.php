<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $__env->yieldContent('title', 'Toko Kosmetik'); ?></title>

    <!-- CSS GABUNGAN AMAN DENGAN PERBAIKAN PAGINATION MENYAMPING -->
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 0; }
        .container { width: 85%; margin: 0 auto; max-width: 1200px; }
        
        /* NAVBAR STYLE */
        .navbar { background-color: #ffffff; border-bottom: 1px solid #dee2e6; box-shadow: 0 2px 4px rgba(0,0,0,.04); padding: 15px 0; margin-bottom: 20px; }
        .navbar-wrapper { display: flex; align-items: center; justify-content: space-between; width: 100%; }
        .navbar-left { display: flex; align-items: center; }
        .navbar-brand { font-weight: bold; font-size: 22px; color: #212529; text-decoration: none; margin-right: 40px; }
        .navbar-nav { list-style: none; display: flex; flex-direction: row; margin: 0; padding: 0; align-items: center; }
        .nav-item { margin-right: 25px; }
        .nav-link { color: #6c757d; text-decoration: none; font-size: 16px; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: #212529; font-weight: 600; }
        
        /* LOGOUT BUTTON */
        .btn-logout { background-color: transparent; color: #dc3545; border: 1px solid #dc3545; padding: 6px 14px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: 500; }
        .btn-logout:hover { background-color: #dc3545; color: #fff; }
        
        /* CONTENT STYLE umum */
        .mt-4 { margin-top: 2rem; }
        .mb-3 { margin-bottom: 1rem; }
        h1 { font-size: 28px; font-weight: 600; color: #212529; margin-bottom: 20px; }
        
        /* TABLE STYLE BERGARIS RAPI */
        .table { width: 100%; margin-top: 15px; margin-bottom: 1rem; color: #212529; border-collapse: collapse; background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,.02); border-radius: 4px; overflow: hidden; }
        .table th, .table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #dee2e6; }
        .table th { background-color: #f1f3f5; font-weight: 600; color: #495057; }
        .table tr:hover { background-color: #f8f9fa; }
        .d-inline { display: inline; }

        /* BUTTONS WARNA-WARNI STANDARD */
        .btn { display: inline-block; padding: 8px 16px; font-size: 14px; font-weight: 500; border-radius: 4px; text-decoration: none; text-align: center; border: 1px solid transparent; cursor: pointer; }
        .btn-primary { background-color: #0d6efd; color: #fff; }
        .btn-warning { background-color: #ffc107; color: #212529; }
        .btn-danger { background-color: #dc3545; color: #fff; padding: 4px 10px; }
        .btn-sm { padding: 4px 10px; font-size: 13px; margin: 2px; }

        /* --- KODE FIX PAGINATION BULLET POINT (MEMAKSA HORIZONTAL) --- */
        nav[role="navigation"], .pagination { display: block !important; margin-top: 20px !important; }
        nav[role="navigation"] ul, .pagination ul { display: flex !important; flex-direction: row !important; list-style: none !important; padding: 0 !important; margin: 10px 0 !important; gap: 5px !important; }
        nav[role="navigation"] li, .pagination li { display: inline-block !important; list-style: none !important; padding: 0 !important; margin: 0 !important; }
        nav[role="navigation"] a, nav[role="navigation"] span, .pagination a, .pagination span { display: inline-block !important; padding: 6px 12px !important; background: #ffffff !important; border: 1px solid #dee2e6 !important; color: #0d6efd !important; text-decoration: none !important; border-radius: 4px !important; font-size: 14px !important; }
        nav[role="navigation"] .active span, nav[role="navigation"] span[aria-current="page"], .pagination .active span { background-color: #0d6efd !important; color: #ffffff !important; border-color: #0d6efd !important; font-weight: bold !important; }
        .flex.justify-between.flex-1 { display: none !important; }
        nav[role="navigation"] p.text-sm { display: block !important; margin-bottom: 5px !important; color: #6c757d !important; }
    </style>
</head>
<body>

    <!-- NAVBAR UTAMA -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-wrapper">
                <div class="navbar-left">
                    <a class="navbar-brand" href="/dashboard">TOKO KOSMETIK</a>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                        </li>
                        
                        <!-- PERBAIKAN: Hanya tampilkan menu Users jika role_id adalah 1 (Admin) -->
                        <?php if(auth()->user()->role_id == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users')); ?>">Users</a>
                        </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('produk*') ? 'active' : ''); ?>" href="<?php echo e(route('produk.index')); ?>">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('penjualan*') ? 'active' : ''); ?>" href="<?php echo e(route('penjualan.index')); ?>">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('tentang-kami*') ? 'active' : ''); ?>" href="<?php echo e(route('tentang.kami')); ?>">Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="margin: 0;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\APK-POS2\resources\views/layouts/app.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-P5MgJ1pFuF5QfsxginJv34g7t27ecx0pXWzpclP6Z8YTZ6vTRkdW+S9iBY2V+ox"
            crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ZO3VYJ9VHtV6nRvWmvMRGsiE232zraFMvx6bMpiKFF9volG/Gp2gbf28pQ5e0M1"
            crossorigin="anonymous"></script>

</body>
</html>
<?php /**PATH C:\laragon\www\APK_POS\resources\views/layouts/app.blade.php ENDPATH**/ ?>
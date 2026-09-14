

<?php $__env->startSection('title', 'Tentang Kami'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm" style="background: #ffffff; border: 1px solid #dee2e6; border-radius: 8px;">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0 fw-bold text-primary">Tentang Kami</h4>
        </div>
        <div class="card-body p-4">
            
            <table class="table table-borderless m-0" style="max-width: 600px; font-size: 16px;">
                <tr>
                    <!-- Padding vertikal dinaikkan menjadi 20px agar jarak atas-bawah baris lebih renggang lagi -->
                    <td class="fw-bold text-secondary" style="padding: 20px 40px 20px 0; width: 150px;">Nama</td>
                    <td style="padding: 20px 30px 20px 0; width: 20px;">:</td>
                    <td class="fw-semibold text-dark" style="padding: 20px 0;">[HELMI OKTAVIANI]</td>
                </tr>
                <tr>
                    <td class="fw-bold text-secondary" style="padding: 20px 40px 20px 0;">Kelas</td>
                    <td style="padding: 20px 30px 20px 0;">:</td>
                    <td class="text-dark" style="padding: 20px 0;">[XII PPLG 3]</td>
                </tr>
                <tr>
                    <td class="fw-bold text-secondary" style="padding: 20px 40px 20px 0;">Tanggal Lahir</td>
                    <td style="padding: 20px 30px 20px 0;">:</td>
                    <td class="text-dark" style="padding: 20px 0;">[02 10 2009 OKTOBER]</td>
                </tr>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK-POS2\resources\views/tentang-kami.blade.php ENDPATH**/ ?>


<?php $__env->startSection('title', 'Tentang Kami'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card p-5 shadow-sm" style="background: #ffffff; border: 1px solid #dee2e6; border-radius: 8px;">
        <div class="card-body p-4">
            
            <!-- Judul dipaksa ke tengah menggunakan style text-align dan diberi jarak bawah 40px -->
            <h4 class="fw-bold text-primary" style="text-align: center !important; margin-bottom: 40px !important; display: block; width: 100%;">Tentang Kami</h4>
            
            <!-- Tabel dipaksa ke tengah menggunakan margin: 0 auto !important -->
            <table class="table table-borderless" style="max-width: 600px; font-size: 16px; margin: 0 auto !important;">
                <tr>
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
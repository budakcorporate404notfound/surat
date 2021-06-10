<?php $__env->startSection('content'); ?>

    <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($error); ?> <br/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>

    <form action="/upload/proses" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <b>File Gambar</b><br/>
            <input type="file" name="file">
        </div>
        <input type="submit" value="Upload" class="btn btn-primary">
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\suratMasuk\upload.blade.php ENDPATH**/ ?>
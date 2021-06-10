<?php $__env->startSection('content'); ?>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show jenis file</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="<?php echo e(route('jenisFile.index')); ?>"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <?php echo e($jenisFile->jenis_file); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\jenisFile\show.blade.php ENDPATH**/ ?>
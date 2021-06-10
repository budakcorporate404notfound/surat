<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('surat.surat-masuk.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
    var route_surat_surat_keluar_konsep_index = "<?php echo e(route('surat_keluar_konsep.index')); ?>";
    var route_surat_surat_keluar_konsep_store = "<?php echo e(route('surat_keluar_konsep.store')); ?>";
    var route_surat_surat_masuk_index = "<?php echo e(route('surat_masuk.index')); ?>";
    var route_surat_surat_masuk_store = "<?php echo e(route('surat_masuk.store')); ?>";
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_MODIF\dashboard\index.blade.php ENDPATH**/ ?>
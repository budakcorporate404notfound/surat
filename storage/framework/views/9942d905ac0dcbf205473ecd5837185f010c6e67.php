<?php $__env->startSection('pageName'); ?>
Create Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add new Role</h3>
        <div class="card-tools">
            <a href="<?php echo e(route('role.index')); ?>" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
        </div>
    </div>
    <div class="card-body">
        <role></role>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\role\create.blade.php ENDPATH**/ ?>
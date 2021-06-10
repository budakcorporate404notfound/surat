<?php $__env->startSection('title'); ?>
Permissions
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Permission Table</h3>

        <div class="card-tools">
            <a href="<?php echo e(route('permission.create')); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create new permission</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date Posted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($permission->id); ?></td>
                        <td><?php echo e($permission->name); ?></td>
                        <td><?php echo e($permission->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-sm btn-warning">Edit Permission</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>No Result Found</tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\permission\index.blade.php ENDPATH**/ ?>
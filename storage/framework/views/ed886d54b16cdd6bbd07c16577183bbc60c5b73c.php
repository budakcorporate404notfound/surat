<?php $__env->startSection('header'); ?>
Inventory
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    
    <?php if(Session::has('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(Session::get('success')); ?>

    </div>
    <?php endif; ?>
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
            
            
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($value->name); ?></td>
                <td><?php echo e($value->email); ?></td>
                <td><?php echo e($value->getRoleNames()[0]); ?></td>
                <td> 
                    <form action="<?php echo e(route('user.delete')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="hidden" value="<?php echo e($value->id); ?>" name="id">
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form> 
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
    </table>
    
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('footer'); ?>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('adminlte/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\adminlte\pages\usermanagement\list.blade.php ENDPATH**/ ?>
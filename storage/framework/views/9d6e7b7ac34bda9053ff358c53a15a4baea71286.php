<?php if($breadcrumbs->count()): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($breadcrumb->url() && $loop->remaining): ?>
                    <li class="breadcrumb-item">
                        <a href="<?php echo e($breadcrumb->url()); ?>"><?php echo e($breadcrumb->title()); ?></a>
                    </li>
                <?php else: ?>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e($breadcrumb->title()); ?>

                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\surat\vendor\shibuyakosuke\laravel-crud-breadcrumbs\src\views\bootstrap4.blade.php ENDPATH**/ ?>
<div class="">
    <?php if($message = Session::get('success')): ?>

    <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-check"></i> <?php echo e($message); ?>


    </div>

    <?php endif; ?>


    <?php if($message = Session::get('error')): ?>

    <div class="alert alert-danger alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> <?php echo e($message); ?>


    </div>

    <?php endif; ?>


    <?php if($message = Session::get('warning')): ?>

    <div class="alert alert-warning alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-exclamation-triangle"></i> <?php echo e($message); ?>


    </div>

    <?php endif; ?>


    <?php if($message = Session::get('info')): ?>

    <div class="alert alert-info alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-info"></i> <?php echo e($message); ?>


    </div>

    <?php endif; ?>

    <?php if($errors->any()): ?>

    <div class="alert alert-danger">

        <button type="button" class="close" data-dismiss="alert">×</button>

        <i class="icon fas fa-ban"></i> Please check the form below for errors
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>

    <?php endif; ?>


</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/partials/alert.blade.php ENDPATH**/ ?>
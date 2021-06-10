<?php $__env->startSection('content'); ?>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>...</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="<?php echo e(route('jenisFile.create')); ?>"> Create Post</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Jenis File</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $jenisFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenisFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e(++$i); ?></td>
            <td><?php echo e($jenisFile->jenis_file); ?></td>
            <td class="text-center">
                <form action="<?php echo e(route('jenisFile.destroy',$jenisFile->id)); ?>" method="POST">

                    <a class="btn btn-info btn-sm" href="<?php echo e(route('jenisFile.show',$jenisFile->id)); ?>">Show</a>

                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('jenisFile.edit',$jenisFile->id)); ?>">Edit</a>

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <?php echo $jenisFiles->links(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\jenisFile\index.blade.php ENDPATH**/ ?>
<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <?php echo e(Form::label('jabatan_pimpinan')); ?>

            <div class="form-group">
                <?php $__currentLoopData = $units ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check form-check">
                    <?php echo Form::radio('id_unit', $unit->id,  null, ['id' => 'surat-disposisi-pimpinan-id_unit'.$unit->id, 'class'=>'form-check-input']); ?>

                    <label class="form-check-label" for="surat-disposisi-pimpinan-id_unit<?php echo e($unit->id); ?>"> <?php echo e($unit->jabatan); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('disposisi_pimpinan')); ?>

            <?php echo e(Form::text('disposisi_pimpinan', '', ['class' => 'form-control' . ($errors->has('disposisi_pimpinan') ? ' is-invalid' : ''), 'id' => 'surat-disposisi-pimpinan-disposisi_pimpinan', 'placeholder' => 'Disposisi Pimpinan'])); ?>

            <?php echo $errors->first('disposisi_pimpinan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\disposisi-pimpinan\form.blade.php ENDPATH**/ ?>
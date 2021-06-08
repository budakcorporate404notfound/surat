<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <?php echo e(Form::label('unit_internal')); ?>

            <div class="form-group">
                <?php $__currentLoopData = $units ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check form-check">
                    <?php echo Form::radio('id_unit', $unit->id,  null, ['id' => 'surat-tembusan-surat-id_unit'.$unit->id, 'class'=>'form-check-input']); ?>

                    <label class="form-check-label" for="surat-tembusan-surat-id_unit<?php echo e($unit->id); ?>"> <?php echo e($unit->unit); ?></label>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('unit_lainnya_/_eksternal')); ?>

            <?php echo e(Form::text('tembusan_surat', '', ['class' => 'form-control' . ($errors->has('tembusan_surat') ? ' is-invalid' : ''), 'id' => 'surat-tembusan-surat-tembusan_surat', 'placeholder' => 'Tembusan Surat'])); ?>

            <?php echo $errors->first('tembusan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/tembusan-surat/form.blade.php ENDPATH**/ ?>
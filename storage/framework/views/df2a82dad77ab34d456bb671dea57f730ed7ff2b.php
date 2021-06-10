<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_unit')); ?>

            <?php echo e(Form::text('id_unit', '', ['class' => 'form-control' . ($errors->has('id_unit') ? ' is-invalid' : ''), 'placeholder' => 'Id Unit'])); ?>

            <?php echo $errors->first('id_unit', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('unit')); ?>

            <?php echo e(Form::text('unit', '', ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : ''), 'placeholder' => 'Unit'])); ?>

            <?php echo $errors->first('unit', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('jabatan')); ?>

            <?php echo e(Form::text('jabatan', '', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'placeholder' => 'Jabatan'])); ?>

            <?php echo $errors->first('jabatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\unit\form.blade.php ENDPATH**/ ?>
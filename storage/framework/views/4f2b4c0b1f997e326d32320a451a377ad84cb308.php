<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('jenis_status')); ?>

            <?php echo e(Form::text('jenis_status', '', ['class' => 'form-control' . ($errors->has('jenis_status') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Status'])); ?>

            <?php echo $errors->first('jenis_status', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_aktif')); ?>

            <?php echo e(Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif'])); ?>

            <?php echo $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-jenis-status\form.blade.php ENDPATH**/ ?>
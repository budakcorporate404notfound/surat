<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_master_jenis_status')); ?>

            <?php echo e(Form::text('id_master_jenis_status', '', ['class' => 'form-control' . ($errors->has('id_master_jenis_status') ? ' is-invalid' : ''), 'placeholder' => 'Id Master Jenis Status'])); ?>

            <?php echo $errors->first('id_master_jenis_status', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status')); ?>

            <?php echo e(Form::text('status', '', ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status'])); ?>

            <?php echo $errors->first('status', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_aktif')); ?>

            <?php echo e(Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif'])); ?>

            <?php echo $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-status\form.blade.php ENDPATH**/ ?>
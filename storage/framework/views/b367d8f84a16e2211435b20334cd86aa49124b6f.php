<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_file')); ?>

            <?php echo e(Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File'])); ?>

            <?php echo $errors->first('id_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_kegiatan')); ?>

            <?php echo e(Form::text('id_kegiatan', '', ['class' => 'form-control' . ($errors->has('id_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Id Kegiatan'])); ?>

            <?php echo $errors->first('id_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file-kegiatan\form.blade.php ENDPATH**/ ?>
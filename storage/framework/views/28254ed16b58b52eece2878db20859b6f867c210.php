<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_file')); ?>

            <?php echo e(Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File'])); ?>

            <?php echo $errors->first('id_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_kerja')); ?>

            <?php echo e(Form::text('id_kerja', '', ['class' => 'form-control' . ($errors->has('id_kerja') ? ' is-invalid' : ''), 'placeholder' => 'Id Kerja'])); ?>

            <?php echo $errors->first('id_kerja', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file-kerja\form.blade.php ENDPATH**/ ?>
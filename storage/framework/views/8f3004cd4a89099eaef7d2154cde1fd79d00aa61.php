<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('kelompok_file')); ?>

            <?php echo e(Form::text('kelompok_file', '', ['class' => 'form-control' . ($errors->has('kelompok_file') ? ' is-invalid' : ''), 'placeholder' => 'Kelompok File'])); ?>

            <?php echo $errors->first('kelompok_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-kelompok-file\form.blade.php ENDPATH**/ ?>
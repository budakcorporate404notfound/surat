<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_file')); ?>

            <?php echo e(Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File'])); ?>

            <?php echo $errors->first('id_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_lamar_proyek_terbuka')); ?>

            <?php echo e(Form::text('id_lamar_proyek_terbuka', '', ['class' => 'form-control' . ($errors->has('id_lamar_proyek_terbuka') ? ' is-invalid' : ''), 'placeholder' => 'Id Lamar Proyek Terbuka'])); ?>

            <?php echo $errors->first('id_lamar_proyek_terbuka', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file-lamar-proyek-terbuka\form.blade.php ENDPATH**/ ?>
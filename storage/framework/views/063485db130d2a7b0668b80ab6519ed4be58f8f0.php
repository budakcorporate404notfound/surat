<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('jenis_file')); ?>

            <?php echo e(Form::text('jenis_file', '', ['class' => 'form-control' . ($errors->has('jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Jenis File'])); ?>

            <?php echo $errors->first('jenis_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('ekstensi')); ?>

            <?php echo e(Form::text('ekstensi', '', ['class' => 'form-control' . ($errors->has('ekstensi') ? ' is-invalid' : ''), 'placeholder' => 'Ekstensi'])); ?>

            <?php echo $errors->first('ekstensi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-jenis-file\form.blade.php ENDPATH**/ ?>
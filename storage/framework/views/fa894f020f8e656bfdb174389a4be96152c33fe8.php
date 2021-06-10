<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_jenis_surat')); ?>

            <?php echo e(Form::text('id_jenis_surat', '', ['class' => 'form-control' . ($errors->has('id_jenis_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Surat'])); ?>

            <?php echo $errors->first('id_jenis_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('year')); ?>

            <?php echo e(Form::text('year', '', ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year'])); ?>

            <?php echo $errors->first('year', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('last_number')); ?>

            <?php echo e(Form::text('last_number', '', ['class' => 'form-control' . ($errors->has('last_number') ? ' is-invalid' : ''), 'placeholder' => 'Last Number'])); ?>

            <?php echo $errors->first('last_number', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\counter-surat\form.blade.php ENDPATH**/ ?>
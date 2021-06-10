<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_surat_masuk')); ?>

            <?php echo e(Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk'])); ?>

            <?php echo $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_unit')); ?>

            <?php echo e(Form::text('id_unit', '', ['class' => 'form-control' . ($errors->has('id_unit') ? ' is-invalid' : ''), 'placeholder' => 'Id Unit'])); ?>

            <?php echo $errors->first('id_unit', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tembusan_surat')); ?>

            <?php echo e(Form::text('tembusan_surat', '', ['class' => 'form-control' . ($errors->has('tembusan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Tembusan Surat'])); ?>

            <?php echo $errors->first('tembusan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\tembusan-surat\form.blade.php ENDPATH**/ ?>
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
            <?php echo e(Form::label('disposisi_pimpinan')); ?>

            <?php echo e(Form::text('disposisi_pimpinan', '', ['class' => 'form-control' . ($errors->has('disposisi_pimpinan') ? ' is-invalid' : ''), 'placeholder' => 'Disposisi Pimpinan'])); ?>

            <?php echo $errors->first('disposisi_pimpinan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\disposisi-pimpinan\form.blade.php ENDPATH**/ ?>
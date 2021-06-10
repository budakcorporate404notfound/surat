<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('jenis_surat_masuk')); ?>

            <?php echo e(Form::text('jenis_surat_masuk', '', ['class' => 'form-control' . ($errors->has('jenis_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Surat Masuk'])); ?>

            <?php echo $errors->first('jenis_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\jenis-surat-masuk\form.blade.php ENDPATH**/ ?>
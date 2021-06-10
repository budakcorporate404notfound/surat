<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('sifat_keamanan_surat')); ?>

            <?php echo e(Form::text('sifat_keamanan_surat', '', ['class' => 'form-control' . ($errors->has('sifat_keamanan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Sifat Keamanan Surat'])); ?>

            <?php echo $errors->first('sifat_keamanan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\sifat-keamanan-surat\form.blade.php ENDPATH**/ ?>
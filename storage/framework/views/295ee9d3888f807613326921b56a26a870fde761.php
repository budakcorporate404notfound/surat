<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('sifat_penyelesaian_surat')); ?>

            <?php echo e(Form::text('sifat_penyelesaian_surat', '', ['class' => 'form-control' . ($errors->has('sifat_penyelesaian_surat') ? ' is-invalid' : ''), 'placeholder' => 'Sifat Penyelesaian Surat'])); ?>

            <?php echo $errors->first('sifat_penyelesaian_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\sifat-penyelesaian-surat\form.blade.php ENDPATH**/ ?>
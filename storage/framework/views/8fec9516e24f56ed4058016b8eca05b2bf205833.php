<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('arahan_surat')); ?>

            <?php echo e(Form::text('arahan_surat', '', ['class' => 'form-control' . ($errors->has('arahan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Arahan Surat'])); ?>

            <?php echo $errors->first('arahan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\arahan-surat\form.blade.php ENDPATH**/ ?>
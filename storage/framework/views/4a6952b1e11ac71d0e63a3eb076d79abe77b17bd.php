<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('jenis_dokumen')); ?>

            <?php echo e(Form::text('jenis_dokumen', '', ['class' => 'form-control' . ($errors->has('jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Dokumen'])); ?>

            <?php echo $errors->first('jenis_dokumen', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\jenis-dokuman\form.blade.php ENDPATH**/ ?>
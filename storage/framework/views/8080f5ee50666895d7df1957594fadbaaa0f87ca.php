<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('nama_file')); ?>

            <?php echo e(Form::file('file', ['class' => 'form-control-file' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'id' => 'surat-dokumen-surat-nama_file', 'placeholder' => 'Nama File'])); ?>

            <?php echo $errors->first('nama_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\dokumen-surat\form.blade.php ENDPATH**/ ?>
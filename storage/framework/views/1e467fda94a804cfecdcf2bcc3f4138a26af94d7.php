<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_surat_masuk')); ?>

            <?php echo e(Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk'])); ?>

            <?php echo $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('dokumen_surat')); ?>

            <?php echo e(Form::text('dokumen_surat', '', ['class' => 'form-control' . ($errors->has('dokumen_surat') ? ' is-invalid' : ''), 'placeholder' => 'Dokumen Surat'])); ?>

            <?php echo $errors->first('dokumen_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nama_file')); ?>

            <?php echo e(Form::text('nama_file', '', ['class' => 'form-control' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'placeholder' => 'Nama File'])); ?>

            <?php echo $errors->first('nama_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_jenis_file')); ?>

            <?php echo e(Form::text('id_jenis_file', '', ['class' => 'form-control' . ($errors->has('id_jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis File'])); ?>

            <?php echo $errors->first('id_jenis_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('ukuran_file')); ?>

            <?php echo e(Form::text('ukuran_file', '', ['class' => 'form-control' . ($errors->has('ukuran_file') ? ' is-invalid' : ''), 'placeholder' => 'Ukuran File'])); ?>

            <?php echo $errors->first('ukuran_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\dokumen-surat\form.blade.php ENDPATH**/ ?>
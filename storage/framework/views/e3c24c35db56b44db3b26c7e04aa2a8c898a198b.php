<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_surat_keluar')); ?>

            <?php echo e(Form::text('id_surat_keluar', '', ['class' => 'form-control' . ($errors->has('id_surat_keluar') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Keluar'])); ?>

            <?php echo $errors->first('id_surat_keluar', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_jenis_dokumen')); ?>

            <?php echo e(Form::text('id_jenis_dokumen', '', ['class' => 'form-control' . ($errors->has('id_jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Dokumen'])); ?>

            <?php echo $errors->first('id_jenis_dokumen', '<div class="invalid-feedback">:message</p>'); ?>

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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\file-surat-keluar\form.blade.php ENDPATH**/ ?>
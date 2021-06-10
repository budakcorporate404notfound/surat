<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_disposisi_surat')); ?>

            <?php echo e(Form::text('id_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('id_disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Disposisi Surat'])); ?>

            <?php echo $errors->first('id_disposisi_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('perihal')); ?>

            <?php echo e(Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal'])); ?>

            <?php echo $errors->first('perihal', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('keterangan')); ?>

            <?php echo e(Form::text('keterangan', '', ['class' => 'form-control' . ($errors->has('keterangan') ? ' is-invalid' : ''), 'placeholder' => 'Keterangan'])); ?>

            <?php echo $errors->first('keterangan', '<div class="invalid-feedback">:message</p>'); ?>

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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\file-tanggapan\form.blade.php ENDPATH**/ ?>
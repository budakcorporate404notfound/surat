<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('kode_proyek')); ?>

            <?php echo e(Form::text('kode_proyek', '', ['class' => 'form-control' . ($errors->has('kode_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Kode Proyek'])); ?>

            <?php echo $errors->first('kode_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_model_proyek')); ?>

            <?php echo e(Form::text('id_model_proyek', '', ['class' => 'form-control' . ($errors->has('id_model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Proyek'])); ?>

            <?php echo $errors->first('id_model_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_model_tahapan')); ?>

            <?php echo e(Form::text('id_model_tahapan', '', ['class' => 'form-control' . ($errors->has('id_model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Tahapan'])); ?>

            <?php echo $errors->first('id_model_tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nama_proyek')); ?>

            <?php echo e(Form::text('nama_proyek', '', ['class' => 'form-control' . ($errors->has('nama_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Nama Proyek'])); ?>

            <?php echo $errors->first('nama_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('dekripsi_proyek')); ?>

            <?php echo e(Form::text('dekripsi_proyek', '', ['class' => 'form-control' . ($errors->has('dekripsi_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Dekripsi Proyek'])); ?>

            <?php echo $errors->first('dekripsi_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tag_proyek')); ?>

            <?php echo e(Form::text('tag_proyek', '', ['class' => 'form-control' . ($errors->has('tag_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Tag Proyek'])); ?>

            <?php echo $errors->first('tag_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nama_klien')); ?>

            <?php echo e(Form::text('nama_klien', '', ['class' => 'form-control' . ($errors->has('nama_klien') ? ' is-invalid' : ''), 'placeholder' => 'Nama Klien'])); ?>

            <?php echo $errors->first('nama_klien', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('pimpinan_proyek')); ?>

            <?php echo e(Form::text('pimpinan_proyek', '', ['class' => 'form-control' . ($errors->has('pimpinan_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Pimpinan Proyek'])); ?>

            <?php echo $errors->first('pimpinan_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('estimasi_anggaran_proyek')); ?>

            <?php echo e(Form::text('estimasi_anggaran_proyek', '', ['class' => 'form-control' . ($errors->has('estimasi_anggaran_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Anggaran Proyek'])); ?>

            <?php echo $errors->first('estimasi_anggaran_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('estimasi_durasi_proyek')); ?>

            <?php echo e(Form::text('estimasi_durasi_proyek', '', ['class' => 'form-control' . ($errors->has('estimasi_durasi_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Durasi Proyek'])); ?>

            <?php echo $errors->first('estimasi_durasi_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('is_proyek_terbuka')); ?>

            <?php echo e(Form::text('is_proyek_terbuka', '', ['class' => 'form-control' . ($errors->has('is_proyek_terbuka') ? ' is-invalid' : ''), 'placeholder' => 'Is Proyek Terbuka'])); ?>

            <?php echo $errors->first('is_proyek_terbuka', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_proyek')); ?>

            <?php echo e(Form::text('status_proyek', '', ['class' => 'form-control' . ($errors->has('status_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Status Proyek'])); ?>

            <?php echo $errors->first('status_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\proyek\form.blade.php ENDPATH**/ ?>
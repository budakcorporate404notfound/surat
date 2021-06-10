<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_proyek')); ?>

            <?php echo e(Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek'])); ?>

            <?php echo $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('persyaratan')); ?>

            <?php echo e(Form::text('persyaratan', '', ['class' => 'form-control' . ($errors->has('persyaratan') ? ' is-invalid' : ''), 'placeholder' => 'Persyaratan'])); ?>

            <?php echo $errors->first('persyaratan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('kualifikasi')); ?>

            <?php echo e(Form::text('kualifikasi', '', ['class' => 'form-control' . ($errors->has('kualifikasi') ? ' is-invalid' : ''), 'placeholder' => 'Kualifikasi'])); ?>

            <?php echo $errors->first('kualifikasi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan')); ?>

            <?php echo e(Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan'])); ?>

            <?php echo $errors->first('catatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tanggal_mulai_penyiaran')); ?>

            <?php echo e(Form::text('tanggal_mulai_penyiaran', '', ['class' => 'form-control' . ($errors->has('tanggal_mulai_penyiaran') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Mulai Penyiaran'])); ?>

            <?php echo $errors->first('tanggal_mulai_penyiaran', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tanggal_selesai_penyiaran')); ?>

            <?php echo e(Form::text('tanggal_selesai_penyiaran', '', ['class' => 'form-control' . ($errors->has('tanggal_selesai_penyiaran') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Selesai Penyiaran'])); ?>

            <?php echo $errors->first('tanggal_selesai_penyiaran', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_aktif')); ?>

            <?php echo e(Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif'])); ?>

            <?php echo $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\proyek-terbuka\form.blade.php ENDPATH**/ ?>
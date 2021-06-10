<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_proyek')); ?>

            <?php echo e(Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek'])); ?>

            <?php echo $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_user')); ?>

            <?php echo e(Form::text('id_user', '', ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User'])); ?>

            <?php echo $errors->first('id_user', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan')); ?>

            <?php echo e(Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan'])); ?>

            <?php echo $errors->first('catatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tanggal_lamar')); ?>

            <?php echo e(Form::text('tanggal_lamar', '', ['class' => 'form-control' . ($errors->has('tanggal_lamar') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Lamar'])); ?>

            <?php echo $errors->first('tanggal_lamar', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_lamaran')); ?>

            <?php echo e(Form::text('status_lamaran', '', ['class' => 'form-control' . ($errors->has('status_lamaran') ? ' is-invalid' : ''), 'placeholder' => 'Status Lamaran'])); ?>

            <?php echo $errors->first('status_lamaran', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_aktif')); ?>

            <?php echo e(Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif'])); ?>

            <?php echo $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\lamar-proyek-terbuka\form.blade.php ENDPATH**/ ?>
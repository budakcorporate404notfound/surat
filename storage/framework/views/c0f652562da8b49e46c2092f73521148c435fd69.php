<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_kegiatan')); ?>

            <?php echo e(Form::text('id_kegiatan', '', ['class' => 'form-control' . ($errors->has('id_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Id Kegiatan'])); ?>

            <?php echo $errors->first('id_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_user')); ?>

            <?php echo e(Form::text('id_user', '', ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User'])); ?>

            <?php echo $errors->first('id_user', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tanggal')); ?>

            <?php echo e(Form::text('tanggal', '', ['class' => 'form-control' . ($errors->has('tanggal') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal'])); ?>

            <?php echo $errors->first('tanggal', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('waktu_mulai')); ?>

            <?php echo e(Form::text('waktu_mulai', '', ['class' => 'form-control' . ($errors->has('waktu_mulai') ? ' is-invalid' : ''), 'placeholder' => 'Waktu Mulai'])); ?>

            <?php echo $errors->first('waktu_mulai', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('waktu_selesai')); ?>

            <?php echo e(Form::text('waktu_selesai', '', ['class' => 'form-control' . ($errors->has('waktu_selesai') ? ' is-invalid' : ''), 'placeholder' => 'Waktu Selesai'])); ?>

            <?php echo $errors->first('waktu_selesai', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan_tugas')); ?>

            <?php echo e(Form::text('catatan_tugas', '', ['class' => 'form-control' . ($errors->has('catatan_tugas') ? ' is-invalid' : ''), 'placeholder' => 'Catatan Tugas'])); ?>

            <?php echo $errors->first('catatan_tugas', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_tugas')); ?>

            <?php echo e(Form::text('status_tugas', '', ['class' => 'form-control' . ($errors->has('status_tugas') ? ' is-invalid' : ''), 'placeholder' => 'Status Tugas'])); ?>

            <?php echo $errors->first('status_tugas', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\kerja\form.blade.php ENDPATH**/ ?>
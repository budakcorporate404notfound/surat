<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_tahapan')); ?>

            <?php echo e(Form::text('id_tahapan', '', ['class' => 'form-control' . ($errors->has('id_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Id Tahapan'])); ?>

            <?php echo $errors->first('id_tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nama_kegiatan')); ?>

            <?php echo e(Form::text('nama_kegiatan', '', ['class' => 'form-control' . ($errors->has('nama_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Nama Kegiatan'])); ?>

            <?php echo $errors->first('nama_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('deskripsi_kegiatan')); ?>

            <?php echo e(Form::text('deskripsi_kegiatan', '', ['class' => 'form-control' . ($errors->has('deskripsi_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Deskripsi Kegiatan'])); ?>

            <?php echo $errors->first('deskripsi_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('estimasi_durasi_kegiatan')); ?>

            <?php echo e(Form::text('estimasi_durasi_kegiatan', '', ['class' => 'form-control' . ($errors->has('estimasi_durasi_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Durasi Kegiatan'])); ?>

            <?php echo $errors->first('estimasi_durasi_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan_kegiatan')); ?>

            <?php echo e(Form::text('catatan_kegiatan', '', ['class' => 'form-control' . ($errors->has('catatan_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan Kegiatan'])); ?>

            <?php echo $errors->first('catatan_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_kegiatan')); ?>

            <?php echo e(Form::text('status_kegiatan', '', ['class' => 'form-control' . ($errors->has('status_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Status Kegiatan'])); ?>

            <?php echo $errors->first('status_kegiatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\kegiatan\form.blade.php ENDPATH**/ ?>
<div class="box box-info padding-1">
    <div class="box-body">

        
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-id_jenis_dokumen')); ?>

            <?php echo e(Form::text('id_jenis_dokumen', '', ['id'=> 'surat-surat-keluar-id_jenis_dokumen', 'class' => 'form-control' . ($errors->has('id_jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Dokumen'])); ?>

            <?php echo $errors->first('id_jenis_dokumen', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-nomor_surat')); ?>

            <?php echo e(Form::text('nomor_surat', '', ['id'=> 'surat-surat-keluar-nomor_surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'placeholder' => 'Nomor Surat'])); ?>

            <?php echo $errors->first('nomor_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-tanggal_surat')); ?>

            <?php echo e(Form::text('tanggal_surat', '', ['id'=> 'surat-surat-keluar-tanggal_surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Surat'])); ?>

            <?php echo $errors->first('tanggal_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-kepada')); ?>

            <?php echo e(Form::text('kepada', '', ['id'=> 'surat-surat-keluar-kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'placeholder' => 'Kepada'])); ?>

            <?php echo $errors->first('kepada', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-perihal')); ?>

            <?php echo e(Form::text('perihal', '', ['id'=> 'surat-surat-keluar-perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal'])); ?>

            <?php echo $errors->first('perihal', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-id_sifat_keamanan_surat')); ?>

            <?php echo e(Form::text('id_sifat_keamanan_surat', '', ['id'=> 'surat-surat-keluar-id_sifat_keamanan_surat', 'class' => 'form-control' . ($errors->has('id_sifat_keamanan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Sifat Keamanan Surat'])); ?>

            <?php echo $errors->first('id_sifat_keamanan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-id_sifat_penyelesaian_surat')); ?>

            <?php echo e(Form::text('id_sifat_penyelesaian_surat', '', ['id'=> 'surat-surat-keluar-id_sifat_penyelesaian_surat', 'class' => 'form-control' . ($errors->has('id_sifat_penyelesaian_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Sifat Penyelesaian Surat'])); ?>

            <?php echo $errors->first('id_sifat_penyelesaian_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-tanggal_mulai')); ?>

            <?php echo e(Form::text('tanggal_mulai', '', ['id'=> 'surat-surat-keluar-tanggal_mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Mulai'])); ?>

            <?php echo $errors->first('tanggal_mulai', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-tanggal_selesai')); ?>

            <?php echo e(Form::text('tanggal_selesai', '', ['id'=> 'surat-surat-keluar-tanggal_selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Selesai'])); ?>

            <?php echo $errors->first('tanggal_selesai', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-mulai_pukul')); ?>

            <?php echo e(Form::text('mulai_pukul', '', ['id'=> 'surat-surat-keluar-mulai_pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Mulai Pukul'])); ?>

            <?php echo $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('surat-surat-keluar-selesai_pukul')); ?>

            <?php echo e(Form::text('selesai_pukul', '', ['id'=> 'surat-surat-keluar-selesai_pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Selesai Pukul'])); ?>

            <?php echo $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\DELETE_konsep-surat-keluar\form.blade.php ENDPATH**/ ?>
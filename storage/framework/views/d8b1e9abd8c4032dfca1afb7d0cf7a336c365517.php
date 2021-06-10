<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('nama_file')); ?>

            <?php echo e(Form::text('nama_file', '', ['class' => 'form-control' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'placeholder' => 'Nama File'])); ?>

            <?php echo $errors->first('nama_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('ukuran_file')); ?>

            <?php echo e(Form::text('ukuran_file', '', ['class' => 'form-control' . ($errors->has('ukuran_file') ? ' is-invalid' : ''), 'placeholder' => 'Ukuran File'])); ?>

            <?php echo $errors->first('ukuran_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_master_jenis_file')); ?>

            <?php echo e(Form::text('id_master_jenis_file', '', ['class' => 'form-control' . ($errors->has('id_master_jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Master Jenis File'])); ?>

            <?php echo $errors->first('id_master_jenis_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_master_kelompok_file')); ?>

            <?php echo e(Form::text('id_master_kelompok_file', '', ['class' => 'form-control' . ($errors->has('id_master_kelompok_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Master Kelompok File'])); ?>

            <?php echo $errors->first('id_master_kelompok_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tag_file')); ?>

            <?php echo e(Form::text('tag_file', '', ['class' => 'form-control' . ($errors->has('tag_file') ? ' is-invalid' : ''), 'placeholder' => 'Tag File'])); ?>

            <?php echo $errors->first('tag_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_file')); ?>

            <?php echo e(Form::text('status_file', '', ['class' => 'form-control' . ($errors->has('status_file') ? ' is-invalid' : ''), 'placeholder' => 'Status File'])); ?>

            <?php echo $errors->first('status_file', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file\form.blade.php ENDPATH**/ ?>
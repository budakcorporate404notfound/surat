<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('username')); ?>

            <?php echo e(Form::text('username', '', ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username'])); ?>

            <?php echo $errors->first('username', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nip')); ?>

            <?php echo e(Form::text('nip', '', ['class' => 'form-control' . ($errors->has('nip') ? ' is-invalid' : ''), 'placeholder' => 'Nip'])); ?>

            <?php echo $errors->first('nip', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('nama')); ?>

            <?php echo e(Form::text('nama', '', ['class' => 'form-control' . ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama'])); ?>

            <?php echo $errors->first('nama', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('keahlian')); ?>

            <?php echo e(Form::text('keahlian', '', ['class' => 'form-control' . ($errors->has('keahlian') ? ' is-invalid' : ''), 'placeholder' => 'Keahlian'])); ?>

            <?php echo $errors->first('keahlian', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan')); ?>

            <?php echo e(Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan'])); ?>

            <?php echo $errors->first('catatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('pengalaman')); ?>

            <?php echo e(Form::text('pengalaman', '', ['class' => 'form-control' . ($errors->has('pengalaman') ? ' is-invalid' : ''), 'placeholder' => 'Pengalaman'])); ?>

            <?php echo $errors->first('pengalaman', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('pendidikan')); ?>

            <?php echo e(Form::text('pendidikan', '', ['class' => 'form-control' . ($errors->has('pendidikan') ? ' is-invalid' : ''), 'placeholder' => 'Pendidikan'])); ?>

            <?php echo $errors->first('pendidikan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\user\form.blade.php ENDPATH**/ ?>
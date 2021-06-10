<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_proyek')); ?>

            <?php echo e(Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek'])); ?>

            <?php echo $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('tahapan')); ?>

            <?php echo e(Form::text('tahapan', '', ['class' => 'form-control' . ($errors->has('tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Tahapan'])); ?>

            <?php echo $errors->first('tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('catatan')); ?>

            <?php echo e(Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan'])); ?>

            <?php echo $errors->first('catatan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_tahapan')); ?>

            <?php echo e(Form::text('status_tahapan', '', ['class' => 'form-control' . ($errors->has('status_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Status Tahapan'])); ?>

            <?php echo $errors->first('status_tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\tahapan\form.blade.php ENDPATH**/ ?>
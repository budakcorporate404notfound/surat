<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_model_proyek')); ?>

            <?php echo e(Form::text('id_model_proyek', '', ['class' => 'form-control' . ($errors->has('id_model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Proyek'])); ?>

            <?php echo $errors->first('id_model_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('model_tahapan')); ?>

            <?php echo e(Form::text('model_tahapan', '', ['class' => 'form-control' . ($errors->has('model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Model Tahapan'])); ?>

            <?php echo $errors->first('model_tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('deskripsi_model_tahapan')); ?>

            <?php echo e(Form::text('deskripsi_model_tahapan', '', ['class' => 'form-control' . ($errors->has('deskripsi_model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Deskripsi Model Tahapan'])); ?>

            <?php echo $errors->first('deskripsi_model_tahapan', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('status_aktif')); ?>

            <?php echo e(Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif'])); ?>

            <?php echo $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-model-tahapan\form.blade.php ENDPATH**/ ?>
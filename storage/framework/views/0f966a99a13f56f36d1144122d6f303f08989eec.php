<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_surat_masuk')); ?>

            <?php echo e(Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk'])); ?>

            <?php echo $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_arahan_surat')); ?>

            <?php echo e(Form::text('id_arahan_surat', '', ['class' => 'form-control' . ($errors->has('id_arahan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Arahan Surat'])); ?>

            <?php echo $errors->first('id_arahan_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('id_status_disposisi')); ?>

            <?php echo e(Form::text('id_status_disposisi', '', ['class' => 'form-control' . ($errors->has('id_status_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Id Status Disposisi'])); ?>

            <?php echo $errors->first('id_status_disposisi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('ceklist_disposisi_surat')); ?>

            <?php echo e(Form::text('ceklist_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('ceklist_disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Ceklist Disposisi Surat'])); ?>

            <?php echo $errors->first('ceklist_disposisi_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('disposisi_surat')); ?>

            <?php echo e(Form::text('disposisi_surat', '', ['class' => 'form-control' . ($errors->has('disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Disposisi Surat'])); ?>

            <?php echo $errors->first('disposisi_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\disposisi-surat\form.blade.php ENDPATH**/ ?>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_proyek')); ?>

            <?php echo e(Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek'])); ?>

            <?php echo $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('jabatan_dalam_tim')); ?>

            <?php echo e(Form::text('jabatan_dalam_tim', '', ['class' => 'form-control' . ($errors->has('jabatan_dalam_tim') ? ' is-invalid' : ''), 'placeholder' => 'Jabatan Dalam Tim'])); ?>

            <?php echo $errors->first('jabatan_dalam_tim', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\anggota-tim\form.blade.php ENDPATH**/ ?>
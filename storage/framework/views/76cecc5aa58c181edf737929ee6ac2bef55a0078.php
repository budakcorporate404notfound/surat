<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('jenis_disposisi')); ?>

            <?php echo e(Form::text('jenis_disposisi', '', ['class' => 'form-control' . ($errors->has('jenis_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Disposisi'])); ?>

            <?php echo $errors->first('jenis_disposisi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\jenis-disposisi\form.blade.php ENDPATH**/ ?>
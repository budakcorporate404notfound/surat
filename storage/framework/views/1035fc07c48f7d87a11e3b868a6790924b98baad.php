<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('status_disposisi')); ?>

            <?php echo e(Form::text('status_disposisi', '', ['class' => 'form-control' . ($errors->has('status_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Status Disposisi'])); ?>

            <?php echo $errors->first('status_disposisi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\status-disposisi\form.blade.php ENDPATH**/ ?>
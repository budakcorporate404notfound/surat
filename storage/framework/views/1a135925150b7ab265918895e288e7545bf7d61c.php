<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('id_disposisi_surat')); ?>

            <?php echo e(Form::text('id_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('id_disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Disposisi Surat'])); ?>

            <?php echo $errors->first('id_disposisi_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('memo_disposisi')); ?>

            <?php echo e(Form::text('memo_disposisi', '', ['class' => 'form-control' . ($errors->has('memo_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Memo Disposisi'])); ?>

            <?php echo $errors->first('memo_disposisi', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\memo-disposisi\form.blade.php ENDPATH**/ ?>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <?php echo e(Form::label('asal_ekspedisi_surat_masuk')); ?>

            <?php echo e(Form::text('asal_ekspedisi_surat_masuk', '', ['class' => 'form-control' . ($errors->has('asal_ekspedisi_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Asal Ekspedisi Surat Masuk'])); ?>

            <?php echo $errors->first('asal_ekspedisi_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\asal-ekspedisi-surat-masuk\form.blade.php ENDPATH**/ ?>
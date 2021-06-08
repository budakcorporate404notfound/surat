<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                <?php echo e(Form::label('arahan_surat')); ?>

                <div class="form-group">
                    <?php if(auth()->user()->id_jabatan <= 2 || auth()->user()->id_unit_kerja == 1): ?>
                        <?php $__currentLoopData = $arahan_surats ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($arahan_surat->id_arahan_surat_parent == auth()->user()->id_unit_kerja || ($arahan_surat->id_arahan_surat_parent == 2 && $arahan_surat->id != auth()->user()->id_unit_kerja)): ?>
                        <div class="form-check form-check">
                            <?php echo Form::checkbox('id_arahan_surat[]', $arahan_surat->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-disposisi-surat-id_arahan_surat']); ?>

                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat<?php echo e($arahan_surat->id); ?>"> <?php echo e($arahan_surat->arahan_surat); ?></label>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if(auth()->user()->id_unit_kerja == 1): ?>
                        
                        <?php $__currentLoopData = $bawahans ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bawahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check">
                            <?php echo Form::checkbox('id_arahan_surat_iduser[]', $bawahan->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat_iduser'.$bawahan->id, 'class'=>'form-check-input  surat-disposisi-surat-id_arahan_surat_iduser']); ?>

                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat_iduser<?php echo e($bawahan->id); ?>"> <?php echo e($bawahan->name); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    <?php elseif(auth()->user()->id_jabatan == 3): ?>

                        

                        
                        <?php $__currentLoopData = $arahan_surats ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if($arahan_surat->id == $id_unit_kerja_atasan): ?>
                        <div class="form-check form-check">
                            <?php echo Form::checkbox('id_arahan_surat[]', $arahan_surat->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-disposisi-surat-id_arahan_surat']); ?>

                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat<?php echo e($arahan_surat->id); ?>"> <?php echo e($arahan_surat->arahan_surat); ?></label>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php $__currentLoopData = $bawahans ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bawahan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check">
                            <?php echo Form::checkbox('id_arahan_surat_iduser[]', $bawahan->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat_iduser'.$bawahan->id, 'class'=>'form-check-input  surat-disposisi-surat-id_arahan_surat_iduser']); ?>

                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat_iduser<?php echo e($bawahan->id); ?>"> <?php echo e($bawahan->name); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endif; ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <?php echo e(Form::label('ceklist_disposisi_surat')); ?>

                <div class="form-group">
                    <?php $__currentLoopData = $jenis_disposisis ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_disposisi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check form-check">
                        <?php echo Form::checkbox('ceklist_disposisi_surat[]', $jenis_disposisi->id,  null, ['id' => 'surat-disposisi-surat-ceklist_disposisi_surat'.$jenis_disposisi->id, 'class'=>'form-check-input']); ?>

                        <label class="form-check-label" for="surat-disposisi-surat-ceklist_disposisi_surat<?php echo e($jenis_disposisi->id); ?>"> <?php echo e($jenis_disposisi->jenis_disposisi); ?></label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
            </div>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('disposisi_surat')); ?>

            <?php echo e(Form::text('disposisi_surat', '', ['class' => 'form-control' . ($errors->has('disposisi_surat') ? ' is-invalid' : ''), 'id' => 'surat-disposisi-surat-disposisi_surat', 'placeholder' => 'Disposisi Surat'])); ?>

            <?php echo $errors->first('disposisi_surat', '<div class="invalid-feedback">:message</p>'); ?>

        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/disposisi-surat/form.blade.php ENDPATH**/ ?>
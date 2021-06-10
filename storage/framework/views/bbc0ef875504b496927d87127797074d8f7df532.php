<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat-masuk-box-form">
            <form id="surat-surat-masuk-form" name="surat-surat-masuk-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <?php echo Form::hidden('id', '', ['id'=>'surat-surat-masuk-id']); ?>

                
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('asal_surat_masuk')); ?>

                    <?php echo e(Form::text('asal_surat_masuk', '', ['id' => 'surat-surat-masuk-asal_surat_masuk', 'placeholder' => 'Asal Surat Masuk', 'class' => 'form-control' . ($errors->has('asal_surat_masuk') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('pejabat_pengirim_surat')); ?>

                    <?php echo e(Form::text('pejabat_pengirim_surat', '', ['id' => 'surat-surat-masuk-pejabat_pengirim_surat', 'placeholder' => 'Pejabat Pengirim Surat', 'class' => 'form-control' . ($errors->has('pejabat_pengirim_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('nomor_surat')); ?>

                    <?php echo e(Form::text('nomor_surat', '', ['id' => 'surat-surat-masuk-nomor_surat', 'placeholder' => 'Nomor Surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('tanggal_surat')); ?>

                    <?php echo e(Form::date('tanggal_surat', null, ['id' => 'surat-surat-masuk-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('kepada')); ?>

                    <?php echo e(Form::text('kepada', '', ['id' => 'surat-surat-masuk-kepada', 'placeholder' => 'Kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('perihal')); ?>

                    <?php echo e(Form::text('perihal', '', ['id' => 'surat-surat-masuk-perihal', 'placeholder' => 'Perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    <?php echo e(Form::label('id_sifat_keamanan_surat')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $sifat_keamanan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_keamanan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-masuk-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-masuk-id_sifat_keamanan_surat<?php echo e($sifat_keamanan_surat->id); ?>"> <?php echo e($sifat_keamanan_surat->sifat_keamanan_surat); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    <?php echo e(Form::label('id_sifat_penyelesaian_surat')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $sifat_penyelesaian_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_penyelesaian_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-masuk-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-masuk-id_sifat_penyelesaian_surat<?php echo e($sifat_penyelesaian_surat->id); ?>"> <?php echo e($sifat_penyelesaian_surat->sifat_penyelesaian_surat); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('tenggat_waktu_tindak_lanjut')); ?>

                    <?php echo e(Form::date('tenggat_waktu_tindak_lanjut', null, ['id' => 'surat-surat-masuk-tenggat_waktu_tindak_lanjut', 'placeholder' => 'Tenggat Waktu Tindak Lanjut', 'class' => 'form-control' . ($errors->has('tenggat_waktu_tindak_lanjut') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('mulai_pukul')); ?>

                    <?php echo e(Form::time('mulai_pukul', null, ['id' => 'surat-surat-masuk-mulai_pukul', 'placeholder' => 'Mulai Pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('selesai_pukul')); ?>

                    <?php echo e(Form::time('selesai_pukul', null, ['id' => 'surat-surat-masuk-selesai_pukul', 'placeholder' => 'Selesai Pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('nomor_agenda')); ?>

                    <?php echo e(Form::text('nomor_agenda', '', ['id' => 'surat-surat-masuk-nomor_agenda', 'placeholder' => 'Nomor Agenda', 'class' => 'form-control' . ($errors->has('nomor_agenda') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('tanggal_agenda')); ?>

                    <?php echo e(Form::date('tanggal_agenda', null, ['id' => 'surat-surat-masuk-tanggal_agenda', 'placeholder' => 'Tanggal Agenda', 'class' => 'form-control' . ($errors->has('tanggal_agenda') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    <?php echo e(Form::label('id_asal_ekspedisi_surat_masuk')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $asal_ekspedisi_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asal_ekspedisi_surat_masuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_asal_ekspedisi_surat_masuk', $asal_ekspedisi_surat_masuk->id,  null, ['id' => 'surat-surat-masuk-id_asal_ekspedisi_surat_masuk'.$asal_ekspedisi_surat_masuk->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-masuk-id_asal_ekspedisi_surat_masuk<?php echo e($asal_ekspedisi_surat_masuk->id); ?>"> <?php echo e($asal_ekspedisi_surat_masuk->asal_ekspedisi_surat_masuk); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('email_pengirim')); ?>

                    <?php echo e(Form::text('email_pengirim', '', ['id' => 'surat-surat-masuk-email_pengirim', 'placeholder' => 'Email Pengirim', 'class' => 'form-control' . ($errors->has('email_pengirim') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('alamat_pengirim')); ?>

                    <?php echo e(Form::text('alamat_pengirim', '', ['id' => 'surat-surat-masuk-alamat_pengirim', 'placeholder' => 'Alamat Pengirim', 'class' => 'form-control' . ($errors->has('alamat_pengirim') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('id_arahan_surat')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $arahan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-masuk-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-masuk-id_arahan_surat<?php echo e($arahan_surat->id); ?>"> <?php echo e($arahan_surat->arahan_surat); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('id_jenis_surat_masuk')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $jenis_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_surat_masuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_jenis_surat_masuk', $jenis_surat_masuk->id,  null, ['id' => 'surat-surat-masuk-id_jenis_surat_masuk'.$jenis_surat_masuk->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-masuk-id_jenis_surat_masuk<?php echo e($jenis_surat_masuk->id); ?>"> <?php echo e($jenis_surat_masuk->jenis_surat_masuk); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('meta')); ?>

                    <?php echo e(Form::text('meta', '', ['id' => 'surat-surat-masuk-meta', 'placeholder' => 'Meta', 'class' => 'form-control' . ($errors->has('meta') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_MODIF\surat-masuk\form.blade.php ENDPATH**/ ?>
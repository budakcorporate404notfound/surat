<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat-keluar-konsep-box-form">
            <form id="surat-surat-keluar-konsep-form" name="surat-surat-keluar-konsep-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <?php echo Form::hidden('id', '', ['id'=>'surat-surat-keluar-konsep-id']); ?>

                
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('status')); ?>

                    <?php echo e(Form::text('status', '', ['id' => 'surat-surat-keluar-konsep-status', 'placeholder' => 'Status', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('id_user')); ?>

                    <?php echo e(Form::text('id_user', '', ['id' => 'surat-surat-keluar-konsep-id_user', 'placeholder' => 'Id User', 'class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    <?php echo e(Form::label('id_arahan_surat')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $arahan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_arahan_surat<?php echo e($arahan_surat->id); ?>"> <?php echo e($arahan_surat->arahan_surat); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('id_surat_masuk')); ?>

                    <?php echo e(Form::text('id_surat_masuk', '', ['id' => 'surat-surat-keluar-konsep-id_surat_masuk', 'placeholder' => 'Id Surat Masuk', 'class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    <?php echo e(Form::label('id_jenis_dokumen')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $jenis_dokumens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_dokumen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_jenis_dokumen', $jenis_dokumen->id,  null, ['id' => 'surat-surat-keluar-konsep-id_jenis_dokumen'.$jenis_dokumen->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_jenis_dokumen<?php echo e($jenis_dokumen->id); ?>"> <?php echo e($jenis_dokumen->jenis_dokumen); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('nomor_surat')); ?>

                    <?php echo e(Form::text('nomor_surat', '', ['id' => 'surat-surat-keluar-konsep-nomor_surat', 'placeholder' => 'Nomor Surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('tanggal_surat')); ?>

                    <?php echo e(Form::date('tanggal_surat', null, ['id' => 'surat-surat-keluar-konsep-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('kepada')); ?>

                    <?php echo e(Form::text('kepada', '', ['id' => 'surat-surat-keluar-konsep-kepada', 'placeholder' => 'Kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('perihal')); ?>

                    <?php echo e(Form::text('perihal', '', ['id' => 'surat-surat-keluar-konsep-perihal', 'placeholder' => 'Perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('lampiran')); ?>

                    <?php echo e(Form::text('lampiran', '', ['id' => 'surat-surat-keluar-konsep-lampiran', 'placeholder' => 'Lampiran', 'class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('alamat')); ?>

                    <?php echo e(Form::text('alamat', '', ['id' => 'surat-surat-keluar-konsep-alamat', 'placeholder' => 'Alamat', 'class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('kota_penandatangan')); ?>

                    <?php echo e(Form::text('kota_penandatangan', '', ['id' => 'surat-surat-keluar-konsep-kota_penandatangan', 'placeholder' => 'Kota Penandatangan', 'class' => 'form-control' . ($errors->has('kota_penandatangan') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('jabatan_penandatangan')); ?>

                    <?php echo e(Form::text('jabatan_penandatangan', '', ['id' => 'surat-surat-keluar-konsep-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan', 'class' => 'form-control' . ($errors->has('jabatan_penandatangan') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('isi_surat')); ?>

                    <?php echo e(Form::textarea('isi_surat', null, ['id' => 'surat-surat-keluar-konsep-isi_surat', 'placeholder' => 'Isi Surat', 'class' => 'form-control summernote' . ($errors->has('isi_surat') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    <?php echo e(Form::label('id_sifat_keamanan_surat')); ?>

                    <div class="form-group">
                        <?php $__currentLoopData = $sifat_keamanan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_keamanan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-check form-check-inline">
                            <?php echo Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_sifat_keamanan_surat<?php echo e($sifat_keamanan_surat->id); ?>"> <?php echo e($sifat_keamanan_surat->sifat_keamanan_surat); ?></label>
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
                            <?php echo Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']); ?>

                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_sifat_penyelesaian_surat<?php echo e($sifat_penyelesaian_surat->id); ?>"> <?php echo e($sifat_penyelesaian_surat->sifat_penyelesaian_surat); ?></label>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('tanggal_mulai')); ?>

                    <?php echo e(Form::date('tanggal_mulai', null, ['id' => 'surat-surat-keluar-konsep-tanggal_mulai', 'placeholder' => 'Tanggal Mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('tanggal_selesai')); ?>

                    <?php echo e(Form::date('tanggal_selesai', null, ['id' => 'surat-surat-keluar-konsep-tanggal_selesai', 'placeholder' => 'Tanggal Selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('mulai_pukul')); ?>

                    <?php echo e(Form::time('mulai_pukul', null, ['id' => 'surat-surat-keluar-konsep-mulai_pukul', 'placeholder' => 'Mulai Pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    <?php echo e(Form::label('selesai_pukul')); ?>

                    <?php echo e(Form::time('selesai_pukul', null, ['id' => 'surat-surat-keluar-konsep-selesai_pukul', 'placeholder' => 'Selesai Pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_MODIF\surat-keluar-konsep\form.blade.php ENDPATH**/ ?>
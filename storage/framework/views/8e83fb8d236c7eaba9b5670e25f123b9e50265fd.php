<div class="box box-info padding-1">
    <div class="box-body">
        <form id="surat-surat-keluar-form" name="surat-surat-keluar-form" method="POST" role="form" enctype="multipart/form-data">
            <div class="row box-form surat-surat-keluar-box-form">
                <?php echo csrf_field(); ?>
                <?php echo Form::hidden('id', '', ['id'=>'id']); ?>


                
                <div class="row col-md-5">
                    <div class="col-md-12">
                        <label for="surat-surat-keluar-id_jenis_dokumen">Jenis Surat Keluar</label>
                        <div class="form-group">
                            <?php $__currentLoopData = $jenis_dokumens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_dokumen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check form-check-inline">
                                <?php echo Form::radio('id_jenis_dokumen', $jenis_dokumen->id,  null, ['id' => 'surat-surat-keluar-id_jenis_dokumen'.$jenis_dokumen->id, 'class'=>'form-check-input']); ?>

                                <label class="form-check-label" for="surat-surat-keluar-id_jenis_dokumen<?php echo e($jenis_dokumen->id); ?>"> <?php echo e($jenis_dokumen->jenis_dokumen); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="surat-surat-keluar-id_sifat_keamanan_surat">Sifat Keamanan Surat</label>
                        <div class="form-group">
                            <?php $__currentLoopData = $sifat_keamanan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_keamanan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check form-check-inline">
                                <?php echo Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-keluar-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']); ?>

                                <label class="form-check-label" for="surat-surat-keluar-id_sifat_keamanan_surat<?php echo e($sifat_keamanan_surat->id); ?>"> <?php echo e($sifat_keamanan_surat->sifat_keamanan_surat); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="surat-surat-keluar-id_sifat_penyelesaian_surat">Sifat Penyelesaian Surat</label>
                        <div class="form-group">
                            <?php $__currentLoopData = $sifat_penyelesaian_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_penyelesaian_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check form-check-inline">
                                <?php echo Form::radio('surat-surat-keluar-id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-keluar-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']); ?>

                                <label class="form-check-label" for="surat-surat-keluar-id_sifat_penyelesaian_surat<?php echo e($sifat_penyelesaian_surat->id); ?>"> <?php echo e($sifat_penyelesaian_surat->sifat_penyelesaian_surat); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('Kepada')); ?>

                        <?php echo e(Form::text('nomor_surat', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-nomor_surat', 'placeholder' => 'Nomor surat'])); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('Tanggal Surat')); ?>

                        <?php echo e(Form::date('tanggal_surat', '', ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-tanggal_surat', 'placeholder' => 'Tanggal surat'])); ?>

                    </div>

                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('Kepada')); ?>

                        <?php echo e(Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kepada', 'placeholder' => 'Surat dikirim kepada'])); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('Hal')); ?>

                        <?php echo e(Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-hal', 'placeholder' => 'Hal surat'])); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('lampiran')); ?>

                        <?php echo e(Form::text('lampiran', '', ['class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-lampiran', 'placeholder' => 'Lampiran surat'])); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('Alamat')); ?>

                        <?php echo e(Form::text('alamat', '', ['class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-alamat', 'placeholder' => 'Alamat pengiriman surat'])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label('Kota Penandatangan')); ?>

                        <?php echo e(Form::text('kota_penandatangan', 'Jakarta', ['class' => 'form-control' . ($errors->has('kota') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kota_penandatangan', 'placeholder' => 'Kota Penandatangan'])); ?>

                    </div>
                    <div class="form-group col-md-8">
                        <?php echo e(Form::label('Jabatan Penandatangan')); ?>

                        <?php echo e(Form::text('jabatan_penandatangan', 'Kepala Biro Perencanaan dan Organisasi', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan'])); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('tanggal_mulai')); ?>

                        <?php echo e(Form::date('tanggal_mulai', '', ['id'=> 'surat-surat-keluar-tanggal_mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-tanggal_mulai', 'placeholder' => 'Tanggal Mulai'])); ?>

                        <?php echo $errors->first('tanggal_mulai', '<div class="invalid-feedback">:message</p>'); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('tanggal_selesai')); ?>

                        <?php echo e(Form::date('tanggal_selesai', '', ['id'=> 'surat-surat-keluar-tanggal_selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-tanggal_selesai', 'placeholder' => 'Tanggal Selesai'])); ?>

                        <?php echo $errors->first('tanggal_selesai', '<div class="invalid-feedback">:message</p>'); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('mulai_pukul')); ?>

                        <?php echo e(Form::time('mulai_pukul', '', ['id'=> 'surat-surat-keluar-mulai_pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-mulai_pukul', 'placeholder' => 'Mulai Pukul'])); ?>

                        <?php echo $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('selesai_pukul')); ?>

                        <?php echo e(Form::time('selesai_pukul', '', ['id'=> 'surat-surat-keluar-selesai_pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-selesai_pukul', 'placeholder' => 'Selesai Pukul'])); ?>

                        <?php echo $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

                    </div>
                </div>
                

                
                <div class="row col-md-7">
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label('Isi surat')); ?>

                        <div class="form-group">
                            <textarea class="form-control summernote" name="isi_surat" id="surat-surat-keluar-isi_surat"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\surat-keluar-konsep\form.blade.php ENDPATH**/ ?>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <?php echo $__env->make('surat.surat-masuk.form-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="row box-form surat-masuk-box-form">

            
            <div class="col-md-5">
                <form id="surat_masuk-form" name="surat_masuk-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'surat_masuk-form-id']); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('nomor_surat')); ?>

                            <?php echo e(Form::text('nomor_surat', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'placeholder' => 'Nomor Surat'])); ?>

                            <?php echo $errors->first('nomor_surat', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('tanggal_surat')); ?>

                            <?php echo Form::date('tanggal_surat', null, ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'required' => 'required']); ?>

                            <?php echo $errors->first('tanggal_surat', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_asal_ekspedisi_surat_masuk">Asal ekspedisi surat masuk</label>
                                    <div class="form-group">
                                        <?php $__currentLoopData = $asal_ekspedisi_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asal_ekspedisi_surat_masuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <?php echo Form::radio('id_asal_ekspedisi_surat_masuk', $asal_ekspedisi_surat_masuk->id,  null, ['id' => 'id_asal_ekspedisi_surat_masuk'.$asal_ekspedisi_surat_masuk->id, 'class'=>'form-check-input']); ?>

                                            <label class="form-check-label" for="id_asal_ekspedisi_surat_masuk<?php echo e($asal_ekspedisi_surat_masuk->id); ?>"> <?php echo e($asal_ekspedisi_surat_masuk->asal_ekspedisi_surat_masuk); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_jenis_surat_masuk">Jenis Surat Masuk</label>
                                    <div class="form-group">
                                        <?php $__currentLoopData = $jenis_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_surat_masuk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <?php echo Form::radio('id_jenis_surat_masuk', $jenis_surat_masuk->id,  null, ['id' => 'id_jenis_surat_masuk'.$jenis_surat_masuk->id, 'class'=>'form-check-input']); ?>

                                            <label class="form-check-label" for="id_jenis_surat_masuk<?php echo e($jenis_surat_masuk->id); ?>"> <?php echo e($jenis_surat_masuk->jenis_surat_masuk); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('asal_surat_masuk')); ?>

                            <?php echo e(Form::text('asal_surat_masuk', '', ['class' => 'form-control' . ($errors->has('asal_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Asal Surat Masuk'])); ?>

                            <?php echo $errors->first('asal_surat_masuk', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('perihal')); ?>

                            <?php echo e(Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal'])); ?>

                            <?php echo $errors->first('perihal', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('kepada')); ?>

                            <?php echo e(Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'placeholder' => 'Kepada'])); ?>

                            <?php echo $errors->first('kepada', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('pejabat_pengirim_surat')); ?>

                            <?php echo e(Form::text('pejabat_pengirim_surat', '', ['class' => 'form-control' . ($errors->has('pejabat_pengirim_surat') ? ' is-invalid' : ''), 'placeholder' => 'Pejabat Pengirim Surat'])); ?>

                            <?php echo $errors->first('pejabat_pengirim_surat', '<div class="invalid-feedback">:message</p>'); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('arahan_surat')); ?>

                                <div class="form-group">
                                    <?php $__currentLoopData = $arahan_surats ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($arahan_surat->id_arahan_surat_parent == 2): ?>
                                    <div class="form-check form-check">
                                        <?php echo Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-masuk-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-surat-masuk-id_arahan_surat']); ?>

                                        <label class="form-check-label" for="surat-surat-masuk-id_arahan_surat<?php echo e($arahan_surat->id); ?>"> <?php echo e($arahan_surat->arahan_surat); ?></label>
                                    </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id_sifat_keamanan_surat">Sifat Keamanan Surat</label>
                                    <div class="form-group">
                                        <?php $__currentLoopData = $sifat_keamanan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_keamanan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <?php echo Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']); ?>

                                            <label class="form-check-label" for="id_sifat_keamanan_surat<?php echo e($sifat_keamanan_surat->id); ?>"> <?php echo e($sifat_keamanan_surat->sifat_keamanan_surat); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="id_sifat_penyelesaian_surat">Sifat Penyelesaian Surat</label>
                                    <div class="form-group">
                                        <?php $__currentLoopData = $sifat_penyelesaian_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_penyelesaian_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <?php echo Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']); ?>

                                            <label class="form-check-label" for="id_sifat_penyelesaian_surat<?php echo e($sifat_penyelesaian_surat->id); ?>"> <?php echo e($sifat_penyelesaian_surat->sifat_penyelesaian_surat); ?></label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            

            
            <div class="col-md-7 d-none pl-3" id="surat-surat-masuk-properties">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-detil-tab" data-toggle="tab" href="#nav-detil" role="tab" aria-controls="nav-detil" aria-selected="true">Detil</a>
                        <a class="nav-item nav-link" id="nav-disposisi-tab" data-toggle="tab" href="#nav-disposisi" role="tab" aria-controls="nav-disposisi" aria-selected="false">Disposisi</a>
                        <!-- <a class="nav-item nav-link" id="nav-diskusi-tab" data-toggle="tab" href="#nav-diskusi" role="tab" aria-controls="nav-diskusi" aria-selected="false">Diskusi</a>
                        <a class="nav-item nav-link" id="nav-bahan-kerja-tab" data-toggle="tab" href="#nav-bahan-kerja" role="tab" aria-controls="nav-bahan-kerja" aria-selected="false">Bahan kerja</a>
                        <a class="nav-item nav-link" id="nav-tanggapan-tab" data-toggle="tab" href="#nav-tanggapan" role="tab" aria-controls="nav-tanggapan" aria-selected="false">Tanggapan</a> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-detil" role="tabpanel" aria-labelledby="nav-detil-tab">
                        <p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('tenggat_waktu_tindak_lanjut')); ?>

                                    <?php echo Form::date('tenggat_waktu_tindak_lanjut', null, ['class' => 'form-control' . ($errors->has('tenggat_waktu_tindak_lanjut') ? ' is-invalid' : '')]); ?>

                                    <?php echo $errors->first('tenggat_waktu_tindak_lanjut', '<div class="invalid-feedback">:message</p>'); ?>

                                </div>
                                <div class="form-group col-md-3">
                                    <?php echo e(Form::label('mulai_pukul')); ?>

                                    <?php echo e(Form::time('mulai_pukul', '', ['class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Mulai Pukul'])); ?>

                                    <?php echo $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

                                </div>
                                <div class="form-group col-md-3">
                                    <?php echo e(Form::label('selesai_pukul')); ?>

                                    <?php echo e(Form::time('selesai_pukul', '', ['class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Selesai Pukul'])); ?>

                                    <?php echo $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>'); ?>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('email_pengirim')); ?>

                                    <?php echo e(Form::text('email_pengirim', '', ['class' => 'form-control' . ($errors->has('email_pengirim') ? ' is-invalid' : ''), 'placeholder' => 'Email Pengirim'])); ?>

                                    <?php echo $errors->first('email_pengirim', '<div class="invalid-feedback">:message</p>'); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('alamat_pengirim')); ?>

                                    <?php echo e(Form::text('alamat_pengirim', '', ['class' => 'form-control' . ($errors->has('alamat_pengirim') ? ' is-invalid' : ''), 'placeholder' => 'Alamat Pengirim'])); ?>

                                    <?php echo $errors->first('alamat_pengirim', '<div class="invalid-feedback">:message</p>'); ?>

                                </div>
                            </div>
                            <?php echo $__env->make('surat.tembusan-surat.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.dokumen-surat.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-disposisi" role="tabpanel" aria-labelledby="nav-disposisi-tab">
                        <p>
                            <?php echo $__env->make('surat.disposisi-pimpinan.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.disposisi-surat.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-diskusi" role="tabpanel" aria-labelledby="nav-diskusi-tab">
                        <p>
                            <?php echo $__env->make('surat.diskusi-surat.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-bahan-kerja" role="tabpanel" aria-labelledby="nav-bahan-kerja-tab">
                        <p>
                            <?php echo $__env->make('surat.file-tanggapan.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-tanggapan" role="tabpanel" aria-labelledby="nav-tanggapan-tab">
                        <p>
                            <?php echo $__env->make('surat.surat-keluar-konsep.index-in-surat-masuk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.file-surat-keluar.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/surat-masuk/form.blade.php ENDPATH**/ ?>
        <style>
            .p2nd { padding-left: 0em; text-indent:-0.5em; }
            .p2nd::before {
                content: ": ";
            }
        </style>

        <div class="row box-view" id="surat-surat-masuk-box-view">
            
            <div class="col-md-5" id="surat-surat-masuk-preview-pdf">
                <embed src="http://surat.test/uploads/1614569245.pdf#navpanes=1&amp;toolbar=1&amp;statusbar=1&amp;view=FitV" class="pdfobject" type="application/pdf" style="overflow: auto; width: 100%; height: 100%;"></embed>
            </div>
            
            <div class="col-md-7">
                <nav>
                    <div class="nav nav-tabs" id="nav-view-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-view-bahan-kerja-tab" data-toggle="tab" href="#nav-view-bahan-kerja" role="tab" aria-controls="nav-view-bahan-kerja" aria-selected="true">Info Surat</a><!--<span class="badge badge-pill badge-danger" id="surat-diskusi-surat-bahan-kerja">0</span>-->
                        <a class="nav-item nav-link" id="nav-view-disposisi-tab" data-toggle="tab" href="#nav-view-disposisi" role="tab" aria-controls="nav-view-disposisi" aria-selected="false">Disposisi</a>
                        <a class="nav-item nav-link" id="nav-view-diskusi-tab" data-toggle="tab" href="#nav-view-diskusi" role="tab" aria-controls="nav-view-diskusi" aria-selected="false">Diskusi <span class="badge badge-pill badge-danger" id="surat-diskusi-surat-total">0</span></a>
                        <a class="nav-item nav-link" id="nav-view-tanggapan-tab" data-toggle="tab" href="#nav-view-tanggapan" role="tab" aria-controls="nav-view-tanggapan" aria-selected="false">Balasan/Jawaban Surat <span class="badge badge-pill badge-danger" id="surat-diskusi-surat-tanggapan">0</span></a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-view-bahan-kerja" role="tabpanel" aria-labelledby="nav-view-bahan-kerja-tab">
                        <p>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('jenis_surat')); ?></div><div class="col-sm-9" id="view-id_jenis_surat_masuk"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('nomor_surat')); ?></div><div class="col-sm-9" id="view-nomor_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('tanggal')); ?></div><div class="col-sm-9" id="view-tanggal_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('asal_ekspedisi')); ?></div><div class="col-sm-9" id="view-id_asal_ekspedisi_surat_masuk"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('asal_surat')); ?></div><div class="col-sm-9" id="view-asal_surat_masuk"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('perihal')); ?></div><div class="col-sm-9" id="view-perihal"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('kepada')); ?></div><div class="col-sm-9" id="view-kepada"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('pejabat_pengirim')); ?></div><div class="col-sm-9" id="view-pejabat_pengirim_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('tembusan_surat')); ?></div><div class="col-sm-9" id="view-tembusan_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('dokumen_surat')); ?></div><div class="col-sm-9" id="view-dokumen_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('sifat_keamanan')); ?></div><div class="col-sm-9" id="view-id_sifat_keamanan_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('sifat_penyelesaian')); ?></div><div class="col-sm-9" id="view-id_sifat_penyelesaian_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('tenggat_waktu')); ?></div><div class="col-sm-9" id="view-tenggat_waktu_tindak_lanjut"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('mulai_pukul')); ?></div><div class="col-sm-9" id="view-mulai_pukul"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('selesai_pukul')); ?></div><div class="col-sm-9" id="view-selesai_pukul"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('arahan_surat')); ?></div><div class="col-sm-9" id="view-id_arahan_surat"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('email_pengirim')); ?></div><div class="col-sm-9" id="view-email_pengirim"></div></div>
                            <div class="row"><div class="col-sm-3"><?php echo e(Form::label('alamat_pengirim')); ?></div><div class="col-sm-9" id="view-alamat_pengirim"></div></div>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-view-disposisi" role="tabpanel" aria-labelledby="nav-view-disposisi-tab">
                        <p>
                            <?php echo $__env->make('surat.disposisi-pimpinan.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.disposisi-surat.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-view-diskusi" role="tabpanel" aria-labelledby="nav-view-diskusi-tab">
                        <p>
                            <?php echo $__env->make('surat.diskusi-surat.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.file-tanggapan.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-view-tanggapan" role="tabpanel" aria-labelledby="nav-view-tanggapan-tab">
                        <p>
                            <?php echo $__env->make('surat.surat-keluar-konsep.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('surat.file-surat-keluar.view-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/surat-masuk/form-view.blade.php ENDPATH**/ ?>
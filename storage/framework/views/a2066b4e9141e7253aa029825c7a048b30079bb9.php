<?php $__env->startSection('content'); ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('suratMasuk.update',$suratMasuk->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Ubah data surat masuk</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="nomor_surat">Nomor</label>
                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor surat masuk" value="<?php echo e($suratMasuk->nomor_surat); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_surat">Tanggal</label>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal surat masuk" value="<?php echo e($suratMasuk->tanggal_surat); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label for="kepada">Kepada</label><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="<?php echo e($suratMasuk->kepada); ?>"></div>
                        <div class="form-group"><label for="perihal">Perihal</label><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo e($suratMasuk->perihal); ?>"></div>
                        <div class="form-group"><label for="asal_surat_masuk">Asal surat masuk</label><input type="text" class="form-control" name="asal_surat_masuk" id="asal_surat_masuk" placeholder="Asal surat masuk" value="<?php echo e($suratMasuk->asal_surat_masuk); ?>"></div>
                        <div class="form-group"><label for="pejabat_pengirim_surat">Pejabat pengirim surat</label><input type="text" class="form-control" name="pejabat_pengirim_surat" id="pejabat_pengirim_surat" placeholder="Pejabat pengirim surat" value="<?php echo e($suratMasuk->pejabat_pengirim_surat); ?>"></div>

                        <div class="form-group"><label for="email_pengirim">Email pengirim</label><input type="text" class="form-control" name="email_pengirim" id="email_pengirim" placeholder="Email pengirim" value="<?php echo e($suratMasuk->email_pengirim); ?>"></div>
                        <div class="form-group"><label for="alamat_pengirim">Alamat pengirim</label><input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="Alamat pengirim" value="<?php echo e($suratMasuk->alamat_pengirim); ?>"></div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="nomor_agenda">Nomor agenda</label><input type="text" class="form-control" name="nomor_agenda" id="nomor_agenda" value="<?php echo e($suratMasuk->nomor_agenda); ?>" disabled></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="tanggal_agenda">Tanggal agenda</label><input type="text" class="form-control" name="tanggal_agenda" id="tanggal_agenda" value="<?php echo e($suratMasuk->tanggal_agenda); ?>" disabled></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_asal_ekspedisi_surat_masuk">Asal ekspedisi surat masuk</label>
                            <div class="form-group">
                                <?php $__currentLoopData = $asal_ekspedisi_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asal_ekspedisi_surat_masuk => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_asal_ekspedisi_surat_masuk<?php echo e($id); ?>" name="id_asal_ekspedisi_surat_masuk" value="<?php echo e($id); ?>"<?php if($suratMasuk->id_asal_ekspedisi_surat_masuk == $id): ?> checked="true"<?php endif; ?>><label class="form-check-label" for="id_asal_ekspedisi_surat_masuk<?php echo e($id); ?>"><?php echo e($asal_ekspedisi_surat_masuk); ?></label></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_jenis_surat">Jenis surat masuk</label>
                            <div class="form-group">
                                <?php $__currentLoopData = $jenis_surat_masuks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis_surat_masuk => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat_masuk<?php echo e($id); ?>" name="id_jenis_surat_masuk" value="<?php echo e($id); ?>"<?php if($suratMasuk->id_jenis_surat_masuk == $id): ?> checked="true"<?php endif; ?>><label class="form-check-label" for="id_jenis_surat_masuk<?php echo e($id); ?>"><?php echo e($jenis_surat_masuk); ?></label></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_sifat_keamanan_surat">Sifat keamanan surat</label>
                            <div class="form-group">
                            <?php $__currentLoopData = $sifat_keamanan_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_keamanan_surat => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_sifat_keamanan_surat<?php echo e($id); ?>" name="id_sifat_keamanan_surat" value="<?php echo e($id); ?>"<?php if($suratMasuk->id_sifat_keamanan_surat == $id): ?> checked="true"<?php endif; ?>><label class="form-check-label" for="id_sifat_keamanan_surat<?php echo e($id); ?>"><?php echo e($sifat_keamanan_surat); ?></label></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_sifat_penyelesaian_surat">Sifat penyelesaian surat</label>
                            <div class="form-group">
                                <?php $__currentLoopData = $sifat_penyelesaian_surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sifat_penyelesaian_surat => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_sifat_penyelesaian_surat<?php echo e($id); ?>" name="id_sifat_penyelesaian_surat" value="<?php echo e($id); ?>"<?php if($suratMasuk->id_sifat_penyelesaian_surat == $id): ?> checked="true"<?php endif; ?>><label class="form-check-label" for="id_sifat_penyelesaian_surat<?php echo e($id); ?>"><?php echo e($sifat_penyelesaian_surat); ?></label></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="form-group"><label for="tenggat_waktu_tindak_lanjut">Tenggat waktu</label><input type="text" class="form-control" name="tenggat_waktu_tindak_lanjut" id="tenggat_waktu_tindak_lanjut" placeholder="Tenggat waktu tindak lanjut" value="<?php echo e($suratMasuk->tenggat_waktu_tindak_lanjut); ?>"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="mulai_pukul">Mulai pukul</label><input type="text" class="form-control" name="mulai_pukul" id="mulai_pukul" placeholder="Mulai pukul" value="<?php echo e($suratMasuk->mulai_pukul); ?>"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="selesai_pukul">Selesai pukul</label><input type="text" class="form-control" name="selesai_pukul" id="selesai_pukul" placeholder="Selesai pukul" value="<?php echo e($suratMasuk->selesai_pukul); ?>"></div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-chalkboard-teacher"></i> Tembusan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                            <div class="col-md-12 collapse" id="collapseExample">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?php echo e(route('suratMasuk.store')); ?>" method="POST">
                                            <?php echo Form::hidden('id_surat_masuk', $suratMasuk->id); ?>

                                            <?php echo csrf_field(); ?>
                                            <div class="form-group"><label for="tembusan">Tambah tembusan surat</label><input type="text" class="form-control" name="tembusan" id="tembusan" placeholder="Tembusan kepada"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-muted text-right">
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fas fa-save"></i> Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                            </tr>
                            <?php if(empty($suratMasuk->tembusanSurat)): ?>
                                <tr><td colspan=10>Belum ada data</td></tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $suratMasuk->tembusanSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $tembusan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i+1); ?>.</td>
                                    <td><?php echo e($tembusan_surat->unit->jabatan); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

                        
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-file-pdf"></i> Dokumen surat
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('suratMasuk.index')); ?>"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Ukuran File</th>
                            </tr>
                            <?php if(empty($suratMasuk->dokumenSurat)): ?>
                                <tr><td colspan=10>Belum ada data</td></tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $suratMasuk->dokumenSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dokumen_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i+1); ?>.</td>
                                    <td><a href="#"><?php echo e($dokumen_surat->nama_file); ?></a></td>
                                    <td>(<?php echo e($dokumen_surat->ukuran_file/1024); ?>MB)</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

                    </div>

                    <div class="col-md-6">

                        
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-comments"></i> Disposisi pimpinan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('suratMasuk.index')); ?>"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Disposisi Pimpinan</th>
                            </tr>
                            <?php if(empty($suratMasuk->disposisiPimpinan)): ?>
                                <tr><td colspan=10>Belum ada data</td></tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $suratMasuk->disposisiPimpinan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $disposisi_pimpinan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i+1); ?>.</td>
                                    <td><?php echo e($disposisi_pimpinan->unit->jabatan); ?></td>
                                    <td><?php echo e($disposisi_pimpinan->disposisi_pimpinan); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

                        
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-comments"></i> Disposisi Atasan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="<?php echo e(route('suratMasuk.index')); ?>"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Pejabat Pendisposisi</th>
                                <th>Disposisi</th>
                                <th>Catatan</th>
                            </tr>
                            <?php if(empty($suratMasuk->disposisiSurat)): ?>
                                <tr><td colspan=10>Belum ada data</td></tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $suratMasuk->disposisiSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $disposisi_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i+1); ?>.</td>
                                    <td><?php echo e($disposisi_surat->arahanSurat->arahan_surat); ?></td>
                                    
                                    <td><?php echo e($disposisi_surat->ceklist_disposisi_surat); ?></td>
                                    <td><?php echo e($disposisi_surat->catatan_surat); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <a class="btn btn-sm btn-secondary" href="<?php echo e(route('suratMasuk.index')); ?>"> Kembali</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>

    </form>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\suratMasuk\edit.blade.php ENDPATH**/ ?>
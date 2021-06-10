<?php $__env->startSection('content'); ?>
<style>
    table th, .table td {
        padding: 0.2rem;
    }
</style>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Lihat surat masuk</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                        class="fas fa-times"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-5">Nomor surat</dt><dd class="col-sm-7"><?php echo e($suratMasuk->nomor_surat); ?></dd>
                        <dt class="col-sm-5">Tanggal surat</dt><dd class="col-sm-7"><?php echo e($suratMasuk->tanggal_surat); ?></dd>
                        <dt class="col-sm-5">Perihal</dt><dd class="col-sm-7"><?php echo e($suratMasuk->perihal); ?></dd>
                        <dt class="col-sm-5">Asal surat masuk</dt><dd class="col-sm-7"><?php echo e($suratMasuk->asal_surat_masuk); ?></dd>
                        <dt class="col-sm-5">Pejabat pengirim</dt><dd class="col-sm-7"><?php echo e($suratMasuk->pejabat_pengirim_surat); ?></dd>
                        <dt class="col-sm-5">Kepada</dt><dd class="col-sm-7"><?php echo e($suratMasuk->kepada); ?></dd>
                        <?php if($suratMasuk->email_pengirim<>""): ?><dt class="col-sm-5">Email pengirim</dt><dd class="col-sm-7"><?php echo e($suratMasuk->email_pengirim); ?></dd><?php endif; ?>
                        <?php if($suratMasuk->alamat_pengirim<>""): ?><dt class="col-sm-5">Alamat pengirim</dt><dd class="col-sm-7"><?php echo e($suratMasuk->alamat_pengirim); ?></dd><?php endif; ?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-5">Nomor agenda</dt><dd class="col-sm-7"><?php echo e($suratMasuk->nomor_agenda); ?></dd>
                        <dt class="col-sm-5">Tanggal agenda</dt><dd class="col-sm-7"><?php echo e($suratMasuk->tanggal_agenda); ?></dd>
                        <dt class="col-sm-5">Asal ekspedisi surat</dt><dd class="col-sm-7"><?php echo e($suratMasuk->AsalEkspedisiSuratMasuk->asal_ekspedisi_surat_masuk); ?></dd>
                        <dt class="col-sm-5">Jenis surat masuk</dt><dd class="col-sm-7"><?php echo e($suratMasuk->JenisSuratMasuk->jenis_surat_masuk); ?></dd>
                        <dt class="col-sm-5">Sifat keamanan surat</dt><dd class="col-sm-7"><?php echo e($suratMasuk->sifatKeamananSurat->sifat_keamanan_surat); ?></dd>
                        <dt class="col-sm-5">Sifat penyelesaian</dt><dd class="col-sm-7"><?php echo e($suratMasuk->sifatPenyelesaianSurat->sifat_penyelesaian_surat); ?></dd>
                        <?php if($suratMasuk->tenggat_waktu_tindak_lanjut<>""): ?><dt class="col-sm-5">Tenggat waktu tindak lanjut</dt><dd class="col-sm-7"><?php echo e($suratMasuk->tenggat_waktu_tindak_lanjut); ?></dd><?php endif; ?>
                        <?php if($suratMasuk->mulai_pukul<>""): ?><dt class="col-sm-5">Mulai pukul</dt><dd class="col-sm-7"><?php echo e($suratMasuk->mulai_pukul); ?></dd><?php endif; ?>
                        <?php if($suratMasuk->selesai_pukul<>""): ?><dt class="col-sm-5">Selesai pukul</dt><dd class="col-sm-7"><?php echo e($suratMasuk->selesai_pukul); ?></dd><?php endif; ?>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-6">

                    <?php if(count($suratMasuk->tembusanSurat)>0): ?>
                    <i class="fas fa-chalkboard-teacher"></i> Tembusan
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                        </tr>
                        <?php $__currentLoopData = $suratMasuk->tembusanSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $tembusan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?>.</td>
                            <td><?php echo e($tembusan_surat->unit->jabatan); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php endif; ?>

                    <?php if(count($suratMasuk->dokumenSurat)>0): ?>
                    <i class="fas fa-file-pdf"></i> Dokumen surat
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Ukuran File</th>
                        </tr>
                        <?php $__currentLoopData = $suratMasuk->dokumenSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dokumen_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?>.</td>
                            <td><a href="#"><?php echo e($dokumen_surat->nama_file); ?></a></td>
                            <td>(<?php echo e($dokumen_surat->ukuran_file/1024); ?>MB)</td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php endif; ?>

                </div>
                <div class="col-md-6">

                    <?php if(count($suratMasuk->disposisiPimpinan)>0): ?>
                    <i class="fas fa-comments"></i> Disposisi pimpinan
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Disposisi Pimpinan</th>
                            </tr>
                            <?php $__currentLoopData = $suratMasuk->disposisiPimpinan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $disposisi_pimpinan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i+1); ?>.</td>
                                <td><?php echo e($disposisi_pimpinan->unit->jabatan); ?></td>
                                <td><?php echo e($disposisi_pimpinan->disposisi_pimpinan); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    <?php endif; ?>

                    <?php if(count($suratMasuk->disposisiSurat)>0): ?>
                    <i class="fas fa-comments"></i> Disposisi Atasan
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Pejabat Pendisposisi</th>
                            <th>Disposisi</th>
                            <th>Catatan</th>
                        </tr>
                        <?php $__currentLoopData = $suratMasuk->disposisiSurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $disposisi_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?>.</td>
                            <td><?php echo e($disposisi_surat->arahanSurat->arahan_surat); ?></td>
                            
                            <td><?php echo e($disposisi_surat->ceklist_disposisi_surat); ?></td>
                            <td><?php echo e($disposisi_surat->catatan_surat); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php endif; ?>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-right">
            <form action="<?php echo e(route('suratMasuk.destroy',$suratMasuk->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                
                <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('suratMasuk.edit',$suratMasuk->id)); ?>"><i class="fas fa-edit"></i>  Edit</a>
                <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('suratMasuk.index')); ?>"><i class="fas fa-angle-left"></i> Kembali</a>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_ASLI_LAMA\suratMasuk\show.blade.php ENDPATH**/ ?>
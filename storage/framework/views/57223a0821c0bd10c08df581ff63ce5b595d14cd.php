<div class="row mb-3">
    <div class="col-md-6" id="card_title"><?php echo e(Form::label('surat keluar konsep')); ?></div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="btn-surat-surat-keluar-konsep-create"><i class="fas fa-plus-circle"></i> Tambah surat keluar konsep</a>
    </div>
</div>

<div class="card">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" id="surat-surat-keluar-konsep-alert-box">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat-keluar-konsep-data-table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Status</th>
						<th>Id User</th>
						<th>Id Arahan Surat</th>
						<th>Id Surat Masuk</th>
						<th>Id Jenis Dokumen</th>
						<th>Nomor Surat</th>
						<th>Tanggal Surat</th>
						<th>Kepada</th>
						<th>Perihal</th>
						<th>Lampiran</th>
						<th>Alamat</th>
						<th>Kota Penandatangan</th>
						<th>Jabatan Penandatangan</th>
						<th>Isi Surat</th>
						<th>Id Sifat Keamanan Surat</th>
						<th>Id Sifat Penyelesaian Surat</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Mulai Pukul</th>
						<th>Selesai Pukul</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-surat-keluar-konsep-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12 modal-title" id="surat-surat-keluar-konsep-model-heading"></div>
                <button type="button" class="close" data-dismiss="#surat-surat-keluar-konsep-ajax-modal" data-target="#surat-surat-keluar-konsep-ajax-modal" aria-label="Close" onclick="$('#surat-surat-keluar-konsep-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('surat.surat-keluar-konsep.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="btn-surat-surat-keluar-konsep-save" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="#surat-surat-keluar-konsep-ajax-modal" data-target="#surat-surat-keluar-konsep-ajax-modal" onclick="$('#surat-surat-keluar-konsep-ajax-modal').modal('hide');">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_MODIF\surat-keluar-konsep\index.blade.php ENDPATH**/ ?>
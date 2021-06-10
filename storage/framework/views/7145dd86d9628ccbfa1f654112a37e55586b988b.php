<div class="row col-md-12 mb-3">
    <div class="col-md-6" id="card_title"><?php echo e(Form::label('surat masuk')); ?></div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="btn-surat-surat-masuk-create"><i class="fas fa-plus-circle"></i> Tambah surat masuk</a>
    </div>
</div>

<div class="card">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" id="surat-surat-masuk-alert-box">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat-masuk-data-table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
						<th>Asal Surat Masuk</th>
						<th>Pejabat Pengirim Surat</th>
						<th>Nomor Surat</th>
						<th>Tanggal Surat</th>
						<th>Kepada</th>
						<th>Perihal</th>
						<th>Id Sifat Keamanan Surat</th>
						<th>Id Sifat Penyelesaian Surat</th>
						<th>Tenggat Waktu Tindak Lanjut</th>
						<th>Mulai Pukul</th>
						<th>Selesai Pukul</th>
						<th>Nomor Agenda</th>
						<th>Tanggal Agenda</th>
						<th>Id Asal Ekspedisi Surat Masuk</th>
						<th>Email Pengirim</th>
						<th>Alamat Pengirim</th>
						<th>Id Arahan Surat</th>
						<th>Id Jenis Surat Masuk</th>
						<th>Meta</th>
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
<div class="modal fade" id="surat-surat-masuk-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12 modal-title" id="surat-surat-masuk-model-heading"></div>
                <button type="button" class="close" data-dismiss="#surat-surat-masuk-ajax-modal" data-target="#surat-surat-masuk-ajax-modal" aria-label="Close" onclick="$('#surat-surat-masuk-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('surat.surat-masuk.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="btn-surat-surat-masuk-save" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="#surat-surat-masuk-ajax-modal" data-target="#surat-surat-masuk-ajax-modal" onclick="$('#surat-surat-masuk-ajax-modal').modal('hide');">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat_MODIF\surat-masuk\index.blade.php ENDPATH**/ ?>
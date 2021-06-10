<?php $__env->startSection('template_title'); ?>
Surat Keluar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Surat Keluar')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="surat-surat-keluar-create-new"> <?php echo e(__('Tambah surat keluar baru')); ?></a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat-keluar-data-table">
                        <thead>
                            <tr>
                                <th>No</th>

								
								<th>Tujuan Surat</th>
								<th>Perihal</th>
								

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="surat-surat-keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-surat-keluar-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('surat.surat-keluar.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="surat-surat-keluar-save-btn" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
$(function () {
    $('.summernote').summernote({
        height: 400
    });

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var surat_keluar_table = $('#surat-surat-keluar-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('surat_keluar_konsep.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_jenis_dokumen', name: 'id_jenis_dokumen'},
            // {data: 'nomor_surat', name: 'nomor_surat'},
            // {data: 'tanggal_surat', name: 'tanggal_surat'},
            {data: 'kepada', name: 'kepada'},
            {data: 'perihal', name: 'perihal'},
            // {data: 'id_sifat_keamanan_surat', name: 'id_sifat_keamanan_surat'},
            // {data: 'id_sifat_penyelesaian_surat', name: 'id_sifat_penyelesaian_surat'},
            // {data: 'tanggal_mulai', name: 'tanggal_mulai'},
            // {data: 'tanggal_selesai', name: 'tanggal_selesai'},
            // {data: 'mulai_pukul', name: 'mulai_pukul'},
            // {data: 'selesai_pukul', name: 'selesai_pukul'},

            {data: 'action', name: 'action', orderable: false, searchable: false, className: "text-nowrap", width: "1%"},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_keluar_table );

    $('#surat-surat-keluar-create-new').click(function () {
        $('#surat-surat-keluar-model-heading').html("Tambah surat keluar baru");
        $('#surat-surat-keluar-save-btn').val("Simpan surat keluar");
        $('#surat-surat-keluar-id', '#surat-surat-keluar-form').val('');
        $('#surat-surat-keluar-form').trigger("reset");
        $('#surat-surat-keluar-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-surat-keluar-edit', function () {
        var surat_keluar_id = $(this).data('id');
        $.get("<?php echo e(route('surat_keluar_konsep.index')); ?>" +'/' + surat_keluar_id +'/edit', function (data) {
            $('#surat-surat-keluar-model-heading').html("Ubah surat keluar");
            $('#surat-surat-keluar-save-btn').val("edit-user");
            $('#surat-surat-keluar-ajax-modal').modal('show');

            $('#surat-surat-keluar-id','#surat-surat-keluar-form').val(data.id);
            $('#surat-surat-keluar-id_surat_masuk', '#surat-surat-keluar-form').val(data.id_surat_masuk);
            $('#surat-surat-keluar-id_jenis_dokumen'+data.id_jenis_dokumen, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-id_sifat_keamanan_surat'+data.id_sifat_keamanan_surat, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-id_sifat_penyelesaian_surat'+data.id_sifat_penyelesaian_surat, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-nomor_surat', '#surat-surat-keluar-form').val(data.nomor_surat);
            $('#surat-surat-keluar-tanggal_surat', '#surat-surat-keluar-form').val(data.tanggal_surat);
            $('#surat-surat-keluar-kepada', '#surat-surat-keluar-form').val(data.kepada);
            $('#surat-surat-keluar-perihal', '#surat-surat-keluar-form').val(data.perihal);
            $('#surat-surat-keluar-lampiran', '#surat-surat-keluar-form').val(data.lampiran);
            $('#surat-surat-keluar-alamat', '#surat-surat-keluar-form').val(data.alamat);
            $('#surat-surat-keluar-kota_penandatangan', '#surat-surat-keluar-form').val(data.kota_penandatangan);
            $('#surat-surat-keluar-jabatan_penandatangan', '#surat-surat-keluar-form').val(data.jabatan_penandatangan);
            $('#surat-surat-keluar-tanggal_mulai', '#surat-surat-keluar-form').val(data.tanggal_mulai);
            $('#surat-surat-keluar-tanggal_selesai', '#surat-surat-keluar-form').val(data.tanggal_selesai);
            $('#surat-surat-keluar-mulai_pukul', '#surat-surat-keluar-form').val(data.mulai_pukul);
            $('#surat-surat-keluar-selesai_pukul', '#surat-surat-keluar-form').val(data.selesai_pukul);
            $('#surat-surat-keluar-isi_surat', '#surat-surat-keluar-form').summernote('code', data.isi_surat);

        })
    });

    $('#surat-surat-keluar-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#surat-surat-keluar-form').serialize(),
            url: "<?php echo e(route('surat_keluar_konsep.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#surat-surat-keluar-save-btn').html('Simpan perubahan');
                $('#surat-surat-keluar-form').trigger("reset");
                $('#surat-surat-keluar-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-surat-keluar-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat-surat-keluar-delete', function (){
        var surat_keluar_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('surat_keluar_konsep.store')); ?>"+'/'+surat_keluar_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }else{
            return false;
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\surat-keluar-konsep\index-full.blade.php ENDPATH**/ ?>
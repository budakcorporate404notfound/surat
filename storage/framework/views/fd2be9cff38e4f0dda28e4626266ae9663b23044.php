<?php $__env->startSection('title'); ?>
Konsep Surat Keluar
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6" id="card_title"><?php echo e(Form::label('daftar_konsep_balasan/jawaban_surat')); ?></div>
                        <div class="col-md-6 text-right">
                            <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-surat_keluar_konsep-create-new"><i class="fas fa-plus-circle"></i> Tambah konsep balasan/jawaban surat</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat-keluar-konsep-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
								<th>Tujuan dan Perihal Surat</th>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-surat_keluar_konsep-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-surat_keluar_konsep-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $__env->make('surat.surat-keluar-konsep.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="modal-footer text-right">
                <?php if(auth()->user()->id_unit_kerja != 2): ?>
                <div class="input-group" style="width:50% !important;">
                    <select class="custom-select" id="surat-surat_keluar_konsep_arahan-id">
                        <option selected>Pilih atasan...</option>
                    <?php $__currentLoopData = $arahan_surats ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arahan_surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    
                        <option value="<?php echo e($arahan_surat->id); ?>"<?php if($arahan_surat->id == $default_arahan): ?> SELECTED <?php endif; ?>> <?php echo e($arahan_surat->arahan_surat); ?></option>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-default" for="inputGroupSelect01" id="surat-surat_keluar_konsep-kirim-btn">Kirim ke atasan</button>
                    </div>
                </div>
                <?php else: ?>
                <button type="submit" class="btn btn-danger" id="surat-surat_keluar_konsep-ttd-btn" value="create">Tanda tangan elektronik</button>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary" id="surat-surat_keluar_konsep-save-btn" value="create">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_keluar_konsep_table = $('#surat-surat-keluar-konsep-data-table').on('xhr.dt', function (e, settings, json, xhr) {
            if (typeof($('#surat-diskusi-surat-tanggapan')) != 'undefined' && $('#surat-diskusi-surat-tanggapan') != null) {
                $('#surat-diskusi-surat-tanggapan').html(json.recordsTotal);
            }
        }).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('surat_keluar_konsep.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            {
                data: null,
                render: function(data, type, row, meta) {
                    return `${data.kepada}<br><span class="font-weight-lighter">${data.perihal}</span>`;
                },
                width: "%",
                searchable: false
            },
            {data: 'action', name: 'action', orderable: false, searchable: false, width: "1%"},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_keluar_konsep_table );

    $('#surat-surat_keluar_konsep-create-new').click(function () {
        $('#surat-surat_keluar_konsep-model-heading').html("Tambah baru konsep surat");
        $('#surat-surat_keluar_konsep-save-btn').val("Simpan konsep surat");
        $('#id', '#surat-surat_keluar_konsep-form').val('');
        $('#surat-surat_keluar_konsep-form').trigger("reset");

        $('#surat-surat_keluar_konsep-id_jenis_dokumen3', '#surat-surat_keluar_konsep-form').prop('checked', true);
        $('#surat-surat_keluar_konsep-id_sifat_keamanan_surat1', '#surat-surat_keluar_konsep-form').prop('checked', true);
        $('#surat-surat_keluar_konsep-id_sifat_penyelesaian_surat1', '#surat-surat_keluar_konsep-form').prop('checked', true);

        $('#surat-surat_keluar_konsep-isi_surat', '#surat-surat_keluar_konsep-form').summernote('code', 'Sehubungan dengan ... (silahkan untuk melanjutkan isi surat)');
        $('#surat-surat_keluar_konsep-tembusan', '#surat-surat_keluar_konsep-form').summernote('code', '<ol><li>YM. Ketua Mahkamah Agung RI</li><li>YM. Wakil Ketua&nbsp;&nbsp;Mahkamah Agung RI Bidang Yudisial</li></ol>');
        $('#surat-surat_keluar_konsep-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-surat_keluar_konsep-edit', function () {
        var surat_keluar_konsep_id = $(this).data('id');
        $.get("<?php echo e(route('surat_keluar_konsep.index')); ?>" +'/' + surat_keluar_konsep_id +'/edit', function (data) {
            $('#surat-surat_keluar_konsep-model-heading').html("Ubah konsep surat");
            $('#surat-surat_keluar_konsep-save-btn').val("edit-user");
            $('#surat-surat_keluar_konsep-ajax-modal').modal('show');

            $('#surat-surat_keluar_konsep-id','#surat-surat_keluar_konsep-form').val(data.id);
            $('#surat-surat_keluar_konsep-id_surat_masuk', '#surat-surat_keluar_konsep-form').val(data.id_surat_masuk);
            $('#surat-surat_keluar_konsep-id_jenis_dokumen'+data.id_jenis_dokumen, '#surat-surat_keluar_konsep-form').prop('checked', true);
            $('#surat-surat_keluar_konsep-id_sifat_keamanan_surat'+data.id_sifat_keamanan_surat, '#surat-surat_keluar_konsep-form').prop('checked', true);
            $('#surat-surat_keluar_konsep-id_sifat_penyelesaian_surat'+data.id_sifat_penyelesaian_surat, '#surat-surat_keluar_konsep-form').prop('checked', true);
            $('#surat-surat_keluar_konsep-tanggal_surat', '#surat-surat_keluar_konsep-form').val(data.tanggal_surat);
            $('#surat-surat_keluar_konsep-kepada', '#surat-surat_keluar_konsep-form').val(data.kepada);
            $('#surat-surat_keluar_konsep-perihal', '#surat-surat_keluar_konsep-form').val(data.perihal);
            $('#surat-surat_keluar_konsep-tanggal_mulai', '#surat-surat_keluar_konsep-form').val(data.tanggal_mulai);
            $('#surat-surat_keluar_konsep-tanggal_selesai', '#surat-surat_keluar_konsep-form').val(data.tanggal_selesai);
            $('#surat-surat_keluar_konsep-mulai_pukul', '#surat-surat_keluar_konsep-form').val(data.mulai_pukul);
            $('#surat-surat_keluar_konsep-selesai_pukul', '#surat-surat_keluar_konsep-form').val(data.selesai_pukul);
            $('#surat-surat_keluar_konsep-isi_surat', '#surat-surat_keluar_konsep-form').summernote('code', data.isi_surat);
            $('#surat-surat_keluar_konsep-tembusan', '#surat-surat_keluar_konsep-form').summernote('code', data.tembusan);
            $('#surat-surat_keluar_konsep-alamat', '#surat-surat_keluar_konsep-form').val(data.alamat);
            $('#surat-surat_keluar_konsep-lampiran', '#surat-surat_keluar_konsep-form').val(data.lampiran);
        })
    });

    $('body').on('click', '#surat-surat_keluar_konsep-kirim-btn', function () {
        $('#surat-surat_keluar_konsep-kirim-btn').html('Proses kirim...');
        var surat_keluar_konsep_id = $('#surat-surat_keluar_konsep-id').val();
        var surat_keluar_konsep_arahan_id = $('#surat-surat_keluar_konsep_arahan-id').val();
        $.ajax({
            data: 'surat_keluar_konsep_id=' + surat_keluar_konsep_id + '&surat_keluar_konsep_arahan_id=' + surat_keluar_konsep_arahan_id,
            url: "<?php echo e(route('suratkeluarkonsep.kirimdraft')); ?>/",
            type: "POST",
            dataType: 'json',
            success: function (res) {
                toastr.success("Pengiriman konsep surat berhasil.", "Berhasil");
                $('#surat-surat_keluar_konsep-kirim-btn').html('Kirim ke atasan');
            },
            error: function (data) {
                // console.log('Error:', data);
                // $('#surat-surat_keluar_konsep-kirim-btn').html('Kirim ke atasan');
            },
            complete: function(e){

            }
        });
    });

    $('#surat-surat_keluar_konsep-unduh-btn').click(function (e) {
        e.preventDefault();
        var surat_keluar_konsep_id = $('#surat-surat_keluar_konsep-id').val();
        var surat_keluar_konsep_id_jenis_dokumen = $('input[name="id_jenis_dokumen"]:checked').val();

        window.open("http://<?php echo e(Request::getHost()); ?>/surat/generatesurat/" + surat_keluar_konsep_id + '/' + surat_keluar_konsep_id_jenis_dokumen, '_blank');
    });

    $('#surat-surat_keluar_konsep-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Proses pengiriman data ..');

        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        $.ajax({
            data: $('#surat-surat_keluar_konsep-form').serialize(),
            url: "<?php echo e(route('surat_keluar_konsep.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value){
                        $('#surat-surat_keluar_konsep-'+key+' + div').html(value);
                    });
                    $('.invalid-feedback').show();
                    toastr.error("Silahkan cek kembali pengisian data Anda.", "Data gagal disimpan");
                    $('#surat-surat_keluar_konsep-save-btn').html('Simpan perubahan');
                } else {
                    $('#surat-surat_keluar_konsep-save-btn').html('Simpan perubahan');
                    $('#surat-surat_keluar_konsep-form').trigger("reset");
                    $('#surat-surat_keluar_konsep-ajax-modal').modal('hide');
                    toastr.success("Penyimpanan data surat keluar berhasil disimpan.", "Data berhasil disimpan.");
                    surat_keluar_konsep_table.draw();
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-surat_keluar_konsep-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat_keluar_konsep-delete', function (){
        var surat_keluar_konsep_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('surat_keluar_konsep.store')); ?>"+'/'+surat_keluar_konsep_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\surat-keluar-konsep\index.blade.php ENDPATH**/ ?>
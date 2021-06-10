<div id="surat-file-surat-keluar-data-table-pos">
    <div id="surat-file-surat-keluar-data-block">
        <div class="row mb-3">
            <div class="col-md-6" id="card_title"><?php echo e(Form::label('file_lampiran_surat_keluar_(tanggapan)')); ?></div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-file-surat-keluar-create-new"><i class="fas fa-plus-circle"></i>  Tambah lampiran surat</a>
            </div>
        </div>
        <div class="card">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <div class="card-body col-md-12">
                <table class="table table-bordered data-table dt-responsive nowrap" id="file-surat-keluar-data-table" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
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
<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-file-surat-keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-file-surat-keluar-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-file-surat-keluar-ajax-modal" data-target="#surat-file-surat-keluar-ajax-modal" aria-label="Close" onclick="$('#surat-file-surat-keluar-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="surat-file-surat-keluar-pdf" style="height: 30rem; border: 1rem solid rgba(0,0,0,.1)"></div>
                <form id="surat-file-surat-keluar-form" name="surat-file-surat-keluar-form"  method="POST"  role="form" enctype="multipart/form-data" class="dropzone">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'surat-file-surat-keluar-id']); ?>

                    <?php echo Form::hidden('id_surat_keluar', '', ['id'=>'surat-file-surat-keluar-id_surat_keluar']); ?>

                </form>
            </div>
            <div class="modal-footer">
                <div class="col-sm-offset-2 col-sm-12 text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="#surat-file-surat-keluar-ajax-modal" data-target="#surat-file-surat-keluar-ajax-modal" onclick="$('#surat-file-surat-keluar-ajax-modal').modal('hide');">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#surat-file-surat-keluar-data-table thead {display: none;}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_file_surat_keluar_table = $('#file-surat-keluar-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "<?php echo e(route('file_surat_keluar.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_file_surat_keluar_table );

    $('#surat-file-surat-keluar-create-new').click(function () {
        $('#surat-file-surat-keluar-model-heading').html("Tambah baru lampiran");
        $('#surat-file-surat-keluar-save-btn').val("Simpan file lampiran");
        $('#surat-id', '#surat-file-surat-keluar-form').val('');
        reset_form_data('#surat-file-surat-keluar-form');
        $('#surat-file-surat-keluar-pdf').html('');
        $('#surat-file-surat-keluar-form').trigger("reset");
        $('#surat-file-surat-keluar-ajax-modal').modal('show');
    });

    $('body').on('click', '.file-surat-keluar-edit', function () {
        var surat_keluar_id = $(this).data('id');
        var fileURL = '<?php echo e(url('/')); ?>/uploads/' + $(this).attr("file-name");
        $.get("<?php echo e(route('file_surat_keluar.index')); ?>" +'/' + surat_keluar_id +'/edit', function (data) {
            reset_form_data('#surat-file-surat-keluar-form');
            $('#surat-file-surat-keluar-model-heading').html("Ubah lampiran surat");
            $('#surat-file-surat-keluar-save-btn').val("Simpan lampiran surat");
            $('#surat-file-surat-keluar-ajax-modal').modal('show');
            $('#surat-file-surat-keluar-id','#surat-file-surat-keluar-form').val(data.id);
            $('#surat-file-surat-keluar-id_surat_keluar', '#surat-file-surat-keluar-form').val(data.id_surat_keluar);
            $('#surat-file-surat-keluar-file-surat-keluar', '#surat-file-surat-keluar-form').val(data.file_surat_keluar);
            if ( fileURL.slice(-3) == 'pdf' ) {
                var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
                var myPDF = PDFObject.embed(fileURL, "#surat-file-surat-keluar-pdf", options);
            } else {
                $("#surat-file-surat-keluar-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
            }
        })
    });

    $('body').on('click', '.surat-file-surat-keluar-delete', function (){
        var surat_keluar_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('file_surat_keluar.store')); ?>"+'/'+surat_keluar_id,
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

    surat_file_surat_keluar_table_reload = function(){
        surat_file_surat_keluar_table.ajax.url( '<?php echo e(route( 'file_surat_keluar.index' )); ?>?id_surat_keluar=' + surat_keluar_id ).load();
    }
});

Dropzone.autoDiscover = false;

var file_surat_keluar_dropzone = new Dropzone("#surat-file-surat-keluar-form", {
    url: "<?php echo e(route('file_surat_keluar.store')); ?>",
    maxFilesize: 10,
    success: function (file, response) {
        var ext = getFileExt(file.name);
        var newImagePath = file.name;
        /* Check for extension */
        if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif') {
            newImagePath = "upload/default-image.jpg";
        }
        this.createThumbnailFromUrl(file, newImagePath);

        var fileURL = '<?php echo e(url('/')); ?>/uploads/' + response.file;
        if ( fileURL.slice(-3) == 'pdf' ) {
            var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
            var myPDF = PDFObject.embed(fileURL, "#surat-file-surat-keluar-pdf", options);
        } else {
            $("#surat-file-surat-keluar-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
        }

        /* reload dokumen surat table */
        surat_file_surat_keluar_table_reload();
        /* remove last preview */
        $(".dz-preview").remove();
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\file-surat-keluar\index.blade.php ENDPATH**/ ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6" id="card_title"><?php echo e(__('Dokumen Surat')); ?></div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="dokumen_surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah dokumen surat</a>
            </div>
        </div>
    </div>
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-12 table-responsive">
        <table class="table table-bordered data-table dt-responsive nowrap" id="dokumen_surat-data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>

                    
                    <th>Dokumen Surat</th>
                    
                    <th>Ukuran File</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="dokumen_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="dokumen_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#dokumen_surat-model-heading" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="dokumen_surat-form" name="dokumen_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('surat.dokumen-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="dokumen_surat-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#dokumen_surat-model-heading">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var dokumen_surat_table = $('#dokumen_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        filter: false,
        ajax: "<?php echo e(route('dokumen_surat.index')); ?>",
        columnDefs: [{ "width": "5%", "targets": 0 }],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            {data: 'dokumen_surat', name: 'dokumen_surat'},
            // {data: 'nama_file', name: 'nama_file'},
            // {data: 'id_jenis_file', name: 'id_jenis_file'},
            {data: 'ukuran_file', name: 'ukuran_file'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( dokumen_surat_table );

    $('#dokumen_surat-create-new').click(function () {
        $('#dokumen_surat-model-heading').html("Tambah baru dokumen_surat");
        $('#dokumen_surat-save-btn').val("create-dokumen_surat");
        $('#id', '#dokumen_surat-form').val('');
        $('#dokumen_surat-form').trigger("reset");
        $('#dokumen_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.dokumen_surat-edit', function () {
        var dokumen_surat_id = $(this).data('id');
        $.get("<?php echo e(route('dokumen_surat.index')); ?>" +'/' + dokumen_surat_id +'/edit', function (data) {
            $('#dokumen_surat-model-heading').html("Ubah dokumen_surat");
            $('#dokumen_surat-save-btn').val("edit-user");
            $('#dokumen_surat-ajax-modal').modal('show');
            $('#id','#dokumen_surat-form').val(data.id);
            $('#id_surat_masuk', '#dokumen_surat-form').val(data.id_surat_masuk);
            $('#dokumen_surat', '#dokumen_surat-form').val(data.dokumen_surat);
            $('#nama_file', '#dokumen_surat-form').val(data.nama_file);
            $('#id_jenis_file', '#dokumen_surat-form').val(data.id_jenis_file);
            $('#ukuran_file', '#dokumen_surat-form').val(data.ukuran_file);

        })
    });

    $('#dokumen_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#dokumen_surat-form').serialize(),
            url: "<?php echo e(route('dokumen_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#dokumen_surat-save-btn').html('Simpan perubahan');
                $('#dokumen_surat-form').trigger("reset");
                $('#dokumen_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#dokumen_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.dokumen_surat-delete', function (){
        var dokumen_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('dokumen_surat.store')); ?>"+'/'+dokumen_surat_id,
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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\dokumen-surat\index.blade.php ENDPATH**/ ?>



<div class="row mb-3">
    <div class="col-md-6" id="card_title"><?php echo e(Form::label('Tembusan Surat')); ?></div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="tembusan_surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Tembusan</a>
    </div>
</div>
<div class="card">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-12 table-responsive">
        <table class="table table-bordered data-table dt-responsive nowrap" id="tembusan_surat-data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>

                    
                    <th>Tembusan Surat</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="tembusan_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tembusan_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#tembusan_surat-ajax-modal" data-target="#tembusan_surat-ajax-modal" aria-label="Close" onclick="$('#tembusan_surat-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tembusan_surat-form" name="tembusan_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('surat.tembusan-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="tembusan_surat-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#tembusan_surat-ajax-modal" data-target="#tembusan_surat-ajax-modal" onclick="$('#tembusan_surat-ajax-modal').modal('hide');">Batal</button>
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

    var tembusan_surat_table = $('#tembusan_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        filter: false,
        ajax: "<?php echo e(route('tembusan_surat.index')); ?>",
        columnDefs: [{ "width": "5%", "targets": 0 }],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_unit', name: 'id_unit'},
            {data: 'tembusan_surat', name: 'tembusan_surat'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( tembusan_surat_table );

    $('#tembusan_surat-create-new').click(function () {
        $('#tembusan_surat-model-heading').html("Tambah baru tembusan_surat");
        $('#tembusan_surat-save-btn').val("create-tembusan_surat");
        $('#id', '#tembusan_surat-form').val('');
        $('#tembusan_surat-form').trigger("reset");
        $('#tembusan_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.tembusan_surat-edit', function () {
        var tembusan_surat_id = $(this).data('id');
        $.get("<?php echo e(route('tembusan_surat.index')); ?>" +'/' + tembusan_surat_id +'/edit', function (data) {
            $('#tembusan_surat-model-heading').html("Ubah tembusan_surat");
            $('#tembusan_surat-save-btn').val("edit-user");
            $('#tembusan_surat-ajax-modal').modal('show');
            $('#id','#tembusan_surat-form').val(data.id);
            $('#id_surat_masuk', '#tembusan_surat-form').val(data.id_surat_masuk);
            $('#id_unit', '#tembusan_surat-form').val(data.id_unit);
            $('#tembusan_surat', '#tembusan_surat-form').val(data.tembusan_surat);

        })
    });

    $('#tembusan_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#tembusan_surat-form').serialize(),
            url: "<?php echo e(route('tembusan_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#tembusan_surat-save-btn').html('Simpan perubahan');
                $('#tembusan_surat-form').trigger("reset");
                $('#tembusan_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#tembusan_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.tembusan_surat-delete', function (){
        var tembusan_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('tembusan_surat.store')); ?>"+'/'+tembusan_surat_id,
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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\__BACKUP\tembusan-surat\index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('template_title'); ?>
File Proyek
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('File Proyek')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="file_proyek-create-new"> Tambah File Proyek baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="file_proyek-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id File</th>
								<th>Id Proyek</th>

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

<div class="modal fade" id="file_proyek-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="file_proyek-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="file_proyek-form" name="file_proyek-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.file-proyek.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="file_proyek-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var file_proyek_table = $('#file_proyek-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('file_proyek.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_file', name: 'id_file'},
            {data: 'id_proyek', name: 'id_proyek'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( file_proyek_table );

    $('#file_proyek-create-new').click(function () {
        $('#file_proyek-model-heading').html("Tambah baru File Proyek");
        $('#file_proyek-save-btn').val("create-file_proyek");
        $('#id', '#file_proyek-form').val('');
        $('#file_proyek-form').trigger("reset");
        $('#file_proyek-ajax-modal').modal('show');
    });

    $('body').on('click', '.file_proyek-edit', function () {
        var file_proyek_id = $(this).data('id');
        $.get("<?php echo e(route('file_proyek.index')); ?>" +'/' + file_proyek_id +'/edit', function (data) {
            $('#file_proyek-model-heading').html("Ubah File Proyek");
            $('#file_proyek-save-btn').val("edit-user");
            $('#file_proyek-ajax-modal').modal('show');
            $('#id','#file_proyek-form').val(data.id);
            $('#id_file', '#file_proyek-form').val(data.id_file);
            $('#id_proyek', '#file_proyek-form').val(data.id_proyek);

        })
    });

    $('#file_proyek-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#file_proyek-form').serialize(),
            url: "<?php echo e(route('file_proyek.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#file_proyek-save-btn').html('Simpan perubahan');
                $('#file_proyek-form').trigger("reset");
                $('#file_proyek-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#file_proyek-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.file_proyek-delete', function (){
        var file_proyek_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('file_proyek.store')); ?>"+'/'+file_proyek_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file-proyek\index.blade.php ENDPATH**/ ?>
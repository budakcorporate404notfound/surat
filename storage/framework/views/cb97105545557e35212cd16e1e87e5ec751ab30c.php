<?php $__env->startSection('template_title'); ?>
File Kerja
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('File Kerja')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="file_kerja-create-new"> Tambah File Kerja baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="file_kerja-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id File</th>
								<th>Id Kerja</th>

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

<div class="modal fade" id="file_kerja-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="file_kerja-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="file_kerja-form" name="file_kerja-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.file-kerja.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="file_kerja-save-btn" value="create">Simpan perubahan</button>
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

    var file_kerja_table = $('#file_kerja-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('file_kerja.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_file', name: 'id_file'},
            {data: 'id_kerja', name: 'id_kerja'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( file_kerja_table );

    $('#file_kerja-create-new').click(function () {
        $('#file_kerja-model-heading').html("Tambah baru File Kerja");
        $('#file_kerja-save-btn').val("create-file_kerja");
        $('#id', '#file_kerja-form').val('');
        $('#file_kerja-form').trigger("reset");
        $('#file_kerja-ajax-modal').modal('show');
    });

    $('body').on('click', '.file_kerja-edit', function () {
        var file_kerja_id = $(this).data('id');
        $.get("<?php echo e(route('file_kerja.index')); ?>" +'/' + file_kerja_id +'/edit', function (data) {
            $('#file_kerja-model-heading').html("Ubah File Kerja");
            $('#file_kerja-save-btn').val("edit-user");
            $('#file_kerja-ajax-modal').modal('show');
            $('#id','#file_kerja-form').val(data.id);
            $('#id_file', '#file_kerja-form').val(data.id_file);
            $('#id_kerja', '#file_kerja-form').val(data.id_kerja);

        })
    });

    $('#file_kerja-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#file_kerja-form').serialize(),
            url: "<?php echo e(route('file_kerja.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#file_kerja-save-btn').html('Simpan perubahan');
                $('#file_kerja-form').trigger("reset");
                $('#file_kerja-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#file_kerja-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.file_kerja-delete', function (){
        var file_kerja_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('file_kerja.store')); ?>"+'/'+file_kerja_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file-kerja\index.blade.php ENDPATH**/ ?>
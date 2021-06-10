<?php $__env->startSection('template_title'); ?>
Jenis File
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Jenis File')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="jenis_file-create-new"> Tambah jenis_file baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="jenis_file-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Jenis File</th>

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

<div class="modal fade" id="jenis_file-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="jenis_file-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="jenis_file-form" name="jenis_file-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('surat.jenis-file.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="jenis_file-save-btn" value="create">Simpan perubahan</button>
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

    var jenis_file_table = $('#jenis_file-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('jenis_file.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis_file', name: 'jenis_file'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( jenis_file_table );

    $('#jenis_file-create-new').click(function () {
        $('#jenis_file-model-heading').html("Tambah baru jenis_file");
        $('#jenis_file-save-btn').val("create-jenis_file");
        $('#id', '#jenis_file-form').val('');
        $('#jenis_file-form').trigger("reset");
        $('#jenis_file-ajax-modal').modal('show');
    });

    $('body').on('click', '.jenis_file-edit', function () {
        var jenis_file_id = $(this).data('id');
        $.get("<?php echo e(route('jenis_file.index')); ?>" +'/' + jenis_file_id +'/edit', function (data) {
            $('#jenis_file-model-heading').html("Ubah jenis_file");
            $('#jenis_file-save-btn').val("edit-user");
            $('#jenis_file-ajax-modal').modal('show');
            $('#id','#jenis_file-form').val(data.id);
            $('#jenis_file', '#jenis_file-form').val(data.jenis_file);

        })
    });

    $('#jenis_file-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#jenis_file-form').serialize(),
            url: "<?php echo e(route('jenis_file.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#jenis_file-save-btn').html('Simpan perubahan');
                $('#jenis_file-form').trigger("reset");
                $('#jenis_file-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#jenis_file-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.jenis_file-delete', function (){
        var jenis_file_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('jenis_file.store')); ?>"+'/'+jenis_file_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\jenis-file\index.blade.php ENDPATH**/ ?>
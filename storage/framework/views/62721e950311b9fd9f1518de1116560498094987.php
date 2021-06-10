<?php $__env->startSection('template_title'); ?>
File
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('File')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="file-create-new"> Tambah File baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="file-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Nama File</th>
								<th>Ukuran File</th>
								<th>Id Master Jenis File</th>
								<th>Id Master Kelompok File</th>
								<th>Tag File</th>
								<th>Status File</th>

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

<div class="modal fade" id="file-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="file-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="file-form" name="file-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.file.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="file-save-btn" value="create">Simpan perubahan</button>
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

    var file_table = $('#file-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('file.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_file', name: 'nama_file'},
            {data: 'ukuran_file', name: 'ukuran_file'},
            {data: 'id_master_jenis_file', name: 'id_master_jenis_file'},
            {data: 'id_master_kelompok_file', name: 'id_master_kelompok_file'},
            {data: 'tag_file', name: 'tag_file'},
            {data: 'status_file', name: 'status_file'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( file_table );

    $('#file-create-new').click(function () {
        $('#file-model-heading').html("Tambah baru File");
        $('#file-save-btn').val("create-file");
        $('#id', '#file-form').val('');
        $('#file-form').trigger("reset");
        $('#file-ajax-modal').modal('show');
    });

    $('body').on('click', '.file-edit', function () {
        var file_id = $(this).data('id');
        $.get("<?php echo e(route('file.index')); ?>" +'/' + file_id +'/edit', function (data) {
            $('#file-model-heading').html("Ubah File");
            $('#file-save-btn').val("edit-user");
            $('#file-ajax-modal').modal('show');
            $('#id','#file-form').val(data.id);
            $('#nama_file', '#file-form').val(data.nama_file);
            $('#ukuran_file', '#file-form').val(data.ukuran_file);
            $('#id_master_jenis_file', '#file-form').val(data.id_master_jenis_file);
            $('#id_master_kelompok_file', '#file-form').val(data.id_master_kelompok_file);
            $('#tag_file', '#file-form').val(data.tag_file);
            $('#status_file', '#file-form').val(data.status_file);

        })
    });

    $('#file-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#file-form').serialize(),
            url: "<?php echo e(route('file.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#file-save-btn').html('Simpan perubahan');
                $('#file-form').trigger("reset");
                $('#file-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#file-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.file-delete', function (){
        var file_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('file.store')); ?>"+'/'+file_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\file\index.blade.php ENDPATH**/ ?>
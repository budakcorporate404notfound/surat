<?php $__env->startSection('template_title'); ?>
Master Status
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Master Status')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="master_status-create-new"> Tambah Master Status baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="master_status-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Master Jenis Status</th>
								<th>Status</th>
								<th>Status Aktif</th>

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

<div class="modal fade" id="master_status-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="master_status-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="master_status-form" name="master_status-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.master-status.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="master_status-save-btn" value="create">Simpan perubahan</button>
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

    var master_status_table = $('#master_status-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('master_status.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_master_jenis_status', name: 'id_master_jenis_status'},
            {data: 'status', name: 'status'},
            {data: 'status_aktif', name: 'status_aktif'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( master_status_table );

    $('#master_status-create-new').click(function () {
        $('#master_status-model-heading').html("Tambah baru Master Status");
        $('#master_status-save-btn').val("create-master_status");
        $('#id', '#master_status-form').val('');
        $('#master_status-form').trigger("reset");
        $('#master_status-ajax-modal').modal('show');
    });

    $('body').on('click', '.master_status-edit', function () {
        var master_status_id = $(this).data('id');
        $.get("<?php echo e(route('master_status.index')); ?>" +'/' + master_status_id +'/edit', function (data) {
            $('#master_status-model-heading').html("Ubah Master Status");
            $('#master_status-save-btn').val("edit-user");
            $('#master_status-ajax-modal').modal('show');
            $('#id','#master_status-form').val(data.id);
            $('#id_master_jenis_status', '#master_status-form').val(data.id_master_jenis_status);
            $('#status', '#master_status-form').val(data.status);
            $('#status_aktif', '#master_status-form').val(data.status_aktif);

        })
    });

    $('#master_status-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#master_status-form').serialize(),
            url: "<?php echo e(route('master_status.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#master_status-save-btn').html('Simpan perubahan');
                $('#master_status-form').trigger("reset");
                $('#master_status-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#master_status-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.master_status-delete', function (){
        var master_status_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('master_status.store')); ?>"+'/'+master_status_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-status\index.blade.php ENDPATH**/ ?>
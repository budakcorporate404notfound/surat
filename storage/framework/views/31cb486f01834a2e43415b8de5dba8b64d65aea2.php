<?php $__env->startSection('template_title'); ?>
Master Model Proyek
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Master Model Proyek')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="master_model_proyek-create-new"> Tambah Master Model Proyek baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="master_model_proyek-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Model Proyek</th>
								<th>Deskripsi Model Proyek</th>
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

<div class="modal fade" id="master_model_proyek-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="master_model_proyek-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="master_model_proyek-form" name="master_model_proyek-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.master-model-proyek.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="master_model_proyek-save-btn" value="create">Simpan perubahan</button>
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

    var master_model_proyek_table = $('#master_model_proyek-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('master_model_proyek.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'model_proyek', name: 'model_proyek'},
            {data: 'deskripsi_model_proyek', name: 'deskripsi_model_proyek'},
            {data: 'status_aktif', name: 'status_aktif'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( master_model_proyek_table );

    $('#master_model_proyek-create-new').click(function () {
        $('#master_model_proyek-model-heading').html("Tambah baru Master Model Proyek");
        $('#master_model_proyek-save-btn').val("create-master_model_proyek");
        $('#id', '#master_model_proyek-form').val('');
        $('#master_model_proyek-form').trigger("reset");
        $('#master_model_proyek-ajax-modal').modal('show');
    });

    $('body').on('click', '.master_model_proyek-edit', function () {
        var master_model_proyek_id = $(this).data('id');
        $.get("<?php echo e(route('master_model_proyek.index')); ?>" +'/' + master_model_proyek_id +'/edit', function (data) {
            $('#master_model_proyek-model-heading').html("Ubah Master Model Proyek");
            $('#master_model_proyek-save-btn').val("edit-user");
            $('#master_model_proyek-ajax-modal').modal('show');
            $('#id','#master_model_proyek-form').val(data.id);
            $('#model_proyek', '#master_model_proyek-form').val(data.model_proyek);
            $('#deskripsi_model_proyek', '#master_model_proyek-form').val(data.deskripsi_model_proyek);
            $('#status_aktif', '#master_model_proyek-form').val(data.status_aktif);

        })
    });

    $('#master_model_proyek-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#master_model_proyek-form').serialize(),
            url: "<?php echo e(route('master_model_proyek.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#master_model_proyek-save-btn').html('Simpan perubahan');
                $('#master_model_proyek-form').trigger("reset");
                $('#master_model_proyek-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#master_model_proyek-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.master_model_proyek-delete', function (){
        var master_model_proyek_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('master_model_proyek.store')); ?>"+'/'+master_model_proyek_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\master-model-proyek\index.blade.php ENDPATH**/ ?>
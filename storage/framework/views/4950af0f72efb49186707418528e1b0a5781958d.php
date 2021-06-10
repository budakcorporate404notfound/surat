<?php $__env->startSection('template_title'); ?>
Lamar Proyek Terbuka
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Lamar Proyek Terbuka')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="lamar_proyek_terbuka-create-new"> Tambah Lamar Proyek Terbuka baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="lamar_proyek_terbuka-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Proyek</th>
								<th>Id User</th>
								<th>Catatan</th>
								<th>Tanggal Lamar</th>
								<th>Status Lamaran</th>
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

<div class="modal fade" id="lamar_proyek_terbuka-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="lamar_proyek_terbuka-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="lamar_proyek_terbuka-form" name="lamar_proyek_terbuka-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.lamar-proyek-terbuka.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="lamar_proyek_terbuka-save-btn" value="create">Simpan perubahan</button>
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

    var lamar_proyek_terbuka_table = $('#lamar_proyek_terbuka-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('lamar_proyek_terbuka.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_proyek', name: 'id_proyek'},
            {data: 'id_user', name: 'id_user'},
            {data: 'catatan', name: 'catatan'},
            {data: 'tanggal_lamar', name: 'tanggal_lamar'},
            {data: 'status_lamaran', name: 'status_lamaran'},
            {data: 'status_aktif', name: 'status_aktif'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( lamar_proyek_terbuka_table );

    $('#lamar_proyek_terbuka-create-new').click(function () {
        $('#lamar_proyek_terbuka-model-heading').html("Tambah baru Lamar Proyek Terbuka");
        $('#lamar_proyek_terbuka-save-btn').val("create-lamar_proyek_terbuka");
        $('#id', '#lamar_proyek_terbuka-form').val('');
        $('#lamar_proyek_terbuka-form').trigger("reset");
        $('#lamar_proyek_terbuka-ajax-modal').modal('show');
    });

    $('body').on('click', '.lamar_proyek_terbuka-edit', function () {
        var lamar_proyek_terbuka_id = $(this).data('id');
        $.get("<?php echo e(route('lamar_proyek_terbuka.index')); ?>" +'/' + lamar_proyek_terbuka_id +'/edit', function (data) {
            $('#lamar_proyek_terbuka-model-heading').html("Ubah Lamar Proyek Terbuka");
            $('#lamar_proyek_terbuka-save-btn').val("edit-user");
            $('#lamar_proyek_terbuka-ajax-modal').modal('show');
            $('#id','#lamar_proyek_terbuka-form').val(data.id);
            $('#id_proyek', '#lamar_proyek_terbuka-form').val(data.id_proyek);
            $('#id_user', '#lamar_proyek_terbuka-form').val(data.id_user);
            $('#catatan', '#lamar_proyek_terbuka-form').val(data.catatan);
            $('#tanggal_lamar', '#lamar_proyek_terbuka-form').val(data.tanggal_lamar);
            $('#status_lamaran', '#lamar_proyek_terbuka-form').val(data.status_lamaran);
            $('#status_aktif', '#lamar_proyek_terbuka-form').val(data.status_aktif);

        })
    });

    $('#lamar_proyek_terbuka-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#lamar_proyek_terbuka-form').serialize(),
            url: "<?php echo e(route('lamar_proyek_terbuka.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#lamar_proyek_terbuka-save-btn').html('Simpan perubahan');
                $('#lamar_proyek_terbuka-form').trigger("reset");
                $('#lamar_proyek_terbuka-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#lamar_proyek_terbuka-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.lamar_proyek_terbuka-delete', function (){
        var lamar_proyek_terbuka_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('lamar_proyek_terbuka.store')); ?>"+'/'+lamar_proyek_terbuka_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\lamar-proyek-terbuka\index.blade.php ENDPATH**/ ?>
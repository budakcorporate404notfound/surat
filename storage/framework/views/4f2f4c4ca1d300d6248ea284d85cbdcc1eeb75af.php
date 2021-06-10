<?php $__env->startSection('template_title'); ?>
Tahapan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Tahapan')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="tahapan-create-new"> Tambah Tahapan baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="tahapan-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Proyek</th>
								<th>Tahapan</th>
								<th>Catatan</th>
								<th>Status Tahapan</th>

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

<div class="modal fade" id="tahapan-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tahapan-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tahapan-form" name="tahapan-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.tahapan.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="tahapan-save-btn" value="create">Simpan perubahan</button>
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

    var tahapan_table = $('#tahapan-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('tahapan.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_proyek', name: 'id_proyek'},
            {data: 'tahapan', name: 'tahapan'},
            {data: 'catatan', name: 'catatan'},
            {data: 'status_tahapan', name: 'status_tahapan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( tahapan_table );

    $('#tahapan-create-new').click(function () {
        $('#tahapan-model-heading').html("Tambah baru Tahapan");
        $('#tahapan-save-btn').val("create-tahapan");
        $('#id', '#tahapan-form').val('');
        $('#tahapan-form').trigger("reset");
        $('#tahapan-ajax-modal').modal('show');
    });

    $('body').on('click', '.tahapan-edit', function () {
        var tahapan_id = $(this).data('id');
        $.get("<?php echo e(route('tahapan.index')); ?>" +'/' + tahapan_id +'/edit', function (data) {
            $('#tahapan-model-heading').html("Ubah Tahapan");
            $('#tahapan-save-btn').val("edit-user");
            $('#tahapan-ajax-modal').modal('show');
            $('#id','#tahapan-form').val(data.id);
            $('#id_proyek', '#tahapan-form').val(data.id_proyek);
            $('#tahapan', '#tahapan-form').val(data.tahapan);
            $('#catatan', '#tahapan-form').val(data.catatan);
            $('#status_tahapan', '#tahapan-form').val(data.status_tahapan);

        })
    });

    $('#tahapan-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#tahapan-form').serialize(),
            url: "<?php echo e(route('tahapan.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#tahapan-save-btn').html('Simpan perubahan');
                $('#tahapan-form').trigger("reset");
                $('#tahapan-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#tahapan-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.tahapan-delete', function (){
        var tahapan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('tahapan.store')); ?>"+'/'+tahapan_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\tahapan\index.blade.php ENDPATH**/ ?>
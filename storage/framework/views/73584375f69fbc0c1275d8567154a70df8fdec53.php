<?php $__env->startSection('template_title'); ?>
Kegiatan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Kegiatan')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="kegiatan-create-new"> Tambah Kegiatan baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="kegiatan-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Tahapan</th>
								<th>Nama Kegiatan</th>
								<th>Deskripsi Kegiatan</th>
								<th>Estimasi Durasi Kegiatan</th>
								<th>Catatan Kegiatan</th>
								<th>Status Kegiatan</th>

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

<div class="modal fade" id="kegiatan-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="kegiatan-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kegiatan-form" name="kegiatan-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.kegiatan.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="kegiatan-save-btn" value="create">Simpan perubahan</button>
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

    var kegiatan_table = $('#kegiatan-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('kegiatan.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_tahapan', name: 'id_tahapan'},
            {data: 'nama_kegiatan', name: 'nama_kegiatan'},
            {data: 'deskripsi_kegiatan', name: 'deskripsi_kegiatan'},
            {data: 'estimasi_durasi_kegiatan', name: 'estimasi_durasi_kegiatan'},
            {data: 'catatan_kegiatan', name: 'catatan_kegiatan'},
            {data: 'status_kegiatan', name: 'status_kegiatan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( kegiatan_table );

    $('#kegiatan-create-new').click(function () {
        $('#kegiatan-model-heading').html("Tambah baru Kegiatan");
        $('#kegiatan-save-btn').val("create-kegiatan");
        $('#id', '#kegiatan-form').val('');
        $('#kegiatan-form').trigger("reset");
        $('#kegiatan-ajax-modal').modal('show');
    });

    $('body').on('click', '.kegiatan-edit', function () {
        var kegiatan_id = $(this).data('id');
        $.get("<?php echo e(route('kegiatan.index')); ?>" +'/' + kegiatan_id +'/edit', function (data) {
            $('#kegiatan-model-heading').html("Ubah Kegiatan");
            $('#kegiatan-save-btn').val("edit-user");
            $('#kegiatan-ajax-modal').modal('show');
            $('#id','#kegiatan-form').val(data.id);
            $('#id_tahapan', '#kegiatan-form').val(data.id_tahapan);
            $('#nama_kegiatan', '#kegiatan-form').val(data.nama_kegiatan);
            $('#deskripsi_kegiatan', '#kegiatan-form').val(data.deskripsi_kegiatan);
            $('#estimasi_durasi_kegiatan', '#kegiatan-form').val(data.estimasi_durasi_kegiatan);
            $('#catatan_kegiatan', '#kegiatan-form').val(data.catatan_kegiatan);
            $('#status_kegiatan', '#kegiatan-form').val(data.status_kegiatan);

        })
    });

    $('#kegiatan-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#kegiatan-form').serialize(),
            url: "<?php echo e(route('kegiatan.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#kegiatan-save-btn').html('Simpan perubahan');
                $('#kegiatan-form').trigger("reset");
                $('#kegiatan-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#kegiatan-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.kegiatan-delete', function (){
        var kegiatan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('kegiatan.store')); ?>"+'/'+kegiatan_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\kegiatan\index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('template_title'); ?>
Kerja
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Kerja')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="kerja-create-new"> Tambah Kerja baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="kerja-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Kegiatan</th>
								<th>Id User</th>
								<th>Tanggal</th>
								<th>Waktu Mulai</th>
								<th>Waktu Selesai</th>
								<th>Catatan Tugas</th>
								<th>Status Tugas</th>

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

<div class="modal fade" id="kerja-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="kerja-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="kerja-form" name="kerja-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.kerja.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="kerja-save-btn" value="create">Simpan perubahan</button>
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

    var kerja_table = $('#kerja-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('kerja.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_kegiatan', name: 'id_kegiatan'},
            {data: 'id_user', name: 'id_user'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'waktu_mulai', name: 'waktu_mulai'},
            {data: 'waktu_selesai', name: 'waktu_selesai'},
            {data: 'catatan_tugas', name: 'catatan_tugas'},
            {data: 'status_tugas', name: 'status_tugas'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( kerja_table );

    $('#kerja-create-new').click(function () {
        $('#kerja-model-heading').html("Tambah baru Kerja");
        $('#kerja-save-btn').val("create-kerja");
        $('#id', '#kerja-form').val('');
        $('#kerja-form').trigger("reset");
        $('#kerja-ajax-modal').modal('show');
    });

    $('body').on('click', '.kerja-edit', function () {
        var kerja_id = $(this).data('id');
        $.get("<?php echo e(route('kerja.index')); ?>" +'/' + kerja_id +'/edit', function (data) {
            $('#kerja-model-heading').html("Ubah Kerja");
            $('#kerja-save-btn').val("edit-user");
            $('#kerja-ajax-modal').modal('show');
            $('#id','#kerja-form').val(data.id);
            $('#id_kegiatan', '#kerja-form').val(data.id_kegiatan);
            $('#id_user', '#kerja-form').val(data.id_user);
            $('#tanggal', '#kerja-form').val(data.tanggal);
            $('#waktu_mulai', '#kerja-form').val(data.waktu_mulai);
            $('#waktu_selesai', '#kerja-form').val(data.waktu_selesai);
            $('#catatan_tugas', '#kerja-form').val(data.catatan_tugas);
            $('#status_tugas', '#kerja-form').val(data.status_tugas);

        })
    });

    $('#kerja-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#kerja-form').serialize(),
            url: "<?php echo e(route('kerja.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#kerja-save-btn').html('Simpan perubahan');
                $('#kerja-form').trigger("reset");
                $('#kerja-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#kerja-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.kerja-delete', function (){
        var kerja_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('kerja.store')); ?>"+'/'+kerja_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\kerja\index.blade.php ENDPATH**/ ?>
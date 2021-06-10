<?php $__env->startSection('template_title'); ?>
Proyek Terbuka
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Proyek Terbuka')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="proyek_terbuka-create-new"> Tambah Proyek Terbuka baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="proyek_terbuka-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Proyek</th>
								<th>Persyaratan</th>
								<th>Kualifikasi</th>
								<th>Catatan</th>
								<th>Tanggal Mulai Penyiaran</th>
								<th>Tanggal Selesai Penyiaran</th>
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

<div class="modal fade" id="proyek_terbuka-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="proyek_terbuka-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="proyek_terbuka-form" name="proyek_terbuka-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.proyek-terbuka.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="proyek_terbuka-save-btn" value="create">Simpan perubahan</button>
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

    var proyek_terbuka_table = $('#proyek_terbuka-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('proyek_terbuka.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_proyek', name: 'id_proyek'},
            {data: 'persyaratan', name: 'persyaratan'},
            {data: 'kualifikasi', name: 'kualifikasi'},
            {data: 'catatan', name: 'catatan'},
            {data: 'tanggal_mulai_penyiaran', name: 'tanggal_mulai_penyiaran'},
            {data: 'tanggal_selesai_penyiaran', name: 'tanggal_selesai_penyiaran'},
            {data: 'status_aktif', name: 'status_aktif'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( proyek_terbuka_table );

    $('#proyek_terbuka-create-new').click(function () {
        $('#proyek_terbuka-model-heading').html("Tambah baru Proyek Terbuka");
        $('#proyek_terbuka-save-btn').val("create-proyek_terbuka");
        $('#id', '#proyek_terbuka-form').val('');
        $('#proyek_terbuka-form').trigger("reset");
        $('#proyek_terbuka-ajax-modal').modal('show');
    });

    $('body').on('click', '.proyek_terbuka-edit', function () {
        var proyek_terbuka_id = $(this).data('id');
        $.get("<?php echo e(route('proyek_terbuka.index')); ?>" +'/' + proyek_terbuka_id +'/edit', function (data) {
            $('#proyek_terbuka-model-heading').html("Ubah Proyek Terbuka");
            $('#proyek_terbuka-save-btn').val("edit-user");
            $('#proyek_terbuka-ajax-modal').modal('show');
            $('#id','#proyek_terbuka-form').val(data.id);
            $('#id_proyek', '#proyek_terbuka-form').val(data.id_proyek);
            $('#persyaratan', '#proyek_terbuka-form').val(data.persyaratan);
            $('#kualifikasi', '#proyek_terbuka-form').val(data.kualifikasi);
            $('#catatan', '#proyek_terbuka-form').val(data.catatan);
            $('#tanggal_mulai_penyiaran', '#proyek_terbuka-form').val(data.tanggal_mulai_penyiaran);
            $('#tanggal_selesai_penyiaran', '#proyek_terbuka-form').val(data.tanggal_selesai_penyiaran);
            $('#status_aktif', '#proyek_terbuka-form').val(data.status_aktif);

        })
    });

    $('#proyek_terbuka-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#proyek_terbuka-form').serialize(),
            url: "<?php echo e(route('proyek_terbuka.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#proyek_terbuka-save-btn').html('Simpan perubahan');
                $('#proyek_terbuka-form').trigger("reset");
                $('#proyek_terbuka-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#proyek_terbuka-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.proyek_terbuka-delete', function (){
        var proyek_terbuka_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('proyek_terbuka.store')); ?>"+'/'+proyek_terbuka_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\proyek-terbuka\index.blade.php ENDPATH**/ ?>
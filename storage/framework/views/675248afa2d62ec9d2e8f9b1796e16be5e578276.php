<?php $__env->startSection('template_title'); ?>
Proyek
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Proyek')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="proyek-create-new"> Tambah Proyek baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="proyek-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Kode Proyek</th>
								<th>Id Model Proyek</th>
								<th>Id Model Tahapan</th>
								<th>Nama Proyek</th>
								<th>Dekripsi Proyek</th>
								<th>Tag Proyek</th>
								<th>Nama Klien</th>
								<th>Pimpinan Proyek</th>
								<th>Estimasi Anggaran Proyek</th>
								<th>Estimasi Durasi Proyek</th>
								<th>Is Proyek Terbuka</th>
								<th>Status Proyek</th>

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

<div class="modal fade" id="proyek-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="proyek-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="proyek-form" name="proyek-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('sambung.proyek.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="proyek-save-btn" value="create">Simpan perubahan</button>
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

    var proyek_table = $('#proyek-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('proyek.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kode_proyek', name: 'kode_proyek'},
            {data: 'id_model_proyek', name: 'id_model_proyek'},
            {data: 'id_model_tahapan', name: 'id_model_tahapan'},
            {data: 'nama_proyek', name: 'nama_proyek'},
            {data: 'dekripsi_proyek', name: 'dekripsi_proyek'},
            {data: 'tag_proyek', name: 'tag_proyek'},
            {data: 'nama_klien', name: 'nama_klien'},
            {data: 'pimpinan_proyek', name: 'pimpinan_proyek'},
            {data: 'estimasi_anggaran_proyek', name: 'estimasi_anggaran_proyek'},
            {data: 'estimasi_durasi_proyek', name: 'estimasi_durasi_proyek'},
            {data: 'is_proyek_terbuka', name: 'is_proyek_terbuka'},
            {data: 'status_proyek', name: 'status_proyek'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( proyek_table );

    $('#proyek-create-new').click(function () {
        $('#proyek-model-heading').html("Tambah baru Proyek");
        $('#proyek-save-btn').val("create-proyek");
        $('#id', '#proyek-form').val('');
        $('#proyek-form').trigger("reset");
        $('#proyek-ajax-modal').modal('show');
    });

    $('body').on('click', '.proyek-edit', function () {
        var proyek_id = $(this).data('id');
        $.get("<?php echo e(route('proyek.index')); ?>" +'/' + proyek_id +'/edit', function (data) {
            $('#proyek-model-heading').html("Ubah Proyek");
            $('#proyek-save-btn').val("edit-user");
            $('#proyek-ajax-modal').modal('show');
            $('#id','#proyek-form').val(data.id);
            $('#kode_proyek', '#proyek-form').val(data.kode_proyek);
            $('#id_model_proyek', '#proyek-form').val(data.id_model_proyek);
            $('#id_model_tahapan', '#proyek-form').val(data.id_model_tahapan);
            $('#nama_proyek', '#proyek-form').val(data.nama_proyek);
            $('#dekripsi_proyek', '#proyek-form').val(data.dekripsi_proyek);
            $('#tag_proyek', '#proyek-form').val(data.tag_proyek);
            $('#nama_klien', '#proyek-form').val(data.nama_klien);
            $('#pimpinan_proyek', '#proyek-form').val(data.pimpinan_proyek);
            $('#estimasi_anggaran_proyek', '#proyek-form').val(data.estimasi_anggaran_proyek);
            $('#estimasi_durasi_proyek', '#proyek-form').val(data.estimasi_durasi_proyek);
            $('#is_proyek_terbuka', '#proyek-form').val(data.is_proyek_terbuka);
            $('#status_proyek', '#proyek-form').val(data.status_proyek);

        })
    });

    $('#proyek-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#proyek-form').serialize(),
            url: "<?php echo e(route('proyek.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#proyek-save-btn').html('Simpan perubahan');
                $('#proyek-form').trigger("reset");
                $('#proyek-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#proyek-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.proyek-delete', function (){
        var proyek_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('proyek.store')); ?>"+'/'+proyek_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\sambung\proyek\index.blade.php ENDPATH**/ ?>
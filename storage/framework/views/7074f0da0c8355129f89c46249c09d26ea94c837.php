<?php $__env->startSection('template_title'); ?>
Sifat Penyelesaian Surat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Sifat Penyelesaian Surat')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="sifat_penyelesaian_surat-create-new"> Tambah sifat_penyelesaian_surat baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="sifat_penyelesaian_surat-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Sifat Penyelesaian Surat</th>

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

<div class="modal fade" id="sifat_penyelesaian_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sifat_penyelesaian_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="sifat_penyelesaian_surat-form" name="sifat_penyelesaian_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('surat.sifat-penyelesaian-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="sifat_penyelesaian_surat-save-btn" value="create">Simpan perubahan</button>
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

    var sifat_penyelesaian_surat_table = $('#sifat_penyelesaian_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('sifat_penyelesaian_surat.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'sifat_penyelesaian_surat', name: 'sifat_penyelesaian_surat'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( sifat_penyelesaian_surat_table );

    $('#sifat_penyelesaian_surat-create-new').click(function () {
        $('#sifat_penyelesaian_surat-model-heading').html("Tambah baru sifat_penyelesaian_surat");
        $('#sifat_penyelesaian_surat-save-btn').val("create-sifat_penyelesaian_surat");
        $('#id', '#sifat_penyelesaian_surat-form').val('');
        $('#sifat_penyelesaian_surat-form').trigger("reset");
        $('#sifat_penyelesaian_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.sifat_penyelesaian_surat-edit', function () {
        var sifat_penyelesaian_surat_id = $(this).data('id');
        $.get("<?php echo e(route('sifat_penyelesaian_surat.index')); ?>" +'/' + sifat_penyelesaian_surat_id +'/edit', function (data) {
            $('#sifat_penyelesaian_surat-model-heading').html("Ubah sifat_penyelesaian_surat");
            $('#sifat_penyelesaian_surat-save-btn').val("edit-user");
            $('#sifat_penyelesaian_surat-ajax-modal').modal('show');
            $('#id','#sifat_penyelesaian_surat-form').val(data.id);
            $('#sifat_penyelesaian_surat', '#sifat_penyelesaian_surat-form').val(data.sifat_penyelesaian_surat);

        })
    });

    $('#sifat_penyelesaian_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#sifat_penyelesaian_surat-form').serialize(),
            url: "<?php echo e(route('sifat_penyelesaian_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#sifat_penyelesaian_surat-save-btn').html('Simpan perubahan');
                $('#sifat_penyelesaian_surat-form').trigger("reset");
                $('#sifat_penyelesaian_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#sifat_penyelesaian_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.sifat_penyelesaian_surat-delete', function (){
        var sifat_penyelesaian_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('sifat_penyelesaian_surat.store')); ?>"+'/'+sifat_penyelesaian_surat_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\sifat-penyelesaian-surat\index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('template_title'); ?>
Counter Surat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><?php echo e(__('Counter Surat')); ?></div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="counter_surat-create-new"> Tambah counter_surat baru</a>
                        </div>
                    </div>
                </div>
                <?php if($message = Session::get('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="counter_surat-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Jenis Surat</th>
								<th>Year</th>
								<th>Last Number</th>

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

<div class="modal fade" id="counter_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="counter_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="counter_surat-form" name="counter_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'id']); ?>

                    <?php echo $__env->make('surat.counter-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="counter_surat-save-btn" value="create">Simpan perubahan</button>
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

    var counter_surat_table = $('#counter_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "<?php echo e(route('counter_surat.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_jenis_surat', name: 'id_jenis_surat'},
            {data: 'year', name: 'year'},
            {data: 'last_number', name: 'last_number'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( counter_surat_table );

    $('#counter_surat-create-new').click(function () {
        $('#counter_surat-model-heading').html("Tambah baru counter_surat");
        $('#counter_surat-save-btn').val("create-counter_surat");
        $('#id', '#counter_surat-form').val('');
        $('#counter_surat-form').trigger("reset");
        $('#counter_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.counter_surat-edit', function () {
        var counter_surat_id = $(this).data('id');
        $.get("<?php echo e(route('counter_surat.index')); ?>" +'/' + counter_surat_id +'/edit', function (data) {
            $('#counter_surat-model-heading').html("Ubah counter_surat");
            $('#counter_surat-save-btn').val("edit-user");
            $('#counter_surat-ajax-modal').modal('show');
            $('#id','#counter_surat-form').val(data.id);
            $('#id_jenis_surat', '#counter_surat-form').val(data.id_jenis_surat);
            $('#year', '#counter_surat-form').val(data.year);
            $('#last_number', '#counter_surat-form').val(data.last_number);

        })
    });

    $('#counter_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#counter_surat-form').serialize(),
            url: "<?php echo e(route('counter_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#counter_surat-save-btn').html('Simpan perubahan');
                $('#counter_surat-form').trigger("reset");
                $('#counter_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#counter_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.counter_surat-delete', function (){
        var counter_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "<?php echo e(route('counter_surat.store')); ?>"+'/'+counter_surat_id,
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

<?php echo $__env->make('adminlte.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\counter-surat\index.blade.php ENDPATH**/ ?>
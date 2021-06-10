<div class="row mb-3">
    <div class="col-md-6" id="card_title"><?php echo e(Form::label('daftar_tembusan_surat')); ?></div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-tembusan-surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Tembusan Surat</a>
    </div>
</div>
<div class="card">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered data-table dt-responsive nowrap" id="surat-tembusan-surat-data-table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>

								

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-tembusan-surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-tembusan-surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-tembusan-surat-ajax-modal" data-target="#surat-tembusan-surat-ajax-modal" aria-label="Close" onclick="$('#surat-tembusan-surat-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="surat-tembusan-surat-form" name="surat-tembusan-surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'surat-tembusan-surat-id']); ?>

                    <?php echo Form::hidden('id_surat_masuk', '', ['id'=>'surat-tembusan-surat-id_surat_masuk']); ?>

                    <?php echo $__env->make('surat.tembusan-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="surat-tembusan-surat-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#surat-tembusan-surat-ajax-modal" data-target="#surat-tembusan-surat-ajax-modal" onclick="$('#surat-tembusan-surat-ajax-modal').modal('hide');">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
#surat-tembusan-surat-data-table thead {display: none;}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_tembusan_surat_table = $('#surat-tembusan-surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "<?php echo e(route('tembusan_surat.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_unit', name: 'id_unit'},
            // {data: 'tembusan_surat', name: 'tembusan_surat'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_tembusan_surat_table );

    $('#surat-tembusan-surat-create-new').click(function () {
        $('#surat-tembusan-surat-model-heading').html("Tambah baru tembusan surat");
        $('#surat-tembusan-surat-save-btn').val("Simpan tembusan surat");
        $('#surat-tembusan-surat-id', '#surat-tembusan-surat-form').val('');
        reset_form_data('#surat-tembusan-surat-form');
        $('#surat-tembusan-surat-form').trigger("reset");
        $('#surat-tembusan-surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-tembusan-surat-edit', function () {
        var surat_tembusan_surat_id = $(this).data('id');
        $.get('<?php echo e(route('tembusan_surat.index')); ?>' + '/' + surat_tembusan_surat_id  + '/edit', function (data) {
            reset_form_data('#surat-tembusan-surat-form');
            $('#surat-tembusan-surat-model-heading').html("Ubah tembusan surat");
            $('#surat-tembusan-surat-save-btn').val("Simpan tembusan surat");
            $('#surat-tembusan-surat-ajax-modal').modal('show');
            $('#surat-tembusan-surat-id', '#surat-tembusan-surat-form').val(data.id);
            $('#surat-tembusan-surat-id_surat_masuk', '#surat-tembusan-surat-form').val(data.id_surat_masuk);
            $('#surat-tembusan-surat-id_unit'+data.id_unit, '#surat-tembusan-surat-form').prop('checked', true);
            $('#surat-tembusan-surat-tembusan_surat', '#surat-tembusan-surat-form').val(data.tembusan_surat);

        })
    });

    $('#surat-tembusan-surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#surat-tembusan-surat-form').serialize(),
            url: "<?php echo e(route('tembusan_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#surat-tembusan-surat-save-btn').html('Simpan perubahan');
                $('#surat-tembusan-surat-form').trigger("reset");
                $('#surat-tembusan-surat-ajax-modal').modal('hide');
                surat_tembusan_surat_table.ajax.url( '<?php echo e(route( 'tembusan_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-tembusan-surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat-tembusan-surat-delete', function (){
        var surat_tembusan_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('tembusan_surat.store')); ?>' + '/' + surat_tembusan_surat_id,
                success: function (data) {
                    surat_tembusan_surat_table.ajax.url( '<?php echo e(route( 'tembusan_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\tembusan-surat\index.blade.php ENDPATH**/ ?>
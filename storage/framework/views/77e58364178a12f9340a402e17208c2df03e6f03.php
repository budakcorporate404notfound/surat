<div id="surat-disposisi-surat-data-table-pos">
    <div id="surat-disposisi-surat-data-block">
        <div class="row mb-3">
            <div class="col-md-6" id="card_title"><?php echo e(Form::label('daftar_disposisi_surat')); ?></div>
            <div class="col-md-6 text-right">
                
                <?php if(auth()->user()->id_jabatan != ''): ?>
                <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-disposisi-surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Disposisi Surat</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <div class="card-body col-md-12">
                <div>
                    Posisi dan durasi proses:
                    <ul class="step d-flex flex-nowrap" id="surat-disposisi-surat-step-diagram">
                        <li class="step-item"><a href="#!" class="">TU</a><br><span class="font-weight-lighter process-time">13 jam</span></li>
                        <li class="step-item"><a href="#!" class="">Karo</a><br><span class="font-weight-lighter process-time">45 menit</span></li>
                        <li class="step-item active"><a href="#!" class="">Kabag</a><br><span class="font-weight-lighter process-time">2 hari 3 jam 45 menit</span></li>
                        <li class="step-item"><a href="#!" class="">Kasubag</a></li>
                        <li class="step-item"><a href="#!" class="">Pelaksana</a></li>
                    </ul>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered data-table dt-responsive" id="surat-disposisi-surat-data-table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                
                                <th>Kepada</th>
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
<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-disposisi-surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-disposisi-surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-disposisi-surat-ajax-modal" data-target="#surat-disposisi-surat-ajax-modal" aria-label="Close" onclick="$('#surat-disposisi-surat-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="surat-disposisi-surat-form" name="surat-disposisi-surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo Form::hidden('id', '', ['id'=>'surat-disposisi-surat-id']); ?>

                    <?php echo Form::hidden('id_surat_masuk', '', ['id'=>'surat-disposisi-surat-id_surat_masuk']); ?>

                    <?php echo Form::hidden('id_mailbox', '', ['id'=>'surat-disposisi-surat-id_mailbox']); ?>

                    <?php echo $__env->make('surat.disposisi-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="surat-disposisi-surat-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#surat-disposisi-surat-ajax-modal" data-target="#surat-disposisi-surat-ajax-modal" onclick="$('#surat-disposisi-surat-ajax-modal').modal('hide');">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
#surat-disposisi-surat-data-table thead {display: none;}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_disposisi_surat_table = $('#surat-disposisi-surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "<?php echo e(route('disposisi_surat.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_arahan_surat', name: 'id_arahan_surat'},
            // {data: 'id_status_disposisi', name: 'id_status_disposisi'},
            // {data: 'arahan', name: 'arahan'},
            // {data: 'disposisi_surat', name: 'disposisi_surat'},
            // {
            //     data: null,
            //     orderable: false, searchable: false,
            //     render: function(data, type, row, meta) {
            //         return data.dari;
            //     }
            // },
            {
                data: null,
                orderable: false, searchable: false,
                render: function(data, type, row, meta) {
                    disposisi_is_for_me = (data.for_me == true ? ' border-div' : ' font-weight-lighter');
                    return  `<div class='row${disposisi_is_for_me}'>
                                <div class='col-md-9'>${data.kepada}</div>
                                <div class='col-md-3 font-weight-lighter'>${data.dari}
                                    <div style='font-size:65%;'>${moment(data.created_at).format('lll')}<br>(${moment(data.created_at).fromNow()})</div>
                                </div>
                            </div>`;
                    // return  data.kepada + '<br><div class="d-flex"><div class="ml-auto mt-auto>' + data.dari + '<br>' + moment(data.created_at).format('lll') + '</div></div>';
                }
            },
        ]
    });

    // new $.fn.dataTable.FixedHeader( surat_disposisi_surat_table );

    surat_disposisi_surat_table.on('xhr.dt', function ( e, settings, json, xhr ) {
        // for ( var i=0, ien=json.aaData.length ; i<ien ; i++ ) {
        //     json.aaData[i].sum = json.aaData[i].one + json.aaData[i].two;
        // }
        // Note no return - manipulate the data directly in the JSON object.
        surat_disposisi_progress = '';

        json.data.forEach(function(element, index, array){
            // TODO: add counter for progress tracking

            // DT_RowIndex: 5
            // ceklist_disposisi_surat: "2"
            // created_at: "2020-12-18T08:03:37.000000Z"
            // dari: "<a href="javascript:void(0)" data-toggle="tooltip"  data-id="28" data-original-title="Edit" class="edit surat-disposisi-surat-edit">Kepala Sub. Bagian Tata Laksana</a>"
            // deleted_at: null
            // disposisi_surat: "siapkan bahan"
            // for_me: false
            // id: 28
            // id_arahan_surat: 0
            // id_arahan_surat_dari: 18
            // id_arahan_surat_iduser: 38
            // id_status_disposisi: 0
            // id_surat_masuk: 70
            // kepada: "<u>Kepada: <b>Bimo Prakoso, A.Md.</b></u><br>siapkan bahan<br>disposisi:  Ditelaah"
            // updated_at: "2020-12-18T08:03:37.000000Z"
            // console.log('created_at', element.created_at);

            // console.log('json', element);
        });
    });

    $('#surat-disposisi-surat-create-new').click(function () {
        $('#surat-disposisi-surat-model-heading').html("Tambah baru disposisi surat");
        $('#surat-disposisi-surat-save-btn').val("Simpan disposisi surat");

        // Reset FORM
        $('#surat-disposisi-surat-id', '#surat-disposisi-surat-form').val('');
        $('.surat-disposisi-surat-id_arahan_surat', '#surat-disposisi-surat-form').attr('disabled',false);
        $('.surat-disposisi-surat-id_arahan_surat_iduser', '#surat-disposisi-surat-form').attr('disabled',false);

        $.get('<?php echo e(route('surat.getalldisposisi')); ?>' + '/?id=' + $('#surat_masuk-form-id').val(), function (data) {
            console.log(data);
            for (i = 0; i < data.length; i++) {
                console.log(`There are ${data[i].id_arahan_surat} ${data[i].id_arahan_surat_iduser}s`);
                $('#surat-disposisi-surat-id_arahan_surat'+data[i].id_arahan_surat, '#surat-disposisi-surat-form').attr('disabled',true);
                $('#surat-disposisi-surat-id_arahan_surat_iduser'+data[i].id_arahan_surat_iduser, '#surat-disposisi-surat-form').attr('disabled',true);
            }
        });
        reset_form_data('#surat-disposisi-surat-form');
        $('#surat-disposisi-surat-form').trigger("reset");
        $('#surat-disposisi-surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-disposisi-surat-edit', function () {
        var surat_disposisi_surat_id = $(this).data('id');
        reset_form_data('#surat-disposisi-surat-form');
        $.get('<?php echo e(route('disposisi_surat.index')); ?>' + '/' + surat_disposisi_surat_id  + '/edit', function (data) {
            $('#surat-disposisi-surat-model-heading').html("Ubah disposisi surat");
            $('#surat-disposisi-surat-save-btn').val("Simpan disposisi surat");
            $('#surat-disposisi-surat-ajax-modal').modal('show');
            $('#surat-disposisi-surat-id', '#surat-disposisi-surat-form').val(data.id);
            $('#surat-disposisi-surat-id_surat_masuk', '#surat-disposisi-surat-form').val(data.id_surat_masuk);
            $('#surat-disposisi-surat-id_arahan_surat'+data.id_arahan_surat, '#surat-disposisi-surat-form').prop('checked', true);
            $('#surat-disposisi-surat-id_arahan_surat_iduser'+data.id_arahan_surat_iduser, '#surat-disposisi-surat-form').prop('checked', true);
            $('#surat-disposisi-surat-id_status_disposisi', '#surat-disposisi-surat-form').val(data.id_status_disposisi);
            $.each(data.ceklist_disposisi_surat.split(','), function( key, value ) {
                $('#surat-disposisi-surat-ceklist_disposisi_surat'+value, '#surat-disposisi-surat-form').attr("checked","checked");
            });
            $('#surat-disposisi-surat-disposisi_surat', '#surat-disposisi-surat-form').val(data.disposisi_surat);

        })
    });

    $('#surat-disposisi-surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $('#surat-disposisi-surat-id_surat_masuk').val($('#surat_masuk-form-id').val());

        $.ajax({
            data: $('#surat-disposisi-surat-form').serialize(),
            url: "<?php echo e(route('disposisi_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#surat-disposisi-surat-save-btn').html('Simpan perubahan');
                $('#surat-disposisi-surat-form').trigger("reset");
                $('#surat-disposisi-surat-ajax-modal').modal('hide');
                surat_disposisi_surat_table.ajax.url( '<?php echo e(route( 'disposisi_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
                $.get("<?php echo e(route('surat_masuk.index')); ?>" +'/' + surat_masuk_id +'/edit', function (data) {
                    load_disposisi_surat_steps_diagram(data);
                });
                surat_masuk_table.draw(false);
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-disposisi-surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat-disposisi-surat-delete', function (){
        var surat_disposisi_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('disposisi_surat.store')); ?>' + '/' + surat_disposisi_surat_id,
                success: function (data) {
                    surat_disposisi_surat_table.ajax.url( '<?php echo e(route( 'disposisi_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
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
<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/disposisi-surat/index.blade.php ENDPATH**/ ?>
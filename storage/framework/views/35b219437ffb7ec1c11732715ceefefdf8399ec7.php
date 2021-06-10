<div id="surat-diskusi-surat-data-table-pos">
    <div id="surat-diskusi-surat-data-block">
        <div class="row mb-3">
            <div class="col-md-6" id="card_title"><?php echo e(Form::label('daftar_diskusi_surat')); ?></div>
            <div class="col-md-6 text-right">
                <!-- <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-diskusi-surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Diskusi Surat</a> -->
            </div>
        </div>
        <div class="card">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>
            <div class="card-body col-md-12">
                
                <form id="surat-diskusi-surat-form" name="surat-diskusi-surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered data-table dt-responsive" id="surat-diskusi-surat-data-table" width="100%">
                        <thead>
                            <tr>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>
                                        <?php echo csrf_field(); ?>
                                        <?php echo Form::hidden('id', '', ['id'=>'surat-diskusi-surat-id']); ?>

                                        <?php echo Form::hidden('id_surat_masuk', '', ['id'=>'surat-diskusi-surat-id_surat_masuk']); ?>

                                        <?php echo $__env->make('surat.diskusi-surat.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('modal'); ?>
<div class="modal fade" id="surat-diskusi-surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-diskusi-surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-diskusi-surat-ajax-modal" data-target="#surat-diskusi-surat-ajax-modal" aria-label="Close" onclick="$('#surat-diskusi-surat-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<style>
    #surat-diskusi-surat-data-table thead {display: none;}
    .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
    background: #f8f8f8 none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
    border: 1px solid #c4c4c4;
    clear: both;
    overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
    color: #05728f;
    font-size: 21px;
    margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
    float: left;
    width: 11%;
    }
    .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
    display: inline-block;
    width: 6%;
    }
    .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
    }
    .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
    }
    .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 60%;
    }

    .sent_msg p {
    background: #05728f none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
    float: right;
    width: 46%;
    }
    .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
    background: #05728f none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
    height: 516px;
    overflow-y: auto;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('js_script'); ?>
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_diskusi_surat_table = $('#surat-diskusi-surat-data-table').on('xhr.dt', function (e, settings, json, xhr) {
            $('#surat-diskusi-surat-total').html(json.recordsTotal);
        }).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "<?php echo e(route('diskusi_surat.index')); ?>",
        columns: [
            {
                data: null,
                render: function(data, type, row, meta) {
                    // return `${data.pesan}<br><span class="font-weight-lighter">${data.nomor_agenda}</span>`;
                    return `
                        <div class="incoming_msg">
                            <div class="incoming_msg_img">
                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                            </div>
                            <div class="received_msg">
                                ${data.user_name}
                                <div class="received_withd_msg">
                                <p>${data.pesan}</p>
                                <span class="time_date">${moment(data.created_at).format('lll')} | ${moment(data.created_at).fromNow()}</span></div>
                            </div>
                        </div>
                    `;
                },
                name: 'pejabat_pengirim_surat'
            },
        ],
    });

    $('#surat-diskusi-surat-create-new').click(function () {
        $('#surat-diskusi-surat-model-heading').html("Tambah baru disposisi surat");
        // $('#surat-diskusi-surat-save-btn').val("Simpan disposisi surat");
        $('#surat-diskusi-surat-id', '#surat-diskusi-surat-form').val('');
        reset_form_data('#surat-diskusi-surat-form');
        $('#surat-diskusi-surat-form').trigger("reset");
        $('#surat-diskusi-surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-diskusi-surat-edit', function () {
        var surat_diskusi_surat_id = $(this).data('id');
        reset_form_data('#surat-diskusi-surat-form');
        $.get('<?php echo e(route('diskusi_surat.index')); ?>' + '/' + surat_diskusi_surat_id  + '/edit', function (data) {
            $('#surat-diskusi-surat-model-heading').html("Ubah disposisi surat");
            // $('#surat-diskusi-surat-save-btn').val("Simpan disposisi surat");
            $('#surat-diskusi-surat-ajax-modal').modal('show');
            $('#surat-diskusi-surat-id', '#surat-diskusi-surat-form').val(data.id);
            $('#surat-diskusi-surat-pesan', '#surat-diskusi-surat-form').val(data.pesan);
        })
    });

    $('#surat-diskusi-surat-save-btn').click(function (e) {
        e.preventDefault();
        // $(this).html('Sending..');
        $('#surat-diskusi-surat-id_surat_masuk').val($('#surat_masuk-form-id').val());

        $.ajax({
            data: $('#surat-diskusi-surat-form').serialize(),
            url: "<?php echo e(route('diskusi_surat.store')); ?>",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                // $('#surat-diskusi-surat-save-btn').html('Simpan perubahan');
                $('#surat-diskusi-surat-form').trigger("reset");
                // $('#surat-diskusi-surat-ajax-modal').modal('hide');
                $('#surat-diskusi-surat-pesan', '#surat-diskusi-surat-form').val('');
                surat_diskusi_surat_table.ajax.url( '<?php echo e(route( 'diskusi_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
            },
            error: function (data) {
                console.log('Error:', data);
                // $('#surat-diskusi-surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat-diskusi-surat-delete', function (){
        var surat_diskusi_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '<?php echo e(route('diskusi_surat.store')); ?>' + '/' + surat_diskusi_surat_id,
                success: function (data) {
                    surat_diskusi_surat_table.ajax.url( '<?php echo e(route( 'diskusi_surat.index' )); ?>?id_surat_masuk=' + surat_masuk_id ).load();
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
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\diskusi-surat\index.blade.php ENDPATH**/ ?>
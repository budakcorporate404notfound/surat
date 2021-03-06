<div id="surat-file-surat-keluar-data-table-pos">
    <div id="surat-file-surat-keluar-data-block">
        <div class="row mb-3">
            <div class="col-md-6" id="card_title">{{ Form::label('file_bahan_kerja') }}</div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-file-surat-keluar-create-new"><i class="fas fa-plus-circle"></i>  Tambah file tanggapan surat</a>
            </div>
        </div>
        <div class="card">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="surat-file-surat-keluar-data-table" width="100%">
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
    </div>
</div>
@push('modal')
<div class="modal fade" id="surat-file-surat-keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-file-surat-keluar-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-file-surat-keluar-ajax-modal" data-target="#surat-file-surat-keluar-ajax-modal" aria-label="Close" onclick="$('#surat-file-surat-keluar-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="surat-file-surat-keluar-pdf" style="height: 30rem; border: 1rem solid rgba(0,0,0,.1)"></div>
                <form id="surat-file-surat-keluar-form" name="surat-file-surat-keluar-form"  method="POST"  role="form" enctype="multipart/form-data" class="dropzone">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'surat-file-surat-keluar-id']) !!}
                    {!! Form::hidden('id_surat_masuk', '', ['id'=>'surat-file-surat-keluar-id_surat_masuk']) !!}
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-sm-offset-2 col-sm-12 text-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="#surat-file-surat-keluar-ajax-modal" data-target="#surat-file-surat-keluar-ajax-modal" onclick="$('#surat-file-surat-keluar-ajax-modal').modal('hide');">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#surat-file-surat-keluar-data-table thead {display: none;}
</style>
@endpush
@push('js_script')
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_file_tanggapan_table = $('#surat-file-surat-keluar-data-table').on('xhr.dt', function (e, settings, json, xhr) {
            $('#surat-diskusi-surat-bahan-kerja').html(json.recordsTotal);
        }).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "{{ route('file_tanggapan.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {
                data: null,
                render: function(data, type, row, meta) {
                    ext = getFileExt(data.storage_file_name);
                    /* Check for extension */
                    if (ext == 'png' || ext == 'jpg' || ext == 'jpeg' || ext == 'gif' || ext == 'pdf') {
                        link = `<div><a href="javascript:void(0)" data-toggle="tooltip"  data-id="${data.id}" file-name="${data.storage_file_name}" data-original-title="Edit" class="edit surat-file-surat-keluar-edit">${data.file_tanggapan}</a></div>`;
                    } else {
                        link = `<div><a href="{{ url("/uploads") }}/${data.storage_file_name}" target="_blank">${data.file_tanggapan}</a></div>`;
                    }

                    return `<div class="d-flex">${link}
                        <div class="ml-auto"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="${data.id}" data-original-title="Delete" class="btn surat-file-surat-keluar-delete"><i class="fas fa-trash"></i></a></div>
                        `;
                },
                name: 'perihal', width: "%",
                searchable: true
            },
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_file_tanggapan_table );

    $('#surat-file-surat-keluar-create-new').click(function () {
        $('#surat-file-surat-keluar-model-heading').html("Tambah lampiran tanggapan surat");
        $('#surat-file-surat-keluar-save-btn').val("Simpan file lampiran tanggapan");
        $('#surat-file-surat-keluar-id', '#surat-file-surat-keluar-form').val('');
        reset_form_data('#surat-file-surat-keluar-form');
        $('#surat-file-surat-keluar-pdf').html('');
        $('#surat-file-surat-keluar-form').trigger("reset");
        $('#surat-file-surat-keluar-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-file-surat-keluar-edit', function () {
        var surat_file_tanggapan_id = $(this).data('id');
        var fileURL = '{{ url('/') }}/uploads/' + $(this).attr("file-name");
        $.get('{{ route('file_tanggapan.index') }}' + '/' + surat_file_tanggapan_id  + '/edit', function (data) {
            reset_form_data('#surat-file-surat-keluar-form');
            $('#surat-file-surat-keluar-model-heading').html("Ubah lampiran tanggapan surat");
            $('#surat-file-surat-keluar-save-btn').val("Simpan lampiran tanggapan surat");
            $('#surat-file-surat-keluar-ajax-modal').modal('show');
            $('#surat-file-surat-keluar-id', '#surat-file-surat-keluar-form').val(data.id);
            $('#surat-file-surat-keluar-id_surat_masuk', '#surat-file-surat-keluar-form').val(data.id_surat_masuk);
            $('#surat-file-surat-keluar-file_tanggapan', '#surat-file-surat-keluar-form').val(data.file_tanggapan);
            if ( fileURL.slice(-3) == 'pdf' ) {
                var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
                var myPDF = PDFObject.embed(fileURL, "#surat-file-surat-keluar-pdf", options);
            } else {
                $("#surat-file-surat-keluar-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
            }

        })
    });

    $('body').on('click', '.surat-file-surat-keluar-delete', function (){
        var surat_file_tanggapan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '{{ route('file_tanggapan.store') }}' + '/' + surat_file_tanggapan_id,
                success: function (data) {
                    surat_file_tanggapan_table.ajax.url( '{{ route( 'file_tanggapan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }else{
            return false;
        }
    });

    surat_file_tanggapan_table_reload = function(){
        surat_file_tanggapan_table.ajax.url( '{{ route( 'file_tanggapan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
    }
});

Dropzone.autoDiscover = false;

var file_tanggapan_dropzone = new Dropzone("#surat-file-surat-keluar-form", {
    url: "{{ route('file_tanggapan.store') }}",
    maxFilesize: 10,
    success: function (file, response) {
        var ext = getFileExt(file.name);
        var newImagePath = file.name;
        /* Check for extension */
        if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif') {
            newImagePath = "upload/default-image.jpg";
        }
        this.createThumbnailFromUrl(file, newImagePath);

        var fileURL = '{{ url('/') }}/uploads/' + response.file;
        if ( fileURL.slice(-3) == 'pdf' ) {
            var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
            var myPDF = PDFObject.embed(fileURL, "#surat-file-surat-keluar-pdf", options);
        } else {
            $("#surat-file-surat-keluar-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
        }

        /* reload dokumen surat table */
        surat_file_tanggapan_table_reload();
        /* remove last preview */
        $(".dz-preview").remove();
    }
});

</script>
@endpush

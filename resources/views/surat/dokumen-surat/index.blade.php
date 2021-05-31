<div class="row mb-3">
    <div class="col-md-6" id="card_title">{{ Form::label('daftar_dokumen_surat') }}</div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-dokumen-surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Dokumen Surat</a>
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
            <table class="table table-bordered data-table dt-responsive nowrap" id="surat-dokumen-surat-data-table" width="100%">
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
@push('modal')
<div class="modal fade" id="surat-dokumen-surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-dokumen-surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-dokumen-surat-ajax-modal" data-target="#surat-dokumen-surat-ajax-modal" aria-label="Close" onclick="$('#surat-dokumen-surat-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="surat-dokumen-surat-pdf" style="height: 30rem; border: 1rem solid rgba(0,0,0,.1)"></div>
                <form id="surat-dokumen-surat-form" name="surat-dokumen-surat-form"  method="POST"  role="form" enctype="multipart/form-data" class="dropzone">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'surat-dokumen-surat-id']) !!}
                    {!! Form::hidden('id_surat_masuk', '', ['id'=>'surat-dokumen-surat-id_surat_masuk']) !!}
                    {{--  @include('surat.dokumen-surat.form')  --}}
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-sm-offset-2 col-sm-12 text-right">
                    {{--  <button type="submit" class="btn btn-primary hide" id="surat-dokumen-surat-save-btn" value="create">Selesai</button>  --}}
                    <button type="button" class="btn btn-secondary" data-dismiss="#surat-dokumen-surat-ajax-modal" data-target="#surat-dokumen-surat-ajax-modal" onclick="$('#surat-dokumen-surat-ajax-modal').modal('hide');">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
#surat-dokumen-surat-data-table thead {display: none;}
</style>
@endpush
@push('js_script')
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_dokumen_surat_table = $('#surat-dokumen-surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "{{ route('dokumen_surat.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'dokumen_surat', name: 'dokumen_surat'},
            // {data: 'nama_file', name: 'nama_file'},
            // {data: 'id_jenis_file', name: 'id_jenis_file'},
            // {data: 'ukuran_file', name: 'ukuran_file'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_dokumen_surat_table );

    $('#surat-dokumen-surat-create-new').click(function () {
        $('#surat-dokumen-surat-model-heading').html("Tambah baru dokumen surat");
        $('#surat-dokumen-surat-save-btn').val("Simpan dokumen surat");
        $('#surat-dokumen-surat-id', '#surat-dokumen-surat-form').val('');
        reset_form_data('#surat-dokumen-surat-form');
        $('#surat-dokumen-surat-pdf').html('');
        $('#surat-dokumen-surat-form').trigger("reset");
        $('#surat-dokumen-surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-dokumen-surat-edit', function () {
        var surat_dokumen_surat_id = $(this).data('id');
        var fileURL = '{{ url('/') }}/uploads/' + $(this).attr("file-name");
        $.get('{{ route('dokumen_surat.index') }}' + '/' + surat_dokumen_surat_id  + '/edit', function (data) {
            reset_form_data('#surat-dokumen-surat-form');
            $('#surat-dokumen-surat-model-heading').html("Ubah dokumen surat");
            $('#surat-dokumen-surat-save-btn').val("Simpan dokumen surat");
            $('#surat-dokumen-surat-ajax-modal').modal('show');
            $('#surat-dokumen-surat-id', '#surat-dokumen-surat-form').val(data.id);
            $('#surat-dokumen-surat-id_surat_masuk', '#surat-dokumen-surat-form').val(data.id_surat_masuk);
            $('#surat-dokumen-surat-dokumen_surat', '#surat-dokumen-surat-form').val(data.dokumen_surat);
            // $('#surat-dokumen-surat-nama_file', '#surat-dokumen-surat-form').val(data.nama_file);
            // $('#surat-dokumen-surat-id_jenis_file', '#surat-dokumen-surat-form').val(data.id_jenis_file);
            // $('#surat-dokumen-surat-ukuran_file', '#surat-dokumen-surat-form').val(data.ukuran_file);
            // console.log('pdfURL', fileURL);
            if ( fileURL.slice(-3) == 'pdf' ) {
                var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
                var myPDF = PDFObject.embed(fileURL, "#surat-dokumen-surat-pdf", options);
            } else {
                $("#surat-dokumen-surat-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
            }
            // var el = document.querySelector("#results");
            // el.setAttribute("class", (myPDF) ? "success" : "fail");
            // el.innerHTML = (myPDF) ? "PDFObject successfully embedded '" + pdfURL + "'!" : "Uh-oh, the embed didn't work.";

        })
    });

    // $('#surat-dokumen-surat-save-btn').click(function (e) {
    // --- Tidak dipakai
    // --- coba pakai dropzone
    // $('#surat-dokumen-surat-form').submit(function (e) {
    //     e.preventDefault();
    //     $('#surat-dokumen-surat-save-btn').html('Sending..');
    //     $('#surat-dokumen-surat-id_surat_masuk').val($('#surat_masuk-form-id').val());
    //     // var formData = new FormData(this);
    //     var formData = new FormData($('#surat-dokumen-surat-form')[0]);
    //     $.ajax({
    //         // data: $('#surat-dokumen-surat-form').serialize(),
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         url: "{{ route('dokumen_surat.store') }}",
    //         type: "POST",
    //         dataType: 'json',
    //         success: function (data) {
    //             $('#surat-dokumen-surat-save-btn').html('Simpan perubahan');
    //             $('#surat-dokumen-surat-form').trigger("reset");
    //             $('#surat-dokumen-surat-ajax-modal').modal('hide');
    //             surat_dokumen_surat_table.ajax.url( '{{ route( 'dokumen_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //             $('#surat-dokumen-surat-save-btn').html('Simpan perubahan');
    //         }
    //     });
    // });

    // $('#laravel-ajax-file-upload').submit(function (e) {
    //     e.preventDefault();
    //     var formData = new FormData(this);
    //     $.ajax({
    //         type: 'POST',
    //         url: "{{ url('store-file')}}",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: (data) => {
    //             this.reset();
    //             alert('File has been uploaded successfully');
    //             console.log(data);
    //         },
    //         error: function (data) {
    //             console.log(data);
    //         }
    //     });
    // });

    $('body').on('click', '.surat-dokumen-surat-delete', function (){
        var surat_dokumen_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '{{ route('dokumen_surat.store') }}' + '/' + surat_dokumen_surat_id,
                success: function (data) {
                    surat_dokumen_surat_table.ajax.url( '{{ route( 'dokumen_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }else{
            return false;
        }
    });

    surat_dokumen_surat_table_reload = function(){
        surat_dokumen_surat_table.ajax.url( '{{ route( 'dokumen_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
    }

    // Dropzone.options.imageUpload = {
    //     maxFilesize : 1,
    //     acceptedFiles : ".jpeg,.jpg,.png,.pdf"
    // };
});

Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#surat-dokumen-surat-form", {
    url: "{{ route('dokumen_surat.store') }}",
    maxFilesize: 10,
    success: function (file, response) {
        var ext = getFileExt(file.name);
        var newImagePath = file.name;
        /* Check for file extension */
        if (ext != 'png' && ext != 'jpg' && ext != 'jpeg' && ext != 'gif') {
            newImagePath = "upload/default-image.jpg";
        }
        this.createThumbnailFromUrl(file, newImagePath);

        var fileURL = '{{ url('/') }}/uploads/' + response.file;
        if ( fileURL.slice(-3) == 'pdf' ) {
            var options = {pdfOpenParams: {navpanes: 1, toolbar: 1, statusbar: 1, view: "FitV"}};
            var myPDF = PDFObject.embed(fileURL, "#surat-dokumen-surat-pdf", options);
        } else {
            $("#surat-dokumen-surat-pdf").html('<div class="overflow-auto" style="max-width: %; max-height: 28rem;"><img src="'+fileURL+'"/></div>');
        }

        /* reload dokumen surat table */
        surat_dokumen_surat_table_reload();

        /* remove last preview */
        $(".dz-preview").remove();
    },
    error: function (file, response){
        if ($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    successmultiple: function (file, response) {
        console.log(file, response);
        $modal.modal("show");
    },
    completemultiple: function (file, response) {
        console.log(file, response, "completemultiple");
        //$modal.modal("show");
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});

function getFileExt(fileName) {
    fileName = fileName.toLowerCase();
    return fileName.split('.').pop();
}
</script>
@endpush

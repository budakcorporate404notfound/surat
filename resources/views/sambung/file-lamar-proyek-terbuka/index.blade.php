@extends('adminlte.layout')

@section('template_title')
File Lamar Proyek Terbuka
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('File Lamar Proyek Terbuka') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="file_lamar_proyek_terbuka-create-new"> Tambah File Lamar Proyek Terbuka baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="file_lamar_proyek_terbuka-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id File</th>
								<th>Id Lamar Proyek Terbuka</th>

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

<div class="modal fade" id="file_lamar_proyek_terbuka-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="file_lamar_proyek_terbuka-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="file_lamar_proyek_terbuka-form" name="file_lamar_proyek_terbuka-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('sambung.file-lamar-proyek-terbuka.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="file_lamar_proyek_terbuka-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js_script')
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var file_lamar_proyek_terbuka_table = $('#file_lamar_proyek_terbuka-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('file_lamar_proyek_terbuka.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_file', name: 'id_file'},
            {data: 'id_lamar_proyek_terbuka', name: 'id_lamar_proyek_terbuka'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( file_lamar_proyek_terbuka_table );

    $('#file_lamar_proyek_terbuka-create-new').click(function () {
        $('#file_lamar_proyek_terbuka-model-heading').html("Tambah baru File Lamar Proyek Terbuka");
        $('#file_lamar_proyek_terbuka-save-btn').val("create-file_lamar_proyek_terbuka");
        $('#id', '#file_lamar_proyek_terbuka-form').val('');
        $('#file_lamar_proyek_terbuka-form').trigger("reset");
        $('#file_lamar_proyek_terbuka-ajax-modal').modal('show');
    });

    $('body').on('click', '.file_lamar_proyek_terbuka-edit', function () {
        var file_lamar_proyek_terbuka_id = $(this).data('id');
        $.get("{{ route('file_lamar_proyek_terbuka.index') }}" +'/' + file_lamar_proyek_terbuka_id +'/edit', function (data) {
            $('#file_lamar_proyek_terbuka-model-heading').html("Ubah File Lamar Proyek Terbuka");
            $('#file_lamar_proyek_terbuka-save-btn').val("edit-user");
            $('#file_lamar_proyek_terbuka-ajax-modal').modal('show');
            $('#id','#file_lamar_proyek_terbuka-form').val(data.id);
            $('#id_file', '#file_lamar_proyek_terbuka-form').val(data.id_file);
            $('#id_lamar_proyek_terbuka', '#file_lamar_proyek_terbuka-form').val(data.id_lamar_proyek_terbuka);

        })
    });

    $('#file_lamar_proyek_terbuka-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#file_lamar_proyek_terbuka-form').serialize(),
            url: "{{ route('file_lamar_proyek_terbuka.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#file_lamar_proyek_terbuka-save-btn').html('Simpan perubahan');
                $('#file_lamar_proyek_terbuka-form').trigger("reset");
                $('#file_lamar_proyek_terbuka-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#file_lamar_proyek_terbuka-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.file_lamar_proyek_terbuka-delete', function (){
        var file_lamar_proyek_terbuka_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('file_lamar_proyek_terbuka.store') }}"+'/'+file_lamar_proyek_terbuka_id,
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
@endpush

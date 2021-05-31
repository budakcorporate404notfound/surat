@extends('adminlte.layout')

@section('template_title')
Jenis Surat Masuk
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Jenis Surat Masuk') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="jenis_surat_masuk-create-new"> Tambah jenis_surat_masuk baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="jenis_surat_masuk-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Jenis Surat Masuk</th>

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

<div class="modal fade" id="jenis_surat_masuk-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="jenis_surat_masuk-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="jenis_surat_masuk-form" name="jenis_surat_masuk-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.jenis-surat-masuk.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="jenis_surat_masuk-save-btn" value="create">Simpan perubahan</button>
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

    var jenis_surat_masuk_table = $('#jenis_surat_masuk-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('jenis_surat_masuk.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis_surat_masuk', name: 'jenis_surat_masuk'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( jenis_surat_masuk_table );

    $('#jenis_surat_masuk-create-new').click(function () {
        $('#jenis_surat_masuk-model-heading').html("Tambah baru jenis_surat_masuk");
        $('#jenis_surat_masuk-save-btn').val("create-jenis_surat_masuk");
        $('#id', '#jenis_surat_masuk-form').val('');
        $('#jenis_surat_masuk-form').trigger("reset");
        $('#jenis_surat_masuk-ajax-modal').modal('show');
    });

    $('body').on('click', '.jenis_surat_masuk-edit', function () {
        var jenis_surat_masuk_id = $(this).data('id');
        $.get("{{ route('jenis_surat_masuk.index') }}" +'/' + jenis_surat_masuk_id +'/edit', function (data) {
            $('#jenis_surat_masuk-model-heading').html("Ubah jenis_surat_masuk");
            $('#jenis_surat_masuk-save-btn').val("edit-user");
            $('#jenis_surat_masuk-ajax-modal').modal('show');
            $('#id','#jenis_surat_masuk-form').val(data.id);
            $('#jenis_surat_masuk', '#jenis_surat_masuk-form').val(data.jenis_surat_masuk);

        })
    });

    $('#jenis_surat_masuk-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#jenis_surat_masuk-form').serialize(),
            url: "{{ route('jenis_surat_masuk.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#jenis_surat_masuk-save-btn').html('Simpan perubahan');
                $('#jenis_surat_masuk-form').trigger("reset");
                $('#jenis_surat_masuk-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#jenis_surat_masuk-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.jenis_surat_masuk-delete', function (){
        var jenis_surat_masuk_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('jenis_surat_masuk.store') }}"+'/'+jenis_surat_masuk_id,
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

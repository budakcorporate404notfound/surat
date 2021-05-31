@extends('adminlte.layout')

@section('template_title')
Unit
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Unit') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="unit-create-new"> Tambah unit baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="unit-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Unit</th>
								<th>Unit</th>
								<th>Jabatan</th>

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

<div class="modal fade" id="unit-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="unit-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="unit-form" name="unit-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.unit.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="unit-save-btn" value="create">Simpan perubahan</button>
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

    var unit_table = $('#unit-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('unit.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_unit', name: 'id_unit'},
            {data: 'unit', name: 'unit'},
            {data: 'jabatan', name: 'jabatan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( unit_table );

    $('#unit-create-new').click(function () {
        $('#unit-model-heading').html("Tambah baru unit");
        $('#unit-save-btn').val("create-unit");
        $('#id', '#unit-form').val('');
        $('#unit-form').trigger("reset");
        $('#unit-ajax-modal').modal('show');
    });

    $('body').on('click', '.unit-edit', function () {
        var unit_id = $(this).data('id');
        $.get("{{ route('unit.index') }}" +'/' + unit_id +'/edit', function (data) {
            $('#unit-model-heading').html("Ubah unit");
            $('#unit-save-btn').val("edit-user");
            $('#unit-ajax-modal').modal('show');
            $('#id','#unit-form').val(data.id);
            $('#id_unit', '#unit-form').val(data.id_unit);
            $('#unit', '#unit-form').val(data.unit);
            $('#jabatan', '#unit-form').val(data.jabatan);

        })
    });

    $('#unit-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#unit-form').serialize(),
            url: "{{ route('unit.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#unit-save-btn').html('Simpan perubahan');
                $('#unit-form').trigger("reset");
                $('#unit-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#unit-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.unit-delete', function (){
        var unit_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('unit.store') }}"+'/'+unit_id,
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

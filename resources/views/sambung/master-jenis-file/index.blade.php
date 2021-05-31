@extends('adminlte.layout')

@section('template_title')
Master Jenis File
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Master Jenis File') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="master_jenis_file-create-new"> Tambah Master Jenis File baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="master_jenis_file-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Jenis File</th>
								<th>Ekstensi</th>

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

<div class="modal fade" id="master_jenis_file-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="master_jenis_file-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="master_jenis_file-form" name="master_jenis_file-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('sambung.master-jenis-file.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="master_jenis_file-save-btn" value="create">Simpan perubahan</button>
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

    var master_jenis_file_table = $('#master_jenis_file-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('master_jenis_file.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis_file', name: 'jenis_file'},
            {data: 'ekstensi', name: 'ekstensi'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( master_jenis_file_table );

    $('#master_jenis_file-create-new').click(function () {
        $('#master_jenis_file-model-heading').html("Tambah baru Master Jenis File");
        $('#master_jenis_file-save-btn').val("create-master_jenis_file");
        $('#id', '#master_jenis_file-form').val('');
        $('#master_jenis_file-form').trigger("reset");
        $('#master_jenis_file-ajax-modal').modal('show');
    });

    $('body').on('click', '.master_jenis_file-edit', function () {
        var master_jenis_file_id = $(this).data('id');
        $.get("{{ route('master_jenis_file.index') }}" +'/' + master_jenis_file_id +'/edit', function (data) {
            $('#master_jenis_file-model-heading').html("Ubah Master Jenis File");
            $('#master_jenis_file-save-btn').val("edit-user");
            $('#master_jenis_file-ajax-modal').modal('show');
            $('#id','#master_jenis_file-form').val(data.id);
            $('#jenis_file', '#master_jenis_file-form').val(data.jenis_file);
            $('#ekstensi', '#master_jenis_file-form').val(data.ekstensi);

        })
    });

    $('#master_jenis_file-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#master_jenis_file-form').serialize(),
            url: "{{ route('master_jenis_file.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#master_jenis_file-save-btn').html('Simpan perubahan');
                $('#master_jenis_file-form').trigger("reset");
                $('#master_jenis_file-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#master_jenis_file-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.master_jenis_file-delete', function (){
        var master_jenis_file_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('master_jenis_file.store') }}"+'/'+master_jenis_file_id,
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

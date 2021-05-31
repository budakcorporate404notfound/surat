@extends('adminlte.layout')

@section('template_title')
Arahan Surat
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Arahan Surat') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="arahan_surat-create-new"> Tambah arahan_surat baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="arahan_surat-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Arahan Surat</th>

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

<div class="modal fade" id="arahan_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="arahan_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="arahan_surat-form" name="arahan_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.arahan-surat.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="arahan_surat-save-btn" value="create">Simpan perubahan</button>
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

    var arahan_surat_table = $('#arahan_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('arahan_surat.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'arahan_surat', name: 'arahan_surat'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( arahan_surat_table );

    $('#arahan_surat-create-new').click(function () {
        $('#arahan_surat-model-heading').html("Tambah baru arahan_surat");
        $('#arahan_surat-save-btn').val("create-arahan_surat");
        $('#id', '#arahan_surat-form').val('');
        $('#arahan_surat-form').trigger("reset");
        $('#arahan_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.arahan_surat-edit', function () {
        var arahan_surat_id = $(this).data('id');
        $.get("{{ route('arahan_surat.index') }}" +'/' + arahan_surat_id +'/edit', function (data) {
            $('#arahan_surat-model-heading').html("Ubah arahan_surat");
            $('#arahan_surat-save-btn').val("edit-user");
            $('#arahan_surat-ajax-modal').modal('show');
            $('#id','#arahan_surat-form').val(data.id);
            $('#arahan_surat', '#arahan_surat-form').val(data.arahan_surat);

        })
    });

    $('#arahan_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#arahan_surat-form').serialize(),
            url: "{{ route('arahan_surat.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#arahan_surat-save-btn').html('Simpan perubahan');
                $('#arahan_surat-form').trigger("reset");
                $('#arahan_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#arahan_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.arahan_surat-delete', function (){
        var arahan_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('arahan_surat.store') }}"+'/'+arahan_surat_id,
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

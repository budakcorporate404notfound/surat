@extends('adminlte.layout')

@section('template_title')
Status Disposisi
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Status Disposisi') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="status_disposisi-create-new"> Tambah status_disposisi baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="status_disposisi-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Status Disposisi</th>

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

<div class="modal fade" id="status_disposisi-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="status_disposisi-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="status_disposisi-form" name="status_disposisi-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.status-disposisi.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="status_disposisi-save-btn" value="create">Simpan perubahan</button>
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

    var status_disposisi_table = $('#status_disposisi-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('status_disposisi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'status_disposisi', name: 'status_disposisi'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( status_disposisi_table );

    $('#status_disposisi-create-new').click(function () {
        $('#status_disposisi-model-heading').html("Tambah baru status_disposisi");
        $('#status_disposisi-save-btn').val("create-status_disposisi");
        $('#id', '#status_disposisi-form').val('');
        $('#status_disposisi-form').trigger("reset");
        $('#status_disposisi-ajax-modal').modal('show');
    });

    $('body').on('click', '.status_disposisi-edit', function () {
        var status_disposisi_id = $(this).data('id');
        $.get("{{ route('status_disposisi.index') }}" +'/' + status_disposisi_id +'/edit', function (data) {
            $('#status_disposisi-model-heading').html("Ubah status_disposisi");
            $('#status_disposisi-save-btn').val("edit-user");
            $('#status_disposisi-ajax-modal').modal('show');
            $('#id','#status_disposisi-form').val(data.id);
            $('#status_disposisi', '#status_disposisi-form').val(data.status_disposisi);

        })
    });

    $('#status_disposisi-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#status_disposisi-form').serialize(),
            url: "{{ route('status_disposisi.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#status_disposisi-save-btn').html('Simpan perubahan');
                $('#status_disposisi-form').trigger("reset");
                $('#status_disposisi-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#status_disposisi-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.status_disposisi-delete', function (){
        var status_disposisi_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('status_disposisi.store') }}"+'/'+status_disposisi_id,
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

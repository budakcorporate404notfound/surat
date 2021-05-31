@extends('adminlte.layout')

@section('template_title')
Memo Disposisi
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Memo Disposisi') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="memo_disposisi-create-new"> Tambah memo_disposisi baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="memo_disposisi-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Disposisi Surat</th>
								<th>Memo Disposisi</th>

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

<div class="modal fade" id="memo_disposisi-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="memo_disposisi-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="memo_disposisi-form" name="memo_disposisi-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.memo-disposisi.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="memo_disposisi-save-btn" value="create">Simpan perubahan</button>
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

    var memo_disposisi_table = $('#memo_disposisi-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('memo_disposisi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_disposisi_surat', name: 'id_disposisi_surat'},
            {data: 'memo_disposisi', name: 'memo_disposisi'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( memo_disposisi_table );

    $('#memo_disposisi-create-new').click(function () {
        $('#memo_disposisi-model-heading').html("Tambah baru memo_disposisi");
        $('#memo_disposisi-save-btn').val("create-memo_disposisi");
        $('#id', '#memo_disposisi-form').val('');
        $('#memo_disposisi-form').trigger("reset");
        $('#memo_disposisi-ajax-modal').modal('show');
    });

    $('body').on('click', '.memo_disposisi-edit', function () {
        var memo_disposisi_id = $(this).data('id');
        $.get("{{ route('memo_disposisi.index') }}" +'/' + memo_disposisi_id +'/edit', function (data) {
            $('#memo_disposisi-model-heading').html("Ubah memo_disposisi");
            $('#memo_disposisi-save-btn').val("edit-user");
            $('#memo_disposisi-ajax-modal').modal('show');
            $('#id','#memo_disposisi-form').val(data.id);
            $('#id_disposisi_surat', '#memo_disposisi-form').val(data.id_disposisi_surat);
            $('#memo_disposisi', '#memo_disposisi-form').val(data.memo_disposisi);

        })
    });

    $('#memo_disposisi-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#memo_disposisi-form').serialize(),
            url: "{{ route('memo_disposisi.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#memo_disposisi-save-btn').html('Simpan perubahan');
                $('#memo_disposisi-form').trigger("reset");
                $('#memo_disposisi-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#memo_disposisi-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.memo_disposisi-delete', function (){
        var memo_disposisi_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('memo_disposisi.store') }}"+'/'+memo_disposisi_id,
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

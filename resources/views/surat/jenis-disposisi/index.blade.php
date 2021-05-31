@extends('adminlte.layout')

@section('template_title')
Jenis Disposisi
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Jenis Disposisi') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="jenis_disposisi-create-new"> Tambah jenis_disposisi baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="jenis_disposisi-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Jenis Disposisi</th>

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

<div class="modal fade" id="jenis_disposisi-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="jenis_disposisi-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="jenis_disposisi-form" name="jenis_disposisi-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.jenis-disposisi.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="jenis_disposisi-save-btn" value="create">Simpan perubahan</button>
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

    var jenis_disposisi_table = $('#jenis_disposisi-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('jenis_disposisi.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'jenis_disposisi', name: 'jenis_disposisi'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( jenis_disposisi_table );

    $('#jenis_disposisi-create-new').click(function () {
        $('#jenis_disposisi-model-heading').html("Tambah baru jenis_disposisi");
        $('#jenis_disposisi-save-btn').val("create-jenis_disposisi");
        $('#id', '#jenis_disposisi-form').val('');
        $('#jenis_disposisi-form').trigger("reset");
        $('#jenis_disposisi-ajax-modal').modal('show');
    });

    $('body').on('click', '.jenis_disposisi-edit', function () {
        var jenis_disposisi_id = $(this).data('id');
        $.get("{{ route('jenis_disposisi.index') }}" +'/' + jenis_disposisi_id +'/edit', function (data) {
            $('#jenis_disposisi-model-heading').html("Ubah jenis_disposisi");
            $('#jenis_disposisi-save-btn').val("edit-user");
            $('#jenis_disposisi-ajax-modal').modal('show');
            $('#id','#jenis_disposisi-form').val(data.id);
            $('#jenis_disposisi', '#jenis_disposisi-form').val(data.jenis_disposisi);

        })
    });

    $('#jenis_disposisi-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#jenis_disposisi-form').serialize(),
            url: "{{ route('jenis_disposisi.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#jenis_disposisi-save-btn').html('Simpan perubahan');
                $('#jenis_disposisi-form').trigger("reset");
                $('#jenis_disposisi-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#jenis_disposisi-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.jenis_disposisi-delete', function (){
        var jenis_disposisi_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('jenis_disposisi.store') }}"+'/'+jenis_disposisi_id,
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

{{--  @extends('adminlte.layout')

@section('template_title')
Disposisi Pimpinan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>
</div>  --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6" id="card_title">{{ __('Disposisi Pimpinan') }}</div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="disposisi_pimpinan-create-new"><i class="fas fa-plus-circle"></i> Tambah Disposisi Pimpinan</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body col-12 table-responsive">
        <table class="table table-bordered data-table dt-responsive nowrap col-12" id="disposisi_pimpinan-data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>

                    {{--  <th>Id Surat Masuk</th>
                    <th>Id Unit</th>  --}}
                    <th>Disposisi Pimpinan</th>

                    {{--  <th></th>  --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="disposisi_pimpinan-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="disposisi_pimpinan-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#disposisi_pimpinan-model-heading" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="disposisi_pimpinan-form" name="disposisi_pimpinan-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.disposisi-pimpinan.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="disposisi_pimpinan-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#disposisi_pimpinan-model-heading">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--  @endsection  --}}

@push('js_script')
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var disposisi_pimpinan_table = $('#disposisi_pimpinan-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        filter: false,
        ajax: "{{ route('disposisi_pimpinan.index') }}",
        columnDefs: [{ "width": "5%", "targets": 0 }],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_unit', name: 'id_unit'},
            // {data: 'disposisi_pimpinan', name: 'disposisi_pimpinan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( disposisi_pimpinan_table );

    $('#disposisi_pimpinan-create-new').click(function () {
        $('#disposisi_pimpinan-model-heading').html("Tambah baru disposisi_pimpinan");
        $('#disposisi_pimpinan-save-btn').val("create-disposisi_pimpinan");
        $('#id', '#disposisi_pimpinan-form').val('');
        $('#disposisi_pimpinan-form').trigger("reset");
        $('#disposisi_pimpinan-ajax-modal').modal('show');
    });

    $('body').on('click', '.disposisi_pimpinan-edit', function () {
        var disposisi_pimpinan_id = $(this).data('id');
        $.get("{{ route('disposisi_pimpinan.index') }}" +'/' + disposisi_pimpinan_id +'/edit', function (data) {
            $('#disposisi_pimpinan-model-heading').html("Ubah disposisi_pimpinan");
            $('#disposisi_pimpinan-save-btn').val("edit-user");
            $('#disposisi_pimpinan-ajax-modal').modal('show');
            $('#id','#disposisi_pimpinan-form').val(data.id);
            $('#id_surat_masuk', '#disposisi_pimpinan-form').val(data.id_surat_masuk);
            $('#id_unit', '#disposisi_pimpinan-form').val(data.id_unit);
            $('#disposisi_pimpinan', '#disposisi_pimpinan-form').val(data.disposisi_pimpinan);

        })
    });

    $('#disposisi_pimpinan-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#disposisi_pimpinan-form').serialize(),
            url: "{{ route('disposisi_pimpinan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#disposisi_pimpinan-save-btn').html('Simpan perubahan');
                $('#disposisi_pimpinan-form').trigger("reset");
                $('#disposisi_pimpinan-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#disposisi_pimpinan-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.disposisi_pimpinan-delete', function (){
        var disposisi_pimpinan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('disposisi_pimpinan.store') }}"+'/'+disposisi_pimpinan_id,
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

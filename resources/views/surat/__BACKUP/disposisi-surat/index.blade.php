{{--  @extends('adminlte.layout')

@section('template_title')
Disposisi Surat
@endsection

@section('content')  --}}
{{--  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>
</div>  --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6" id="card_title">{{ __('Disposisi Surat') }}</div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="disposisi_surat-create-new"><i class="fas fa-plus-circle"></i>  Tambah Disposisi Surat</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body col-12 table-responsive">
        <table class="table table-bordered data-table dt-responsive nowrap" id="disposisi_surat-data-table" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>

                    {{--  <th>Id Surat Masuk</th>  --}}
                    <th>Arahan Surat</th>
                    {{--  <th>Id Status Disposisi</th>  --}}
                    <th>Ceklist Disposisi Surat</th>
                    {{--  <th>Disposisi Surat</th>  --}}

                    {{--  <th></th>  --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="disposisi_surat-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="disposisi_surat-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#disposisi_surat-model-heading" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="disposisi_surat-form" name="disposisi_surat-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.disposisi-surat.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="disposisi_surat-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#disposisi_surat-model-heading">Batal</button>
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

    var disposisi_surat_table = $('#disposisi_surat-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        filter: false,
        ajax: "{{ route('disposisi_surat.index') }}",
        columnDefs: [{ "width": "5%", "targets": 0 }],
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            {data: 'id_arahan_surat', name: 'id_arahan_surat'},
            // {data: 'id_status_disposisi', name: 'id_status_disposisi'},
            {data: 'ceklist_disposisi_surat', name: 'ceklist_disposisi_surat'},
            // {data: 'disposisi_surat', name: 'disposisi_surat'},

            // {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( disposisi_surat_table );

    $('#disposisi_surat-create-new').click(function () {
        $('#disposisi_surat-model-heading').html("Tambah baru disposisi_surat");
        $('#disposisi_surat-save-btn').val("create-disposisi_surat");
        $('#id', '#disposisi_surat-form').val('');
        $('#disposisi_surat-form').trigger("reset");
        $('#disposisi_surat-ajax-modal').modal('show');
    });

    $('body').on('click', '.disposisi_surat-edit', function () {
        var disposisi_surat_id = $(this).data('id');
        $.get("{{ route('disposisi_surat.index') }}" +'/' + disposisi_surat_id +'/edit', function (data) {
            $('#disposisi_surat-model-heading').html("Ubah disposisi_surat");
            $('#disposisi_surat-save-btn').val("edit-user");
            $('#disposisi_surat-ajax-modal').modal('show');
            $('#id','#disposisi_surat-form').val(data.id);
            $('#id_surat_masuk', '#disposisi_surat-form').val(data.id_surat_masuk);
            $('#id_arahan_surat', '#disposisi_surat-form').val(data.id_arahan_surat);
            $('#id_status_disposisi', '#disposisi_surat-form').val(data.id_status_disposisi);
            $('#ceklist_disposisi_surat', '#disposisi_surat-form').val(data.ceklist_disposisi_surat);
            $('#disposisi_surat', '#disposisi_surat-form').val(data.disposisi_surat);

        })
    });

    $('#disposisi_surat-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#disposisi_surat-form').serialize(),
            url: "{{ route('disposisi_surat.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#disposisi_surat-save-btn').html('Simpan perubahan');
                $('#disposisi_surat-form').trigger("reset");
                $('#disposisi_surat-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#disposisi_surat-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.disposisi_surat-delete', function (){
        var disposisi_surat_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('disposisi_surat.store') }}"+'/'+disposisi_surat_id,
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

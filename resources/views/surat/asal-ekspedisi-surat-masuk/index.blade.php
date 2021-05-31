@extends('adminlte.layout')

@section('template_title')
Asal Ekspedisi Surat Masuk
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Asal Ekspedisi Surat Masuk') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="asal_ekspedisi_surat_masuk-create-new"> Tambah asal_ekspedisi_surat_masuk baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="asal_ekspedisi_surat_masuk-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Asal Ekspedisi Surat Masuk</th>

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

<div class="modal fade" id="asal_ekspedisi_surat_masuk-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="asal_ekspedisi_surat_masuk-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="asal_ekspedisi_surat_masuk-form" name="asal_ekspedisi_surat_masuk-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('surat.asal-ekspedisi-surat-masuk.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="asal_ekspedisi_surat_masuk-save-btn" value="create">Simpan perubahan</button>
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

    var asal_ekspedisi_surat_masuk_table = $('#asal_ekspedisi_surat_masuk-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('asal_ekspedisi_surat_masuk.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'asal_ekspedisi_surat_masuk', name: 'asal_ekspedisi_surat_masuk'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( asal_ekspedisi_surat_masuk_table );

    $('#asal_ekspedisi_surat_masuk-create-new').click(function () {
        $('#asal_ekspedisi_surat_masuk-model-heading').html("Tambah baru asal_ekspedisi_surat_masuk");
        $('#asal_ekspedisi_surat_masuk-save-btn').val("create-asal_ekspedisi_surat_masuk");
        $('#id', '#asal_ekspedisi_surat_masuk-form').val('');
        $('#asal_ekspedisi_surat_masuk-form').trigger("reset");
        $('#asal_ekspedisi_surat_masuk-ajax-modal').modal('show');
    });

    $('body').on('click', '.asal_ekspedisi_surat_masuk-edit', function () {
        var asal_ekspedisi_surat_masuk_id = $(this).data('id');
        $.get("{{ route('asal_ekspedisi_surat_masuk.index') }}" +'/' + asal_ekspedisi_surat_masuk_id +'/edit', function (data) {
            $('#asal_ekspedisi_surat_masuk-model-heading').html("Ubah asal_ekspedisi_surat_masuk");
            $('#asal_ekspedisi_surat_masuk-save-btn').val("edit-user");
            $('#asal_ekspedisi_surat_masuk-ajax-modal').modal('show');
            $('#id','#asal_ekspedisi_surat_masuk-form').val(data.id);
            $('#asal_ekspedisi_surat_masuk', '#asal_ekspedisi_surat_masuk-form').val(data.asal_ekspedisi_surat_masuk);

        })
    });

    $('#asal_ekspedisi_surat_masuk-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#asal_ekspedisi_surat_masuk-form').serialize(),
            url: "{{ route('asal_ekspedisi_surat_masuk.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#asal_ekspedisi_surat_masuk-save-btn').html('Simpan perubahan');
                $('#asal_ekspedisi_surat_masuk-form').trigger("reset");
                $('#asal_ekspedisi_surat_masuk-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#asal_ekspedisi_surat_masuk-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.asal_ekspedisi_surat_masuk-delete', function (){
        var asal_ekspedisi_surat_masuk_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('asal_ekspedisi_surat_masuk.store') }}"+'/'+asal_ekspedisi_surat_masuk_id,
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

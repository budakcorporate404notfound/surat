@extends('adminlte.layout')

@section('template_title')
Master Model Tahapan
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Master Model Tahapan') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="master_model_tahapan-create-new"> Tambah Master Model Tahapan baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="master_model_tahapan-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Model Proyek</th>
								<th>Model Tahapan</th>
								<th>Deskripsi Model Tahapan</th>
								<th>Status Aktif</th>

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

<div class="modal fade" id="master_model_tahapan-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="master_model_tahapan-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="master_model_tahapan-form" name="master_model_tahapan-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('sambung.master-model-tahapan.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="master_model_tahapan-save-btn" value="create">Simpan perubahan</button>
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

    var master_model_tahapan_table = $('#master_model_tahapan-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('master_model_tahapan.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_model_proyek', name: 'id_model_proyek'},
            {data: 'model_tahapan', name: 'model_tahapan'},
            {data: 'deskripsi_model_tahapan', name: 'deskripsi_model_tahapan'},
            {data: 'status_aktif', name: 'status_aktif'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( master_model_tahapan_table );

    $('#master_model_tahapan-create-new').click(function () {
        $('#master_model_tahapan-model-heading').html("Tambah baru Master Model Tahapan");
        $('#master_model_tahapan-save-btn').val("create-master_model_tahapan");
        $('#id', '#master_model_tahapan-form').val('');
        $('#master_model_tahapan-form').trigger("reset");
        $('#master_model_tahapan-ajax-modal').modal('show');
    });

    $('body').on('click', '.master_model_tahapan-edit', function () {
        var master_model_tahapan_id = $(this).data('id');
        $.get("{{ route('master_model_tahapan.index') }}" +'/' + master_model_tahapan_id +'/edit', function (data) {
            $('#master_model_tahapan-model-heading').html("Ubah Master Model Tahapan");
            $('#master_model_tahapan-save-btn').val("edit-user");
            $('#master_model_tahapan-ajax-modal').modal('show');
            $('#id','#master_model_tahapan-form').val(data.id);
            $('#id_model_proyek', '#master_model_tahapan-form').val(data.id_model_proyek);
            $('#model_tahapan', '#master_model_tahapan-form').val(data.model_tahapan);
            $('#deskripsi_model_tahapan', '#master_model_tahapan-form').val(data.deskripsi_model_tahapan);
            $('#status_aktif', '#master_model_tahapan-form').val(data.status_aktif);

        })
    });

    $('#master_model_tahapan-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#master_model_tahapan-form').serialize(),
            url: "{{ route('master_model_tahapan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#master_model_tahapan-save-btn').html('Simpan perubahan');
                $('#master_model_tahapan-form').trigger("reset");
                $('#master_model_tahapan-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#master_model_tahapan-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.master_model_tahapan-delete', function (){
        var master_model_tahapan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('master_model_tahapan.store') }}"+'/'+master_model_tahapan_id,
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

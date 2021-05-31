@extends('adminlte.layout')

@section('template_title')
Anggota Tim
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Anggota Tim') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="anggota_tim-create-new"> Tambah Anggota Tim baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="anggota_tim-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Id Proyek</th>
								<th>Jabatan Dalam Tim</th>

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

<div class="modal fade" id="anggota_tim-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="anggota_tim-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="anggota_tim-form" name="anggota_tim-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('sambung.anggota-tim.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="anggota_tim-save-btn" value="create">Simpan perubahan</button>
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

    var anggota_tim_table = $('#anggota_tim-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('anggota_tim.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id_proyek', name: 'id_proyek'},
            {data: 'jabatan_dalam_tim', name: 'jabatan_dalam_tim'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( anggota_tim_table );

    $('#anggota_tim-create-new').click(function () {
        $('#anggota_tim-model-heading').html("Tambah baru Anggota Tim");
        $('#anggota_tim-save-btn').val("create-anggota_tim");
        $('#id', '#anggota_tim-form').val('');
        $('#anggota_tim-form').trigger("reset");
        $('#anggota_tim-ajax-modal').modal('show');
    });

    $('body').on('click', '.anggota_tim-edit', function () {
        var anggota_tim_id = $(this).data('id');
        $.get("{{ route('anggota_tim.index') }}" +'/' + anggota_tim_id +'/edit', function (data) {
            $('#anggota_tim-model-heading').html("Ubah Anggota Tim");
            $('#anggota_tim-save-btn').val("edit-user");
            $('#anggota_tim-ajax-modal').modal('show');
            $('#id','#anggota_tim-form').val(data.id);
            $('#id_proyek', '#anggota_tim-form').val(data.id_proyek);
            $('#jabatan_dalam_tim', '#anggota_tim-form').val(data.jabatan_dalam_tim);

        })
    });

    $('#anggota_tim-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#anggota_tim-form').serialize(),
            url: "{{ route('anggota_tim.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#anggota_tim-save-btn').html('Simpan perubahan');
                $('#anggota_tim-form').trigger("reset");
                $('#anggota_tim-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#anggota_tim-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.anggota_tim-delete', function (){
        var anggota_tim_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('anggota_tim.store') }}"+'/'+anggota_tim_id,
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

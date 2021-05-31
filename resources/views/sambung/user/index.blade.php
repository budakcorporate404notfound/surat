@extends('adminlte.layout')

@section('template_title')
User
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('User') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="user-create-new"> Tambah User baru</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="user-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                
								<th>Username</th>
								<th>Nip</th>
								<th>Nama</th>
								<th>Keahlian</th>
								<th>Catatan</th>
								<th>Pengalaman</th>
								<th>Pendidikan</th>

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

<div class="modal fade" id="user-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="user-model-heading"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-form" name="user-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                    @include('sambung.user.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="user-save-btn" value="create">Simpan perubahan</button>
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

    var user_table = $('#user-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'username', name: 'username'},
            {data: 'nip', name: 'nip'},
            {data: 'nama', name: 'nama'},
            {data: 'keahlian', name: 'keahlian'},
            {data: 'catatan', name: 'catatan'},
            {data: 'pengalaman', name: 'pengalaman'},
            {data: 'pendidikan', name: 'pendidikan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( user_table );

    $('#user-create-new').click(function () {
        $('#user-model-heading').html("Tambah baru User");
        $('#user-save-btn').val("create-user");
        $('#id', '#user-form').val('');
        $('#user-form').trigger("reset");
        $('#user-ajax-modal').modal('show');
    });

    $('body').on('click', '.user-edit', function () {
        var user_id = $(this).data('id');
        $.get("{{ route('user.index') }}" +'/' + user_id +'/edit', function (data) {
            $('#user-model-heading').html("Ubah User");
            $('#user-save-btn').val("edit-user");
            $('#user-ajax-modal').modal('show');
            $('#id','#user-form').val(data.id);
            $('#username', '#user-form').val(data.username);
            $('#nip', '#user-form').val(data.nip);
            $('#nama', '#user-form').val(data.nama);
            $('#keahlian', '#user-form').val(data.keahlian);
            $('#catatan', '#user-form').val(data.catatan);
            $('#pengalaman', '#user-form').val(data.pengalaman);
            $('#pendidikan', '#user-form').val(data.pendidikan);

        })
    });

    $('#user-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#user-form').serialize(),
            url: "{{ route('user.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#user-save-btn').html('Simpan perubahan');
                $('#user-form').trigger("reset");
                $('#user-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#user-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.user-delete', function (){
        var user_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('user.store') }}"+'/'+user_id,
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

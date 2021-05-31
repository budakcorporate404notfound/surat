<div class="row mb-3">
    <div class="col-md-6" id="card_title">{{ Form::label('daftar_disposisi_dari_pimpinan') }}</div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-disposisi-pimpinan-create-new"><i class="fas fa-plus-circle"></i>  Tambah Disposisi Pimpinan</a>
    </div>
</div>
<div class="card">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered data-table dt-responsive nowrap" id="surat-disposisi-pimpinan-data-table" width="100%">
                <thead>
                    <tr>
                        <th>No</th>

								{{--  <th>Id Surat Masuk</th>
								<th>Id Unit</th>
								<th>Disposisi Pimpinan</th>  --}}

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('modal')
<div class="modal fade" id="surat-disposisi-pimpinan-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat-disposisi-pimpinan-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-disposisi-pimpinan-ajax-modal" data-target="#surat-disposisi-pimpinan-ajax-modal" aria-label="Close" onclick="$('#surat-disposisi-pimpinan-ajax-modal').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="surat-disposisi-pimpinan-form" name="surat-disposisi-pimpinan-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'surat-disposisi-pimpinan-id']) !!}
                    {!! Form::hidden('id_surat_masuk', '', ['id'=>'surat-disposisi-pimpinan-id_surat_masuk']) !!}
                    @include('surat.disposisi-pimpinan.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="surat-disposisi-pimpinan-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#surat-disposisi-pimpinan-ajax-modal" data-target="#surat-disposisi-pimpinan-ajax-modal" onclick="$('#surat-disposisi-pimpinan-ajax-modal').modal('hide');">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
#surat-disposisi-pimpinan-data-table thead {display: none;}
</style>
@endpush
@push('js_script')
<script type="text/javascript">
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    surat_disposisi_pimpinan_table = $('#surat-disposisi-pimpinan-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        paging: false,
        searching: false,
        info: false,
        ajax: "{{ route('disposisi_pimpinan.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_unit', name: 'id_unit'},
            // {data: 'disposisi_pimpinan', name: 'disposisi_pimpinan'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_disposisi_pimpinan_table );

    $('#surat-disposisi-pimpinan-create-new').click(function () {
        $('#surat-disposisi-pimpinan-model-heading').html("Tambah baru disposisi pimpinan");
        $('#surat-disposisi-pimpinan-save-btn').val("Simpan disposisi pimpinan");
        $('#surat-disposisi-pimpinan-id', '#surat-disposisi-pimpinan-form').val('');
        reset_form_data('#surat-disposisi-pimpinan-form');
        $('#surat-disposisi-pimpinan-form').trigger("reset");
        $('#surat-disposisi-pimpinan-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-disposisi-pimpinan-edit', function () {
        var surat_disposisi_pimpinan_id = $(this).data('id');
        $.get('{{ route('disposisi_pimpinan.index') }}' + '/' + surat_disposisi_pimpinan_id  + '/edit', function (data) {
            reset_form_data('#surat-disposisi-pimpinan-form');
            $('#surat-disposisi-pimpinan-model-heading').html("Ubah disposisi pimpinan");
            $('#surat-disposisi-pimpinan-save-btn').val("Simpan disposisi pimpinan");
            $('#surat-disposisi-pimpinan-ajax-modal').modal('show');
            $('#surat-disposisi-pimpinan-id', '#surat-disposisi-pimpinan-form').val(data.id);
            $('#surat-disposisi-pimpinan-id_surat_masuk', '#surat-disposisi-pimpinan-form').val(data.id_surat_masuk);
            // $('#surat-disposisi-pimpinan-id_unit', '#surat-disposisi-pimpinan-form').val(data.id_unit);
            $('#surat-disposisi-pimpinan-id_unit'+data.id_unit, '#surat-disposisi-pimpinan-form').prop('checked', true);
            $('#surat-disposisi-pimpinan-disposisi_pimpinan', '#surat-disposisi-pimpinan-form').val(data.disposisi_pimpinan);

        })
    });

    $('#surat-disposisi-pimpinan-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $('#surat-disposisi-pimpinan-id_surat_masuk').val($('#surat_masuk-form-id').val());
        $.ajax({
            data: $('#surat-disposisi-pimpinan-form').serialize(),
            url: "{{ route('disposisi_pimpinan.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#surat-disposisi-pimpinan-save-btn').html('Simpan perubahan');
                $('#surat-disposisi-pimpinan-form').trigger("reset");
                $('#surat-disposisi-pimpinan-ajax-modal').modal('hide');
                surat_disposisi_pimpinan_table.ajax.url( '{{ route( 'disposisi_pimpinan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-disposisi-pimpinan-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat-disposisi-pimpinan-delete', function (){
        var surat_disposisi_pimpinan_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: '{{ route('disposisi_pimpinan.store') }}' + '/' + surat_disposisi_pimpinan_id,
                success: function (data) {
                    surat_disposisi_pimpinan_table.ajax.url( '{{ route( 'disposisi_pimpinan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
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

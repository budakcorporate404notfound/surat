<div id="surat-surat-keluar-data-table-pos">
    <div id="surat-surat-keluar-data-block">
        <div class="row mb-3">
            <div class="col-md-6" id="card_title">{{ Form::label('daftar_tanggapan_surat') }}</div>
            <div class="col-md-6 text-right">
                <a class="btn btn-outline-success" href="javascript:void(0)" id="surat-tanggapan-surat-create-new"><i class="fas fa-plus-circle"></i> Tambah Tanggapan Surat</a>
            </div>
        </div>
        <div class="card">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="card-body col-md-12">
                <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat_keluar-data-table" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
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

@push('modal')
<div class="modal fade" id="surat_keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="surat_keluar-model-heading"></h4>
                <button type="button" class="close" data-dismiss="#surat-dokumen-surat-ajax-modal" data-target="#surat-dokumen-surat-ajax-modal" aria-label="Close" onclick="$('#surat-dokumen-surat-ajax-modal').modal('hide');">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="surat_keluar-form" name="surat_keluar-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'surat-surat-keluar-id']) !!}
                    {!! Form::hidden('id_surat_masuk', '', ['id'=>'surat-surat-keluar-id_surat_masuk']) !!}
                    @include('surat.surat-keluar.form')
                    <div class="col-sm-offset-2 col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary" id="surat_keluar-save-btn" value="create">Simpan perubahan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="#surat-file-tanggapan-ajax-modal" data-target="#surat-file-tanggapan-ajax-modal" onclick="$('#surat-file-tanggapan-ajax-modal').modal('hide');">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
#surat-surat_keluar-data-table thead {display: none;}
</style>
@endpush

@push('js_script')
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    var surat_surat_keluar_table = $('#surat-surat_keluar-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('surat_keluar.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'id_surat_masuk', name: 'id_surat_masuk'},
            // {data: 'id_jenis_dokumen', name: 'id_jenis_dokumen'},
            // {data: 'nomor_surat', name: 'nomor_surat'},
            // {data: 'tanggal_surat', name: 'tanggal_surat'},
            // {data: 'kepada', name: 'kepada'},
            // {data: 'perihal', name: 'perihal'},
            // {data: 'id_sifat_keamanan_surat', name: 'id_sifat_keamanan_surat'},
            // {data: 'id_sifat_penyelesaian_surat', name: 'id_sifat_penyelesaian_surat'},
            // {data: 'tanggal_mulai', name: 'tanggal_mulai'},
            // {data: 'tanggal_selesai', name: 'tanggal_selesai'},
            // {data: 'mulai_pukul', name: 'mulai_pukul'},
            // {data: 'selesai_pukul', name: 'selesai_pukul'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_surat_keluar_table );

    $('#surat_keluar-create-new').click(function () {
        $('#surat_keluar-model-heading').html("Tambah baru surat_keluar");
        $('#surat_keluar-save-btn').val("create-surat_keluar");
        $('#id', '#surat_keluar-form').val('');
        $('#surat_keluar-form').trigger("reset");
        $('#surat_keluar-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat_keluar-edit', function () {
        var surat_keluar_id = $(this).data('id');
        $.get("{{ route('surat_keluar.index') }}" +'/' + surat_keluar_id +'/edit', function (data) {
            $('#surat_keluar-model-heading').html("Ubah surat_keluar");
            $('#surat_keluar-save-btn').val("edit-user");
            $('#surat_keluar-ajax-modal').modal('show');
            $('#id','#surat_keluar-form').val(data.id);
            $('#id_surat_masuk', '#surat_keluar-form').val(data.id_surat_masuk);
            $('#id_jenis_dokumen', '#surat_keluar-form').val(data.id_jenis_dokumen);
            $('#nomor_surat', '#surat_keluar-form').val(data.nomor_surat);
            $('#tanggal_surat', '#surat_keluar-form').val(data.tanggal_surat);
            $('#kepada', '#surat_keluar-form').val(data.kepada);
            $('#perihal', '#surat_keluar-form').val(data.perihal);
            $('#id_sifat_keamanan_surat', '#surat_keluar-form').val(data.id_sifat_keamanan_surat);
            $('#id_sifat_penyelesaian_surat', '#surat_keluar-form').val(data.id_sifat_penyelesaian_surat);
            $('#tanggal_mulai', '#surat_keluar-form').val(data.tanggal_mulai);
            $('#tanggal_selesai', '#surat_keluar-form').val(data.tanggal_selesai);
            $('#mulai_pukul', '#surat_keluar-form').val(data.mulai_pukul);
            $('#selesai_pukul', '#surat_keluar-form').val(data.selesai_pukul);

        })
    });

    $('#surat_keluar-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            data: $('#surat_keluar-form').serialize(),
            url: "{{ route('surat_keluar.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#surat_keluar-save-btn').html('Simpan perubahan');
                $('#surat_keluar-form').trigger("reset");
                $('#surat_keluar-ajax-modal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat_keluar-save-btn').html('Simpan perubahan');
            }
        });
    });

    $('body').on('click', '.surat_keluar-delete', function (){
        var surat_keluar_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('surat_keluar.store') }}"+'/'+surat_keluar_id,
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

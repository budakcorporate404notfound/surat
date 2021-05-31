@extends('adminlte.layout')

@section('title')
Surat Keluar
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title">{{ __('Surat Keluar') }}</div>
                        <div class="col-md-4 text-right">
                            <a class="btn btn-success" href="javascript:void(0)" id="surat-surat-keluar-create-new"> {{ __('Tambah surat keluar baru') }}</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <table class="table table-bordered data-table dt-responsive nowrap" id="surat-surat-keluar-data-table">
                        <thead>
                            <tr>
                                <th>No</th>
								<th>Nomor, Tanggal Surat</th>
								<th>Tujuan Surat</th>
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

<div class="modal fade" id="surat-surat-keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12" id="surat-surat-keluar-model-heading"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('surat.surat-keluar.form')
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="surat-surat-keluar-save-btn" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js_script')
<script type="text/javascript">
$(function () {
    $('.summernote').summernote({
        height: 400
    });

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    @inject('Surat', 'App\Http\Controllers\Surat\SuratController')

    surat_jenis_dokumens = {!! json_encode($Surat::convertToJsVar($jenis_dokumens, 'jenis_dokumen')) !!};

    surat_keluar_table = $('#surat-surat-keluar-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('surat_keluar.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            {
                data: null,
                render: function(data, type, row, meta) {
                    return `${data.nomor_surat}<br><span class="font-weight-lighter">${moment(data.tanggal_surat).format('ll')}</span>`;
                },
                name: 'nomo_tanggal_surat', width: "20%",
            },
            {
                data: null,
                render: function(data, type, row, meta) {
                    return `<div class="float-right">
                                <span class="badge badge-pill badge-secondary">${surat_jenis_dokumens[data.id_jenis_dokumen]}</span>
                            </div>
                            ${data.kepada}<br>
                            <span class="font-weight-lighter">${data.perihal}</span>`;
                },
                name: 'tujuan_surat',
            },
            {data: 'action', name: 'action', orderable: false, searchable: false, className: "text-nowrap", width: "1%"},

            /* For searching purpose - not visible */
            {data: 'nomor_surat', name: 'nomor_surat', visible: false, searchable: true},
            {data: 'tanggal_surat', name: 'tanggal_surat', visible: false, searchable: true},
            {data: 'kepada', name: 'kepada', visible: false, searchable: true},
            {data: 'perihal', name: 'perihal', visible: false, searchable: true},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_keluar_table );

    function load_datatable_on_surat_keluar_id(surat_keluar_id) {
        surat_file_surat_keluar_table.ajax.url( '{{ route( 'file_surat_keluar.index' ) }}?id_surat_keluar=' + surat_keluar_id ).load();
    }

    $('#surat_keluar-ajax-modal').on('shown.bs.modal', function() {
        $('#nomor_surat').focus();
    });

    $('#surat_keluar-data-table tbody').on('click', 'tr', function () {
        var data = surat_keluar_table.row( this ).data();
        surat_keluar_id = data.id
        viewSuratKeluar(data.id);
    } );

    $('#surat-surat-keluar-create-new').click(function () {
        $('#surat-surat-keluar-model-heading').html("Tambah surat keluar baru");
        $('#surat-surat-keluar-save-btn').val("Simpan surat keluar");
        $('#surat-surat-keluar-id', '#surat-surat-keluar-form').val('');

        /* reset form */
        $('#surat-surat-keluar-form').trigger("reset");
        $('#surat-surat-keluar-isi_surat', '#surat-surat-keluar-form').summernote('code', '');

        /* set default option */
        $('#surat-surat-keluar-id_jenis_dokumen2').prop('checked', true);
        $('#surat-surat-keluar-id_sifat_keamanan_surat1').prop('checked', true);
        $('#surat-surat-keluar-id_sifat_penyelesaian_surat1').prop('checked', true);

        $('#surat-surat-keluar-box-form-properties').addClass('d-none');

        surat_keluar_id = 0;
        load_datatable_on_surat_keluar_id(surat_keluar_id);

        $('#nav-surat-surat-keluar-isi-surat').tab('show');
        $('#surat-surat-keluar-ajax-modal').modal('show');
    });

    $('body').on('click', '.surat-surat-keluar-edit', function () {
        surat_keluar_id = $(this).data('id');
        $.get("{{ route('surat_keluar.index') }}" +'/' + surat_keluar_id +'/edit', function (data) {
            $('#surat-surat-keluar-model-heading').html('<div class="col-md-6"><h4>Ubah surat keluar</h4></div><div class="text-right col-md-6"><h4>Nomor : <b class="text-primary">'+data.nomor_surat+'</b>, Tanggal : <b>'+moment(data.tanggal_surat).format('ll')+'</b>&nbsp; &nbsp;</h4></div>');
            $('#surat-surat-keluar-save-btn').val("edit-user");

            $('#surat-surat-keluar-id','#surat-surat-keluar-form').val(data.id);
            $('#surat-surat-keluar-id_surat_masuk', '#surat-surat-keluar-form').val(data.id_surat_masuk);
            $('#surat-surat-keluar-id_jenis_dokumen'+data.id_jenis_dokumen, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-id_sifat_keamanan_surat'+data.id_sifat_keamanan_surat, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-id_sifat_penyelesaian_surat'+data.id_sifat_penyelesaian_surat, '#surat-surat-keluar-form').prop('checked', true);
            $('#surat-surat-keluar-kepada', '#surat-surat-keluar-form').val(data.kepada);
            $('#surat-surat-keluar-perihal', '#surat-surat-keluar-form').val(data.perihal);
            $('#surat-surat-keluar-lampiran', '#surat-surat-keluar-form').val(data.lampiran);
            $('#surat-surat-keluar-alamat', '#surat-surat-keluar-form').val(data.alamat);
            $('#surat-surat-keluar-kota_penandatangan', '#surat-surat-keluar-form').val(data.kota_penandatangan);
            $('#surat-surat-keluar-jabatan_penandatangan', '#surat-surat-keluar-form').val(data.jabatan_penandatangan);
            $('#surat-surat-keluar-tanggal_mulai', '#surat-surat-keluar-form').val(data.tanggal_mulai);
            $('#surat-surat-keluar-tanggal_selesai', '#surat-surat-keluar-form').val(data.tanggal_selesai);
            $('#surat-surat-keluar-mulai_pukul', '#surat-surat-keluar-form').val(data.mulai_pukul);
            $('#surat-surat-keluar-selesai_pukul', '#surat-surat-keluar-form').val(data.selesai_pukul);
            $('#surat-surat-keluar-isi_surat', '#surat-surat-keluar-form').summernote('code', data.isi_surat);

            load_datatable_on_surat_keluar_id(surat_keluar_id);
            $("input[name='id_surat_keluar']").val(surat_keluar_id);
            $('#surat-surat-keluar-box-form-properties').removeClass('d-none');

            $('#nav-surat-surat-keluar-isi-surat').tab('show');
            $('#surat-surat-keluar-ajax-modal').modal('show');

        })
    });

    $('#surat-surat-keluar-save-btn').click(function (e) {
        e.preventDefault();
        $(this).html('Proses pengiriman data ..');

        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        $.ajax({
            data: $('#surat-surat-keluar-form').serialize(),
            url: "{{ route('surat_keluar.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (res) {
                if (res.errors) {
                    $.each(res.errors, function(key, value){
                        $('#surat-surat-keluar-'+key+' + div').html(value);
                    });
                    $('.invalid-feedback').show();
                    toastr.error("Silahkan cek kembali pengisian data Anda.", "Data gagal disimpan");
                    $('#surat-surat-keluar-save-btn').html('Simpan perubahan');
                } else {
                    data = res.data;
                    surat_keluar_id = data.id;
                    $('#surat-surat-keluar-box-form-properties').removeClass('d-none');
                    $('#surat-surat-keluar-save-btn').html('Simpan perubahan');
                    $('#surat_masuk-form-id','#surat_masuk-form').val(surat_keluar_id);
                    $("input[name='id_surat_keluar']").val(surat_keluar_id);
                    $('#surat-surat-keluar-model-heading').html('<div class="col-md-6"><h4>Ubah surat keluar</h4></div><div class="text-right col-md-6"><h4>Nomor : <b class="text-primary">'+data.nomor_surat+'</b>, Tanggal : <b>'+moment(data.tanggal_surat).format('ll')+'</b>&nbsp; &nbsp;</h4></div>');
                    $('#surat-surat-masuk-properties').show();
                    // surat_disposisi_surat_table.ajax.url( '{{ route( 'disposisi_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
                    surat_keluar_table.draw();
                    toastr.success("Penyimpanan data surat keluar berhasil disimpan.", "Data berhasil disimpan.");
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#surat-surat-keluar-save-btn').html('Simpan perubahan');
                toastr.error("Silahkan cek ulang data/koneksi jaringan Anda.", "Data gagal disimpan");
            }
        });
    });

    $('body').on('click', '.surat-surat-keluar-delete', function (){
        surat_keluar_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('surat_keluar.store') }}"+'/'+surat_keluar_id,
                success: function (data) {
                    surat_keluar_table.draw();
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

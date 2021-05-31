@extends('adminlte.layout')

@section('nav-buttons')
<span>
    Menu:
    <a href="#" data-id="99" class="surat_masuk_link_to"><span class="badge badge-pill badge-info">All</span></a>
    <a href="#" data-id="3" class="surat_masuk_link_to"><span class="badge badge-pill badge-primary">Inbox</span></a>
    <a href="#" data-id="1" class="surat_masuk_link_to"><span class="badge badge-pill badge-secondary">Draft</span></a>
    <a href="#" data-id="2" class="surat_masuk_link_to"><span class="badge badge-pill badge-success">Sent</span></a>
    <a href="#" data-id="4" class="surat_masuk_link_to"><span class="badge badge-pill badge-danger">Processed</span></a>
    <a href="#" data-id="5" class="surat_masuk_link_to"><span class="badge badge-pill badge-warning">Signed</span></a>
</span>
@endsection

@section('title')
Surat Masuk
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" id="card_title"><i class="far fa-envelope"></i> <span class="badge badge-pill badge-primary">INBOX</span> / Daftar surat masuk</div>
                        <div class="col-md-4 text-right">
                            @if ( (auth()->user()->id_unit_kerja ?? 0) == 1 )
                            <a class="btn btn-success" href="javascript:void(0)" id="surat_masuk-create-new"> Tambah surat masuk baru</a>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered data-table dt-responsive hover-pointer" id="surat_masuk-data-table">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    {{-- <th>Asal Surat</th> --}}
                                    <th>Asal surat - Perihal</th>
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
</div>

<div class="modal fade" id="surat_masuk-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12" id="surat_masuk-model-heading"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('surat.surat-masuk.form')
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="surat_masuk-save-btn" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-primary" id="surat_masuk-kirim-btn" value="sent">Kirim</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js_script')
<script type="text/javascript">
    var route_surat_surat_keluar_konsep_index = "{{ route('surat_keluar_konsep.index') }}";
    var route_surat_surat_keluar_konsep_store = "{{ route('surat_keluar_konsep.store') }}";
    var route_surat_surat_masuk_index = "{{ route('surat_masuk.index') }}";
    var route_surat_surat_masuk_store = "{{ route('surat_masuk.store') }}";
</script>
<style>
    .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
    .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
    .list-group-item.read { color: #222;background-color: #F3F3F3; }

    .list-group .checkbox { display: inline-block;margin: 0px; }
    .list-group input[type="checkbox"]{ margin-top: 2px; }
    .list-group .glyphicon { margin-right:5px; }
    .list-group .glyphicon:hover { color:#FFBC00; }
    .list-group-item > .badge {float: right;}

    .name {min-width: 150px; width: 200px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        max-width:200px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        /* display: -webkit-box; */
    }


.Xf {
    -webkit-user-select: none;
    background: transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAQAAADYv8WvAAAAEElEQVR4AWP4D4QMDGoMagAQkgJLtGgMhgAAAABJRU5ErkJggg==) repeat-x bottom;
    background-size: 1px 1px;
    font-size: 13px;
    margin-top: -1px;
    min-height: 68px;
    padding: 5px 6px 4px;
    position: relative;
}
.Xf b {
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: bold;
}
.gk {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0 34px 0 30px;
}
.qk {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 4px;
}
.Sk .yi {
    color: #15c;
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
}
.yi, .Mk .ik {
    color: #777;
}
.yi, .jk {
    font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;
}
.yi {
    float: right;
    font-size: 12px;
    margin-top: 6px;
    padding-right: 6px;
    white-space: nowrap;
}
.hk {
    font-size: 17px;
    font-weight: 300;
    height: 24px;
    line-height: 24px;
    margin-left: 23px;
    margin-top: 4px;
    font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;
    color: #060606;
}

.hf {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.Kk {
    clear: right;
    padding: 0;
    height: 17px;
}
.Gl {
    cursor: pointer;
}
.Jl, .Kl, .Ll, .Ml, .Nl, .Ol, .Pl, .Ql, .Rl, .Sl, .fj, .gj, .kj, .Tl, .Ul, .pk, .nk {
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.pk {
    float: left;
    left: -8px;
    margin: 2px -29px -20px 2px;
    padding: 20px 25px 20px 7px;
    position: relative;
    top: -23px;
}
.il {
    display: inline-block;
    vertical-align: middle;
}
.Wd {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAQAAADYBBcfAAAAVElEQVR4Ae3UsQ3FIAwG4b+BN0+YiQx3kxg2imn8ZrBSRbKu/toTFwsnEjmLIYybjhJ1JiacjpL9eESgfMQnYMGCBQu+2KMxaSnWmJgYbA6R6LAZf28ObeWnrT8xAAAAAElFTkSuQmCC);
}
.Wd, .Wd.c, .Xd {
    -webkit-background-size: 14px 14px;
    background-repeat: no-repeat;
    height: 14px;
    width: 14px;
}
.Wd {
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAmCAYAAACsyDmTAAADeUlEQVRYw82Yy27TQBSGY+fiRmzolh0g1MILgBBbxB6JF6jEM1VUqGJRVawqli2su2xRq1LahKhJmjoNcS6OG8fOxeb87oyZOE2yiOPU0q+Z2DPn/3zm+BLLruvGRK2sPF8mvSJ9IK2RPoasNRYbHstBfznGttXVFzLpNXXf12rak2Ix38tmM+VM5qxAymez5xezCDEQCzERGx7wIs83pATnkDkMNe90XX+ay2WvGo36VbfbrUhSrBaPx+uQLMuNWcTjICZiwwNeut58TN5vGYOfoZetlr6saX9VSZIwWU8kEgbTzRgZUzRxHjzgpWlVFd5g8ICI7CG1K/V6rUID9WQy2VYUxUylUha1NrVQ9w71puiuOTaLidgmvOAJbzCABRl61mw2WkTc5hA0sE/9AbUOyQ1ZDovd53DwBgNYAPTItm2DBlg4MzaBT46hH6YQE7FZ32GeFhjAAqAHruuYPCskR4RhAUJTAMrPFhjA4hU1pazPDmIQJsUonX4/bAVie2Bg4FeZSz8cKi5/mSKWC28wgAVAWCIH1CTxLOaqgI9XT2DxgIgwBrE1jlTw5P4+EKXL28EHRAmDFt5gGMpQVEs1bulGMgTadDrtRg0ET3gPZUi4R0Re1HzpIA7k8gxFnR0uIUPuSA1FWUei51AN8Ut+kRkSgQY8Q4sCEjI0GMrQIotazND9LGrspHdfKeqihmcwQ/euqEceHVHV0NRHx1137Hk/XLmGHh30d0QK3hyjFLzBMFJDi7pT8wvKByJJg8FAElOIffN6bQ3Ghvdtgm5vjJ1Ox0Ir9ft9r8UGct6GKTG26GlZFoqogx9NwzBi9H87zsmxhPQlQuJtmBJj82zB2zBusFItANVUtWy12+2kaZpyr9eT+WQMnod4fHjBE97EYNMxTT47O7XQOT/PSNVqVaGDHhRSOulMp9XJpLnY4AEveMIbDGDhXz/Ucvm6fnBwGFdVdUnTtAQGQ+POktIsT9K4eTwuPOB1ePgzAW8w+J9jiMylJl8qXVV2dr45+/v7yvHxcbpYLCq5XE4pFAqpUqmUnEWIgVj5fF45Ojpagge8Li9L1+RdYAz/v6BhBwmU2ZOT08ru7ndza2vb3dz8Im1sfJbX1z/FZxFiINb29ldnb+9HBx7wgifJGfqCJm500CZdk/6QTkm/QtZvFhsedtB/BGjR2z9wFPUOrlUu0wAAAABJRU5ErkJggg==);
}
.Gl {
    cursor: pointer;
}
.nk {
    float: right;
    padding: 7px 2px 4px;
}
.il {
    display: inline-block;
    vertical-align: middle;
}
.Rk {
    background-position: 1px -2px;
    margin-top: 3px;
}
.Ok {
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAQAAACQ9RH5AAAB2ElEQVR4Ae2SA6wcURiFZ2rbtm2bce2ottuwtu0Ym6+Ii3CjGtFuUIVVUFvPug/DP3cf7lnvnrNn5ptjGRkZGSVA9KZ3YorPcS4RtVX4wheq6C9eyAXOsVh/8UP60JtHmmszK3mkeWCZkFnMOd3DqqK+0yIWcV49d43DUq623mEph6FBClyNA1PnpGtgyvmpDLQOS3RgrOAvSQ63M/mmzjhm/rLCS/VEPrNMjNBSPjPRq7kLL9kmUruNl3T1E6jHHY6Erj3CHer5DVUgwmnqBi6tw2kiVAgStdnOf4YFqh3Kf3ZgB4c1kx/M852axw9mWeHEQN6x0VdiI+8YKLHMlsTY69m9lxgtLRlRnRucpLSrrzQnuUV1gUrlL1e4ulYohycjOhF39cTpZEmLrWxz9Wxjq3xxjM4CVMRBq7DlQfuGLQ+aMVzjGmMcyMiDxmYPb5jMZF6zB9sBtiRopvGfS9RIe1+DS/xnWh6vNGiqcJhnjFR+HckzDlNVoSMLmgX84QAV8zgqsp8/LJCCrcCjOSd4Qq8CXb14wgmaC8ImTifW8p3NlHH0lWEz31mXSUgANBeJ0taTuw1RLorAZisfWIDt2W+zgA8CsNlFI9+ZRuy0jIyMjIqdkgEqMkz5CSYK7QAAAABJRU5ErkJggg==);
    -webkit-background-size: 30px 30px;
    width: 30px;
    height: 30px;
    background-repeat: no-repeat;
}
.Sk .ik {
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
}
.ik {
    font-size: 13px;
}
.ik {
    line-height: 17px;
    padding: 0 4px;
    vertical-align: middle;
    font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;
}
.hf {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.Lk {
    min-height: 18px;
    padding-bottom: 5px;
}
.lk {
    float: right;
    line-height: 17px;
    margin-top: -3px;
}
.jk {
    font-size: 13px;
    color: #777;
}
.jk {
    line-height: 20px;
    margin-left: 23px;
    min-height: 17px;
}
.yi, .jk {
    font-family: 'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,sans-serif;
}


.text-muted {
    overflow: hidden;
    text-overflow: ellipsis;
    -o-text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%;
}


.inbox-item {
    font-size: smaller;
}

</style>
<script type="text/javascript">

    var searchParams = new URLSearchParams(window.location.search)

    if (searchParams.has('status')) {
        // var status = searchParams.get('status');
        // console.log(status);
    }

$(function () {
    $('.summernote').summernote({
        height: 400
    });

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}
    });

    @inject('SuratMasuk', 'App\Http\Controllers\Surat\SuratMasukController')

    surat_asal_ekspedisi_surat_masuks = {!! json_encode($SuratMasuk::convertToJsVar($asal_ekspedisi_surat_masuks, 'asal_ekspedisi_surat_masuk')) !!};
    surat_jenis_surat_masuks          = {!! json_encode($SuratMasuk::convertToJsVar($jenis_surat_masuks, 'jenis_surat_masuk')) !!};
    surat_sifat_keamanan_surats       = {!! json_encode($SuratMasuk::convertToJsVar($sifat_keamanan_surats, 'sifat_keamanan_surat')) !!}
    surat_sifat_penyelesaian_surats   = {!! json_encode($SuratMasuk::convertToJsVar($sifat_penyelesaian_surats, 'sifat_penyelesaian_surat')) !!}
    surat_jenis_files                 = {!! json_encode($SuratMasuk::convertToJsVar($jenis_files, 'jenis_file')) !!}
    surat_arahan_surats               = {!! json_encode($SuratMasuk::convertToJsVar($arahan_surats, 'arahan_surat')) !!}
    surat_status_disposisis           = {!! json_encode($SuratMasuk::convertToJsVar($status_disposisis, 'status_disposisi')) !!}
    surat_jenis_disposisis            = {!! json_encode($SuratMasuk::convertToJsVar($jenis_disposisis, 'jenis_disposisi')) !!}
    surat_units                       = {!! json_encode($SuratMasuk::convertToJsVar($units, 'unit')) !!}


    let arrStatusMailbox = [
        '',
        '<i class="far fa-edit"></i> <span class="badge badge-pill badge-secondary">DRAFT</span> / Daftar konsep surat',
        '<i class="far fa-share-square"></i> <span class="badge badge-pill badge-success">SENT</span> / Daftar surat terkirim',
        '<i class="far fa-envelope"></i> <span class="badge badge-pill badge-primary">INBOX</span> / Daftar surat masuk',
        '<i class="far fa-thumbs-up"></i> <span class="badge badge-pill badge-danger">PROCESSED</span> / Daftar surat selesai diproses',
        '<i class="far fa-check-circle"></i> <span class="badge badge-pill badge-warning">SIGNED</span> / Daftar surat telah ditandatangani',
    ];

    statusMailbox = 3;
    id_mailbox = 0;

    surat_masuk_table = $('#surat_masuk-data-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        order: [],
        ajax: "{{ route('surat_masuk.index') }}" + (statusMailbox != '' ? `?statusMailbox=${statusMailbox}&` : ''),
        columns: [
            // {data: 'DT_RowIndex', name: 'DT_RowIndex', width: "1%"},
            // {
            //     data: null,
            //     render: function(data, type, row, meta) {
            //         if (data.waktu_baca == null) {
            //             read = 'font-weight-bold';
            //             envelope = 'envelope text-danger';
            //         } else {
            //             read = 'font-weight-lighter'; // <i class="far fa-dot-circle"></i>
            //             envelope = 'envelope-open';
            //         }
            //         return `<div class="row"><div class="col-md-1 mr-1"><i class="far fa-${envelope}"></i></div><div class="col-md-10"><span class="${read}">${data.pejabat_pengirim_surat}<br><span class="font-weight-lighter">${data.nomor_agenda}</span></span></div></div>`;
            //     },
            //     name: 'pejabat_pengirim_surat', width: "20%",
            //     searchable: false
            // },
            {
                data: null,
                render: function(data, type, row, meta) {
                    arahan_surat = 'BELUM';
                    // if (data.current_disposisi_surat.id_arahan_surat != 0) {
                    //     arahan_surat = surat_arahan_surats[data.current_disposisi_surat.id_arahan_surat];
                    // } else {
                    //     arahan_surat = 'Pelaksana';
                    // }

                    if (data.waktu_baca == null) {
                        read = 'font-weight-bold text-dark';
                        envelope = 'envelope text-success';
                    } else {
                        read = 'font-weight-lighter text-muted'; // <i class="far fa-dot-circle"></i>
                        envelope = 'envelope-open text-muted';
                    }

                    /* return `
                        <div id="th_178ca3af50de8821" class="Xf Sk" role="listitem">
                            <div class="gk" tabindex="0" role="button" aria-labelledby="tl_ul ti_f_178ca3af50de8821 tl_as ti_s_178ca3af50de8821" aria-describedby="ti_d_178ca3af50de8821 tl_as ti_b_178ca3af50de8821"></div>
                            <div class="qk" aria-hidden="true"></div>
                            <div class="rk">
                                <div class="yi">
                                    <span id="ti_d_178ca3af50de8821" aria-hidden="true">${moment(data.waktu_terima).format('ll')}</span>
                                </div>
                                <div class="hf hk" aria-hidden="true">
                                    <span id="ti_f_178ca3af50de8821"><b>${data.pejabat_pengirim_surat}</b></span>
                                </div>
                            </div>
                            <div class="Kk">
                                <div class="Gl d pk" role="checkbox" aria-label="Select" aria-checked="false" tabindex="0" data-control-type="Ea">
                                    <div class="il d Wd ok"></div>
                                </div>
                                <div class="Gl d nk" role="checkbox" aria-label="Star" aria-checked="false" tabindex="0" data-control-type="Aa">
                                    <div class="il d Ok Rk"></div>
                                </div>
                                <div class=" hf ik" id="ti_s_178ca3af50de8821" aria-hidden="true">
                                    <span>${data.asal_surat_masuk}</span>
                                </div>
                            </div>
                            <div class="Lk" aria-hidden="true">
                                <div class="lk"></div>
                                <div class="hf jk" id="ti_b_178ca3af50de8821">${data.perihal}</div>
                            </div>
                        </div>
                    `; */

                    // return `<div class="list-group">
                    //             <span class="list-group-item">
                    //                 <div class="checkbox">
                    //                     <label>
                    //                         <input type="checkbox">
                    //                     </label>
                    //                 </div>
                    //                 <span class="glyphicon glyphicon-star-empty"></span>
                    //                 <span class="name">${data.pejabat_pengirim_surat}</span>
                    //                 <span class="">${data.asal_surat_masuk}</span>
                    //                 <span class="text-muted" style="font-size: 11px;">- ${data.perihal}</span>
                    //                 <span class="badge">12:10 AM</span>
                    //                 <span class="pull-right">
                    //                     <span class="glyphicon glyphicon-paperclip"></span>
                    //                 </span>
                    //             </span>
                    //         </div>`;

                    return `<div class="row inbox-item">
                                <div class=""><i class="far fa-${envelope}"></i></div>
                                <div class="col-md-3"><span class="${read}">${data.pejabat_pengirim_surat}<br><span class="font-weight-lighter">${data.nomor_agenda}</span></span></div>
                                <div class="col-md-8">
                                    <span class="${read}">
                                        <span class="xxfont-weight-lighter">${data.asal_surat_masuk}</span> -
                                        <span><a href="javascript:void(0)" data-id="${data.id}" class="surat_masuk-view ${read}">${data.perihal}</a></span>
                                    </span>
                                    <span class="badge badge-pill badge-secondary">${surat_jenis_surat_masuks[data.id_jenis_surat_masuk]}</span>
                                </div>
                            </div>`;
                },
                width: "%",
                searchable: false
            },
            // <div>
            //     <div class="float-right">
            //         <span class="badge badge-pill badge-secondary">${arahan_surat}</span> <span class="font-weight-lighter">${moment(data.waktu_terima).format('ll')}</span>
            //     </div>
            //     <span class="${read}"><a href="javascript:void(0)" data-id="${data.id}" class="surat_masuk-view">${data.perihal}</a></span>
            //     <span class="font-weight-lighter">
            //         <span class="badge badge-pill badge-secondary">${surat_jenis_surat_masuks[data.id_jenis_surat_masuk]}</span>
            //         / ${data.nomor_surat} - ${moment(data.tanggal_surat).format('ll')}
            //     </span>
            // </div>
            // <div class="font-weight-lighter">${data.asal_surat_masuk}</div>


            {
                data: null,
                orderable: false,
                className: "text-nowrap",
                width: "1%",
                name: 'asal_surat_masuk',
                render: function(data, type, row, meta) {
                    return data.action;
                }, searchable: false
            },

            /* For searching purpose - not visible */
            {data: 'nomor_agenda', name: 'nomor_agenda', visible: false, searchable: true},
            {data: 'tanggal_agenda', name: 'tanggal_agenda', visible: false, searchable: true},
            {data: 'pejabat_pengirim_surat', name: 'pejabat_pengirim_surat', visible: false, searchable: true},
            {data: 'perihal', name: 'perihal', visible: false, searchable: true},
            {data: 'nomor_surat', name: 'nomor_surat', visible: false, searchable: true},
            {data: 'asal_surat_masuk', name: 'asal_surat_masuk', visible: false, searchable: true},
        ]
    });

    new $.fn.dataTable.FixedHeader( surat_masuk_table );

    function load_datatable_on_surat_masuk_id(surat_masuk_id) {
        surat_diskusi_surat_table.ajax.url( '{{ route( 'diskusi_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_disposisi_surat_table.ajax.url( '{{ route( 'disposisi_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_disposisi_pimpinan_table.ajax.url( '{{ route( 'disposisi_pimpinan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_tembusan_surat_table.ajax.url( '{{ route( 'tembusan_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_dokumen_surat_table.ajax.url( '{{ route( 'dokumen_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_file_tanggapan_table.ajax.url( '{{ route( 'file_tanggapan.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
        surat_keluar_konsep_table.ajax.url( '{{ route( 'surat_keluar_konsep.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
    }

    $('#surat_masuk-ajax-modal').on('shown.bs.modal', function() {
        $('#nomor_surat').focus();
    });

    $('#surat_masuk-data-table tbody').on('click', 'tr', function () {
        var data = surat_masuk_table.row( this ).data();
        surat_masuk_id = data.id;
        id_mailbox = data.id_mailbox;
        viewSuratMasuk(data.id);
    } );

    /**
     * Buat surat masuk
     */
    $('#surat_masuk-create-new').click(function () {
        $('#surat_masuk-model-heading').html('<div class="col-md-6"><h4>Tambah surat masuk baru</h4></div><div class="text-right col-md-6"></div>');
        $('#surat_masuk-save-btn').val("create-surat_masuk");
        $('#surat_masuk-form-id', '#surat_masuk-form').val('');

        /* reset form */
        reset_form_data('#surat_masuk-form');
        $('#surat_masuk-form').trigger("reset");

        /* set default option */
        $('.surat-surat-masuk-id_arahan_surat').attr('disabled',false);
        $('#id_asal_ekspedisi_surat_masuk1').prop('checked', true);
        $('#id_jenis_surat_masuk1').prop('checked', true);
        $('#id_sifat_keamanan_surat1').prop('checked', true);
        $('#id_sifat_penyelesaian_surat1').prop('checked', true);
        $('#surat-surat-masuk-id_arahan_surat1').prop('checked', true);


        $('#surat-surat-masuk-properties').addClass('d-none');
        $('#surat-surat-masuk-box-view').hide();
        $('.box-form').show();
        $('#surat_masuk-save-btn').show();

        surat_masuk_id = 0;
        load_datatable_on_surat_masuk_id(surat_masuk_id);

        if ( $('#surat-disposisi-surat-data-block').parent().attr('id') != 'surat-disposisi-surat-data-table-pos' ) {
            var block = document.querySelector('#surat-disposisi-surat-data-block');
            var parentNode = document.querySelector('#surat-disposisi-surat-data-table-pos');
            parentNode.insertBefore(block, parentNode.firstChild);
        }

        $('#nav-home-tab1').tab('show');
        $('#surat_masuk-ajax-modal').modal('show');
    });

    /**
     * Edit surat masuk
     */
    $('body').on('click', '.surat_masuk-edit', function () {
        surat_masuk_id = $(this).data('id');
        reset_form_data('#surat_masuk-form');
        $.get("{{ route('surat_masuk.index') }}" +'/' + surat_masuk_id +'/edit', function (data) {
            $('#surat_masuk-model-heading').html('<div class="col-md-6"><h4>Ubah surat masuk</h4></div><div class="text-right col-md-6"><h4>Agenda : <b class="text-primary">'+data.nomor_agenda+'</b>, Tanggal : <b>'+moment(data.tanggal_agenda).format('ll')+'</b>&nbsp; &nbsp;</h4></div>');
            $('#surat_masuk-save-btn').val("edit-user");
            $('#surat-surat-masuk-properties').removeClass('d-none');

            $('#surat_masuk-form-id','#surat_masuk-form').val(data.id);
            $('#asal_surat_masuk', '#surat_masuk-form').val(data.asal_surat_masuk);
            $('#pejabat_pengirim_surat', '#surat_masuk-form').val(data.pejabat_pengirim_surat);
            $('#nomor_surat', '#surat_masuk-form').val(data.nomor_surat);
            $('#tanggal_surat', '#surat_masuk-form').val(data.tanggal_surat);
            $('#kepada', '#surat_masuk-form').val(data.kepada);
            $('#perihal', '#surat_masuk-form').val(data.perihal);
            $('#id_sifat_keamanan_surat'+data.id_sifat_keamanan_surat, '#surat_masuk-form').prop('checked', true);
            $('#id_sifat_penyelesaian_surat'+data.id_sifat_penyelesaian_surat, '#surat_masuk-form').prop('checked', true);
            $('#tenggat_waktu_tindak_lanjut', '#surat_masuk-form').val(data.tenggat_waktu_tindak_lanjut);
            $('#mulai_pukul', '#surat_masuk-form').val(data.mulai_pukul);
            $('#selesai_pukul', '#surat_masuk-form').val(data.selesai_pukul);
            $('.surat-surat-masuk-id_arahan_surat').attr('disabled',true);
            $('#surat-surat-masuk-id_arahan_surat'+data.id_arahan_surat, '#surat_masuk-form').attr('disabled',false).prop('checked', true);
            $('#id_asal_ekspedisi_surat_masuk'+data.id_asal_ekspedisi_surat_masuk, '#surat_masuk-form').prop('checked', true);
            $('#email_pengirim', '#surat_masuk-form').val(data.email_pengirim);
            $('#alamat_pengirim', '#surat_masuk-form').val(data.alamat_pengirim);
            $('#id_jenis_surat_masuk'+data.id_jenis_surat_masuk, '#surat_masuk-form').prop('checked', true);

            load_datatable_on_surat_masuk_id(surat_masuk_id);
            $("input[name='id_surat_masuk']").val($('#surat_masuk-form-id').val());

            if ( $('#surat-disposisi-surat-data-block').parent().attr('id') != 'surat-disposisi-surat-data-table-pos' ) {
                var block = document.querySelector('#surat-disposisi-surat-data-block');
                var parentNode = document.querySelector('#surat-disposisi-surat-data-table-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            $('#nav-home-tab1').tab('show');
            $('#surat-surat-masuk-box-view').hide();
            $('.box-form').show();
            $('#surat_masuk-save-btn').show();
            $('#surat_masuk-ajax-modal').modal('show');

        })
    });

    /**
     * Lihat surat masuk
     */
    $('body').on('click', '.surat_masuk-view', function () {
        viewSuratMasuk($(this).data('id'));
    });

    /**
     * Kirim draft surat
     */
    $('body').on('click', '#surat_masuk-kirim-btn', function () {
        surat_masuk_id = $('#surat_masuk-form-id').val();
        $.ajax({
            data: {'surat_masuk_id':surat_masuk_id, 'id_mailbox':id_mailbox},
            url: "{{ route('suratmasuk.kirimsurat') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                // console.log('success', data);
                if ( data.success ) {
                    alert('Pengiriman surat berhasil');
                    $('#surat_masuk-ajax-modal').modal('hide');
                }
            },
            error: function (data) {}
        });
    });

    viewSuratMasuk = function(surat_masuk_id) {
        $.get("{{ route('surat_masuk.index') }}" +'/' + surat_masuk_id +'/edit', function (data) {
            $('#surat_masuk-model-heading').html('<div class="col-md-6"><h4>Lihat surat masuk</h4></div><div class="text-right col-md-6"><h4>Agenda : <b class="text-primary">'+data.nomor_agenda+'</b>, Tanggal : <b>'+moment(data.tanggal_agenda).format('ll')+'</b>&nbsp; &nbsp;</h4></div>');
            $('#surat_masuk-form-id','#surat_masuk-form').val(surat_masuk_id);
            $('#view-nomor_surat', '#surat-surat-masuk-box-view').html(data.nomor_surat);
            $('#view-tanggal_surat', '#surat-surat-masuk-box-view').html(moment(data.tanggal_surat).format('ll'));
            $('#view-id_asal_ekspedisi_surat_masuk', '#surat-surat-masuk-box-view').html(surat_asal_ekspedisi_surat_masuks[data.id_asal_ekspedisi_surat_masuk]);
            $('#view-id_jenis_surat_masuk', '#surat-surat-masuk-box-view').html(surat_jenis_surat_masuks[data.id_jenis_surat_masuk]);
            $('#view-asal_surat_masuk', '#surat-surat-masuk-box-view').html(data.asal_surat_masuk);
            $('#view-perihal', '#surat-surat-masuk-box-view').html(data.perihal);
            $('#view-kepada', '#surat-surat-masuk-box-view').html(data.kepada);
            $('#view-pejabat_pengirim_surat', '#surat-surat-masuk-box-view').html(data.pejabat_pengirim_surat);
            $('#view-id_sifat_keamanan_surat', '#surat-surat-masuk-box-view').html(surat_sifat_keamanan_surats[data.id_sifat_keamanan_surat]);
            $('#view-id_sifat_penyelesaian_surat', '#surat-surat-masuk-box-view').html(surat_sifat_penyelesaian_surats[data.id_sifat_penyelesaian_surat]);
            $('#view-tenggat_waktu_tindak_lanjut', '#surat-surat-masuk-box-view').html(moment(data.tenggat_waktu_tindak_lanjut).format('ll'));
            $('#view-mulai_pukul', '#surat-surat-masuk-box-view').html(data.mulai_pukul);
            $('#view-selesai_pukul', '#surat-surat-masuk-box-view').html(data.selesai_pukul);
            $('#view-id_arahan_surat', '#surat-surat-masuk-box-view').html(surat_arahan_surats[data.id_arahan_surat]);
            $('#view-email_pengirim', '#surat-surat-masuk-box-view').html(data.email_pengirim);
            $('#view-alamat_pengirim', '#surat-surat-masuk-box-view').html(data.alamat_pengirim);

            // Set mail box read
            $.get( '{{ route( 'suratmasuk.setmailboxread' ) }}?id=' + id_mailbox , function(res) {
                surat_masuk_table.draw(false);
            });

            $.get( '{{ route( 'tembusan_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id , function(res) {
                html = '';
                if ( res.data.length > 0 ) {
                    res.data.forEach(function(element, index){
                        unit = (element.tembusan_surat != null ? element.tembusan_surat : surat_units[element.id_unit]);
                        html = html + "(" + (index + 1) + ") " + unit + "<br>";
                    });
                }
                $('#view-tembusan_surat', '#surat-surat-masuk-box-view').html(html);
            });

            $.get( '{{ route( 'dokumen_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id , function(res) {
                html = '';
                if ( res.data.length > 0 ) {
                    res.data.forEach(function(element, index){
                        if ( index == 0) {
                            var iframe = $('<iframe class="pdfobject" type="application/pdf" style="overflow: auto; width: 100%; height: 100%;">');
                            iframe.attr('src',"{{ url('/') }}/uploads/" + element.nama_file);
                            $('#surat-surat-masuk-preview-pdf').html(iframe);
                        }
                        html = html + "(" + (index + 1) + ") <a href=\"{{ url('/') }}/uploads/" + element.nama_file + "\" target=\"_blank\">" + element.dokumen_surat + "</a><br>";
                    });
                }
                $('#view-dokumen_surat', '#surat-surat-masuk-box-view').html(html);
            });

            $.get( '{{ route( 'disposisi_pimpinan.index' ) }}?id_surat_masuk=' + surat_masuk_id , function(res) {

                html = '';
                if ( res.data.length > 0 ) {
                    res.data.forEach(function(element, index){
                        html = html + "<tr><td>" + (index+1) + "</td><td>" + surat_units[element.id_unit] + "</td><td>" + element.disposisi_pimpinan + "</td></tr>";
                    });
                }
                $('#surat-disposisi-pimpinan-view-table > tbody').html(html);
            });

            // Load disposisi-surat Steps Diagram
            load_disposisi_surat_steps_diagram(data);

            // Mailbox ID
            $('#surat-disposisi-surat-id_mailbox').val(id_mailbox);
            $('#surat-surat_keluar_konsep-id_mailbox').val(id_mailbox);

            // Moving disposisi-surat DataTables
            if ( $('#surat-disposisi-surat-data-block').parent().attr('id') != 'surat-disposisi-surat-data-view-pos' ) {
                var block = document.querySelector('#surat-disposisi-surat-data-block');
                var parentNode = document.querySelector('#surat-disposisi-surat-data-view-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            // Moving diskusi-surat DataTables
            if ( $('#surat-diskusi-surat-data-block').parent().attr('id') != 'surat-diskusi-surat-data-view-pos' ) {
                var block = document.querySelector('#surat-diskusi-surat-data-block');
                var parentNode = document.querySelector('#surat-diskusi-surat-data-view-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            // Moving file-tanggapan DataTables
            if ( $('#surat-file-tanggapan-data-block').parent().attr('id') != 'surat-file-tanggapan-data-view-pos' ) {
                var block = document.querySelector('#surat-file-tanggapan-data-block');
                var parentNode = document.querySelector('#surat-file-tanggapan-data-view-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            // Moving surat-keluar-konsep DataTables
            if ( $('#surat-surat_keluar_konsep-data-block').parent().attr('id') != 'surat-surat_keluar_konsep-data-view-pos' ) {
                var block = document.querySelector('#surat-surat_keluar_konsep-data-block');
                var parentNode = document.querySelector('#surat-surat_keluar_konsep-data-view-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            // Moving file-surat-keluar DataTables
            if ( $('#surat-file-surat-keluar-data-block').parent().attr('id') != 'surat-file-surat-keluar-data-view-pos' ) {
                var block = document.querySelector('#surat-file-surat-keluar-data-block');
                var parentNode = document.querySelector('#surat-file-surat-keluar-data-view-pos');
                parentNode.insertBefore(block, parentNode.firstChild);
            }

            load_datatable_on_surat_masuk_id(surat_masuk_id);
            $("input[name='id_surat_masuk']").val($('#surat_masuk-form-id').val());
            $('#nav-home-tab').tab('show');
            $('#surat-surat-masuk-box-view').show();
            $('.surat-masuk-box-form').hide();
            $('#surat_masuk-save-btn').hide();
            $('#surat_masuk-ajax-modal').modal('show');
        })
    };

    $('#surat-surat-keluar-ajax-modal').on('hide.bs.modal', function() {
    });

    /**
     * Buat tanggapan surat masuk
     */
    $('#surat-surat-keluar-btn').click(function () {
        // $('#summernote').summernote('focus');
        // $('#summernote').summernote('insertText', 'Hello, world');
        // var HTMLstring = '<div><p>Hello, world</p><p>Summernote can insert HTML string</p></div>';
        // $('#summernote').summernote('pasteHTML', HTMLstring);

        $('#surat-surat-keluar-isi_surat').summernote('reset');
        $('#surat-surat-keluar-isi_surat').summernote('pasteHTML', '<p>Sehubungan dengan Surat ......... Nomor ......... Tanggal ......</p>'
            + '<p>Demikian kami sampaikan, atas perhatian Bapak/Ibu kami sampaikan ucapan terima kasih.</p>'
            );

        $('#surat-surat-keluar-id_sifat_keamanan_surat', '#surat-surat-keluar-form').prop('checked', true);

        $('#surat-surat-keluar-ajax-modal').modal('show');
    });

    /**
     * Cek duplikasi nomor surat masuk
     */
    $('body').on('change', '#nomor_surat', function () {
        nomor_surat = $(this).val();
        // console.log('tag', nomor_surat);
        if (nomor_surat.length > 0) {
            $.ajax({
                data: {'nomor_surat':nomor_surat},
                url: "{{ route('surat.ceknomorsurat') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    // console.log('success', data);
                    if ( !data.success ) {
                        if (confirm(`Surat nomor ${nomor_surat} sudah pernah di rekam.\n\nNomor agenda: ${data.nomor_agenda}\nTanggal agenda: ${data.tanggal_agenda}\n\nApakah Anda ingin diarahkan ke surat tersebut?`)) {
                            // TODO: buka surat tersebut nya
                        }
                    }
                },
                error: function (data) {
                }
            });
        }
    });

    /**
     * Simpan surat masuk
     */
    $('#surat_masuk-save-btn').click(function (e) {
        e.preventDefault();
        if (confirm('Apakah nomor surat yang di entri sudah sesuai dengan surat fisik?')) {
            $(this).html('Sending..');
            $.ajax({
                data: $('#surat_masuk-form').serialize(),
                url: "{{ route('surat_masuk.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (res) {
                    data = res.data;
                    surat_masuk_id = data.id;
                    $('#surat-surat-masuk-properties').removeClass('d-none');
                    $('#surat_masuk-save-btn').html('Simpan perubahan');
                    $('#surat_masuk-form-id','#surat_masuk-form').val(surat_masuk_id);
                    $("input[name='id_surat_masuk']").val(surat_masuk_id);
                    $('#surat_masuk-model-heading').html('<div class="col-md-6"><h4>Ubah surat masuk</h4></div><div class="text-right col-md-6"><h4>Agenda : <b class="text-primary">'+data.nomor_agenda+'</b>, Tanggal : <b>'+moment(data.tanggal_agenda).format('ll')+'</b>&nbsp; &nbsp;</h4></div>');
                    $('#surat-surat-masuk-properties').show();
                    surat_disposisi_surat_table.ajax.url( '{{ route( 'disposisi_surat.index' ) }}?id_surat_masuk=' + surat_masuk_id ).load();
                    surat_masuk_table.draw();
                },
                error: function (data) {
                    $('#surat_masuk-save-btn').html('Simpan perubahan');
                }
            });
        }
    });

    /**
     * Hapus surat masuk
     */
    $('body').on('click', '.surat_masuk-delete', function (){
        var surat_masuk_id = $(this).data("id");
        var result = confirm("Apakah Anda yakin akan menghapus data !");
        if(result){
            $.ajax({
                type: "DELETE",
                url: "{{ route('surat_masuk.store') }}"+'/'+surat_masuk_id,
                success: function (data) {
                    surat_masuk_table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }else{
            return false;
        }
    });

    var reloadSuratMasukTable = function(statusMailbox) {
        surat_masuk_table.ajax.url(`{{ route('surat_masuk.index') }}?statusMailbox=${statusMailbox}&`);
        surat_masuk_table.draw();
        $('#card_title').html(arrStatusMailbox[statusMailbox]);
    }

    $('body').on('click', '.surat_masuk_link_to',  function(){
        reloadSuratMasukTable($(this).attr('data-id'));
    });
});
</script>
@endpush

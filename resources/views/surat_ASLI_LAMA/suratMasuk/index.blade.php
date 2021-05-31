@extends('layouts.admin')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Surat masuk</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-outline-success" href="{{ route('suratMasuk.create') }}"><i class="fas fa-plus"></i> Tambah surat masuk</a>
            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button> --}}
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif --}}

        <table class="table table-bordered">
            <tr>
                <th width="20px" class="text-center">No</th>
                <th>Asal & Nomor Surat</th>
                <th>Perihal</th>
                {{-- <th>Status</th> --}}
                {{-- <th width="%" class="text-center">Action</th> --}}
            </tr>
            @foreach ($suratMasuks as $suratMasuk)
            <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>
                    <b>{{ $suratMasuk->asal_surat_masuk }}</b> &lt;{{ $suratMasuk->pejabat_pengirim_surat }}&gt;
                    <br><span style="font-size: 70%">{{ $suratMasuk->nomor_surat }} ({{ $suratMasuk->tanggal_surat }})</span>
                </td>
                <td><a class="" href="{{ route('suratMasuk.show',$suratMasuk->id) }}">{{ $suratMasuk->perihal }}</a></td>
                {{-- <td></td> --}}
                {{-- <td class="text-center"></td> --}}
            </tr>
            @endforeach
        </table>

    </div>
    <!-- /.card-body -->
    {{-- <div class="card-footer text-right"></div> --}}
</div>
        <div class="text-right">{!! $suratMasuks->links() !!}</div>
@endsection

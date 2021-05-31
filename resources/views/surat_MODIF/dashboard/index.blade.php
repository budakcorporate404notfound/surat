@extends('adminlte.layout')

@section('title')
Dashboard
@endsection

@section('content')
@include('surat.surat-masuk.index')
@endsection

@push('js_script')
<script type="text/javascript">
    var route_surat_surat_keluar_konsep_index = "{{ route('surat_keluar_konsep.index') }}";
    var route_surat_surat_keluar_konsep_store = "{{ route('surat_keluar_konsep.store') }}";
    var route_surat_surat_masuk_index = "{{ route('surat_masuk.index') }}";
    var route_surat_surat_masuk_store = "{{ route('surat_masuk.store') }}";
</script>
@endpush

@extends('adminlte.layout')

@section('template_title')
    Tambah Disposisi Pimpinan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Tambah Disposisi Pimpinan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('surat.disposisi_pimpinan.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.disposisi-pimpinan.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

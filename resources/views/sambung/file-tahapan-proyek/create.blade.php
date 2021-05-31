@extends('adminlte.layout')

@section('template_title')
    Tambah File Tahapan Proyek
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create File Tahapan Proyek</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('file_tahapan_proyek.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.file-tahapan-proyek.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

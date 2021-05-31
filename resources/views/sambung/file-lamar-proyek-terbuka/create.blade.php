@extends('adminlte.layout')

@section('template_title')
    Tambah File Lamar Proyek Terbuka
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create File Lamar Proyek Terbuka</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('file_lamar_proyek_terbuka.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.file-lamar-proyek-terbuka.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('adminlte.layout')

@section('template_title')
    Tambah File Kerja
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create File Kerja</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('file_kerja.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.file-kerja.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

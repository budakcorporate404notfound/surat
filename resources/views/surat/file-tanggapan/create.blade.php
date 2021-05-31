@extends('adminlte.layout')

@section('template_title')
    Tambah File Tanggapan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create File Tanggapan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('file_tanggapan.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.file-tanggapan.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

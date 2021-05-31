@extends('adminlte.layout')

@section('template_title')
    Tambah Master Kelompok File
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Master Kelompok File</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('master_kelompok_file.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.master-kelompok-file.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

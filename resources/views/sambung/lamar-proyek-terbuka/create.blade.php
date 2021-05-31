@extends('adminlte.layout')

@section('template_title')
    Tambah Lamar Proyek Terbuka
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Lamar Proyek Terbuka</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('lamar_proyek_terbuka.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.lamar-proyek-terbuka.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

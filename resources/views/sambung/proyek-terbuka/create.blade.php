@extends('adminlte.layout')

@section('template_title')
    Tambah Proyek Terbuka
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Proyek Terbuka</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proyek_terbuka.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.proyek-terbuka.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

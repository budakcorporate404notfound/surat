@extends('adminlte.layout')

@section('template_title')
    Tambah Master Model Proyek
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Master Model Proyek</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('master_model_proyek.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.master-model-proyek.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('adminlte.layout')

@section('template_title')
    Tambah Sifat Penyelesaian Surat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Sifat Penyelesaian Surat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sifat_penyelesaian_surat.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.sifat-penyelesaian-surat.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
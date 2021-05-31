@extends('adminlte.layout')

@section('template_title')
    Tambah Surat Masuk
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Surat Masuk</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('surat_masuk.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.surat-masuk.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

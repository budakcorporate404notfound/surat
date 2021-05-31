@extends('adminlte.layout')

@section('template_title')
    Tambah Disposisi Surat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Disposisi Surat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('disposisi_surat.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.disposisi-surat.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

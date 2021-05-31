@extends('adminlte.layout')

@section('template_title')
    Tambah Jenis Disposisi
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Jenis Disposisi</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('jenis_disposisi.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.jenis-disposisi.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

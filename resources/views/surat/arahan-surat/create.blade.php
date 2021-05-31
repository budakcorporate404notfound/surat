@extends('adminlte.layout')

@section('template_title')
    Tambah Arahan Surat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Arahan Surat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('arahan_surat.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('surat.arahan-surat.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

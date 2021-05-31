@extends('adminlte.layout')

@section('template_title')
    Tambah Anggota Tim
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Anggota Tim</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('anggota_tim.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('sambung.anggota-tim.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

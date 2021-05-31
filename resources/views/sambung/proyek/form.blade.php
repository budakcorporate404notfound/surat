<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('kode_proyek') }}
            {{ Form::text('kode_proyek', '', ['class' => 'form-control' . ($errors->has('kode_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Kode Proyek']) }}
            {!! $errors->first('kode_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_model_proyek') }}
            {{ Form::text('id_model_proyek', '', ['class' => 'form-control' . ($errors->has('id_model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Proyek']) }}
            {!! $errors->first('id_model_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_model_tahapan') }}
            {{ Form::text('id_model_tahapan', '', ['class' => 'form-control' . ($errors->has('id_model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Tahapan']) }}
            {!! $errors->first('id_model_tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama_proyek') }}
            {{ Form::text('nama_proyek', '', ['class' => 'form-control' . ($errors->has('nama_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Nama Proyek']) }}
            {!! $errors->first('nama_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dekripsi_proyek') }}
            {{ Form::text('dekripsi_proyek', '', ['class' => 'form-control' . ($errors->has('dekripsi_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Dekripsi Proyek']) }}
            {!! $errors->first('dekripsi_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tag_proyek') }}
            {{ Form::text('tag_proyek', '', ['class' => 'form-control' . ($errors->has('tag_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Tag Proyek']) }}
            {!! $errors->first('tag_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama_klien') }}
            {{ Form::text('nama_klien', '', ['class' => 'form-control' . ($errors->has('nama_klien') ? ' is-invalid' : ''), 'placeholder' => 'Nama Klien']) }}
            {!! $errors->first('nama_klien', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pimpinan_proyek') }}
            {{ Form::text('pimpinan_proyek', '', ['class' => 'form-control' . ($errors->has('pimpinan_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Pimpinan Proyek']) }}
            {!! $errors->first('pimpinan_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estimasi_anggaran_proyek') }}
            {{ Form::text('estimasi_anggaran_proyek', '', ['class' => 'form-control' . ($errors->has('estimasi_anggaran_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Anggaran Proyek']) }}
            {!! $errors->first('estimasi_anggaran_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estimasi_durasi_proyek') }}
            {{ Form::text('estimasi_durasi_proyek', '', ['class' => 'form-control' . ($errors->has('estimasi_durasi_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Durasi Proyek']) }}
            {!! $errors->first('estimasi_durasi_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_proyek_terbuka') }}
            {{ Form::text('is_proyek_terbuka', '', ['class' => 'form-control' . ($errors->has('is_proyek_terbuka') ? ' is-invalid' : ''), 'placeholder' => 'Is Proyek Terbuka']) }}
            {!! $errors->first('is_proyek_terbuka', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_proyek') }}
            {{ Form::text('status_proyek', '', ['class' => 'form-control' . ($errors->has('status_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Status Proyek']) }}
            {!! $errors->first('status_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

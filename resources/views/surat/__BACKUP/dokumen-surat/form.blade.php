<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_surat_masuk') }}
            {{ Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk']) }}
            {!! $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dokumen_surat') }}
            {{ Form::text('dokumen_surat', '', ['class' => 'form-control' . ($errors->has('dokumen_surat') ? ' is-invalid' : ''), 'placeholder' => 'Dokumen Surat']) }}
            {!! $errors->first('dokumen_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama_file') }}
            {{ Form::text('nama_file', '', ['class' => 'form-control' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'placeholder' => 'Nama File']) }}
            {!! $errors->first('nama_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_jenis_file') }}
            {{ Form::text('id_jenis_file', '', ['class' => 'form-control' . ($errors->has('id_jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis File']) }}
            {!! $errors->first('id_jenis_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ukuran_file') }}
            {{ Form::text('ukuran_file', '', ['class' => 'form-control' . ($errors->has('ukuran_file') ? ' is-invalid' : ''), 'placeholder' => 'Ukuran File']) }}
            {!! $errors->first('ukuran_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

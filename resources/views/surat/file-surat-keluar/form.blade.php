<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_surat_keluar') }}
            {{ Form::text('id_surat_keluar', '', ['class' => 'form-control' . ($errors->has('id_surat_keluar') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Keluar']) }}
            {!! $errors->first('id_surat_keluar', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_jenis_dokumen') }}
            {{ Form::text('id_jenis_dokumen', '', ['class' => 'form-control' . ($errors->has('id_jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Dokumen']) }}
            {!! $errors->first('id_jenis_dokumen', '<div class="invalid-feedback">:message</p>') !!}
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

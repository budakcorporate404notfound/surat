<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_disposisi_surat') }}
            {{ Form::text('id_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('id_disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Disposisi Surat']) }}
            {!! $errors->first('id_disposisi_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('perihal') }}
            {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal']) }}
            {!! $errors->first('perihal', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keterangan') }}
            {{ Form::text('keterangan', '', ['class' => 'form-control' . ($errors->has('keterangan') ? ' is-invalid' : ''), 'placeholder' => 'Keterangan']) }}
            {!! $errors->first('keterangan', '<div class="invalid-feedback">:message</p>') !!}
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

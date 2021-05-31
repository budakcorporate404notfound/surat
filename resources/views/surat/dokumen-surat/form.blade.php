<div class="box box-info padding-1">
    <div class="box-body">
        {{--  <div class="form-group">
            {{ Form::label('id_surat_masuk') }}
            {{ Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'id' => 'surat-dokumen-surat-id_surat_masuk', 'placeholder' => 'Id Surat Masuk']) }}
            {!! $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dokumen_surat') }}
            {{ Form::text('dokumen_surat', '', ['class' => 'form-control' . ($errors->has('dokumen_surat') ? ' is-invalid' : ''), 'id' => 'surat-dokumen-surat-dokumen_surat', 'placeholder' => 'Dokumen Surat']) }}
            {!! $errors->first('dokumen_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>  --}}
        <div class="form-group">
            {{ Form::label('nama_file') }}
            {{ Form::file('file', ['class' => 'form-control-file' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'id' => 'surat-dokumen-surat-nama_file', 'placeholder' => 'Nama File']) }}
            {!! $errors->first('nama_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        {{--  <div class="form-group">
            {{ Form::label('id_jenis_file') }}
            <div class="form-group">
                @foreach ($jenis_files as $jenis_file)
                <div class="form-check form-check-inline">
                    {!! Form::radio('id_jenis_file', $jenis_file->id,  null, ['id' => 'surat-dokumen-surat-id_jenis_file'.$jenis_file->id, 'class'=>'form-check-input']) !!}
                    <label class="form-check-label" for="surat-dokumen-surat-id_jenis_file{{ $jenis_file->id }}"> {{ $jenis_file->jenis_file }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('ukuran_file') }}
            {{ Form::text('ukuran_file', '', ['class' => 'form-control' . ($errors->has('ukuran_file') ? ' is-invalid' : ''), 'id' => 'surat-dokumen-surat-ukuran_file', 'placeholder' => 'Ukuran File']) }}
            {!! $errors->first('ukuran_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>  --}}

    </div>
</div>

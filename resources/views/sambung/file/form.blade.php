<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nama_file') }}
            {{ Form::text('nama_file', '', ['class' => 'form-control' . ($errors->has('nama_file') ? ' is-invalid' : ''), 'placeholder' => 'Nama File']) }}
            {!! $errors->first('nama_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ukuran_file') }}
            {{ Form::text('ukuran_file', '', ['class' => 'form-control' . ($errors->has('ukuran_file') ? ' is-invalid' : ''), 'placeholder' => 'Ukuran File']) }}
            {!! $errors->first('ukuran_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_master_jenis_file') }}
            {{ Form::text('id_master_jenis_file', '', ['class' => 'form-control' . ($errors->has('id_master_jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Master Jenis File']) }}
            {!! $errors->first('id_master_jenis_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_master_kelompok_file') }}
            {{ Form::text('id_master_kelompok_file', '', ['class' => 'form-control' . ($errors->has('id_master_kelompok_file') ? ' is-invalid' : ''), 'placeholder' => 'Id Master Kelompok File']) }}
            {!! $errors->first('id_master_kelompok_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tag_file') }}
            {{ Form::text('tag_file', '', ['class' => 'form-control' . ($errors->has('tag_file') ? ' is-invalid' : ''), 'placeholder' => 'Tag File']) }}
            {!! $errors->first('tag_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_file') }}
            {{ Form::text('status_file', '', ['class' => 'form-control' . ($errors->has('status_file') ? ' is-invalid' : ''), 'placeholder' => 'Status File']) }}
            {!! $errors->first('status_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

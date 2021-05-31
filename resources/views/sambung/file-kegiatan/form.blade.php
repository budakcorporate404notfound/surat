<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_file') }}
            {{ Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File']) }}
            {!! $errors->first('id_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_kegiatan') }}
            {{ Form::text('id_kegiatan', '', ['class' => 'form-control' . ($errors->has('id_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Id Kegiatan']) }}
            {!! $errors->first('id_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

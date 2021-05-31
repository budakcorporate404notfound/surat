<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_file') }}
            {{ Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File']) }}
            {!! $errors->first('id_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_kerja') }}
            {{ Form::text('id_kerja', '', ['class' => 'form-control' . ($errors->has('id_kerja') ? ' is-invalid' : ''), 'placeholder' => 'Id Kerja']) }}
            {!! $errors->first('id_kerja', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

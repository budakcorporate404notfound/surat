<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('kelompok_file') }}
            {{ Form::text('kelompok_file', '', ['class' => 'form-control' . ($errors->has('kelompok_file') ? ' is-invalid' : ''), 'placeholder' => 'Kelompok File']) }}
            {!! $errors->first('kelompok_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

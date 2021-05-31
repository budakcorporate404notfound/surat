<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('arahan_surat') }}
            {{ Form::text('arahan_surat', '', ['class' => 'form-control' . ($errors->has('arahan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Arahan Surat']) }}
            {!! $errors->first('arahan_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

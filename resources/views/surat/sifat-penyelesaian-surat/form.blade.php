<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sifat_penyelesaian_surat') }}
            {{ Form::text('sifat_penyelesaian_surat', '', ['class' => 'form-control' . ($errors->has('sifat_penyelesaian_surat') ? ' is-invalid' : ''), 'placeholder' => 'Sifat Penyelesaian Surat']) }}
            {!! $errors->first('sifat_penyelesaian_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

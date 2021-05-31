<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sifat_keamanan_surat') }}
            {{ Form::text('sifat_keamanan_surat', '', ['class' => 'form-control' . ($errors->has('sifat_keamanan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Sifat Keamanan Surat']) }}
            {!! $errors->first('sifat_keamanan_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

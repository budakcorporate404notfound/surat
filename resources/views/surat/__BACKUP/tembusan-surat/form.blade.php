<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_surat_masuk') }}
            {{ Form::text('id_surat_masuk', '', ['class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk']) }}
            {!! $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_unit') }}
            {{ Form::text('id_unit', '', ['class' => 'form-control' . ($errors->has('id_unit') ? ' is-invalid' : ''), 'placeholder' => 'Id Unit']) }}
            {!! $errors->first('id_unit', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tembusan_surat') }}
            {{ Form::text('tembusan_surat', '', ['class' => 'form-control' . ($errors->has('tembusan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Tembusan Surat']) }}
            {!! $errors->first('tembusan_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

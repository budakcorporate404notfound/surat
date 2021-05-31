<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('jenis_surat_masuk') }}
            {{ Form::text('jenis_surat_masuk', '', ['class' => 'form-control' . ($errors->has('jenis_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Surat Masuk']) }}
            {!! $errors->first('jenis_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

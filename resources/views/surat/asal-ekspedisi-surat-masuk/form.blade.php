<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('asal_ekspedisi_surat_masuk') }}
            {{ Form::text('asal_ekspedisi_surat_masuk', '', ['class' => 'form-control' . ($errors->has('asal_ekspedisi_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Asal Ekspedisi Surat Masuk']) }}
            {!! $errors->first('asal_ekspedisi_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

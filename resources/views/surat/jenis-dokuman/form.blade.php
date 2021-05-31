<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('jenis_dokumen') }}
            {{ Form::text('jenis_dokumen', '', ['class' => 'form-control' . ($errors->has('jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Dokumen']) }}
            {!! $errors->first('jenis_dokumen', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

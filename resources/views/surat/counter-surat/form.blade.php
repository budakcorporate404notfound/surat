<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_jenis_surat') }}
            {{ Form::text('id_jenis_surat', '', ['class' => 'form-control' . ($errors->has('id_jenis_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Surat']) }}
            {!! $errors->first('id_jenis_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('year') }}
            {{ Form::text('year', '', ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_number') }}
            {{ Form::text('last_number', '', ['class' => 'form-control' . ($errors->has('last_number') ? ' is-invalid' : ''), 'placeholder' => 'Last Number']) }}
            {!! $errors->first('last_number', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

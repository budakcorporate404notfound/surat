<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_unit') }}
            {{ Form::text('id_unit', '', ['class' => 'form-control' . ($errors->has('id_unit') ? ' is-invalid' : ''), 'placeholder' => 'Id Unit']) }}
            {!! $errors->first('id_unit', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('unit') }}
            {{ Form::text('unit', '', ['class' => 'form-control' . ($errors->has('unit') ? ' is-invalid' : ''), 'placeholder' => 'Unit']) }}
            {!! $errors->first('unit', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jabatan') }}
            {{ Form::text('jabatan', '', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'placeholder' => 'Jabatan']) }}
            {!! $errors->first('jabatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('jenis_disposisi') }}
            {{ Form::text('jenis_disposisi', '', ['class' => 'form-control' . ($errors->has('jenis_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Disposisi']) }}
            {!! $errors->first('jenis_disposisi', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

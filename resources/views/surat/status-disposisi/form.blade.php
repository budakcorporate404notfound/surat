<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('status_disposisi') }}
            {{ Form::text('status_disposisi', '', ['class' => 'form-control' . ($errors->has('status_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Status Disposisi']) }}
            {!! $errors->first('status_disposisi', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

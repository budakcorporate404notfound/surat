<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('jenis_status') }}
            {{ Form::text('jenis_status', '', ['class' => 'form-control' . ($errors->has('jenis_status') ? ' is-invalid' : ''), 'placeholder' => 'Jenis Status']) }}
            {!! $errors->first('jenis_status', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_aktif') }}
            {{ Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif']) }}
            {!! $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

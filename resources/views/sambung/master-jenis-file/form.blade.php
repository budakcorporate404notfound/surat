<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('jenis_file') }}
            {{ Form::text('jenis_file', '', ['class' => 'form-control' . ($errors->has('jenis_file') ? ' is-invalid' : ''), 'placeholder' => 'Jenis File']) }}
            {!! $errors->first('jenis_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ekstensi') }}
            {{ Form::text('ekstensi', '', ['class' => 'form-control' . ($errors->has('ekstensi') ? ' is-invalid' : ''), 'placeholder' => 'Ekstensi']) }}
            {!! $errors->first('ekstensi', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

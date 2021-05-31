<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_file') }}
            {{ Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File']) }}
            {!! $errors->first('id_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_tahapan_proyek') }}
            {{ Form::text('id_tahapan_proyek', '', ['class' => 'form-control' . ($errors->has('id_tahapan_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Tahapan Proyek']) }}
            {!! $errors->first('id_tahapan_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

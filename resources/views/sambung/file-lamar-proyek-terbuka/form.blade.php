<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_file') }}
            {{ Form::text('id_file', '', ['class' => 'form-control' . ($errors->has('id_file') ? ' is-invalid' : ''), 'placeholder' => 'Id File']) }}
            {!! $errors->first('id_file', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_lamar_proyek_terbuka') }}
            {{ Form::text('id_lamar_proyek_terbuka', '', ['class' => 'form-control' . ($errors->has('id_lamar_proyek_terbuka') ? ' is-invalid' : ''), 'placeholder' => 'Id Lamar Proyek Terbuka']) }}
            {!! $errors->first('id_lamar_proyek_terbuka', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

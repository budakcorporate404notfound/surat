<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('model_proyek') }}
            {{ Form::text('model_proyek', '', ['class' => 'form-control' . ($errors->has('model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Model Proyek']) }}
            {!! $errors->first('model_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deskripsi_model_proyek') }}
            {{ Form::text('deskripsi_model_proyek', '', ['class' => 'form-control' . ($errors->has('deskripsi_model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Deskripsi Model Proyek']) }}
            {!! $errors->first('deskripsi_model_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_aktif') }}
            {{ Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif']) }}
            {!! $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

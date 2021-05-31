<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_model_proyek') }}
            {{ Form::text('id_model_proyek', '', ['class' => 'form-control' . ($errors->has('id_model_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Model Proyek']) }}
            {!! $errors->first('id_model_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('model_tahapan') }}
            {{ Form::text('model_tahapan', '', ['class' => 'form-control' . ($errors->has('model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Model Tahapan']) }}
            {!! $errors->first('model_tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deskripsi_model_tahapan') }}
            {{ Form::text('deskripsi_model_tahapan', '', ['class' => 'form-control' . ($errors->has('deskripsi_model_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Deskripsi Model Tahapan']) }}
            {!! $errors->first('deskripsi_model_tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_aktif') }}
            {{ Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif']) }}
            {!! $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

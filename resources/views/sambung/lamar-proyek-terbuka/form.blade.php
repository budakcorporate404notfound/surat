<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_proyek') }}
            {{ Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek']) }}
            {!! $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', '', ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan') }}
            {{ Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan']) }}
            {!! $errors->first('catatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_lamar') }}
            {{ Form::text('tanggal_lamar', '', ['class' => 'form-control' . ($errors->has('tanggal_lamar') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Lamar']) }}
            {!! $errors->first('tanggal_lamar', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_lamaran') }}
            {{ Form::text('status_lamaran', '', ['class' => 'form-control' . ($errors->has('status_lamaran') ? ' is-invalid' : ''), 'placeholder' => 'Status Lamaran']) }}
            {!! $errors->first('status_lamaran', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_aktif') }}
            {{ Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif']) }}
            {!! $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

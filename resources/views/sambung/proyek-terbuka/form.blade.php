<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_proyek') }}
            {{ Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek']) }}
            {!! $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('persyaratan') }}
            {{ Form::text('persyaratan', '', ['class' => 'form-control' . ($errors->has('persyaratan') ? ' is-invalid' : ''), 'placeholder' => 'Persyaratan']) }}
            {!! $errors->first('persyaratan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('kualifikasi') }}
            {{ Form::text('kualifikasi', '', ['class' => 'form-control' . ($errors->has('kualifikasi') ? ' is-invalid' : ''), 'placeholder' => 'Kualifikasi']) }}
            {!! $errors->first('kualifikasi', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan') }}
            {{ Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan']) }}
            {!! $errors->first('catatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_mulai_penyiaran') }}
            {{ Form::text('tanggal_mulai_penyiaran', '', ['class' => 'form-control' . ($errors->has('tanggal_mulai_penyiaran') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Mulai Penyiaran']) }}
            {!! $errors->first('tanggal_mulai_penyiaran', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal_selesai_penyiaran') }}
            {{ Form::text('tanggal_selesai_penyiaran', '', ['class' => 'form-control' . ($errors->has('tanggal_selesai_penyiaran') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Selesai Penyiaran']) }}
            {!! $errors->first('tanggal_selesai_penyiaran', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_aktif') }}
            {{ Form::text('status_aktif', '', ['class' => 'form-control' . ($errors->has('status_aktif') ? ' is-invalid' : ''), 'placeholder' => 'Status Aktif']) }}
            {!! $errors->first('status_aktif', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

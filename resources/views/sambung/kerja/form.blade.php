<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_kegiatan') }}
            {{ Form::text('id_kegiatan', '', ['class' => 'form-control' . ($errors->has('id_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Id Kegiatan']) }}
            {!! $errors->first('id_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::text('id_user', '', ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'Id User']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tanggal') }}
            {{ Form::text('tanggal', '', ['class' => 'form-control' . ($errors->has('tanggal') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal']) }}
            {!! $errors->first('tanggal', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('waktu_mulai') }}
            {{ Form::text('waktu_mulai', '', ['class' => 'form-control' . ($errors->has('waktu_mulai') ? ' is-invalid' : ''), 'placeholder' => 'Waktu Mulai']) }}
            {!! $errors->first('waktu_mulai', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('waktu_selesai') }}
            {{ Form::text('waktu_selesai', '', ['class' => 'form-control' . ($errors->has('waktu_selesai') ? ' is-invalid' : ''), 'placeholder' => 'Waktu Selesai']) }}
            {!! $errors->first('waktu_selesai', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan_tugas') }}
            {{ Form::text('catatan_tugas', '', ['class' => 'form-control' . ($errors->has('catatan_tugas') ? ' is-invalid' : ''), 'placeholder' => 'Catatan Tugas']) }}
            {!! $errors->first('catatan_tugas', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_tugas') }}
            {{ Form::text('status_tugas', '', ['class' => 'form-control' . ($errors->has('status_tugas') ? ' is-invalid' : ''), 'placeholder' => 'Status Tugas']) }}
            {!! $errors->first('status_tugas', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

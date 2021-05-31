<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_tahapan') }}
            {{ Form::text('id_tahapan', '', ['class' => 'form-control' . ($errors->has('id_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Id Tahapan']) }}
            {!! $errors->first('id_tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama_kegiatan') }}
            {{ Form::text('nama_kegiatan', '', ['class' => 'form-control' . ($errors->has('nama_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Nama Kegiatan']) }}
            {!! $errors->first('nama_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deskripsi_kegiatan') }}
            {{ Form::text('deskripsi_kegiatan', '', ['class' => 'form-control' . ($errors->has('deskripsi_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Deskripsi Kegiatan']) }}
            {!! $errors->first('deskripsi_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estimasi_durasi_kegiatan') }}
            {{ Form::text('estimasi_durasi_kegiatan', '', ['class' => 'form-control' . ($errors->has('estimasi_durasi_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Estimasi Durasi Kegiatan']) }}
            {!! $errors->first('estimasi_durasi_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan_kegiatan') }}
            {{ Form::text('catatan_kegiatan', '', ['class' => 'form-control' . ($errors->has('catatan_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan Kegiatan']) }}
            {!! $errors->first('catatan_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_kegiatan') }}
            {{ Form::text('status_kegiatan', '', ['class' => 'form-control' . ($errors->has('status_kegiatan') ? ' is-invalid' : ''), 'placeholder' => 'Status Kegiatan']) }}
            {!! $errors->first('status_kegiatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

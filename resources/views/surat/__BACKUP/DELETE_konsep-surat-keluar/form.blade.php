<div class="box box-info padding-1">
    <div class="box-body">

        {{-- <div class="form-group">
            {{ Form::label('surat-surat-keluar-id_surat_masuk') }}
            {{ Form::text('id_surat_masuk', '', ['id'=> 'surat-surat-keluar-id_surat_masuk', 'class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Id Surat Masuk']) }}
            {!! $errors->first('id_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
        </div> --}}
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-id_jenis_dokumen') }}
            {{ Form::text('id_jenis_dokumen', '', ['id'=> 'surat-surat-keluar-id_jenis_dokumen', 'class' => 'form-control' . ($errors->has('id_jenis_dokumen') ? ' is-invalid' : ''), 'placeholder' => 'Id Jenis Dokumen']) }}
            {!! $errors->first('id_jenis_dokumen', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-nomor_surat') }}
            {{ Form::text('nomor_surat', '', ['id'=> 'surat-surat-keluar-nomor_surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'placeholder' => 'Nomor Surat']) }}
            {!! $errors->first('nomor_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-tanggal_surat') }}
            {{ Form::text('tanggal_surat', '', ['id'=> 'surat-surat-keluar-tanggal_surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Surat']) }}
            {!! $errors->first('tanggal_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-kepada') }}
            {{ Form::text('kepada', '', ['id'=> 'surat-surat-keluar-kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'placeholder' => 'Kepada']) }}
            {!! $errors->first('kepada', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-perihal') }}
            {{ Form::text('perihal', '', ['id'=> 'surat-surat-keluar-perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal']) }}
            {!! $errors->first('perihal', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-id_sifat_keamanan_surat') }}
            {{ Form::text('id_sifat_keamanan_surat', '', ['id'=> 'surat-surat-keluar-id_sifat_keamanan_surat', 'class' => 'form-control' . ($errors->has('id_sifat_keamanan_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Sifat Keamanan Surat']) }}
            {!! $errors->first('id_sifat_keamanan_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-id_sifat_penyelesaian_surat') }}
            {{ Form::text('id_sifat_penyelesaian_surat', '', ['id'=> 'surat-surat-keluar-id_sifat_penyelesaian_surat', 'class' => 'form-control' . ($errors->has('id_sifat_penyelesaian_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Sifat Penyelesaian Surat']) }}
            {!! $errors->first('id_sifat_penyelesaian_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-tanggal_mulai') }}
            {{ Form::text('tanggal_mulai', '', ['id'=> 'surat-surat-keluar-tanggal_mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Mulai']) }}
            {!! $errors->first('tanggal_mulai', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-tanggal_selesai') }}
            {{ Form::text('tanggal_selesai', '', ['id'=> 'surat-surat-keluar-tanggal_selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''), 'placeholder' => 'Tanggal Selesai']) }}
            {!! $errors->first('tanggal_selesai', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-mulai_pukul') }}
            {{ Form::text('mulai_pukul', '', ['id'=> 'surat-surat-keluar-mulai_pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Mulai Pukul']) }}
            {!! $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('surat-surat-keluar-selesai_pukul') }}
            {{ Form::text('selesai_pukul', '', ['id'=> 'surat-surat-keluar-selesai_pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Selesai Pukul']) }}
            {!! $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

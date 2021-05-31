<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_proyek') }}
            {{ Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek']) }}
            {!! $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tahapan') }}
            {{ Form::text('tahapan', '', ['class' => 'form-control' . ($errors->has('tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Tahapan']) }}
            {!! $errors->first('tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan') }}
            {{ Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan']) }}
            {!! $errors->first('catatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_tahapan') }}
            {{ Form::text('status_tahapan', '', ['class' => 'form-control' . ($errors->has('status_tahapan') ? ' is-invalid' : ''), 'placeholder' => 'Status Tahapan']) }}
            {!! $errors->first('status_tahapan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

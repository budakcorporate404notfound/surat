<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('username') }}
            {{ Form::text('username', '', ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username']) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nip') }}
            {{ Form::text('nip', '', ['class' => 'form-control' . ($errors->has('nip') ? ' is-invalid' : ''), 'placeholder' => 'Nip']) }}
            {!! $errors->first('nip', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nama') }}
            {{ Form::text('nama', '', ['class' => 'form-control' . ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama']) }}
            {!! $errors->first('nama', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('keahlian') }}
            {{ Form::text('keahlian', '', ['class' => 'form-control' . ($errors->has('keahlian') ? ' is-invalid' : ''), 'placeholder' => 'Keahlian']) }}
            {!! $errors->first('keahlian', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('catatan') }}
            {{ Form::text('catatan', '', ['class' => 'form-control' . ($errors->has('catatan') ? ' is-invalid' : ''), 'placeholder' => 'Catatan']) }}
            {!! $errors->first('catatan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pengalaman') }}
            {{ Form::text('pengalaman', '', ['class' => 'form-control' . ($errors->has('pengalaman') ? ' is-invalid' : ''), 'placeholder' => 'Pengalaman']) }}
            {!! $errors->first('pengalaman', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pendidikan') }}
            {{ Form::text('pendidikan', '', ['class' => 'form-control' . ($errors->has('pendidikan') ? ' is-invalid' : ''), 'placeholder' => 'Pendidikan']) }}
            {!! $errors->first('pendidikan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

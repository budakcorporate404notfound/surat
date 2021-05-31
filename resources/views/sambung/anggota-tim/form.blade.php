<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_proyek') }}
            {{ Form::text('id_proyek', '', ['class' => 'form-control' . ($errors->has('id_proyek') ? ' is-invalid' : ''), 'placeholder' => 'Id Proyek']) }}
            {!! $errors->first('id_proyek', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jabatan_dalam_tim') }}
            {{ Form::text('jabatan_dalam_tim', '', ['class' => 'form-control' . ($errors->has('jabatan_dalam_tim') ? ' is-invalid' : ''), 'placeholder' => 'Jabatan Dalam Tim']) }}
            {!! $errors->first('jabatan_dalam_tim', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

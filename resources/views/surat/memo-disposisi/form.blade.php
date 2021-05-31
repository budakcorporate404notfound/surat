<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_disposisi_surat') }}
            {{ Form::text('id_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('id_disposisi_surat') ? ' is-invalid' : ''), 'placeholder' => 'Id Disposisi Surat']) }}
            {!! $errors->first('id_disposisi_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('memo_disposisi') }}
            {{ Form::text('memo_disposisi', '', ['class' => 'form-control' . ($errors->has('memo_disposisi') ? ' is-invalid' : ''), 'placeholder' => 'Memo Disposisi']) }}
            {!! $errors->first('memo_disposisi', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

<div class="type_msg">
    <div class="input_msg_write">
        {{ Form::text('pesan', '', ['class' => 'form-control' . ($errors->has('pesan') ? ' is-invalid' : ''), 'id' => 'surat-diskusi-surat-pesan', 'placeholder' => 'Tulis pesan']) }}
        <button class="msg_send_btn" id="surat-diskusi-surat-save-btn" type="button"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
    </div>
</div>

{{-- <div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('pesan') }}
            {{ Form::text('pesan', '', ['class' => 'form-control' . ($errors->has('pesan') ? ' is-invalid' : ''), 'id' => 'surat-diskusi-surat-pesan', 'placeholder' => 'Pesan']) }}
            {!! $errors->first('pesan', '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
</div> --}}

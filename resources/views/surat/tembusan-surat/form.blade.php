<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('unit_internal') }}
            <div class="form-group">
                @foreach ($units ?? [] as $unit)
                <div class="form-check form-check">
                    {!! Form::radio('id_unit', $unit->id,  null, ['id' => 'surat-tembusan-surat-id_unit'.$unit->id, 'class'=>'form-check-input']) !!}
                    <label class="form-check-label" for="surat-tembusan-surat-id_unit{{ $unit->id }}"> {{ $unit->unit }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('unit_lainnya_/_eksternal') }}
            {{ Form::text('tembusan_surat', '', ['class' => 'form-control' . ($errors->has('tembusan_surat') ? ' is-invalid' : ''), 'id' => 'surat-tembusan-surat-tembusan_surat', 'placeholder' => 'Tembusan Surat']) }}
            {!! $errors->first('tembusan_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

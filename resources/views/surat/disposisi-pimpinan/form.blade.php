<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('jabatan_pimpinan') }}
            <div class="form-group">
                @foreach ($units ?? [] as $unit)
                <div class="form-check form-check">
                    {!! Form::radio('id_unit', $unit->id,  null, ['id' => 'surat-disposisi-pimpinan-id_unit'.$unit->id, 'class'=>'form-check-input']) !!}
                    <label class="form-check-label" for="surat-disposisi-pimpinan-id_unit{{ $unit->id }}"> {{ $unit->jabatan }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('disposisi_pimpinan') }}
            {{ Form::text('disposisi_pimpinan', '', ['class' => 'form-control' . ($errors->has('disposisi_pimpinan') ? ' is-invalid' : ''), 'id' => 'surat-disposisi-pimpinan-disposisi_pimpinan', 'placeholder' => 'Disposisi Pimpinan']) }}
            {!! $errors->first('disposisi_pimpinan', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

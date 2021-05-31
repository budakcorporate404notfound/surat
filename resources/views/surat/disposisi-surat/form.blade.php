<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('arahan_surat') }}
                <div class="form-group">
                    @if (auth()->user()->id_jabatan <= 2 || auth()->user()->id_unit_kerja == 1)
                        @foreach ($arahan_surats ?? [] as $arahan_surat)
                        {{-- Kasubag dan Kabag lainnya --}}
                        @if ($arahan_surat->id_arahan_surat_parent == auth()->user()->id_unit_kerja || ($arahan_surat->id_arahan_surat_parent == 2 && $arahan_surat->id != auth()->user()->id_unit_kerja))
                        <div class="form-check form-check">
                            {!! Form::checkbox('id_arahan_surat[]', $arahan_surat->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-disposisi-surat-id_arahan_surat']) !!}
                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat{{ $arahan_surat->id }}"> {{ $arahan_surat->arahan_surat }}</label>
                        </div>
                        @endif
                        @endforeach

                        @if (auth()->user()->id_unit_kerja == 1)
                        {{-- Staf nya --}}
                        @foreach ($bawahans ?? [] as $bawahan)
                        <div class="form-check form-check">
                            {!! Form::checkbox('id_arahan_surat_iduser[]', $bawahan->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat_iduser'.$bawahan->id, 'class'=>'form-check-input  surat-disposisi-surat-id_arahan_surat_iduser']) !!}
                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat_iduser{{ $bawahan->id }}"> {{ $bawahan->name }}</label>
                        </div>
                        @endforeach
                        @endif

                    @elseif (auth()->user()->id_jabatan == 3)

                        {{-- {{ var_dump($arahan_surat) }}<br>
                        {{ var_dump(auth()->user()) }}<br> --}}

                        {{-- Kabag nya sendiri --}}
                        @foreach ($arahan_surats ?? [] as $arahan_surat)
                        {{-- {{ $arahan_surat->id_arahan_surat_parent }} / {{ $arahan_surat->id }} / {{ auth()->user()->id_unit_kerja }} : {{ $arahan_surat->arahan_surat }}<br> --}}
                        @if ($arahan_surat->id == $id_unit_kerja_atasan)
                        <div class="form-check form-check">
                            {!! Form::checkbox('id_arahan_surat[]', $arahan_surat->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-disposisi-surat-id_arahan_surat']) !!}
                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat{{ $arahan_surat->id }}"> {{ $arahan_surat->arahan_surat }}</label>
                        </div>
                        @endif
                        @endforeach

                        {{-- Staf nya --}}
                        @foreach ($bawahans ?? [] as $bawahan)
                        <div class="form-check form-check">
                            {!! Form::checkbox('id_arahan_surat_iduser[]', $bawahan->id, null, ['id' => 'surat-disposisi-surat-id_arahan_surat_iduser'.$bawahan->id, 'class'=>'form-check-input  surat-disposisi-surat-id_arahan_surat_iduser']) !!}
                            <label class="form-check-label" for="surat-disposisi-surat-id_arahan_surat_iduser{{ $bawahan->id }}"> {{ $bawahan->name }}</label>
                        </div>
                        @endforeach

                    @endif
                </div>
            </div>
            {{--
            <div class="form-group">
                {{ Form::label('id_status_disposisi') }}
                <div class="form-group required">
                    @foreach ($status_disposisis ?? [] as $status_disposisi)
                    <div class="form-check form-check-inline">
                        {!! Form::radio('id_status_disposisi', $status_disposisi->id,  null, ['id' => 'surat-disposisi-surat-id_status_disposisi'.$status_disposisi->id, 'class'=>'form-check-input']) !!}
                        <label class="form-check-label" for="surat-disposisi-surat-id_status_disposisi{{ $status_disposisi->id }}"> {{ $status_disposisi->status_disposisi }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            --}}
            <div class="form-group col-md-6">
                {{ Form::label('ceklist_disposisi_surat') }}
                <div class="form-group">
                    @foreach ($jenis_disposisis ?? [] as $jenis_disposisi)
                    <div class="form-check form-check">
                        {!! Form::checkbox('ceklist_disposisi_surat[]', $jenis_disposisi->id,  null, ['id' => 'surat-disposisi-surat-ceklist_disposisi_surat'.$jenis_disposisi->id, 'class'=>'form-check-input']) !!}
                        <label class="form-check-label" for="surat-disposisi-surat-ceklist_disposisi_surat{{ $jenis_disposisi->id }}"> {{ $jenis_disposisi->jenis_disposisi }}</label>
                    </div>
                    @endforeach
                </div>
                {{--  {{ Form::text('ceklist_disposisi_surat', '', ['class' => 'form-control' . ($errors->has('ceklist_disposisi_surat') ? ' is-invalid' : ''), 'id' => 'surat-disposisi-surat-ceklist_disposisi_surat', 'placeholder' => 'Ceklist Disposisi Surat']) }}
                {!! $errors->first('ceklist_disposisi_surat', '<div class="invalid-feedback">:message</p>') !!}  --}}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('disposisi_surat') }}
            {{ Form::text('disposisi_surat', '', ['class' => 'form-control' . ($errors->has('disposisi_surat') ? ' is-invalid' : ''), 'id' => 'surat-disposisi-surat-disposisi_surat', 'placeholder' => 'Disposisi Surat']) }}
            {!! $errors->first('disposisi_surat', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
</div>

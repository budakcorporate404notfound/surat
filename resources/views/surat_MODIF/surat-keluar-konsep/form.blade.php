<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat-keluar-konsep-box-form">
            <form id="surat-surat-keluar-konsep-form" name="surat-surat-keluar-konsep-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-surat-keluar-konsep-id']) !!}
                
                <div class="form-group col-md-6">
                    {{ Form::label('status') }}
                    {{ Form::text('status', '', ['id' => 'surat-surat-keluar-konsep-status', 'placeholder' => 'Status', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('id_user') }}
                    {{ Form::text('id_user', '', ['id' => 'surat-surat-keluar-konsep-id_user', 'placeholder' => 'Id User', 'class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    {{ Form::label('id_arahan_surat') }}
                    <div class="form-group">
                        @foreach ($arahan_surats as $arahan_surat)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_arahan_surat{{ $arahan_surat->id }}"> {{ $arahan_surat->arahan_surat }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('id_surat_masuk') }}
                    {{ Form::text('id_surat_masuk', '', ['id' => 'surat-surat-keluar-konsep-id_surat_masuk', 'placeholder' => 'Id Surat Masuk', 'class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    {{ Form::label('id_jenis_dokumen') }}
                    <div class="form-group">
                        @foreach ($jenis_dokumens as $jenis_dokumen)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_jenis_dokumen', $jenis_dokumen->id,  null, ['id' => 'surat-surat-keluar-konsep-id_jenis_dokumen'.$jenis_dokumen->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_jenis_dokumen{{ $jenis_dokumen->id }}"> {{ $jenis_dokumen->jenis_dokumen }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('nomor_surat') }}
                    {{ Form::text('nomor_surat', '', ['id' => 'surat-surat-keluar-konsep-nomor_surat', 'placeholder' => 'Nomor Surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('tanggal_surat') }}
                    {{ Form::date('tanggal_surat', null, ['id' => 'surat-surat-keluar-konsep-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('kepada') }}
                    {{ Form::text('kepada', '', ['id' => 'surat-surat-keluar-konsep-kepada', 'placeholder' => 'Kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('perihal') }}
                    {{ Form::text('perihal', '', ['id' => 'surat-surat-keluar-konsep-perihal', 'placeholder' => 'Perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('lampiran') }}
                    {{ Form::text('lampiran', '', ['id' => 'surat-surat-keluar-konsep-lampiran', 'placeholder' => 'Lampiran', 'class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('alamat') }}
                    {{ Form::text('alamat', '', ['id' => 'surat-surat-keluar-konsep-alamat', 'placeholder' => 'Alamat', 'class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('kota_penandatangan') }}
                    {{ Form::text('kota_penandatangan', '', ['id' => 'surat-surat-keluar-konsep-kota_penandatangan', 'placeholder' => 'Kota Penandatangan', 'class' => 'form-control' . ($errors->has('kota_penandatangan') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('jabatan_penandatangan') }}
                    {{ Form::text('jabatan_penandatangan', '', ['id' => 'surat-surat-keluar-konsep-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan', 'class' => 'form-control' . ($errors->has('jabatan_penandatangan') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('isi_surat') }}
                    {{ Form::textarea('isi_surat', null, ['id' => 'surat-surat-keluar-konsep-isi_surat', 'placeholder' => 'Isi Surat', 'class' => 'form-control summernote' . ($errors->has('isi_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    {{ Form::label('id_sifat_keamanan_surat') }}
                    <div class="form-group">
                        @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_sifat_keamanan_surat{{ $sifat_keamanan_surat->id }}"> {{ $sifat_keamanan_surat->sifat_keamanan_surat }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    {{ Form::label('id_sifat_penyelesaian_surat') }}
                    <div class="form-group">
                        @foreach ($sifat_penyelesaian_surats as $sifat_penyelesaian_surat)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-keluar-konsep-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-keluar-konsep-id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('tanggal_mulai') }}
                    {{ Form::date('tanggal_mulai', null, ['id' => 'surat-surat-keluar-konsep-tanggal_mulai', 'placeholder' => 'Tanggal Mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('tanggal_selesai') }}
                    {{ Form::date('tanggal_selesai', null, ['id' => 'surat-surat-keluar-konsep-tanggal_selesai', 'placeholder' => 'Tanggal Selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('mulai_pukul') }}
                    {{ Form::time('mulai_pukul', null, ['id' => 'surat-surat-keluar-konsep-mulai_pukul', 'placeholder' => 'Mulai Pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('selesai_pukul') }}
                    {{ Form::time('selesai_pukul', null, ['id' => 'surat-surat-keluar-konsep-selesai_pukul', 'placeholder' => 'Selesai Pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>

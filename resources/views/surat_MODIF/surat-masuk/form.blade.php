<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat-masuk-box-form">
            <form id="surat-surat-masuk-form" name="surat-surat-masuk-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-surat-masuk-id']) !!}
                
                <div class="form-group col-md-6 required">
                    {{ Form::label('asal_surat_masuk') }}
                    {{ Form::text('asal_surat_masuk', '', ['id' => 'surat-surat-masuk-asal_surat_masuk', 'placeholder' => 'Asal Surat Masuk', 'class' => 'form-control' . ($errors->has('asal_surat_masuk') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('pejabat_pengirim_surat') }}
                    {{ Form::text('pejabat_pengirim_surat', '', ['id' => 'surat-surat-masuk-pejabat_pengirim_surat', 'placeholder' => 'Pejabat Pengirim Surat', 'class' => 'form-control' . ($errors->has('pejabat_pengirim_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('nomor_surat') }}
                    {{ Form::text('nomor_surat', '', ['id' => 'surat-surat-masuk-nomor_surat', 'placeholder' => 'Nomor Surat', 'class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('tanggal_surat') }}
                    {{ Form::date('tanggal_surat', null, ['id' => 'surat-surat-masuk-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('kepada') }}
                    {{ Form::text('kepada', '', ['id' => 'surat-surat-masuk-kepada', 'placeholder' => 'Kepada', 'class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('perihal') }}
                    {{ Form::text('perihal', '', ['id' => 'surat-surat-masuk-perihal', 'placeholder' => 'Perihal', 'class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    {{ Form::label('id_sifat_keamanan_surat') }}
                    <div class="form-group">
                        @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-masuk-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-masuk-id_sifat_keamanan_surat{{ $sifat_keamanan_surat->id }}"> {{ $sifat_keamanan_surat->sifat_keamanan_surat }}</label>
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
                            {!! Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-masuk-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-masuk-id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('tenggat_waktu_tindak_lanjut') }}
                    {{ Form::date('tenggat_waktu_tindak_lanjut', null, ['id' => 'surat-surat-masuk-tenggat_waktu_tindak_lanjut', 'placeholder' => 'Tenggat Waktu Tindak Lanjut', 'class' => 'form-control' . ($errors->has('tenggat_waktu_tindak_lanjut') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('mulai_pukul') }}
                    {{ Form::time('mulai_pukul', null, ['id' => 'surat-surat-masuk-mulai_pukul', 'placeholder' => 'Mulai Pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('selesai_pukul') }}
                    {{ Form::time('selesai_pukul', null, ['id' => 'surat-surat-masuk-selesai_pukul', 'placeholder' => 'Selesai Pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('nomor_agenda') }}
                    {{ Form::text('nomor_agenda', '', ['id' => 'surat-surat-masuk-nomor_agenda', 'placeholder' => 'Nomor Agenda', 'class' => 'form-control' . ($errors->has('nomor_agenda') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('tanggal_agenda') }}
                    {{ Form::date('tanggal_agenda', null, ['id' => 'surat-surat-masuk-tanggal_agenda', 'placeholder' => 'Tanggal Agenda', 'class' => 'form-control' . ($errors->has('tanggal_agenda') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6 required">
                    {{ Form::label('id_asal_ekspedisi_surat_masuk') }}
                    <div class="form-group">
                        @foreach ($asal_ekspedisi_surat_masuks as $asal_ekspedisi_surat_masuk)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_asal_ekspedisi_surat_masuk', $asal_ekspedisi_surat_masuk->id,  null, ['id' => 'surat-surat-masuk-id_asal_ekspedisi_surat_masuk'.$asal_ekspedisi_surat_masuk->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-masuk-id_asal_ekspedisi_surat_masuk{{ $asal_ekspedisi_surat_masuk->id }}"> {{ $asal_ekspedisi_surat_masuk->asal_ekspedisi_surat_masuk }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('email_pengirim') }}
                    {{ Form::text('email_pengirim', '', ['id' => 'surat-surat-masuk-email_pengirim', 'placeholder' => 'Email Pengirim', 'class' => 'form-control' . ($errors->has('email_pengirim') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('alamat_pengirim') }}
                    {{ Form::text('alamat_pengirim', '', ['id' => 'surat-surat-masuk-alamat_pengirim', 'placeholder' => 'Alamat Pengirim', 'class' => 'form-control' . ($errors->has('alamat_pengirim') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    {{ Form::label('id_arahan_surat') }}
                    <div class="form-group">
                        @foreach ($arahan_surats as $arahan_surat)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-masuk-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-masuk-id_arahan_surat{{ $arahan_surat->id }}"> {{ $arahan_surat->arahan_surat }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    {{ Form::label('id_jenis_surat_masuk') }}
                    <div class="form-group">
                        @foreach ($jenis_surat_masuks as $jenis_surat_masuk)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_jenis_surat_masuk', $jenis_surat_masuk->id,  null, ['id' => 'surat-surat-masuk-id_jenis_surat_masuk'.$jenis_surat_masuk->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-surat-masuk-id_jenis_surat_masuk{{ $jenis_surat_masuk->id }}"> {{ $jenis_surat_masuk->jenis_surat_masuk }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('meta') }}
                    {{ Form::text('meta', '', ['id' => 'surat-surat-masuk-meta', 'placeholder' => 'Meta', 'class' => 'form-control' . ($errors->has('meta') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="box box-info padding-1">
    <div class="box-body">
        <form id="surat-surat-keluar-form" name="surat-surat-keluar-form" method="POST" role="form" enctype="multipart/form-data">
            <div class="row box-form surat-surat-keluar-box-form">
                @csrf
                {!! Form::hidden('id', '', ['id'=>'id']) !!}

                {{--  Left  --}}
                <div class="row col-md-5">
                    <div class="col-md-12">
                        <label for="surat-surat-keluar-id_jenis_dokumen">Jenis Surat Keluar</label>
                        <div class="form-group">
                            @foreach ($jenis_dokumens as $jenis_dokumen)
                            <div class="form-check form-check-inline">
                                {!! Form::radio('id_jenis_dokumen', $jenis_dokumen->id,  null, ['id' => 'surat-surat-keluar-id_jenis_dokumen'.$jenis_dokumen->id, 'class'=>'form-check-input']) !!}
                                <label class="form-check-label" for="surat-surat-keluar-id_jenis_dokumen{{ $jenis_dokumen->id }}"> {{ $jenis_dokumen->jenis_dokumen }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="surat-surat-keluar-id_sifat_keamanan_surat">Sifat Keamanan Surat</label>
                        <div class="form-group">
                            @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat)
                            <div class="form-check form-check-inline">
                                {!! Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat-keluar-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']) !!}
                                <label class="form-check-label" for="surat-surat-keluar-id_sifat_keamanan_surat{{ $sifat_keamanan_surat->id }}"> {{ $sifat_keamanan_surat->sifat_keamanan_surat }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="surat-surat-keluar-id_sifat_penyelesaian_surat">Sifat Penyelesaian Surat</label>
                        <div class="form-group">
                            @foreach ($sifat_penyelesaian_surats as $sifat_penyelesaian_surat)
                            <div class="form-check form-check-inline">
                                {!! Form::radio('surat-surat-keluar-id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-keluar-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                                <label class="form-check-label" for="surat-surat-keluar-id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        {{ Form::label('Kepada') }}
                        {{ Form::text('nomor_surat', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-nomor_surat', 'placeholder' => 'Nomor surat']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('Tanggal Surat') }}
                        {{ Form::date('tanggal_surat', '', ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-tanggal_surat', 'placeholder' => 'Tanggal surat']) }}
                    </div>

                    <div class="form-group col-md-6">
                        {{ Form::label('Kepada') }}
                        {{ Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kepada', 'placeholder' => 'Surat dikirim kepada']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('Hal') }}
                        {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-hal', 'placeholder' => 'Hal surat']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('lampiran') }}
                        {{ Form::text('lampiran', '', ['class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-lampiran', 'placeholder' => 'Lampiran surat']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('Alamat') }}
                        {{ Form::text('alamat', '', ['class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-alamat', 'placeholder' => 'Alamat pengiriman surat']) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('Kota Penandatangan') }}
                        {{ Form::text('kota_penandatangan', 'Jakarta', ['class' => 'form-control' . ($errors->has('kota') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kota_penandatangan', 'placeholder' => 'Kota Penandatangan']) }}
                    </div>
                    <div class="form-group col-md-8">
                        {{ Form::label('Jabatan Penandatangan') }}
                        {{ Form::text('jabatan_penandatangan', 'Kepala Biro Perencanaan dan Organisasi', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan']) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('tanggal_mulai') }}
                        {{ Form::date('tanggal_mulai', '', ['id'=> 'surat-surat-keluar-tanggal_mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-tanggal_mulai', 'placeholder' => 'Tanggal Mulai']) }}
                        {!! $errors->first('tanggal_mulai', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('tanggal_selesai') }}
                        {{ Form::date('tanggal_selesai', '', ['id'=> 'surat-surat-keluar-tanggal_selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-tanggal_selesai', 'placeholder' => 'Tanggal Selesai']) }}
                        {!! $errors->first('tanggal_selesai', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('mulai_pukul') }}
                        {{ Form::time('mulai_pukul', '', ['id'=> 'surat-surat-keluar-mulai_pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-mulai_pukul', 'placeholder' => 'Mulai Pukul']) }}
                        {!! $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('selesai_pukul') }}
                        {{ Form::time('selesai_pukul', '', ['id'=> 'surat-surat-keluar-selesai_pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat-keluar-selesai_pukul', 'placeholder' => 'Selesai Pukul']) }}
                        {!! $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                    </div>
                </div>
                {{--  /Left  --}}

                {{--  Right  --}}
                <div class="row col-md-7">
                    <div class="form-group col-md-12">
                        {{ Form::label('Isi surat') }}
                        <div class="form-group">
                            <textarea class="form-control summernote" name="isi_surat" id="surat-surat-keluar-isi_surat"></textarea>
                        </div>
                    </div>
                </div>
                {{--  /Right  --}}
            </div>
        </form>
    </div>
</div>

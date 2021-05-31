<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat-keluar-box-form">
            <form class="row col-md-12 needs-validation" novalidate id="surat-surat-keluar-form" name="surat-surat-keluar-form" method="POST" role="form" enctype="multipart/form-data">

                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-surat-keluar-id']) !!}

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
                                {!! Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat-keluar-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                                <label class="form-check-label" for="surat-surat-keluar-id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group required col-md-6">
                        {{ Form::label('tanggal_surat') }}
                        {{ Form::date('tanggal_surat', '', ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'required' => 'required']) }}
                        <div class="invalid-feedback">asdasd</div>
                    </div>
                    <div class="form-group required col-md-6">
                        {{ Form::label('Kepada') }}
                        {{ Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kepada', 'placeholder' => 'Surat dikirim kepada', 'required' => 'required']) }}
                        <div class="invalid-feedback">asdad</div>
                    </div>
                    <div class="form-group required col-md-6">
                        {{ Form::label('Hal') }}
                        {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-perihal', 'placeholder' => 'Hal surat', 'required' => 'required']) }}
                        <div class="invalid-feedback">asdad</div>
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('lampiran') }}
                        {{ Form::text('lampiran', '', ['class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-lampiran', 'placeholder' => 'Lampiran surat']) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('Alamat') }}
                        {{ Form::text('alamat', '', ['class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-alamat', 'placeholder' => 'Alamat pengiriman surat']) }}
                    </div>
                    <div class="form-group required col-md-4">
                        {{ Form::label('Kota Penandatangan') }}
                        {{ Form::text('kota_penandatangan', 'Jakarta', ['class' => 'form-control' . ($errors->has('kota') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kota_penandatangan', 'placeholder' => 'Kota Penandatangan', 'required' => 'required']) }}
                    </div>
                    <div class="form-group required col-md-8">
                        {{ Form::label('Jabatan Penandatangan') }}
                        {{ Form::text('jabatan_penandatangan', 'Kepala Biro Perencanaan dan Organisasi', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan', 'required' => 'required']) }}
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
                <div class="col-md-7 d-none pl-3" id="surat-surat-keluar-box-form-properties">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab-surat-surat-keluar" role="tablist">
                            <a class="nav-item nav-link active" id="nav-tab-surat-surat-keluar-isi-surat" data-toggle="tab" href="#nav-surat-surat-keluar-isi-surat" role="tab" aria-controls="nav-surat-surat-keluar-isi-surat" aria-selected="true">Isi surat</a>
                            <a class="nav-item nav-link" id="nav-tab-surat-surat-keluar-file-surat-keluar" data-toggle="tab" href="#nav-surat-surat-keluar-file-surat-keluar" role="tab" aria-controls="nav-profile" aria-selected="false">File lampiran</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-surat-surat-keluar-isi-surat" role="tabpanel" aria-labelledby="nav-surat-surat-keluar-isi-surat-tab">
                            <p>
                                {{ Form::label('Isi surat') }}
                                <div class="form-group">
                                    <textarea class="form-control summernote" name="isi_surat" id="surat-surat-keluar-isi_surat"></textarea>
                                </div>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="nav-surat-surat-keluar-file-surat-keluar" role="tabpanel" aria-labelledby="nav-surat-surat-keluar-file-surat-keluar-tab">
                            <p>
                                @include('surat.file-surat-keluar.index')
                            </p>
                        </div>
                    </div>
                </div>
                {{--  /Right  --}}

            </form>
        </div>
    </div>
</div>

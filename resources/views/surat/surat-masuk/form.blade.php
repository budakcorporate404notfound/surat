<div class="box box-info padding-1">
    <div class="box-body">
        {{-- VIEW --}}
        @include('surat.surat-masuk.form-view')

        {{-- FORM --}}
        <div class="row box-form surat-masuk-box-form">

            {{--  Left  --}}
            <div class="col-md-5">
                <form id="surat_masuk-form" name="surat_masuk-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    {!! Form::hidden('id', '', ['id'=>'surat_masuk-form-id']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('nomor_surat') }}
                            {{ Form::text('nomor_surat', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'placeholder' => 'Nomor Surat']) }}
                            {!! $errors->first('nomor_surat', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('tanggal_surat') }}
                            {!! Form::date('tanggal_surat', null, ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'required' => 'required']) !!}
                            {!! $errors->first('tanggal_surat', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="id_asal_ekspedisi_surat_masuk">Asal ekspedisi surat masuk</label>
                                    <div class="form-group">
                                        @foreach ($asal_ekspedisi_surat_masuks as $asal_ekspedisi_surat_masuk)
                                        <div class="form-check form-check-inline">
                                            {!! Form::radio('id_asal_ekspedisi_surat_masuk', $asal_ekspedisi_surat_masuk->id,  null, ['id' => 'id_asal_ekspedisi_surat_masuk'.$asal_ekspedisi_surat_masuk->id, 'class'=>'form-check-input']) !!}
                                            <label class="form-check-label" for="id_asal_ekspedisi_surat_masuk{{ $asal_ekspedisi_surat_masuk->id }}"> {{ $asal_ekspedisi_surat_masuk->asal_ekspedisi_surat_masuk }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_jenis_surat_masuk">Jenis Surat Masuk</label>
                                    <div class="form-group">
                                        @foreach ($jenis_surat_masuks as $jenis_surat_masuk)
                                        <div class="form-check form-check-inline">
                                            {!! Form::radio('id_jenis_surat_masuk', $jenis_surat_masuk->id,  null, ['id' => 'id_jenis_surat_masuk'.$jenis_surat_masuk->id, 'class'=>'form-check-input']) !!}
                                            <label class="form-check-label" for="id_jenis_surat_masuk{{ $jenis_surat_masuk->id }}"> {{ $jenis_surat_masuk->jenis_surat_masuk }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('asal_surat_masuk') }}
                            {{ Form::text('asal_surat_masuk', '', ['class' => 'form-control' . ($errors->has('asal_surat_masuk') ? ' is-invalid' : ''), 'placeholder' => 'Asal Surat Masuk']) }}
                            {!! $errors->first('asal_surat_masuk', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('perihal') }}
                            {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'placeholder' => 'Perihal']) }}
                            {!! $errors->first('perihal', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{ Form::label('kepada') }}
                            {{ Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'placeholder' => 'Kepada']) }}
                            {!! $errors->first('kepada', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('pejabat_pengirim_surat') }}
                            {{ Form::text('pejabat_pengirim_surat', '', ['class' => 'form-control' . ($errors->has('pejabat_pengirim_surat') ? ' is-invalid' : ''), 'placeholder' => 'Pejabat Pengirim Surat']) }}
                            {!! $errors->first('pejabat_pengirim_surat', '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('arahan_surat') }}
                                <div class="form-group">
                                    @foreach ($arahan_surats ?? [] as $arahan_surat)
                                        @if ($arahan_surat->id_arahan_surat_parent == 2)
                                    <div class="form-check form-check">
                                        {!! Form::radio('id_arahan_surat', $arahan_surat->id,  null, ['id' => 'surat-surat-masuk-id_arahan_surat'.$arahan_surat->id, 'class'=>'form-check-input surat-surat-masuk-id_arahan_surat']) !!}
                                        <label class="form-check-label" for="surat-surat-masuk-id_arahan_surat{{ $arahan_surat->id }}"> {{ $arahan_surat->arahan_surat }}</label>
                                    </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id_sifat_keamanan_surat">Sifat Keamanan Surat</label>
                                    <div class="form-group">
                                        @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat)
                                        <div class="form-check form-check-inline">
                                            {!! Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']) !!}
                                            <label class="form-check-label" for="id_sifat_keamanan_surat{{ $sifat_keamanan_surat->id }}"> {{ $sifat_keamanan_surat->sifat_keamanan_surat }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="id_sifat_penyelesaian_surat">Sifat Penyelesaian Surat</label>
                                    <div class="form-group">
                                        @foreach ($sifat_penyelesaian_surats as $sifat_penyelesaian_surat)
                                        <div class="form-check form-check-inline">
                                            {!! Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                                            <label class="form-check-label" for="id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{--  /Left  --}}

            {{--  Right  --}}
            <div class="col-md-7 d-none pl-3" id="surat-surat-masuk-properties">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-detil-tab" data-toggle="tab" href="#nav-detil" role="tab" aria-controls="nav-detil" aria-selected="true">Detil</a>
                        <a class="nav-item nav-link" id="nav-disposisi-tab" data-toggle="tab" href="#nav-disposisi" role="tab" aria-controls="nav-disposisi" aria-selected="false">Disposisi</a>
                        <!-- <a class="nav-item nav-link" id="nav-diskusi-tab" data-toggle="tab" href="#nav-diskusi" role="tab" aria-controls="nav-diskusi" aria-selected="false">Diskusi</a>
                        <a class="nav-item nav-link" id="nav-bahan-kerja-tab" data-toggle="tab" href="#nav-bahan-kerja" role="tab" aria-controls="nav-bahan-kerja" aria-selected="false">Bahan kerja</a>
                        <a class="nav-item nav-link" id="nav-tanggapan-tab" data-toggle="tab" href="#nav-tanggapan" role="tab" aria-controls="nav-tanggapan" aria-selected="false">Tanggapan</a> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-detil" role="tabpanel" aria-labelledby="nav-detil-tab">
                        <p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('tenggat_waktu_tindak_lanjut') }}
                                    {!! Form::date('tenggat_waktu_tindak_lanjut', null, ['class' => 'form-control' . ($errors->has('tenggat_waktu_tindak_lanjut') ? ' is-invalid' : '')]) !!}
                                    {!! $errors->first('tenggat_waktu_tindak_lanjut', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {{ Form::label('mulai_pukul') }}
                                    {{ Form::time('mulai_pukul', '', ['class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Mulai Pukul']) }}
                                    {!! $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {{ Form::label('selesai_pukul') }}
                                    {{ Form::time('selesai_pukul', '', ['class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'placeholder' => 'Selesai Pukul']) }}
                                    {!! $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('email_pengirim') }}
                                    {{ Form::text('email_pengirim', '', ['class' => 'form-control' . ($errors->has('email_pengirim') ? ' is-invalid' : ''), 'placeholder' => 'Email Pengirim']) }}
                                    {!! $errors->first('email_pengirim', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('alamat_pengirim') }}
                                    {{ Form::text('alamat_pengirim', '', ['class' => 'form-control' . ($errors->has('alamat_pengirim') ? ' is-invalid' : ''), 'placeholder' => 'Alamat Pengirim']) }}
                                    {!! $errors->first('alamat_pengirim', '<div class="invalid-feedback">:message</p>') !!}
                                </div>
                            </div>
                            @include('surat.tembusan-surat.index')
                            @include('surat.dokumen-surat.index')
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-disposisi" role="tabpanel" aria-labelledby="nav-disposisi-tab">
                        <p>
                            @include('surat.disposisi-pimpinan.index')
                            @include('surat.disposisi-surat.index')
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-diskusi" role="tabpanel" aria-labelledby="nav-diskusi-tab">
                        <p>
                            @include('surat.diskusi-surat.index')
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-bahan-kerja" role="tabpanel" aria-labelledby="nav-bahan-kerja-tab">
                        <p>
                            @include('surat.file-tanggapan.index')
                        </p>
                    </div>
                    <div class="tab-pane fade" id="nav-tanggapan" role="tabpanel" aria-labelledby="nav-tanggapan-tab">
                        <p>
                            @include('surat.surat-keluar-konsep.index-in-surat-masuk')
                            @include('surat.file-surat-keluar.index')
                        </p>
                    </div>
                </div>
            </div>
            {{--  /Right  --}}
        </div>
    </div>
</div>

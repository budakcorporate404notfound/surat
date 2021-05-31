<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-surat_keluar_konsep-box-form">
            <form class="row col-md-12 needs-validation" novalidate id="surat-surat_keluar_konsep-form" name="surat-surat_keluar_konsep-form" method="POST" role="form" enctype="multipart/form-data">

                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-surat_keluar_konsep-id']) !!}
                {!! Form::hidden('id_mailbox', '', ['id'=>'surat-surat_keluar_konsep-id_mailbox']) !!}
                {!! Form::hidden('id_surat_masuk', '', ['id'=>'surat-surat_keluar_konsep-id_surat_masuk']) !!}

                {{--  Left  --}}
                <div class="col-md-5">
                    <div class="row col-md-12">
                        <div class="col-md-12">
                            <label for="surat-surat_keluar_konsep-id_jenis_dokumen">Jenis Surat Keluar</label>
                            <div class="form-group">
                                @foreach ($jenis_dokumens as $jenis_dokumen)
                                <div class="form-check form-check-inline">
                                    {!! Form::radio('id_jenis_dokumen', $jenis_dokumen->id,  null, ['id' => 'surat-surat_keluar_konsep-id_jenis_dokumen'.$jenis_dokumen->id, 'class'=>'form-check-input surat-surat_keluar_konsep-id_jenis_dokumen']) !!}
                                    <label class="form-check-label" for="surat-surat_keluar_konsep-id_jenis_dokumen{{ $jenis_dokumen->id }}"> {{ $jenis_dokumen->jenis_dokumen }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="surat-surat_keluar_konsep-id_sifat_keamanan_surat">Sifat Keamanan Surat</label>
                            <div class="form-group">
                                @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat)
                                <div class="form-check form-check-inline">
                                    {!! Form::radio('id_sifat_keamanan_surat', $sifat_keamanan_surat->id,  null, ['id' => 'surat-surat_keluar_konsep-id_sifat_keamanan_surat'.$sifat_keamanan_surat->id, 'class'=>'form-check-input']) !!}
                                    <label class="form-check-label" for="surat-surat_keluar_konsep-id_sifat_keamanan_surat{{ $sifat_keamanan_surat->id }}"> {{ $sifat_keamanan_surat->sifat_keamanan_surat }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="surat-surat_keluar_konsep-id_sifat_penyelesaian_surat">Sifat Penyelesaian Surat</label>
                            <div class="form-group">
                                @foreach ($sifat_penyelesaian_surats as $sifat_penyelesaian_surat)
                                <div class="form-check form-check-inline">
                                    {!! Form::radio('id_sifat_penyelesaian_surat', $sifat_penyelesaian_surat->id,  null, ['id' => 'surat-surat_keluar_konsep-id_sifat_penyelesaian_surat'.$sifat_penyelesaian_surat->id, 'class'=>'form-check-input']) !!}
                                    <label class="form-check-label" for="surat-surat_keluar_konsep-id_sifat_penyelesaian_surat{{ $sifat_penyelesaian_surat->id }}"> {{ $sifat_penyelesaian_surat->sifat_penyelesaian_surat }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('tanggal_surat') }}
                            {{ Form::date('tanggal_surat', '', ['class' => 'form-control' . ($errors->has('tanggal_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-tanggal_surat', 'placeholder' => 'Tanggal Surat', 'required' => 'required']) }}
                            <div class="invalid-feedback">asdasd</div>
                        </div>

                        <div class="form-group required col-md-12">
                            {{ Form::label('Kota Penandatangan') }}
                            {{ Form::text('kota_penandatangan', 'Jakarta', ['class' => 'form-control' . ($errors->has('kota') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-kota_penandatangan', 'placeholder' => 'Kota Penandatangan', 'required' => 'required']) }}
                        </div>
                        <div class="form-group required col-md-12">
                            {{ Form::label('Jabatan Penandatangan') }}
                            {{ Form::text('jabatan_penandatangan', 'Kepala Biro Perencanaan dan Organisasi', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-jabatan_penandatangan', 'placeholder' => 'Jabatan Penandatangan', 'required' => 'required']) }}
                        </div>
                        <div class="form-group required col-md-12">
                            {{ Form::label('Nama Pejabat Penandatangan') }}
                            {{ Form::text('nama_pejabat_penandatangan', 'Joko Upoyo', ['class' => 'form-control' . ($errors->has('jabatan') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-nama_pejabat_penandatangan', 'placeholder' => 'Nama Pejabat Penandatangan', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                {{--  /Left  --}}

                {{--  Right  --}}
                <div class="col-md-7 pl-3" id="surat-surat_keluar_konsep-box-form-properties">
                    <div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab-surat-surat_keluar_konsep" role="tablist">
                                <a class="nav-item nav-link active" id="nav-tab-surat-surat_keluar_konsep-isi-surat" data-toggle="tab" href="#nav-surat-surat_keluar_konsep-isi-surat" role="tab" aria-controls="nav-surat-surat_keluar_konsep-isi-surat" aria-selected="true">Isi surat</a>
                                <a class="nav-item nav-link" id="nav-tab-surat-surat_keluar_konsep-pengingat" data-toggle="tab" href="#nav-surat-surat_keluar_konsep-pengingat" role="tab" aria-controls="nav-surat-surat_keluar_konsep-pengingat" aria-selected="true">Pengingat (<i>remainder</i>)</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-surat-surat_keluar_konsep-isi-surat" role="tabpanel" aria-labelledby="nav-surat-surat_keluar_konsep-isi-surat-tab">
                                <div class="text-right pt-3 pb-3">
                                    <button type="submit" class="btn btn-default" id="surat-surat_keluar_konsep-unduh-btn" value="create"><span class="fa fa-print" aria-hidden="true"></span> Unduh konsep surat</button>
                                </div>
                                <div class="row">
                                    <div class="form-group required col-md-12 row">
                                        {{ Form::label('Kepada', 'Kepada Yth.', array('class' => 'col-md-2')) }}
                                        <div class="col-md-10">
                                            {{ Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('kepada') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-kepada', 'placeholder' => 'Surat dikirim kepada', 'required' => 'required']) }}
                                            <div class="invalid-feedback">asdad</div>
                                        </div>
                                    </div>
                                    <div class="form-group required col-md-12 row">
                                        {{ Form::label('Hal', 'Hal', array('class' => 'col-md-2')) }}
                                        <div class="col-md-10">
                                            {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('perihal') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-perihal', 'placeholder' => 'Hal surat', 'required' => 'required']) }}
                                            <div class="invalid-feedback">asdad</div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 row">
                                        {{ Form::label('lampiran', 'Lampiran', array('class' => 'col-md-2')) }}
                                        <div class="col-md-10">
                                            {{ Form::text('lampiran', '', ['class' => 'form-control' . ($errors->has('lampiran') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-lampiran', 'placeholder' => 'Lampiran surat']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 row">
                                        {{ Form::label('Alamat', 'Alamat tujuan', array('class' => 'col-md-2')) }}
                                        <div class="col-md-10">
                                            {{ Form::text('alamat', '', ['class' => 'form-control' . ($errors->has('alamat') ? ' is-invalid' : ''), 'id' => 'surat-surat_keluar_konsep-alamat', 'placeholder' => 'Alamat pengiriman surat']) }}
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    {{ Form::label('Isi surat') }}
                                    <div class="form-group">
                                        <textarea class="form-control summernote" name="isi_surat" id="surat-surat_keluar_konsep-isi_surat"></textarea>
                                    </div>
                                </p>
                                <p>
                                    {{ Form::label('Tembusan surat') }}
                                    <div class="form-group">
                                        <textarea class="form-control summernote" name="tembusan" id="surat-surat_keluar_konsep-tembusan"></textarea>
                                    </div>
                                </p>
                            </div>
                            <div class="tab-pane fade show" id="nav-surat-surat_keluar_konsep-pengingat" role="tabpanel" aria-labelledby="nav-surat-surat_keluar_konsep-pengingat-tab">
                                <div class="row pt-3">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('tanggal_mulai') }}
                                        {{ Form::date('tanggal_mulai', '', ['id'=> 'surat-surat_keluar_konsep-tanggal_mulai', 'class' => 'form-control' . ($errors->has('tanggal_mulai') ? ' is-invalid' : ''), 'íd' => 'surat-surat_keluar_konsep-tanggal_mulai', 'placeholder' => 'Tanggal Mulai']) }}
                                        {!! $errors->first('tanggal_mulai', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('tanggal_selesai') }}
                                        {{ Form::date('tanggal_selesai', '', ['id'=> 'surat-surat_keluar_konsep-tanggal_selesai', 'class' => 'form-control' . ($errors->has('tanggal_selesai') ? ' is-invalid' : ''), 'íd' => 'surat-surat_keluar_konsep-tanggal_selesai', 'placeholder' => 'Tanggal Selesai']) }}
                                        {!! $errors->first('tanggal_selesai', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('mulai_pukul') }}
                                        {{ Form::time('mulai_pukul', '', ['id'=> 'surat-surat_keluar_konsep-mulai_pukul', 'class' => 'form-control' . ($errors->has('mulai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat_keluar_konsep-mulai_pukul', 'placeholder' => 'Mulai Pukul']) }}
                                        {!! $errors->first('mulai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('selesai_pukul') }}
                                        {{ Form::time('selesai_pukul', '', ['id'=> 'surat-surat_keluar_konsep-selesai_pukul', 'class' => 'form-control' . ($errors->has('selesai_pukul') ? ' is-invalid' : ''), 'íd' => 'surat-surat_keluar_konsep-selesai_pukul', 'placeholder' => 'Selesai Pukul']) }}
                                        {!! $errors->first('selesai_pukul', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  /Right  --}}

            </form>
        </div>
    </div>
</div>

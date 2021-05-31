<div class="modal fade" id="surat-surat-keluar-ajax-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document" style="min-width:75%; max-width:95%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-md-12" id="surat-surat-keluar-model-heading">
                    <h4 class="modal-title">Konsep surat tanggapan</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-10px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="surat-surat-keluar-form" name="surat-surat-keluar-form"  method="POST"  role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row box-form">
                        {{--  Left  --}}
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="surat-surat-keluar-id_jenis_surat_masuk">Jenis Surat Keluar</label>
                                    <div class="form-group">
                                        @foreach ($jenis_surat_masuks as $jenis_surat_masuk)
                                        <div class="form-check form-check-inline">
                                            {!! Form::radio('id_jenis_surat_masuk', $jenis_surat_masuk->id,  null, ['id' => 'surat-surat-keluar-id_jenis_surat_masuk'.$jenis_surat_masuk->id, 'class'=>'form-check-input']) !!}
                                            <label class="form-check-label" for="surat-surat-keluar-id_jenis_surat_masuk{{ $jenis_surat_masuk->id }}"> {{ $jenis_surat_masuk->jenis_surat_masuk }}</label>
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
                                <div class="form-group col-md-6">
                                    {{ Form::label('Hal') }}
                                    {{ Form::text('perihal', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-hal', 'placeholder' => 'Hal surat']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('lampiran') }}
                                    {{ Form::text('lampiran', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-lampiran', 'placeholder' => 'Lampiran surat']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('Kepada') }}
                                    {{ Form::text('kepada', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kepada', 'placeholder' => 'Surat dikirim kepada']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('Alamat') }}
                                    {{ Form::text('alamat', 'Di Tempat', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-alamat', 'placeholder' => 'Alamat pengiriman surat']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('Kota Penandatangan') }}
                                    {{ Form::text('kota', 'Jakarta', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-kota', 'placeholder' => 'Kota Penandatangan']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('Jabatan Penandatangan') }}
                                    {{ Form::text('jabatan', '', ['class' => 'form-control' . ($errors->has('nomor_surat') ? ' is-invalid' : ''), 'id' => 'surat-surat-keluar-jabatan', 'placeholder' => 'Jabatan Penandatangan']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                {{ Form::label('Isi surat') }}
                                <div class="form-group"><textarea class="form-control summernote" name="isi_surat" id="surat-surat-keluar-isi_surat"></textarea></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer text-right">
                <button type="submit" class="btn btn-primary" id="surat-surat-keluar-save-btn" value="create">Simpan perubahan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

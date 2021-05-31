@extends('layouts.admin')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suratMasuk.update',$suratMasuk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Ubah data surat masuk</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required">
                                    <label for="nomor_surat">Nomor</label>
                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor surat masuk" value="{{ $suratMasuk->nomor_surat }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomor_surat">Tanggal</label>
                                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal surat masuk" value="{{ $suratMasuk->tanggal_surat }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group"><label for="kepada">Kepada</label><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="{{ $suratMasuk->kepada }}"></div>
                        <div class="form-group"><label for="perihal">Perihal</label><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="{{ $suratMasuk->perihal }}"></div>
                        <div class="form-group"><label for="asal_surat_masuk">Asal surat masuk</label><input type="text" class="form-control" name="asal_surat_masuk" id="asal_surat_masuk" placeholder="Asal surat masuk" value="{{ $suratMasuk->asal_surat_masuk }}"></div>
                        <div class="form-group"><label for="pejabat_pengirim_surat">Pejabat pengirim surat</label><input type="text" class="form-control" name="pejabat_pengirim_surat" id="pejabat_pengirim_surat" placeholder="Pejabat pengirim surat" value="{{ $suratMasuk->pejabat_pengirim_surat }}"></div>

                        <div class="form-group"><label for="email_pengirim">Email pengirim</label><input type="text" class="form-control" name="email_pengirim" id="email_pengirim" placeholder="Email pengirim" value="{{ $suratMasuk->email_pengirim }}"></div>
                        <div class="form-group"><label for="alamat_pengirim">Alamat pengirim</label><input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="Alamat pengirim" value="{{ $suratMasuk->alamat_pengirim }}"></div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="nomor_agenda">Nomor agenda</label><input type="text" class="form-control" name="nomor_agenda" id="nomor_agenda" value="{{ $suratMasuk->nomor_agenda }}" disabled></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="tanggal_agenda">Tanggal agenda</label><input type="text" class="form-control" name="tanggal_agenda" id="tanggal_agenda" value="{{ $suratMasuk->tanggal_agenda }}" disabled></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_asal_ekspedisi_surat_masuk">Asal ekspedisi surat masuk</label>
                            <div class="form-group">
                                @foreach ($asal_ekspedisi_surat_masuks as $asal_ekspedisi_surat_masuk => $id)
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_asal_ekspedisi_surat_masuk{{ $id }}" name="id_asal_ekspedisi_surat_masuk" value="{{ $id }}"@if($suratMasuk->id_asal_ekspedisi_surat_masuk == $id) checked="true"@endif><label class="form-check-label" for="id_asal_ekspedisi_surat_masuk{{ $id }}">{{ $asal_ekspedisi_surat_masuk}}</label></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_jenis_surat">Jenis surat masuk</label>
                            <div class="form-group">
                                @foreach ($jenis_surat_masuks as $jenis_surat_masuk => $id)
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat_masuk{{ $id }}" name="id_jenis_surat_masuk" value="{{ $id }}"@if($suratMasuk->id_jenis_surat_masuk == $id) checked="true"@endif><label class="form-check-label" for="id_jenis_surat_masuk{{ $id }}">{{ $jenis_surat_masuk }}</label></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_sifat_keamanan_surat">Sifat keamanan surat</label>
                            <div class="form-group">
                            @foreach ($sifat_keamanan_surats as $sifat_keamanan_surat => $id)
                                <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_sifat_keamanan_surat{{ $id }}" name="id_sifat_keamanan_surat" value="{{ $id }}"@if($suratMasuk->id_sifat_keamanan_surat == $id) checked="true"@endif><label class="form-check-label" for="id_sifat_keamanan_surat{{ $id }}">{{ $sifat_keamanan_surat }}</label></div>
                            @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_sifat_penyelesaian_surat">Sifat penyelesaian surat</label>
                            <div class="form-group">
                                @foreach ($sifat_penyelesaian_surats as $sifat_penyelesaian_surat => $id)
                                    <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_sifat_penyelesaian_surat{{ $id }}" name="id_sifat_penyelesaian_surat" value="{{ $id }}"@if($suratMasuk->id_sifat_penyelesaian_surat == $id) checked="true"@endif><label class="form-check-label" for="id_sifat_penyelesaian_surat{{ $id }}">{{ $sifat_penyelesaian_surat}}</label></div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group"><label for="tenggat_waktu_tindak_lanjut">Tenggat waktu</label><input type="text" class="form-control" name="tenggat_waktu_tindak_lanjut" id="tenggat_waktu_tindak_lanjut" placeholder="Tenggat waktu tindak lanjut" value="{{ $suratMasuk->tenggat_waktu_tindak_lanjut }}"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label for="mulai_pukul">Mulai pukul</label><input type="text" class="form-control" name="mulai_pukul" id="mulai_pukul" placeholder="Mulai pukul" value="{{ $suratMasuk->mulai_pukul }}"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label for="selesai_pukul">Selesai pukul</label><input type="text" class="form-control" name="selesai_pukul" id="selesai_pukul" placeholder="Selesai pukul" value="{{ $suratMasuk->selesai_pukul }}"></div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        {{-- // Tembusan --}}
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-chalkboard-teacher"></i> Tembusan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                            <div class="col-md-12 collapse" id="collapseExample">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('suratMasuk.store') }}" method="POST">
                                            {!! Form::hidden('id_surat_masuk', $suratMasuk->id) !!}
                                            @csrf
                                            <div class="form-group"><label for="tembusan">Tambah tembusan surat</label><input type="text" class="form-control" name="tembusan" id="tembusan" placeholder="Tembusan kepada"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-muted text-right">
                                        <a class="btn btn-sm btn-primary" href="#"><i class="fas fa-save"></i> Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                            </tr>
                            @if(empty($suratMasuk->tembusanSurat))
                                <tr><td colspan=10>Belum ada data</td></tr>
                            @else
                                @foreach ($suratMasuk->tembusanSurat as $i => $tembusan_surat)
                                <tr>
                                    <td>{{ $i+1 }}.</td>
                                    <td>{{ $tembusan_surat->unit->jabatan }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>

                        {{-- // Dokumen surat --}}
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-file-pdf"></i> Dokumen surat
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('suratMasuk.index') }}"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Ukuran File</th>
                            </tr>
                            @if(empty($suratMasuk->dokumenSurat))
                                <tr><td colspan=10>Belum ada data</td></tr>
                            @else
                                @foreach ($suratMasuk->dokumenSurat as $i => $dokumen_surat)
                                <tr>
                                    <td>{{ $i+1 }}.</td>
                                    <td><a href="#">{{ $dokumen_surat->nama_file }}</a></td>
                                    <td>({{ $dokumen_surat->ukuran_file/1024 }}MB)</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>

                    </div>

                    <div class="col-md-6">

                        {{-- // Disposisi surat --}}
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-comments"></i> Disposisi pimpinan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('suratMasuk.index') }}"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Disposisi Pimpinan</th>
                            </tr>
                            @if(empty($suratMasuk->disposisiPimpinan))
                                <tr><td colspan=10>Belum ada data</td></tr>
                            @else
                                @foreach ($suratMasuk->disposisiPimpinan as $i => $disposisi_pimpinan)
                                <tr>
                                    <td>{{ $i+1 }}.</td>
                                    <td>{{ $disposisi_pimpinan->unit->jabatan }}</td>
                                    <td>{{ $disposisi_pimpinan->disposisi_pimpinan }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>

                        {{-- // Disposisi atasan --}}
                        <div class="row mb-1">
                            <div class="col-md-6">
                                <i class="fas fa-comments"></i> Disposisi Atasan
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('suratMasuk.index') }}"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Pejabat Pendisposisi</th>
                                <th>Disposisi</th>
                                <th>Catatan</th>
                            </tr>
                            @if(empty($suratMasuk->disposisiSurat))
                                <tr><td colspan=10>Belum ada data</td></tr>
                            @else
                                @foreach ($suratMasuk->disposisiSurat as $i => $disposisi_surat)
                                <tr>
                                    <td>{{ $i+1 }}.</td>
                                    <td>{{ $disposisi_surat->arahanSurat->arahan_surat }}</td>
                                    {{-- <td>{{ $disposisi_surat->statusDisposisi->status_disposisi }}</td> --}}
                                    <td>{{ $disposisi_surat->ceklist_disposisi_surat }}</td>
                                    <td>{{ $disposisi_surat->catatan_surat }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </table>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <a class="btn btn-sm btn-secondary" href="{{ route('suratMasuk.index') }}"> Kembali</a>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>

    </form>

    {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

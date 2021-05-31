@extends('layouts.admin')

@section('content')
<style>
    table th, .table td {
        padding: 0.2rem;
    }
</style>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-envelope-open-text"></i> Lihat surat masuk</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                        class="fas fa-times"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-5">Nomor surat</dt><dd class="col-sm-7">{{ $suratMasuk->nomor_surat }}</dd>
                        <dt class="col-sm-5">Tanggal surat</dt><dd class="col-sm-7">{{ $suratMasuk->tanggal_surat }}</dd>
                        <dt class="col-sm-5">Perihal</dt><dd class="col-sm-7">{{ $suratMasuk->perihal }}</dd>
                        <dt class="col-sm-5">Asal surat masuk</dt><dd class="col-sm-7">{{ $suratMasuk->asal_surat_masuk }}</dd>
                        <dt class="col-sm-5">Pejabat pengirim</dt><dd class="col-sm-7">{{ $suratMasuk->pejabat_pengirim_surat }}</dd>
                        <dt class="col-sm-5">Kepada</dt><dd class="col-sm-7">{{ $suratMasuk->kepada }}</dd>
                        @if($suratMasuk->email_pengirim<>"")<dt class="col-sm-5">Email pengirim</dt><dd class="col-sm-7">{{ $suratMasuk->email_pengirim }}</dd>@endif
                        @if($suratMasuk->alamat_pengirim<>"")<dt class="col-sm-5">Alamat pengirim</dt><dd class="col-sm-7">{{ $suratMasuk->alamat_pengirim }}</dd>@endif
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-5">Nomor agenda</dt><dd class="col-sm-7">{{ $suratMasuk->nomor_agenda }}</dd>
                        <dt class="col-sm-5">Tanggal agenda</dt><dd class="col-sm-7">{{ $suratMasuk->tanggal_agenda }}</dd>
                        <dt class="col-sm-5">Asal ekspedisi surat</dt><dd class="col-sm-7">{{ $suratMasuk->AsalEkspedisiSuratMasuk->asal_ekspedisi_surat_masuk }}</dd>
                        <dt class="col-sm-5">Jenis surat masuk</dt><dd class="col-sm-7">{{ $suratMasuk->JenisSuratMasuk->jenis_surat_masuk }}</dd>
                        <dt class="col-sm-5">Sifat keamanan surat</dt><dd class="col-sm-7">{{ $suratMasuk->sifatKeamananSurat->sifat_keamanan_surat }}</dd>
                        <dt class="col-sm-5">Sifat penyelesaian</dt><dd class="col-sm-7">{{ $suratMasuk->sifatPenyelesaianSurat->sifat_penyelesaian_surat }}</dd>
                        @if($suratMasuk->tenggat_waktu_tindak_lanjut<>"")<dt class="col-sm-5">Tenggat waktu tindak lanjut</dt><dd class="col-sm-7">{{ $suratMasuk->tenggat_waktu_tindak_lanjut }}</dd>@endif
                        @if($suratMasuk->mulai_pukul<>"")<dt class="col-sm-5">Mulai pukul</dt><dd class="col-sm-7">{{ $suratMasuk->mulai_pukul }}</dd>@endif
                        @if($suratMasuk->selesai_pukul<>"")<dt class="col-sm-5">Selesai pukul</dt><dd class="col-sm-7">{{ $suratMasuk->selesai_pukul }}</dd>@endif
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-6">

                    @if(count($suratMasuk->tembusanSurat)>0)
                    <i class="fas fa-chalkboard-teacher"></i> Tembusan
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                        </tr>
                        @foreach ($suratMasuk->tembusanSurat as $i => $tembusan_surat)
                        <tr>
                            <td>{{ $i+1 }}.</td>
                            <td>{{ $tembusan_surat->unit->jabatan }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif

                    @if(count($suratMasuk->dokumenSurat)>0)
                    <i class="fas fa-file-pdf"></i> Dokumen surat
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Ukuran File</th>
                        </tr>
                        @foreach ($suratMasuk->dokumenSurat as $i => $dokumen_surat)
                        <tr>
                            <td>{{ $i+1 }}.</td>
                            <td><a href="#">{{ $dokumen_surat->nama_file }}</a></td>
                            <td>({{ $dokumen_surat->ukuran_file/1024 }}MB)</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif

                </div>
                <div class="col-md-6">

                    @if(count($suratMasuk->disposisiPimpinan)>0)
                    <i class="fas fa-comments"></i> Disposisi pimpinan
                        <table class="table table-sm table-hover table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Disposisi Pimpinan</th>
                            </tr>
                            @foreach ($suratMasuk->disposisiPimpinan as $i => $disposisi_pimpinan)
                            <tr>
                                <td>{{ $i+1 }}.</td>
                                <td>{{ $disposisi_pimpinan->unit->jabatan }}</td>
                                <td>{{ $disposisi_pimpinan->disposisi_pimpinan }}</td>
                            </tr>
                            @endforeach
                        </table>
                    @endif

                    @if(count($suratMasuk->disposisiSurat)>0)
                    <i class="fas fa-comments"></i> Disposisi Atasan
                    <table class="table table-sm table-hover table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Pejabat Pendisposisi</th>
                            <th>Disposisi</th>
                            <th>Catatan</th>
                        </tr>
                        @foreach ($suratMasuk->disposisiSurat as $i => $disposisi_surat)
                        <tr>
                            <td>{{ $i+1 }}.</td>
                            <td>{{ $disposisi_surat->arahanSurat->arahan_surat }}</td>
                            {{-- <td>{{ $disposisi_surat->statusDisposisi->status_disposisi }}</td> --}}
                            <td>{{ $disposisi_surat->ceklist_disposisi_surat }}</td>
                            <td>{{ $disposisi_surat->catatan_surat }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @endif

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-right">
            <form action="{{ route('suratMasuk.destroy',$suratMasuk->id) }}" method="POST">
                @csrf
                @method('DELETE')
                {{-- <button type="submit" class="btn btn-outline-danger btn-sm"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --}}
                <a class="btn btn-outline-success btn-sm" href="{{ route('suratMasuk.edit',$suratMasuk->id) }}"><i class="fas fa-edit"></i>  Edit</a>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('suratMasuk.index') }}"><i class="fas fa-angle-left"></i> Kembali</a>
            </form>
        </div>
    </div>

@endsection

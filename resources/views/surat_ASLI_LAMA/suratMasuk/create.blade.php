@extends('layouts.admin')

@section('content')
{{-- <div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Post</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('jenisFile.index') }}"> Back</a>
</div>
</div>
</div> --}}

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
<style>
.form-group.required .control-label:after {
    content: "*";
    color: red;
}
</style>
<form action="{{ route('suratMasuk.store') }}" method="POST">
    @csrf

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Entri surat masuk</h3>

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
                    <div class="form-group">
                        <label for="id_jenis_surat">Jenis surat masuk</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat1" name="id_jenis_surat" value="1" checked="true"><label class="form-check-label" for="id_jenis_surat1">(SD) Surat Dinas</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat2" name="id_jenis_surat" value="2"><label class="form-check-label" for="id_jenis_surat2">(ST) Surat Tugas</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat3" name="id_jenis_surat" value="3"><label class="form-check-label" for="id_jenis_surat3">(M) Memorandum</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat4" name="id_jenis_surat" value="4"><label class="form-check-label" for="id_jenis_surat4">(SK) Surat Keputusan</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat5" name="id_jenis_surat" value="5"><label class="form-check-label" for="id_jenis_surat5">(SKet) Surat Keterangan</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat6" name="id_jenis_surat" value="6"><label class="form-check-label" for="id_jenis_surat6">(SP) Surat Pengantar</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="id_jenis_surat7" name="id_jenis_surat" value="7"><label class="form-check-label" for="id_jenis_surat7">(U) Undangan</label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group required">
                                <label for="nomor_surat">Nomor</label>
                                <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor surat masuk" value="W-12/OT.2/11/2020-<?=time();?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_surat">Tanggal</label>
                                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal surat masuk" value="<?=date_format(date_create(now()),"Y/m/d");?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label for="kepada">Kepada</label><input type="text" class="form-control" name="kepada" id="kepada" placeholder="Kepada" value="kepada <?=time();?>"></div>
                    <div class="form-group"><label for="perihal">Perihal</label><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="perihal-<?=time();?>"></div>
                    <div class="form-group"><label for="asal_surat_masuk">Asal surat masuk</label><input type="text" class="form-control" name="asal_surat_masuk" id="asal_surat_masuk" placeholder="Asal surat masuk" value="asal surat-<?=time();?>"></div>
                    <div class="form-group"><label for="pejabat_pengirim_surat">Pejabat pengirim surat</label><input type="text" class="form-control" name="pejabat_pengirim_surat" id="pejabat_pengirim_surat" placeholder="Pejabat pengirim surat" value="pejabat-<?=time();?>"></div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="nomor_agenda">Nomor agenda</label><input type="text" class="form-control" name="nomor_agenda" id="nomor_agenda" placeholder="Nomor agenda"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="tanggal_agenda">Tanggal agenda</label><input type="text" class="form-control" name="tanggal_agenda" id="tanggal_agenda" placeholder="Tanggal agenda"></div>
                        </div>
                    </div>

                    <div class="form-group"><label for="id_sifat_keamanan_surat">Sifat keamanan surat</label><input type="text" class="form-control" name="id_sifat_keamanan_surat" id="id_sifat_keamanan_surat" placeholder="Sifat keamanan surat"></div>
                    <div class="form-group"><label for="id_sifat_penyelesaian_surat">Sifat penyelesaian surat</label><input type="text" class="form-control" name="id_sifat_penyelesaian_surat" id="id_sifat_penyelesaian_surat" placeholder="Sifat penyelesaian surat"></div>
                    <div class="form-group"><label for="tenggat_waktu_tindak_lanjut">Tenggat waktu tindak lanjut</label><input type="text" class="form-control" name="tenggat_waktu_tindak_lanjut" id="tenggat_waktu_tindak_lanjut" placeholder="Tenggat waktu tindak lanjut"></div>
                    <div class="form-group"><label for="mulai_pukul">Mulai pukul</label><input type="text" class="form-control" name="mulai_pukul" id="mulai_pukul" placeholder="Mulai pukul"></div>
                    <div class="form-group"><label for="id_asal_ekspedisi_surat_masuk">Asal ekspedisi surat masuk</label><input type="text" class="form-control" name="id_asal_ekspedisi_surat_masuk" id="id_asal_ekspedisi_surat_masuk" placeholder="Asal ekspedisi surat masuk"></div>
                    <div class="form-group"><label for="email_pengirim">Email pengirim</label><input type="text" class="form-control" name="email_pengirim" id="email_pengirim" placeholder="Email pengirim"></div>
                    <div class="form-group"><label for="alamat_pengirim">Alamat pengirim</label><input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="Alamat pengirim"></div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
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
@endsection

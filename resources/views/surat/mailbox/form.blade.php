<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-mailbox-box-form">
            <form id="surat-mailbox-form" name="surat-mailbox-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-mailbox-id']) !!}

                <div class="form-group col-md-6">
                    {{ Form::label('id_user', 'User') }}
                    {{ Form::text('id_user', '', ['id' => 'surat-mailbox-id_user', 'placeholder' => 'User', 'class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('id_parent_mailbox', 'Parent Mailbox') }}
                    {{ Form::text('id_parent_mailbox', '', ['id' => 'surat-mailbox-id_parent_mailbox', 'placeholder' => 'Parent Mailbox', 'class' => 'form-control' . ($errors->has('id_parent_mailbox') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="col-md-6">
                    {{ Form::label('id_status_mailbox', 'Status Mailbox') }}
                    <div class="form-group">
                        @foreach ($status_mailboxs as $status_mailbox)
                        <div class="form-check form-check-inline">
                            {!! Form::radio('id_status_mailbox', $status_mailbox->id, null, ['id' => 'surat-mailbox-id_status_mailbox'.$status_mailbox->id, 'class'=>'form-check-input']) !!}
                            <label class="form-check-label" for="surat-mailbox-id_status_mailbox{{ $status_mailbox->id }}"> {{ $status_mailbox->status_mailbox }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('id_surat_masuk', 'Surat Masuk') }}
                    {{ Form::text('id_surat_masuk', '', ['id' => 'surat-mailbox-id_surat_masuk', 'placeholder' => 'Surat Masuk', 'class' => 'form-control' . ($errors->has('id_surat_masuk') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('id_konsep_surat', 'Konsep Surat') }}
                    {{ Form::text('id_konsep_surat', '', ['id' => 'surat-mailbox-id_konsep_surat', 'placeholder' => 'Konsep Surat', 'class' => 'form-control' . ($errors->has('id_konsep_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('id_surat_keluar', 'Surat Keluar') }}
                    {{ Form::text('id_surat_keluar', '', ['id' => 'surat-mailbox-id_surat_keluar', 'placeholder' => 'Surat Keluar', 'class' => 'form-control' . ($errors->has('id_surat_keluar') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('ceklist_arahan_surat', 'Ceklist Arahan Surat') }}
                    {{ Form::text('ceklist_arahan_surat', '', ['id' => 'surat-mailbox-ceklist_arahan_surat', 'placeholder' => 'Ceklist Arahan Surat', 'class' => 'form-control' . ($errors->has('ceklist_arahan_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6 required">
                    {{ Form::label('ceklist_disposisi_surat', 'Ceklist Disposisi Surat') }}
                    {{ Form::text('ceklist_disposisi_surat', '', ['id' => 'surat-mailbox-ceklist_disposisi_surat', 'placeholder' => 'Ceklist Disposisi Surat', 'class' => 'form-control' . ($errors->has('ceklist_disposisi_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('disposisi_surat', 'Disposisi Surat') }}
                    {{ Form::textarea('disposisi_surat', null, ['id' => 'surat-mailbox-disposisi_surat', 'placeholder' => 'Disposisi Surat', 'class' => 'form-control summernote' . ($errors->has('disposisi_surat') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('waktu_terima', 'Waktu Terima') }}
                    {{ Form::time('waktu_terima', null, ['id' => 'surat-mailbox-waktu_terima', 'placeholder' => 'Waktu Terima', 'class' => 'form-control' . ($errors->has('waktu_terima') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('waktu_baca', 'Waktu Baca') }}
                    {{ Form::time('waktu_baca', null, ['id' => 'surat-mailbox-waktu_baca', 'placeholder' => 'Waktu Baca', 'class' => 'form-control' . ($errors->has('waktu_baca') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('waktu_proses', 'Waktu Proses') }}
                    {{ Form::time('waktu_proses', null, ['id' => 'surat-mailbox-waktu_proses', 'placeholder' => 'Waktu Proses', 'class' => 'form-control' . ($errors->has('waktu_proses') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('waktu_kirim', 'Waktu Kirim') }}
                    {{ Form::time('waktu_kirim', null, ['id' => 'surat-mailbox-waktu_kirim', 'placeholder' => 'Waktu Kirim', 'class' => 'form-control' . ($errors->has('waktu_kirim') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>

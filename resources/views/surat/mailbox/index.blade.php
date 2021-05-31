<div class="row col-md-12 mb-3">
    <div class="col-md-6" id="card_title">{{ Form::label('mailbox') }}</div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="btn-surat-mailbox-create"><i class="fas fa-plus-circle"></i> Tambah mailbox</a>
    </div>
</div>

<div class="card">
    @if ($message = Session::get('success'))
    <div class="alert alert-success" id="surat-mailbox-alert-box">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card-body col-md-12">
        @include('surat.mailbox.table')
    </div>
</div>

@push('modal')
@include('surat.mailbox.modal')
@endpush

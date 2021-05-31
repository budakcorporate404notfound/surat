<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-status-mailbox-box-form">
            <form id="surat-status-mailbox-form" name="surat-status-mailbox-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                @csrf
                {!! Form::hidden('id', '', ['id'=>'surat-status-mailbox-id']) !!}
                
                <div class="form-group col-md-6 required">
                    {{ Form::label('status_mailbox', 'Status Mailbox') }}
                    {{ Form::text('status_mailbox', '', ['id' => 'surat-status-mailbox-status_mailbox', 'placeholder' => 'Status Mailbox', 'class' => 'form-control' . ($errors->has('status_mailbox') ? ' is-invalid' : '')]) }}
                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>

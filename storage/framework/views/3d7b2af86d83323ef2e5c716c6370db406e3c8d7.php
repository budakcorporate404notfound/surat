<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row box-form surat-status-mailbox-box-form">
            <form id="surat-status-mailbox-form" name="surat-status-mailbox-form" method="POST" role="form" enctype="multipart/form-data" class="row col-md-12 needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <?php echo Form::hidden('id', '', ['id'=>'surat-status-mailbox-id']); ?>

                
                <div class="form-group col-md-6 required">
                    <?php echo e(Form::label('status_mailbox', 'Status Mailbox')); ?>

                    <?php echo e(Form::text('status_mailbox', '', ['id' => 'surat-status-mailbox-status_mailbox', 'placeholder' => 'Status Mailbox', 'class' => 'form-control' . ($errors->has('status_mailbox') ? ' is-invalid' : '')])); ?>

                    <div class="invalid-feedback"></div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\status-mailbox\form.blade.php ENDPATH**/ ?>
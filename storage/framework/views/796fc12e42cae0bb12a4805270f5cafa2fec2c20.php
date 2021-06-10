<div class="row col-md-12 mb-3">
    <div class="col-md-6" id="card_title"><?php echo e(Form::label('mailbox')); ?></div>
    <div class="col-md-6 text-right">
        <a class="btn btn-outline-success" href="javascript:void(0)" id="btn-surat-mailbox-create"><i class="fas fa-plus-circle"></i> Tambah mailbox</a>
    </div>
</div>

<div class="card">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" id="surat-mailbox-alert-box">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card-body col-md-12">
        <?php echo $__env->make('surat.mailbox.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->startPush('modal'); ?>
<?php echo $__env->make('surat.mailbox.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\mailbox\index.blade.php ENDPATH**/ ?>
<div class="type_msg">
    <div class="input_msg_write">
        <?php echo e(Form::text('pesan', '', ['class' => 'form-control' . ($errors->has('pesan') ? ' is-invalid' : ''), 'id' => 'surat-diskusi-surat-pesan', 'placeholder' => 'Tulis pesan'])); ?>

        <button class="msg_send_btn" id="surat-diskusi-surat-save-btn" type="button"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\surat\resources\views/surat/diskusi-surat/form.blade.php ENDPATH**/ ?>
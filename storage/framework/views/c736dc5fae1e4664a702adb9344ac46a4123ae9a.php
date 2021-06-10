
<h1>Yth. Bapak/Ibu <?php echo e($user->name); ?> (<?php echo e($user->jabatan); ?>)</h1>
<p>
Anda mendapatkan disposisi baru dari .... silahkan untuk membuka informasi tersebut dalam aplikasi <a href="https://renog.mahkamahagung.go.id">Persuratan Biro Perencanaan dan Organisasi</a>
<br>Disposisi : ## <?php echo e($data->ceklist_disposisi_surat); ?> ##
<br>Catatan : <?php echo e($data->disposisi_surat); ?>

<br>
Terima kasih.
</p>



<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\email\disposisi-surat.blade.php ENDPATH**/ ?>
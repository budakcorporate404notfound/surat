     
<h1>Yth. Bapak/Ibu <?php echo e($data->pejabat_pengirim_surat); ?></h1>
<p>
Terima kasih telah mengirimkan surat nomor <b><?php echo e($data->nomor_surat); ?></b> perihal <u><?php echo e($data->perihal); ?></u> pada alamat email biro-perencanaan@mahkamahagung.go.id.<br>
Surat Anda telah diterima oleh Sub Bagian Tata Usaha pada Biro Perencanaan dan Organisasi.
</p>
<table>
    <tr>
        <td>Nomor agenda</td>
        <td>:</td>
        <td><b><?php echo e($data->nomor_agenda); ?></b></td>
    </tr>
    <tr>
        <td>Tanggal terima TU</td>
        <td>:</td>
        <td><?php echo e($data->tanggal_agenda->format('d M Y')); ?></td>
    </tr>
    <tr>
        <td>Waktu terima</td>
        <td>:</td>
        <td><?php echo e($data->tanggal_agenda->toTimeString()); ?> WIB</td>
    </tr>
    <tr>
        <td>Status surat</td>
        <td>:</td>
        <td>
            <table style="border: 1px solid #dedede;">
                <tr>
                    <th>No</th>
                    <th>Waktu</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>13 Nov 2020 15:54 WIB</td>
                    <td>Diarahkan ke Bagian Bimbingan Monitoring</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>14 Nov 2020 09:31 WIB</td>
                    <td>Diproses pada Bagian Bimbingan Monitoring</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
Untuk memantau status terakhir surat Bapak/Ibu silahkan kunjungi halaman <a href="https://renog.mahkamahagung.go.id/surat/?token=7y2y8765f873f655f87356238f726b87r28f76">berikut</a>.

<?php /**PATH C:\xampp\htdocs\surat\resources\views\surat\email\status-surat.blade.php ENDPATH**/ ?>
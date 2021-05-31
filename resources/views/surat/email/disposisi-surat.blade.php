{{--
    "id" => 37
    "name" => "Ujang Misnan"
    "email" => "ujangmisnan@gmail.com"
    "email_verified_at" => null
    "password" => "$2y$10$H5fK1R4EbYIZAaoa2ME6uOnYmbW3w5TuRg/qdtrXGLdeVrWKITt1S"
    "remember_token" => null
    "nip" => "198909042019031008"
    "jabatan" => "Pengadministrasi Persuratan Biro Perencanaan dan Organisasi"
    "no_hp" => "081284202788"
    "id_unit_kerja" => 1
    "id_jabatan" => null
    "created_at" => null
    "updated_at" => null

    "id_surat_masuk" => "89"
    "id_arahan_surat_iduser" => "37"
    "ceklist_disposisi_surat" => "2"
    "disposisi_surat" => "test"
    "id_arahan_surat_dari" => 1
--}}
<h1>Yth. Bapak/Ibu {{ $user->name }} ({{ $user->jabatan }})</h1>
<p>
Anda mendapatkan disposisi baru dari .... silahkan untuk membuka informasi tersebut dalam aplikasi <a href="https://renog.mahkamahagung.go.id">Persuratan Biro Perencanaan dan Organisasi</a>
<br>Disposisi : ## {{ $data->ceklist_disposisi_surat }} ##
<br>Catatan : {{ $data->disposisi_surat }}
<br>
Terima kasih.
</p>
{{-- <table>
    <tr>
        <td>Nomor agenda</td>
        <td>:</td>
        <td><b>{{ $data->nomor_agenda }}</b></td>
    </tr>
    <tr>
        <td>Tanggal terima TU</td>
        <td>:</td>
        <td>{{ $data->tanggal_agenda->format('d M Y') }}</td>
    </tr>
    <tr>
        <td>Waktu terima</td>
        <td>:</td>
        <td>{{ $data->tanggal_agenda->toTimeString() }} WIB</td>
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
</table> --}}
{{-- <br>
Untuk memantau status terakhir surat Bapak/Ibu silahkan kunjungi halaman <a href="https://renog.mahkamahagung.go.id/surat/?token=7y2y8765f873f655f87356238f726b87r28f76">berikut</a>. --}}


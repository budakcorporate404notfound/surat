     {{-- "nomor_surat" => "fdg"
      "tanggal_surat" => "2020-12-09"
      "id_asal_ekspedisi_surat_masuk" => "1"
      "id_jenis_surat_masuk" => "1"
      "asal_surat_masuk" => "dfg"
      "perihal" => "dfg"
      "kepada" => "dfg"
      "pejabat_pengirim_surat" => "dfg"
      "id_sifat_keamanan_surat" => "1"
      "id_sifat_penyelesaian_surat" => "1"
      "tenggat_waktu_tindak_lanjut" => null
      "mulai_pukul" => null
      "selesai_pukul" => null
      "id_arahan_surat" => "2"
      "email_pengirim" => "ap.agussudarmanto@gmail.com"
      "alamat_pengirim" => null
      "tanggal_agenda" => Carbon\Carbon @1608611426 {#1614
        #constructedObjectId: "000000002bcce7d10000000026e238a0"
        #localMonthsOverflow: null
        #localYearsOverflow: null
        #localStrictModeEnabled: null
        #localHumanDiffOptions: null
        #localToStringFormat: null
        #localSerializer: null
        #localMacros: null
        #localGenericMacros: null
        #localFormatFunction: null
        #localTranslator: null
        #dumpProperties: array:3 [
          0 => "date"
          1 => "timezone_type"
          2 => "timezone"
        ]
        #dumpLocale: null
        date: 2020-12-22 11:30:26.480828 Asia/Jakarta (+07:00)
      }
      "nomor_agenda" => "37/BUA.1/12/2020"
 --}}
<h1>Yth. Bapak/Ibu {{ $data->pejabat_pengirim_surat }}</h1>
<p>
Terima kasih telah mengirimkan surat nomor <b>{{ $data->nomor_surat }}</b> perihal <u>{{ $data->perihal }}</u> pada alamat email biro-perencanaan@mahkamahagung.go.id.<br>
Surat Anda telah diterima oleh Sub Bagian Tata Usaha pada Biro Perencanaan dan Organisasi.
</p>
<table>
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
</table>
<br>
Untuk memantau status terakhir surat Bapak/Ibu silahkan kunjungi halaman <a href="https://renog.mahkamahagung.go.id/surat/?token=7y2y8765f873f655f87356238f726b87r28f76">berikut</a>.


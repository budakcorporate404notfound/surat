<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendemailController extends Controller
{

    public function toMembers(Request $request)
    {
        $arr = [
            // ['nama' => 'Admin', 'password' => '465354', 'email' => 'smtp.agussudarmanto@gmail.com'],
            // ['nama' => 'Joko Upoyo Pribadi, SH.,MH', 'password' => '64CB35', 'email' => 'jokoupoyo@gmail.com'],
            // ['nama' => 'Drs. H. Arifin Samsurijal, SH.,MH', 'password' => 'DF2E57', 'email' => 'arifinsamsu67@gmail.com'],
            // ['nama' => 'Didik Purwanto, S.H., M.M.', 'password' => 'DFF80D', 'email' => 'dikasagita11@yahoo.co.id'],
            // ['nama' => 'El Damara,  SE,SH,MM', 'password' => '5CC131', 'email' => 'eldamkaray8@gmail.com'],
            // ['nama' => 'Edi Yuniadi, S.Sos, MM', 'password' => '92160D', 'email' => 'ediyuniadi@gmail.com'],
            // ['nama' => 'Untung Hermawan, ST', 'password' => '091920', 'email' => 'hermawanuntung@gmail.com'],

            // ['nama' => 'Yus Natin, S.Sos, MM', 'password' => '107035', 'email' => 'yusnatinn@gmail.com'],
            // ['nama' => 'Syaiful Arif, SH.,M.Si', 'password' => '062D4F', 'email' => 'syaiful.poros@gmail.com'],
            // ['nama' => 'Teguh Magzan, SH', 'password' => 'BBF9F3', 'email' => 'magzant@yahoo.co.id'],
            // ['nama' => 'Titi Suprapti, SH, MM', 'password' => '09142C', 'email' => 'titisuprapti125@gmail.com'],
            // ['nama' => 'Emie Yuliati, SE, ME', 'password' => 'E931C1', 'email' => 'emieyuliati@gmail.com'],
            // ['nama' => 'Retno Widuri, S.Kom, MH', 'password' => '4E4681', 'email' => 'rtnwiduri@gmail.com'],

            // ['nama' => 'Diana Puri Syawaliah,  SE.Par', 'password' => 'BB75F9', 'email' => 'honeydee6@gmail.com'],
            // ['nama' => 'Mila Karima, SE,MM', 'password' => 'AA5334', 'email' => 'milaakarima@gmail.com'],
            // ['nama' => 'Grace Maria, S.Ip, M.E', 'password' => '30894C', 'email' => 'gracemariaginting@yahoo.com'],
            // ['nama' => 'Tiroi Sisruli Siahaan, S.Ip', 'password' => '3DEAE1', 'email' => 'tiroi.siahaan@gmail.com'],
            // ['nama' => 'Dhika Hafizh Pratama, S.Sos', 'password' => 'E01605', 'email' => 'dhikahafizh@gmail.com'],
            // ['nama' => 'Amanda Abidin, SE.,Mba', 'password' => 'BE095A', 'email' => 'amandaabidin9@gmail.com'],

            // ['nama' => 'Yudi Yudiana, SE,M.Ak', 'password' => '4643CA', 'email' => 'yudiana1987@gmail.com'],
            // ['nama' => 'Sawiji Suprayitno, SH', 'password' => 'BC874B', 'email' => 'maswiezie17@gmail.com'],
            // ['nama' => 'Gunawan, SH', 'password' => '8A48F8', 'email' => 'gunawanwan571@gmail.com'],
            // // ['nama' => 'Eli Haryani, SH', 'password' => 'A1A77C', 'email' => ''],
            // ['nama' => 'Fiqhi Hanief Al Islamy, S.Kom', 'password' => 'C25A15', 'email' => 'fiqhihanief@yahoo.com'],
            // ['nama' => 'Rizqi Widi Feirdani, SE', 'password' => '82DA8E', 'email' => 'rizqiwidifeirdani@gmail.com'],
            // ['nama' => 'Yovi Silfani, SE,MM', 'password' => '523C5B', 'email' => 'yovisilfani@gmail.com'],

            // ['nama' => 'Andi Hikmawati , S.Sos,MH', 'password' => '3638F6', 'email' => 'hikmaneh_hikma@yahoo.com'],
            // ['nama' => 'Ida Ariani, SE,MH', 'password' => 'EB38C2', 'email' => 'arianipane@yahoo.co.id'],
            // ['nama' => 'Sentosawati Catur Putri, S.Ip', 'password' => 'DC5347', 'email' => 'sentosaputri24@gmail.com'],
            // ['nama' => 'Indah Wahyuni, SE,MM', 'password' => 'AC7C38', 'email' => 'indah255@gmail.com'],
            // ['nama' => 'Rina Alprini, S.Pt', 'password' => '0D00C0', 'email' => 'rina.alprini@gmail.com'],
            // ['nama' => 'Purwanto, S.P', 'password' => 'A44586', 'email' => 'purwanto.mari@gmail.com'],
            // ['nama' => 'Muhammad Mahatir, S.Kom', 'password' => 'AF9608', 'email' => 'mahatir.muhammad22@gmail.com'],
            // ['nama' => 'Andrea Arimurti, SH', 'password' => '73AD20', 'email' => 'andreaarimurti94@gmail.com'],
            // ['nama' => 'Ujang Misnan', 'password' => 'A004EB', 'email' => 'ujangmisnan@gmail.com'],
            // ['nama' => 'Bimo Prakoso, A.Md.', 'password' => '81AC71', 'email' => 'bp.bimoprakoso@gmail.com'],
            // ['nama' => 'Debora Putri Tambunan, A.Md', 'password' => '7A5A91', 'email' => 'debora11008putri@gmail.com'],
            // ['nama' => 'Muktar', 'password' => '9CD0F5', 'email' => 'mukhtar82.ab@gmail.com'],
            // ['nama' => 'Atmazuki', 'password' => 'D6111C', 'email' => 'atmazuki1207@gmail.com'],
            // ['nama' => 'Arief Ridwan', 'password' => '86BC86', 'email' => 'arief.renog@gmail.com'],
            // ['nama' => 'Rahman', 'password' => 'C5C5B5', 'email' => 'rachman778@gmail.com'],
            // ['nama' => 'Astania Dwi Wahyu', 'password' => '43889C', 'email' => 'nhiepocha@gmail.com'],
            // ['nama' => 'Fajar Amirulah', 'password' => '8BBE06', 'email' => 'fajar_yual@yahoo.com'],
            // ['nama' => 'Desfran Subhan', 'password' => 'BFCBD3', 'email' => 'desfransubhan20@gmail.com'],
            // ['nama' => 'Savira Rianda Ariani', 'password' => '6B3460', 'email' => 'savirarara89@yahoo.com'],
            // ['nama' => 'Muhammad Indra', 'password' => '80057A', 'email' => 'indraflacks92@gmail.com'],
            // ['nama' => 'Nursidik', 'password' => '064660', 'email' => 'siddiqnur81@gmail.com'],
            // ['nama' => 'Hadi Saputro', 'password' => '77D6DE', 'email' => 'hadi_s216@yahoo.com'],
            // ['nama' => 'Wimbo Bramantyo', 'password' => '4755EF', 'email' => 'bramantyo.wimbo@gmail.com'],
            // ['nama' => 'Kasubag Analisis Renog', 'password' => '4FD52C', 'email' => 'analisisrenog@gmail.com'],

            ['nama' => 'Kurnia Maryono', 'password' => '7F66F8', 'email' => 'kurniamaryono9962@gmail.com'],
            ['nama' => 'Ujang Misnan', 'password' => 'E46214', 'email' => 'ujangmisnan0@gmail.com'],
        ];

        for ($i = 0, $c = count($arr); $i < $c; $i++) {
            $arrMember = $arr[$i];
            try {
                Mail::send(
                    'email.updatepassword',
                    [
                        'nama' => $arrMember['nama'],
                        'username' => $arrMember['email'],
                        'password' => $arrMember['password']
                    ],
                    function ($message) use ($arrMember) {
                        $message->subject('Informasi akun Aplikasi Persuratan Biro Perencanaan dan Organisasi');
                        $message->from('biro-perencanaan@mahkamahagung.go.id', 'Biro Perencanaan dan Organisasi');
                        $message->to($arrMember['email']);
                    }
                );
                // return back()->with('alert-success', 'Berhasil Kirim Email');
                echo "Berhasil kirim ke alamat email : {$arrMember['email']} ({$arrMember['nama']})<br>";
            } catch (Exception $e) {
                echo "Gagal kirim ke alamat email : {$arrMember['email']} ({$arrMember['nama']}) - status: " . $e->getMessage() . "<br>";
                // return response(['status' => false, 'errors' => $e->getMessage()]);
            }
        }
    }
}

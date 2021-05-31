<?php

namespace App\Http\Controllers\Surat;

use App\Mail\SendMail;
use App\Mail\SendStatusSuratMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\SendDisposisiSuratMail;
use Illuminate\Support\Facades\Mail;

/**
 * Class DisposisiSuratController
 * @package App\Http\Controllers
 */
class EmailController extends Controller
{
    public static function sendDisposisiStatus($user, $request)
    {
        $email_address = 'smtp.agussudarmanto@gmail.com';
        Log::info('Mencoba mengirim ke ' . $email_address);

        $kirim = Mail::to($email_address)->send(new SendDisposisiSuratMail($user, $request));

        if ($kirim) {
            Log::info('Email telah dikirim ke ' . $email_address);
        }
    }

    public static function sendSuratStatus($request)
    {

        $email_address = $request->email_pengirim;

        if ($email_address != "") {

            $kirim = Mail::to($email_address)->send(new SendStatusSuratMail($request));

            if ($kirim) {
                // echo "Email telah dikirim";
            }
        }
    }
}

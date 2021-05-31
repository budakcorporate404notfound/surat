<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Webklex\IMAP\Facades\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail; // Panggil support email dari Laravel

class EmailController extends Controller
{
    public function index()
    {
        $nama = "Agus Sudarmanto";
        $email = "ap.agussudarmanto@gmail.com";

        // $nama = "emie yuliati";
        // $email = "emieyuliati@gmail.com";
        $kirim = Mail::to($email)->send(new SendMail($nama));

        if ($kirim) {
            echo "Email telah dikirim";
        }
    }

    public function cekinbox()
    {
        // $oClient = Client::account('default'); // defined in config/imap.php
        // $oClient->connect();

        // // get all unseen messages from folder INBOX
        // $aMessage = $oClient->getUnseenMessages($oClient->getFolder('INBOX'));

        // foreach ($aMessage as $oMessage) {
        //     // do something with the message
        // }
        $mail = Client::account('gmail');
        $mail->connect();
        // dd($mail->getFolders());
        $f = $mail->getFolder('INBOX');
        $messages = $f->query()->since(now()->subDays(1))->get(); // today

        $body = $subject = $date = $from = [];

        foreach ($messages as $msg) {
            array_push($body, $msg->getHTMLBody(true));
            array_push($subject, $msg->getSubject(true));
            array_push($date, $msg->getDate(true));
            array_push($from, $msg->getFrom(true));
        }

        return Response::json([
            'body' => $body,
            'subject' => $subject,
            'date' => $date,
            'from' => $from
        ]);
    }

    public function inbox()
    {
        /** @var \Webklex\PHPIMAP\Client $client */
        // $client = \Webklex\IMAP\Facades\Client::make([
        // $client = Client::make([
        //     'host'          => 'imap.gmail.com',
        //     'port'          => 993,
        //     'encryption'    => 'ssl',
        //     'validate_cert' => true,
        //     'username'      => 'smtp.agussudarmanto@gmail.com',
        //     'password'      => 'smtppassword',
        //     'protocol'      => 'imap'
        // ]);

        $client = Client::make([
            'host'          => 'mail.mahkamahagung.go.id',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'biro-perencanaan@mahkamahagung.go.id',
            'password'      => 'r3ncAnA@MARI2020',
            'protocol'      => 'imap'
        ]);

        // Alternative by using the Facade
        // $client = Webklex\IMAP\Facades\Client::account('default');
        // $client = Client::account('default');

        //Connect to the IMAP Server
        $client->connect();

        //Get all Mailboxes
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        //Loop through every Mailbox
        /** @var \Webklex\PHPIMAP\Folder $folder */
        foreach ($folders as $folder) {

            //Get all Messages of the current Mailbox $folder
            /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
            $messages = $folder->messages()->all()->get();

            /** @var \Webklex\PHPIMAP\Message $message */

            echo '<table class="table">';
            $i = 0;
            foreach ($messages as $message) {
                echo '<tr><td>';
                echo $message->getSubject() . '<br />';
                echo 'Attachments: ' . $message->getAttachments()->count() . '<br />';
                echo $message->getHTMLBody();
                echo '</td></tr>';

                //Move the current Message to 'INBOX.read'
                // if ($message->moveToFolder('INBOX.read') == true) {
                //     echo 'Message has ben moved';
                // } else {
                //     echo 'Message could not be moved';
                // }
                $i++;
                if ($i > 5) exit;
            }
            echo '</table>';
        }

        // return view('email.index', compact('trans_surat_masuks'));
    }
}

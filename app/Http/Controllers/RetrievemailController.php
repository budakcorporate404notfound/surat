<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrievemailController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        note for .env file:
            IMAP_HOST=mail.mahkamahagung.go.id
            IMAP_PORT=993
            IMAP_ENCRYPTION=ssl
            IMAP_VALIDATE_CERT=true
            IMAP_USERNAME=biro-perencanaan@mahkamahagung.go.id
            IMAP_PASSWORD=r3ncAnA@MARI2020
            IMAP_DEFAULT_ACCOUNT=default
            IMAP_PROTOCOL=imap

        */ 

        $getMails   = array();
        $host       = "{".env('IMAP_HOST').":".env('IMAP_PORT')."/ssl/novalidate-cert}INBOX"; 
        $username   = env('IMAP_USERNAME');
        $password   = env('IMAP_PASSWORD');
        $searchby   = "persuratan";

        $conn       = imap_open($host, $username, $password);
        
        // Search email by? example: SUBJECT dan UNSEEN (belum dibuka)
        // https://www.php.net/manual/en/function.imap-search.php
        $mails      = imap_search($conn, 'SUBJECT "'.$searchby.'" UNSEEN'); 
        
        if ($mails)
        {
            $no = 1;
            foreach ($mails as $email_number) { 
				/* Retrieve informasi email, seperti:
                        subject, from, to, date, message_id, references, in_reply_to
                        size, uid, msgno, recent, flagged, answered, deleted, seen
                        draft, udate
                */ 
				$headers        = imap_fetch_overview($conn, $email_number, 0); 
				$message        = imap_fetchbody($conn, $email_number, '1'); 
                $subMessage     = substr($message, 0, 150); 
				$finalMessage   = trim(quoted_printable_decode($subMessage)); 

                /* get mail structure */
				$structure      = imap_fetchstructure($conn, $email_number);
				$attachments    = array();

                // if any attachments found... 
				if(isset($structure->parts) && count($structure->parts)) 
				{
					for($i = 0; $i < count($structure->parts); $i++) 
					{
						$attachments[$i] = array(
							'is_attachment' => false,
							'filename'      => '',
							'name'          => '',
							'attachment'    => ''
						);
			
						if($structure->parts[$i]->ifdparameters) 
						{
							foreach($structure->parts[$i]->dparameters as $object) 
							{
								if(strtolower($object->attribute) == 'filename') 
								{
									$attachments[$i]['is_attachment'] = true;
										$attachments[$i]['filename'] = $object->value;
								}
							}
						}
			
						if($structure->parts[$i]->ifparameters) 
						{
							foreach($structure->parts[$i]->parameters as $object) 
							{
								if(strtolower($object->attribute) == 'name') 
								{
									$attachments[$i]['is_attachment']   = true;
									$attachments[$i]['name']            = $object->value;
								}
							}
						}
			
						if($attachments[$i]['is_attachment']) 
						{
							$attachments[$i]['attachment'] = imap_fetchbody($conn, $email_number, $i+1);
		
							// 3 = BASE64 encoding 
							if($structure->parts[$i]->encoding == 3) 
							{ 
								$attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
							}
							// 4 = QUOTED-PRINTABLE encoding  
							elseif($structure->parts[$i]->encoding == 4) 
							{ 
								$attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
							}
						}
					}
				}
			
				// iterate through each attachment and save it 
				foreach($attachments as $attachment)
				{
					if($attachment['is_attachment'] == 1)
					{
						$filename = $attachment['name'];
						if(empty($filename)) $filename = $attachment['filename'];
		
						if(empty($filename)) $filename = time() . ".dat";
						$folder = "attachment";
						if(!is_dir($folder))
						{
							 mkdir($folder);
						}
						$fp = fopen("./". $folder ."/". $email_number . "-" . $filename, "w+");
						fwrite($fp, $attachment['attachment']);
						fclose($fp);
					}
                    
				}

                $getMails[$no] = array(
                    'from'              => $headers[0]->from ,
                    'date'              => $headers[0]->date ,
                    'subject'           => $headers[0]->subject,
                    'finalMessage'      => $finalMessage
                );
                $no++;
            }
        }
        imap_close($conn);

        $getMails = (object) $getMails;

        return view('index')
            ->with('getMails', $getMails);
    }

}

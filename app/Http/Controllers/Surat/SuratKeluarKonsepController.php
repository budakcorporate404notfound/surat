<?php

namespace App\Http\Controllers\Surat;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Surat\Mailbox;
use Illuminate\Support\Carbon;
use App\Models\Surat\ArahanSurat;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use App\Models\Surat\SuratKeluarKonsep;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
// use HTMLtoOpenXML;
// use App\Models\Surat\JenisDokumen;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Cache;
// use App\Models\Surat\SifatKeamananSurat;
// use App\Models\Surat\SifatPenyelesaianSurat;

/**
 * Class SuratKeluarController
 * @package App\Http\Controllers
 */
class SuratKeluarKonsepController extends SuratController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $q = SuratKeluarKonsep::select();

            if (!empty(request('id_surat_masuk'))) {
                $q->where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0));
            } else {
                switch (auth()->user()->id_jabatan) {
                    case '3':
                        if (auth()->user()->id_unit_kerja == 1) {
                            // Is Kasubag TU
                            $q->where('flag', '=', 15);
                        } else {
                            // Is Kasubag
                            $q->where('flag', '=', 9);
                        }
                        break;

                    case '2':
                        // Is Kabag
                        $q->where('flag', '=', 12);
                        break;

                    case '1':
                        // Is Karo
                        $q->where('flag', '=', 18);
                        break;

                    default:
                        # code...
                        break;
                }
            }
            //  9, 12, 15, 18
            // DB::enableQueryLog();

            $data = $q->get();

            // Log::notice(DB::getQueryLog());

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm surat-surat_keluar_konsep-edit">Ubah</a>';
                    // $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-outline-danger btn-sm surat-surat_keluar-delete">Hapus</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $this->getAllReferensi();
        // $asal_ekspedisi_surat_masuks = $this->referensi['asal_ekspedisi_surat_masuks'];
        // $jenis_surat_masuks          = $this->referensi['jenis_surat_masuks'];
        // $jenis_files                 = $this->referensi['jenis_files'];
        // $status_disposisis           = $this->referensi['status_disposisis'];
        // $jenis_disposisis            = $this->referensi['jenis_disposisis'];
        // $units                       = $this->referensi['units'];
        // $id_unit_kerja_user          = $this->referensi['id_unit_kerja_user'];
        // $bawahans                    = $this->referensi['bawahans'];
        // $id_unit_kerja_atasan        = $this->referensi['id_unit_kerja_atasan'];

        $jenis_dokumens              = $this->referensi['jenis_dokumens'];
        $sifat_keamanan_surats       = $this->referensi['sifat_keamanan_surats'];
        $sifat_penyelesaian_surats   = $this->referensi['sifat_penyelesaian_surats'];
        $arahan_surats               = $this->referensi['arahan_surats'];
        $atasan                      = $this->referensi['atasan'];

        $default_arahan = $this->getIdArahanSuratAtasan();

        return view('surat.surat-keluar-konsep.index', compact(['jenis_dokumens', 'sifat_keamanan_surats', 'sifat_penyelesaian_surats', 'arahan_surats', 'default_arahan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
        ];

        $validator = Validator::make(request()->all(), SuratKeluarKonsep::rules(), $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        // Client IP and Location
        $ip               = $request->ip();
        $location         = Location::get($ip);

        // New record
        if ( empty(request('id')) ) {
            // prepare for status flag
            // JSON FORMAT : {"flag":1,"user":[{"id_user":28,"id_unit_kerja":15,"flag":1}, {"id_user":25,"id_unit_kerja":15,"flag":1}]}
            $status['flag']   = 1;
            $status['user'][] = [
                'id_user'        => auth()->user()->id,
                'id_unit_kerja'  => auth()->user()->id_unit_kerja,
                'flag'           => 1
            ];
            $status['detail'][auth()->user()->id] = [
                1                => [
                    // read
                    'tanggal'    => date('Y-m-d'),
                    'waktu'      => date('H:i:s'),
                    'ip_address' => $ip,
                    'location'   => $location
                ],
            ];
        } else {
            // update record
        }

        // $request->merge([
        //     'status' => $status
        // ]);

        if ($surat_keluar = SuratKeluarKonsep::updateOrCreate(['id' =>  request('id')], request()->except(['_token']))) {
            // Update Mailbox or create new if Surat keluar > 1

            $idMailbox = request('id_mailbox');
            // $mailbox = Mailbox::updateOrCreate(['id' => $idMailbox, 'id_konsep_surat' => $surat_keluar->id]);

            if ($mailbox = Mailbox::where('id', $idMailbox)->whereNull('id_konsep_surat')->first()){
                // Konsep surat = 1
                $mailbox->id_status_mailbox = 1; // 1: Draft
                $mailbox->id_konsep_surat = $surat_keluar->id;
                $mailbox->waktu_konsep = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu konsep
                $mailbox->save();

            } else if ($mailbox = Mailbox::where('id', $idMailbox)->where('id_konsep_surat', request('id'))->first()) {
                $mailbox->id_status_mailbox = 1; // 1: Draft
                $mailbox->id_konsep_surat = $surat_keluar->id;
                $mailbox->waktu_konsep = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu konsep
                $mailbox->save();

            } else {
                // Konsep surat > 1
                $mailbox = Mailbox::find($idMailbox);
                $newMailbox = $mailbox->replicate();
                $newMailbox->id_status_mailbox = 1; // 1: Draft
                $newMailbox->id_konsep_surat = $surat_keluar->id;
                $newMailbox->save();
            }

            // $mailbox = Mailbox::find($idMailbox);
            // $mailbox->id_status_mailbox = 1; // 1: Draft
            // $mailbox->id_konsep_surat = $surat_keluar->id;
            // $mailbox->waktu_konsep = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu konsep
            // $mailbox->save();

            return response()->json(['success' => 'Surat keluar berhasil direkam.', 'data' => $surat_keluar]);
        } else {
            App::abort(500, 'Gagal menyimpan data');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratKeluar = SuratKeluarKonsep::find($id);
        return response()->json($suratKeluar);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        SuratKeluarKonsep::find($id)->delete();

        return response()->json(['success' => 'SuratKeluar deleted successfully.']);
    }

    public function generatedocx333($id)
    {
        $suratKeluar = SuratKeluarKonsep::find($id);

        $headers = array(
            // "Content-type"=>"text/html",
            "Content-type" => "Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "Content-Disposition" => "attachment;Filename=myGeneratefile.doc"
        );

        $content = '<html>
                <head><meta charset="utf-8"></head>
                <body>
                    <p>My Blog Laravel 7 generate word document from html Example - Nicesnippets.com</p>
                    <ul><li>Php</li><li>Laravel</li><li>Html</li></ul>
                </body>
                </html>';

        return response()->make($content, 200, $headers);
    }

    public function kirimdraft()
    {
        $id = request('surat_keluar_konsep_id');
        $id_arahan = request('surat_keluar_konsep_arahan_id');
        $arahan_surat = ArahanSurat::where('id', $id_arahan)->get();

        switch ($arahan_surat[0]->level_unit) {
            case '3': $flag = 9; break;
            case '2': $flag = 12; break;
            case '1':
                if ($id_arahan == 1) $flag = 15; else $flag = 18;
                break;
        }
        // 9, 12, 15, 18

        $suratKeluarKonsep = SuratKeluarKonsep::find($id);

        $status = $suratKeluarKonsep->status;
        $status['flag'] = 3;
        $suratKeluarKonsep->status = $status;
        $suratKeluarKonsep->flag = $flag;

        if ($suratKeluarKonsep->save()) {
            $idMailbox = request('id_mailbox');

            // Update mailbox for sender
            $mailbox = Mailbox::find($idMailbox);
            $mailbox->id_status_mailbox = 2; // 2: Sent
            $mailbox->waktu_kirim = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu konsep
            $mailbox->save();

            // Get user id of arahan surat
            try {
                $user = User::where('id_unit_kerja', $id_arahan)
                    ->whereNotNull('id_jabatan')
                    ->firstOrFail();
            } catch (\Throwable $th) {
                throw $th;
            }

            // Insert new mailbox record for recepient
            Mailbox::Insert([
                'id_user'           => $user->id,
                'id_parent_mailbox' => $idMailbox,
                'id_status_mailbox' => 3, // 3: Inbox
                'id_surat_masuk'    => $mailbox->id_surat_masuk,
                'id_konsep_surat'   => $mailbox->id_konsep_surat,
                'waktu_terima'      => Mailbox::raw('CURRENT_TIMESTAMP'),
                'created_at'        => Mailbox::raw('CURRENT_TIMESTAMP'),
            ]);

            // Create mailbox for recepient
            // $mailbox = new Mailbox();
            // $mailbox->id_status_mailbox = 3; // 3: Inbox
            // $mailbox->waktu_terima = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu konsep
            // $mailbox->save();

            return response()->json($suratKeluarKonsep);
        } else {
            App::abort(500, 'Gagal menyimpan data');
        }
        // return response()->json($suratKeluar);

        echo '<br>surat_keluar_konsep_id : ' . request('surat_keluar_konsep_id');
        echo '<br>surat_keluar_konsep_arahan_id : ' . request('surat_keluar_konsep_arahan_id');
        exit;
    }

    public function updatejson($id)
    {

        dd(auth()->user());

        $suratKeluar = SuratKeluarKonsep::find($id);

        var_dump($suratKeluar->status);
        echo "suratKeluar->status";

        $lastRow = count($suratKeluar->status['detail']) - 1;
        $status  = $suratKeluar->status;

        // modif
        $status['detail'][$lastRow]['id_user'] = 5;
        var_dump($status);
        echo "status";

        $suratKeluar->status = $status;


        $suratKeluar->save();
        // $ret = $suratKeluar->status['detail'][$lastRow]['created_at'];
        // dd($ret);

        // $status = json_decode($suratKeluar->status, true);
        // dd($status);
    }

    public function generatedocx($id)
    {
        $suratKeluar = SuratKeluarKonsep::find($id);

        $file_jenis_dokumen = [
            '',
            'agenda',
            'memo',
            'surat_dinas',
            'surat_tugas',
            'surat_keputusan',
            'undangan',
        ];

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('template/'.$file_jenis_dokumen[$suratKeluar->id_jenis_dokumen].'.docx'));
        $suratKeluar->tanggal_surat = Carbon::parse($suratKeluar->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') ?: '';
        // $suratKeluar->tanggal_surat = $suratKeluar->tanggal_surat->locale('id');->isoFormat('D MMMM Y') ?: '';

        $templateProcessor->setValues([
            'nomor_surat'                => $suratKeluar->nomor_surat ?: '',
            'tanggal_surat'              => $suratKeluar->tanggal_surat ?: '',
            'lampiran'                   => $suratKeluar->lampiran ?: '',
            'perihal'                    => $suratKeluar->perihal ?: '',
            'kepada'                     => $suratKeluar->kepada ?: '',
            'alamat'                     => $suratKeluar->alamat ?: '',
            'kota_penandatangan'         => $suratKeluar->kota_penandatangan ?: '',
            'jabatan_penandatangan'      => $suratKeluar->jabatan_penandatangan ?: '',
            'nama_pejabat_penandatangan' => $suratKeluar->nama_pejabat_penandatangan ?: '',
            // 'isi_surat'     => 'test', //$suratKeluar->isi_surat ?: '',
            // 'tembusan'      => 'test', //$suratKeluar->tembusan ?: '',
            // 'date' => date('Y-m-d'),
        ]);

        // $templateProcessor->setValue('isi_surat', utf8_decode($suratKeluar->isi_surat ?: ''));
        // $templateProcessor->setValue('tembusan', htmlentities($suratKeluar->tembusan ?: ''));
        // $templateProcessor->setComplexBlock('SomePlaceholder', $wordTable);
        // $templateProcessor->setComplexBlock('isi_surat', $suratKeluar->isi_surat ?: '');
        // $templateProcessor->setComplexBlock('tembusan', $suratKeluar->tembusan ?: '');

        // $parser = new \HTMLtoOpenXML\Parser();
        // \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(false);
        // $ooXml = $parser->fromHTML('<p><strong>Test</strong></p>');
        // $phpWord->setValue($variable, $ooXml);
        // \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);


        $parser = new \HTMLtoOpenXML\Parser();
        // $ooXml = ;
        $templateProcessor->setValue('isi_surat', $parser->fromHTML($suratKeluar->isi_surat ?: ''));
        $templateProcessor->setValue('tembusan', $parser->fromHTML($suratKeluar->tembusan ?: ''));

        // $toOpenXML = HTMLtoOpenXML::getInstance()->fromHTML("<p>te<b>s</b>t</p>");
        // $templateProcessor->setValue('test', $toOpenXML);

        // dd($suratKeluar->isi_surat);

        // header("Content-Disposition: attachment; filename=surat_dinas.docx");
        // $templateProcessor->saveAs('php://output');
        // $templateProcessor->saveAs('surat_dinas.docx');

        $file = $file_jenis_dokumen[$suratKeluar->id_jenis_dokumen] . "_" . time() . ".docx";

        header("Content-Description: File Transfer");
        // header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        // $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor, 'Word2007');
        $templateProcessor->saveAs("php://output");
        // $templateProcessor->saveAs($file);
        // return response()->download(storage_path($file));


        //         $phpWord = new \PhpOffice\PhpWord\PhpWord();
        //         $section = $phpWord->addSection();
        //         $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        // tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        // quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        // consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        // cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        // proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
        //         $section->addImage("https://ilmucoding.com/wp-content/uploads/2020/01/Tutorial-Belajar-Framework-Laravel.jpg");
        //         $section->addText($description);
        //         $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        //         try {
        //             $objWriter->save(storage_path('helloWorld.docx'));
        //         } catch (Exception $e) {
        //         }
        //         return response()->download(storage_path('helloWorld.docx'));
    }

    public function generatePdfFromDoc()
    {
        $suratKeluarKonsepId = request('surat_keluar_konsep_id');

        $suratKeluar = SuratKeluarKonsep::find($suratKeluarKonsepId);

        $file_jenis_dokumen = [
            '',
            'agenda',
            'memo',
            'surat_dinas',
            'surat_tugas',
            'surat_keputusan',
            'undangan',
        ];

        /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        /*@ Reading doc file */
        // $template = new \PhpOffice\PhpWord\TemplateProcessor(public_path('result.docx'));

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('template/'.$file_jenis_dokumen[$suratKeluar->id_jenis_dokumen].'.docx'));
        $suratKeluar->tanggal_surat = Carbon::parse($suratKeluar->tanggal_surat)->locale('id')->isoFormat('D MMMM Y') ?: '';
        // $suratKeluar->tanggal_surat = $suratKeluar->tanggal_surat->locale('id');->isoFormat('D MMMM Y') ?: '';

        $template->setValues([
            'nomor_surat'                => $suratKeluar->nomor_surat ?: '',
            'tanggal_surat'              => $suratKeluar->tanggal_surat ?: '',
            'lampiran'                   => $suratKeluar->lampiran ?: '',
            'perihal'                    => $suratKeluar->perihal ?: '',
            'kepada'                     => $suratKeluar->kepada ?: '',
            'alamat'                     => $suratKeluar->alamat ?: '',
            'kota_penandatangan'         => $suratKeluar->kota_penandatangan ?: '',
            'jabatan_penandatangan'      => $suratKeluar->jabatan_penandatangan ?: '',
            'nama_pejabat_penandatangan' => $suratKeluar->nama_pejabat_penandatangan ?: '',
            // 'isi_surat'                  => $suratKeluar->isi_surat ?: '',
            // 'tembusan'                   => $suratKeluar->tembusan ?: '',
            // 'date' => date('Y-m-d'),
        ]);

        /*@ Replacing variables in doc file */
        // $template->setValue('date', date('d-m-Y'));
        // $template->setValue('title', 'Mr.');
        // $template->setValue('firstname', 'Scratch');
        // $template->setValue('lastname', 'Coder');

        $parser = new \HTMLtoOpenXML\Parser();
        // $ooXml = ;
        $template->setValue('isi_surat', $parser->fromHTML($suratKeluar->isi_surat ?: ''));
        $template->setValue('tembusan', $parser->fromHTML($suratKeluar->tembusan ?: ''));

        /*@ Save Temporary Word File With New Name */
        $saveDocPath = storage_path('uploads/doc/new-result.docx');
        $template->saveAs($saveDocPath);

        // Load temporarily create word file
        $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

        $cmd = 'export HOME=/tmp && libreoffice --headless -convert-to pdf --outdir ./tmp ' . $saveDocPath;
        $cmd = "unoconv -vvv -f pdf {$saveDocPath}";
        $cmd = "unoconv -f pdf {$saveDocPath}";
        echo $cmd;
        $ret = shell_exec($cmd);

        dd($ret);

        // $process = new Process("HOME=".getCWD()." && export HOME && libreoffice --headless --convert-to pdf store/mar_maribov_higher_results.docx --outdir store");
        // $process->run();
        // return $path_copy_pdf;

        //Save it into PDF
        $savePdfPath = storage_path('uploads/pdf/new-result.pdf');

        /*@ If already PDF exists then delete it */
        if ( file_exists($savePdfPath) ) {
            unlink($savePdfPath);
        }

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save($savePdfPath);

        echo 'File has been successfully converted';

        /*@ Remove temporarily created word file */
        if ( file_exists($saveDocPath) ) {
            unlink($saveDocPath);
        }

    }

    public function testJson($id)
    {
        DB::enableQueryLog();
        // JSON : {"flag":1,"user":[{"id_user":28,"id_unit_kerja":15,"flag":1}, {"id_user":25,"id_unit_kerja":15,"flag":1}]}
        // {"flag":2,"user":[{"id_user":28,"id_unit_kerja":15,"flag":1}, {"id_user":25,"id_unit_kerja":15,"flag":1}]}
        // select * from `trans_surat_keluar_konsep` where json_contains(`status`, '[{"id_user":28}]', '$."user"') and (json_contains(`status`, 2, '$."flag"'));
        $q = SuratKeluarKonsep::whereJsonContains('status->user', [['id_user' => 28]])
                ->where(function ($query) {
                    $query->whereJsonContains('status->flag', 2);
                })

        // $q = SuratKeluarKonsep::whereJsonContains('status->flag', 1)
            // ->whereJsonContains('status->progress', ['1', '2'])
            // ->whereJsonContains('status->progress', ['1', '2'])
            // ->whereJsonContains('status', [['progress' => 2], ['id_user' => 2]])
            // ->where('status->progress', '=', 3)
            //
        ;
        print_r($q->getBindings());
        $data = $q->get();
        // $data = $q->toSql();
        // echo "<pre>".print_r($data, true)."</pre>";
        echo print_r($data, true);
        dd(DB::getQueryLog());

        // $request->merge([
        //     'id_jenis_dokumen' => 1,
        //     'id_sifat_keamanan_surat' => 1,
        //     'id_sifat_penyelesaian_surat' => 1,
        //     'jabatan_penandatangan' => 1,
        //     'kepada' => 1,
        //     'kota_penandatangan' => 1,
        //     'perihal' => 1,
        //     'tanggal_surat' => '2021-02-04',
        //     'status' => [
        //         'progress' => 3,
        //         'detail' => [
        //             ['id_user' => 3, 'created_at' => '2021-02-04'],
        //             ['id_user' => 6, 'created_at' => '2021-02-05'],
        //         ]
        //     ]
        // ]);

        // $messages = [
        //     'required' => ':attribute wajib diisi',
        //     'min' => ':attribute harus diisi minimal :min karakter',
        //     'max' => ':attribute harus diisi maksimal :max karakter',
        // ];

        // $validator = Validator::make(request()->all(), SuratKeluarKonsep::rules(), $messages);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()]);
        // }

        // if ($surat_keluar = SuratKeluarKonsep::updateOrCreate(['id' =>  request('id')], request()->except(['_token']))) {
        //     return response()->json(['success' => 'Surat keluar berhasil direkam.', 'data' => $surat_keluar]);
        // } else {
        //     App::abort(500, 'Gagal menyimpan data');
        // }

        /*
        // $q = SuratKeluarKonsep::where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))
        // $q = SuratKeluarKonsep::where('status->detail->id_user', '=', 6)
        DB::enableQueryLog();
        $q = SuratKeluarKonsep::whereJsonContains('status->detail', [['id_user' => 6]]) // - bisa
            // ->whereJsonContains('status->progress', ['1', '2'])
            // ->whereJsonContains('status->progress', ['1', '2'])
            // ->whereJsonContains('status', [['progress' => 2], ['id_user' => 2]])
            // ->where('status->progress', '=', 3)
            //
        ;
        print_r($q->getBindings());
        // $data = $q->get();
        dd(DB::getQueryLog());

        $data = $q->toSql();
        dd($data);
        $data = $q->get();
        dd($data);

        return response()->json($data);
        */
    }
}

<?php

namespace App\Http\Controllers\Surat;

use PDF;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Surat\Mailbox;
use App\Models\Surat\SuratMasuk;
use App\Models\Surat\CounterSurat;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Surat\EmailController;

/**
 * Class SuratMasukController
 * @package App\Http\Controllers
 */
class SuratMasukController extends SuratController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $idArahanSurat     = auth()->user()->id_unit_kerja;
            $idStatusDisposisi = request('status') ?? 0;
            $idUser            = auth()->user()->id;
            $idStatusMailbox   = request('statusMailbox') ?? 3;

            if ($idStatusMailbox >= 99) {

                if ($idArahanSurat != 1) {
                    /** Non TU */
                    $data = SuratMasuk::with('jenisSuratMasuk', 'disposisiSurat', 'currentDisposisiSurat')
                        ->whereHas('disposisiSurat', function ($q) use ($idArahanSurat, $idStatusDisposisi) {
                            $q->where(function ($qa) use ($idArahanSurat) {
                                $qa->where('id_arahan_surat_dari', '=', $idArahanSurat)
                                    ->orWhere('id_arahan_surat', '=', $idArahanSurat);
                            });
                        })
                        ->orderByRaw('tanggal_agenda desc, created_at desc')
                        ->get();
                } else {
                    /** TU */
                    $data = SuratMasuk::with('jenisSuratMasuk', 'currentDisposisiSurat')
                        ->orderByRaw('tanggal_agenda desc, created_at desc')
                        ->get();
                }
                // ::join('posts', 'users.id', '=', 'posts.user_id')->get(['users.*', 'posts.descrption'])

            } else {
                $data = SuratMasuk::join('mailbox', 'trans_surat_masuk.id', '=', 'mailbox.id_surat_masuk')
                    // ->with('jenisSuratMasuk') //, 'mailbox'
                    // ->whereHas('mailbox', function ($q) use ($idUser, $idStatusMailbox) {
                    //     $q->where('id_user', $idUser)->where('id_status_mailbox', $idStatusMailbox);
                    // })
                    ->where('id_user', $idUser)->where('id_status_mailbox', $idStatusMailbox)
                    ->orderByRaw('tanggal_agenda desc, trans_surat_masuk.id desc')
                    ->get(['trans_surat_masuk.*', 'mailbox.*', 'trans_surat_masuk.id AS id', 'mailbox.id AS id_mailbox']);
            }

            // dd($data);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (auth()->user()->id_unit_kerja == 1) { // khusus di TU saja
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm surat_masuk-edit">Ubah</a>';
                    }
                    return $btn;
                })
                // ->order(function ($query) {
                //     if (request()->has('name')) {
                //         $query->orderBy('name', 'asc');
                //     }

                //     if (request()->has('email')) {
                //         $query->orderBy('email', 'desc');
                //     }
                // })
                ->rawColumns(['action'])
                ->make(true);
        }

        $this->getAllReferensi();
        $asal_ekspedisi_surat_masuks = $this->referensi['asal_ekspedisi_surat_masuks'];
        $jenis_surat_masuks          = $this->referensi['jenis_surat_masuks'];
        $sifat_keamanan_surats       = $this->referensi['sifat_keamanan_surats'];
        $sifat_penyelesaian_surats   = $this->referensi['sifat_penyelesaian_surats'];
        $jenis_files                 = $this->referensi['jenis_files'];
        $arahan_surats               = $this->referensi['arahan_surats'];
        $status_disposisis           = $this->referensi['status_disposisis'];
        $jenis_disposisis            = $this->referensi['jenis_disposisis'];
        $units                       = $this->referensi['units'];
        $jenis_dokumens              = $this->referensi['jenis_dokumens'];
        $id_unit_kerja_user          = $this->referensi['id_unit_kerja_user'];
        $bawahans                    = $this->referensi['bawahans'];
        $atasan                      = $this->referensi['atasan'];
        $id_unit_kerja_atasan        = $this->referensi['id_unit_kerja_atasan'];

        return view('surat.surat-masuk.index', compact(['asal_ekspedisi_surat_masuks', 'jenis_surat_masuks', 'sifat_keamanan_surats', 'sifat_penyelesaian_surats', 'jenis_files', 'arahan_surats', 'status_disposisis', 'jenis_disposisis', 'units', 'bawahans', 'id_unit_kerja_atasan', 'jenis_dokumens']));
    }

    /**
     * Cek nomor surat apakah double.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function cekNomorSurat(Request $request)
    {
        if ($suratMasuk = SuratMasuk::where('nomor_surat', '=', request('nomor_surat'))->first()) {
            // dd($suratMasuk->nomor_agenda);
            return response()->json(['success' => false, 'nomor_agenda' => $suratMasuk->nomor_agenda, 'tanggal_agenda' => $suratMasuk->tanggal_agenda]);
        } else {
            return response()->json(['success' => true]);
        }
    }

    /**
     * Kirim surat ke user tertentu.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public static function kirimSurat(Request $request)
    {
        $ceklistArahanSurat = 40; //  id user temporary untuk menyimpan semua data

        // Update current mailbox from draft (1) to sent (2)
        $mailbox = Mailbox::find(request('id_mailbox')); //dd($mailbox);
        $mailbox->id_status_mailbox    = 2;                                 // 2: Sent
        $mailbox->ceklist_arahan_surat = $ceklistArahanSurat;               // Id User yang mau dikirim
        $mailbox->waktu_kirim          = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu pengiriman
        $mailbox->save();

        $arrArahanSurats = explode(',', $ceklistArahanSurat);

        foreach ($arrArahanSurats as $arrArahanSurat) {
            // Insert new mailbox record for recepient
            Mailbox::Insert([
                'id_user'                 => $arrArahanSurat,
                'id_parent_mailbox'       => $mailbox->id,
                'id_status_mailbox'       => 3, // 3: Inbox
                'id_surat_masuk'          => $mailbox->id_surat_masuk,
                // 'id_konsep_surat'         => '',
                // 'id_surat_keluar'         => '',
                // 'ceklist_arahan_surat'    => request('id_arahan_surat'),
                'ceklist_disposisi_surat' => '7',
                'disposisi_surat'         => 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi',
                'waktu_terima'            => Mailbox::raw('CURRENT_TIMESTAMP'),
                'created_at'              => Mailbox::raw('CURRENT_TIMESTAMP'),

                // 'id_arahan_surat_dari'    => auth()->user()->id_unit_kerja,
                // 'id_arahan_surat'         => request('id_arahan_surat'),
            ]);
        }

        return response()->json([
            'success'        => true,
            'surat_masuk_id' => request('surat_masuk_id'),
            'mailbox_id'     => request('mailbox_id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* request last number if new record */
        $idJenisSurat = 1;
        $newNumber = $this->_getLastNumberOfSurat($request, $idJenisSurat);

        if ($surat_masuk = SuratMasuk::updateOrCreate(['id' => request('id')], request()->except(['_token']))) {

            /* update last number if new record */
            if (empty(request('id'))) {
                /* Get new number from counter */
                CounterSurat::updateOrInsert(
                    [
                        ['id_jenis_surat', '=', $idJenisSurat],
                        ['year', '=', Carbon::now()->format('Y')]
                    ],
                    ['last_number' => $newNumber]
                );

                /* Insert disposisi surat */
                Mailbox::Insert([
                    'id_user'                 => auth()->user()->id,
                    // 'id_parent_mailbox'       => '',
                    'id_status_mailbox'       => 1, // 1: Draft
                    'id_surat_masuk'          => $surat_masuk->id,
                    // 'id_konsep_surat'         => '',
                    // 'id_surat_keluar'         => '',
                    'ceklist_arahan_surat'    => request('id_arahan_surat'),
                    'ceklist_disposisi_surat' => '7',
                    'disposisi_surat'         => 'Pengiriman surat dari TU Biro Perencanaan dan Organisasi',
                    'waktu_konsep'            => Mailbox::raw('CURRENT_TIMESTAMP'),
                    'created_at'              => Mailbox::raw('CURRENT_TIMESTAMP'),

                    // 'id_arahan_surat_dari'    => auth()->user()->id_unit_kerja,
                    // 'id_arahan_surat'         => request('id_arahan_surat'),
                ]);

                /* Kirim email kepada pengirim */
                if (config('surat.send_email_to_sender', true) && !empty(request('email_pengirim'))) {
                    EmailController::sendSuratStatus($request);
                    Log::info('start kirim email');
                }
            }

            return response()->json(['success' => 'Surat masuk berhasil direkam.', 'data' => $surat_masuk]);
        } else {

            App::abort(500, 'Gagal menyimpan data');
        }
    }

    private function _getLastNumberOfSurat($request, $idJenisSurat)
    {
        if (empty(request('id'))) {
            $lastNumber = CounterSurat::where([
                ['id_jenis_surat', '=', $idJenisSurat],
                ['year', '=', Carbon::now()->format('Y')]
            ])
                ->value('last_number');

            if ($lastNumber == '') {
                /* Create New Counter for this YEAR */
                CounterSurat::insert(
                    [
                        'id_jenis_surat' => $idJenisSurat,
                        'year' => Carbon::now()->format('Y'),
                        'last_number' => '1'
                    ]
                );
            }
            $newNumber = $lastNumber + 1;
            $no_agenda = $newNumber . '/BUA.1/' . Carbon::now()->format('m') . '/' . Carbon::now()->format('Y');
            /* set tanggal and nomor agenda */
            $request->merge([
                'tanggal_agenda' => Carbon::now(),
                'nomor_agenda' => $no_agenda
            ]);
        }

        return $newNumber;
    }

    private function diffInHumans($startDate, $endDate)
    {
        $days = $startDate->diffInDays($endDate);
        $hours = $startDate->copy()->addDays($days)->diffInHours($endDate);
        $minutes = $startDate->copy()->addDays($days)->addHours($hours)->diffInMinutes($endDate);

        return ($days ? $days . ' hari' : '') . ' ' . ($hours ? $hours . ' jam' : '') . ' ' . ($minutes ? $minutes . ' menit' : '');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratMasuk = SuratMasuk::find($id);
        $last = '';
        $diff = [];
        foreach ($suratMasuk->disposisiSurat as $disposisiSurat) {
            if ($last != '') {
                $startDate = Carbon::parse($last);
                $endDate = Carbon::parse($disposisiSurat->created_at);
                $diff[] = $this->diffInHumans($startDate, $endDate);
            } else {
                $diff[] = '';
            }
            $last = $disposisiSurat->created_at;
        }
        // exit;
        return response()->json($suratMasuk);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        SuratMasuk::find($id)->delete();

        return response()->json(['success' => 'SuratMasuk deleted successfully.']);
    }

    public function cetakPDF()
    {
        // $data = [];

        // $pdf = PDF::loadView('pdf.memo', $data);
        // // download PDF file with download method
        // return $pdf->download('pdf_file.pdf');

        \PhpOffice\PhpWord\Settings::setPdfRendererPath('../vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        $nomor_surat = 'A';
        $kepada = 'A';

        $template = new \PhpOffice\PhpWord\TemplateProcessor(storage_path('template/memo.docx'));
        $template->setValue('nomor_surat', $nomor_surat);
        $template->setValue('kepada', $kepada);

        $path = storage_path('temp_memo.docx');
        $template->saveAs($path);

        $temp = \PhpOffice\PhpWord\IOFactory::load($path);
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($temp, 'PDF');
        $xmlWriter->save(storage_path('temp_memo.pdf'), TRUE);
        return response()->download(storage_path('temp_memo.pdf'));
    }

    public function setMailboxRead()
    {
        $id = request('id');
        $mailbox = Mailbox::findOrFail($id);
        $mailbox->waktu_baca = Mailbox::raw('CURRENT_TIMESTAMP');
        $mailbox->save();
    }
}
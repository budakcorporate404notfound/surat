<?php

namespace App\Http\Controllers\Surat;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Surat\Mailbox;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Surat\DisposisiSurat;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Surat\EmailController;

/**
 * Class DisposisiSuratController
 * @package App\Http\Controllers
 */
class DisposisiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DisposisiSurat::where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))
                ->orderBy('created_at', 'ASC')
                ->get();
            // dd($data);
            if (request('type' ?? false)) {
                echo "json";
            } else {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('dari', function ($row) {
                        $btn = (($row->id_arahan_surat_dari == auth()->user()->id_unit_kerja && auth()->user()->id_jabatan != '') // || $row->id_arahan_surat_iduser == auth()->user()->id
                            ? '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit surat-disposisi-surat-edit">' . ($row->arahanSuratDari->arahan_surat ?? "") . '</a>'
                            : ($row->arahanSuratDari->arahan_surat ?? ""));
                        return 'dari:<br>'.$btn;
                    })
                    ->addColumn('kepada', function ($row) {
                        $find = [1, 2, 3, 4, 5, 6, 7, 8, 9];
                        $replace = [' Untuk diketahui', ' Ditelaah', ' Untuk Pembicaraan', ' Siapkan Jawaban', ' Sebarkan/Edarkan', ' Arsipkan', ' Dokumen Terlampir'];
                        return '<u>Kepada: <b>' . ($row->arahanSuratUser->name ?? $row->arahanSurat->arahan_surat) . '</b></u><br>' . $row->disposisi_surat . '<br>disposisi: ' . str_replace($find, $replace, $row->ceklist_disposisi_surat);
                    })
                    ->addColumn('for_me', function ($row) {
                        return (($row->id_arahan_surat == auth()->user()->id_unit_kerja && auth()->user()->id_jabatan != '') || ($row->id_arahan_surat_iduser == auth()->user()->id) ? true : false);
                    })
                    ->rawColumns(['dari', 'kepada'])
                    ->make(true);
            }
        }

        return view('surat.disposisi-surat.index');
    }

    public function getAllDisposisi(Request $request)
    {
        $disposisiSurat = DisposisiSurat::select(['id_arahan_surat', 'id_arahan_surat_iduser'])
            ->where('id_surat_masuk', '=', request('id' ?? 0))
            ->get();
        return response()->json($disposisiSurat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_arahan_surat = request('id_arahan_surat') ?? [];
        $id_arahan_surat_iduser = request('id_arahan_surat_iduser') ?? [];
        // dd(count($id_arahan_surat));

        $request->merge([
            'ceklist_disposisi_surat' => implode(',', request('ceklist_disposisi_surat')),
            'id_arahan_surat_dari' => auth()->user()->id_unit_kerja,
            'id_status_disposisi' => (1 + (auth()->user()->id_jabatan * 2)), // Karo Ke Kabag
            // 'id_arahan_surat_iduser' => auth()->user()->id
        ]);

        $str = '';

        // Untuk disposisi ke struktural
        if (count($id_arahan_surat) > 0) {
            for ($i=0, $c=count($id_arahan_surat); $i<$c; $i++) {
                $request->merge([
                    'id_arahan_surat' => $id_arahan_surat[$i],
                    'id_arahan_surat_iduser' => 0
                ]);
                $str .= " {$i} : ".$id_arahan_surat[$i];

                if (DisposisiSurat::updateOrCreate(['id' => request('id')], request()->except(['_token']))) {
                    try {
                        $user = User::where('id_unit_kerja', $id_arahan_surat[$i])
                            ->whereNotNull('id_jabatan')
                            ->firstOrFail();
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    // Insert new mailbox record for recepient
                    Mailbox::Insert([
                        'id_user'                 => $user->id,
                        'id_parent_mailbox'       => request('id_mailbox') ?? 0,
                        'id_status_mailbox'       => 3, // 3: Inbox
                        'id_surat_masuk'          => request('id_surat_masuk'),
                        'ceklist_disposisi_surat' => request('ceklist_disposisi_surat'),
                        'disposisi_surat'         => request('disposisi_surat'),
                        'waktu_terima'            => Mailbox::raw('CURRENT_TIMESTAMP'),
                        'created_at'              => Mailbox::raw('CURRENT_TIMESTAMP'),
                    ]);

                } else {
                    App::abort(500, 'Gagal menyimpan data');
                }
            }
        }

        // Untuk disposisi ke pelaksana
        if (count($id_arahan_surat_iduser) > 0) {
            for ($i=0, $c=count($id_arahan_surat_iduser); $i<$c; $i++) {

                $request->merge([
                    'id_arahan_surat' => 0,
                    'id_arahan_surat_iduser' => $id_arahan_surat_iduser[$i]]
                );

                $str .= " {$i} : ".$id_arahan_surat_iduser[$i];

                if (DisposisiSurat::updateOrCreate(['id' => request('id')], request()->except(['_token']))) {

                    // Insert new mailbox record for recepient
                    Mailbox::Insert([
                        'id_user'                 => $id_arahan_surat_iduser[$i],
                        'id_parent_mailbox'       => request('id_mailbox') ?? 0,
                        'id_status_mailbox'       => 3, // 3: Inbox
                        'id_surat_masuk'          => request('id_surat_masuk'),
                        'ceklist_disposisi_surat' => request('ceklist_disposisi_surat'),
                        'disposisi_surat'         => request('disposisi_surat'),
                        'waktu_terima'            => Mailbox::raw('CURRENT_TIMESTAMP'),
                        'created_at'              => Mailbox::raw('CURRENT_TIMESTAMP'),
                    ]);
                } else {
                    App::abort(500, 'Gagal menyimpan data');
                }
            }
        }

        // Update mailbox of sender
        $mailbox = Mailbox::find(request('id_mailbox'));
        $mailbox->id_status_mailbox    = 2;                                 // 2: Terkirim
        $mailbox->waktu_proses         = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu proses
        $mailbox->waktu_kirim          = Mailbox::raw('CURRENT_TIMESTAMP'); // Waktu pengiriman
        $mailbox->save();


        if (config('surat.send_email_to_disposisi', false)) {
            // dd($user);
            // EmailController::sendSuratStatus(request('email_pengirim'), request('pejabat_pengirim_surat'));
            // Log::info('start kirim disposisi');
            EmailController::sendDisposisiStatus($user, $request);
        }

        return response()->json(['success' => 'Surat masuk berhasil direkam.'.$str]);
    }

    // public function aa($val)
    // {
    //     /* update last number if new record */
    //     if (empty(request('id'))) {
    //         // Kirim email status
    //         /* Get user from id_arahan_surat_iduser or id_arahan_surat */
    //         if (request('id_arahan_surat_iduser') > 0) {
    //             $user = User::where('id', '=', request('id_arahan_surat_iduser'))->firstOrFail();
    //         } else {
    //             $user = User::where('id_unit_kerja', '=', $id_arahan_surat[$i])
    //                 ->whereNotNull('id_jabatan')
    //                 ->firstOrFail();
    //         }

    //         // Kirim email kepada pengirim
    //         // if (config('surat.send_email_to_disposisi', false) && !empty(request('email_pengirim'))) {
    //         // dd($user);

    //         if (config('surat.send_email_to_disposisi', false)) {
    //             // dd($user);
    //             // EmailController::sendSuratStatus(request('email_pengirim'), request('pejabat_pengirim_surat'));
    //             // Log::info('start kirim disposisi');
    //             EmailController::sendDisposisiStatus($user, $request);
    //             // dd('done');
    //         } else {
    //             Log::info('config surat.send_email_to_disposisi set to FALSE');
    //             // dd('failed');
    //         }
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disposisiSurat = DisposisiSurat::find($id);
        return response()->json($disposisiSurat);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DisposisiSurat::find($id)->delete();

        return response()->json(['success' => 'DisposisiSurat deleted successfully.']);
    }
}

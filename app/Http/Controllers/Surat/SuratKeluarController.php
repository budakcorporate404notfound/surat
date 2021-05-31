<?php

namespace App\Http\Controllers\Surat;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Surat\SuratKeluar;
use App\Models\Surat\CounterSurat;
use App\Models\Surat\JenisDokumen;
use App\Models\Surat\SuratKeluarTemp;
use Illuminate\Support\Facades\Cache;
use App\Models\Surat\SifatKeamananSurat;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Surat\SifatPenyelesaianSurat;

/**
 * Class SuratKeluarController
 * @package App\Http\Controllers
 */
class SuratKeluarController extends SuratController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SuratKeluar::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm surat-surat-keluar-edit">Ubah</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $sifat_keamanan_surats = Cache::rememberForever('SifatKeamananSurat', function () {
            return SifatKeamananSurat::all();
        });

        $sifat_penyelesaian_surats = Cache::rememberForever('SifatPenyelesaianSurat', function () {
            return SifatPenyelesaianSurat::all();
        });

        $jenis_dokumens = Cache::rememberForever('JenisDokumen', function () {
            return JenisDokumen::where('tipe', '2')->get();
        });

        return view('surat.surat-keluar.index-full', compact(['jenis_dokumens', 'sifat_keamanan_surats', 'sifat_penyelesaian_surats']));
    }

    private function setNomorSurat(Request $request)
    {
        $ID_JENIS_SURAT = request('id_jenis_dokumen');
        $is_sisip = false;

        /* new record */
        if (empty(request('id'))) {
            if ($format_penomoran = JenisDokumen::find($ID_JENIS_SURAT)) {

                /* Get last number of jenis surat */
                $last_number = CounterSurat::where([
                    ['id_jenis_surat', '=', $ID_JENIS_SURAT],
                    ['year', '=', Carbon::now()->format('Y')]
                ])
                    ->value('last_number');

                /* Create one if not exist */
                if ($last_number == '') {
                    CounterSurat::insert(
                        [
                            'id_jenis_surat' => $ID_JENIS_SURAT,
                            'year' => Carbon::now()->format('Y'),
                            'last_number' => '1'
                        ]
                    );
                }

                /* Check whether tanggal surat under last data tanggal surat */
                if (SuratKeluar::where('tanggal_surat', '>', request('tanggal_surat'))->take(1)->latest('id')->value('nomor_surat')) {

                    /* Merupakan surat sisip */
                    $is_sisip = true;
                    $nomor_surat = SuratKeluar::where('tanggal_surat', request('tanggal_surat'))
                        ->take(1)
                        ->latest('id')
                        ->value('nomor_surat');

                    preg_match_all('/([0-9]+)([a-z]+)\/([A-Za-z]+)/i', $nomor_surat, $arr);

                    if (count($arr[2]) == 0) {
                        $next_alphabeth = 'a';
                        $no_from_nomor_surat = substr($nomor_surat, 0, strpos($nomor_surat, '/'));
                    } else {
                        $alpabeth = "abcdefghijklmnopqrstuvwxyz";
                        $next_alphabeth = (substr($alpabeth, strpos($alpabeth, $arr[2][0]) + 1, 1));
                        $no_from_nomor_surat = $arr[1][0];
                    }

                    $new_number = "{$no_from_nomor_surat}{$next_alphabeth}";
                } else {
                    $new_number = $last_number + 1;
                }

                $no_surat = sprintf($format_penomoran->format_penomoran, $new_number, Carbon::now()->format('m'), Carbon::now()->format('Y'));

                /* set nomor surat */
                $request->merge([
                    'nomor_surat' => $no_surat
                ]);

                return [
                    'is_sisip' => $is_sisip,
                    'new_number' => $new_number,
                ];
            } else {

                App::abort(500, 'Jenis dokumen tidak tersedia');
            }
        }
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

        $validator = Validator::make(request()->all(), SuratKeluar::rules(), $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $ID_JENIS_SURAT = request('id_jenis_dokumen');
        $nomor_surat = $this->setNomorSurat($request);

        if ($surat_keluar = SuratKeluar::updateOrCreate(['id' =>  request('id')], request()->except(['_token']))) {

            /* update last number if new record */
            if (empty(request('id'))) {
                /* Get new number from counter if not sisip surat */
                if ($nomor_surat['is_sisip'] == false) {
                    CounterSurat::updateOrInsert(
                        [
                            ['id_jenis_surat', '=', $ID_JENIS_SURAT],
                            ['year', '=', Carbon::now()->format('Y')]
                        ],
                        ['last_number' => $nomor_surat['new_number']]
                    );
                }
            }

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
        $suratKeluar = SuratKeluar::find($id);
        return response()->json($suratKeluar);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        SuratKeluar::find($id)->delete();

        return response()->json(['success' => 'SuratKeluar deleted successfully.']);
    }
}

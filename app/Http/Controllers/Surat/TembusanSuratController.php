<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\TembusanSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class TembusanSuratController
 * @package App\Http\Controllers
 */
class TembusanSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TembusanSurat::latest()->where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex"><div><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit surat-tembusan-surat-edit">' . ($row->unit->unit ?? $row->tembusan_surat) . '</a></div>';
                    $btn = $btn . '<div class="ml-auto"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="surat-tembusan-surat-delete"><i class="fas fa-trash"></i></a></div></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('surat.tembusan-surat.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TembusanSurat::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success' => 'TembusanSurat saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tembusanSurat = TembusanSurat::find($id);
        return response()->json($tembusanSurat);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        TembusanSurat::find($id)->delete();

        return response()->json(['success' => 'TembusanSurat deleted successfully.']);
    }
}

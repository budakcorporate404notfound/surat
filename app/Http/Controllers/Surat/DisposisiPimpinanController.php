<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\DisposisiPimpinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class DisposisiPimpinanController
 * @package App\Http\Controllers
 */
class DisposisiPimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DisposisiPimpinan::where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex"><div><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit surat-disposisi-pimpinan-edit">' . ($row->unit->jabatan ?? '') . '</a><br>';
                    $btn = $btn . '<span class="font-weight-lighter">' . $row->disposisi_pimpinan . '</span></div>';
                    $btn = $btn . '<div class="ml-auto"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete surat-disposisi-pimpinan-delete"><i class="fas fa-trash"></i></a></div></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('surat.disposisi-pimpinan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DisposisiPimpinan::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success' => 'DisposisiPimpinan saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disposisiPimpinan = DisposisiPimpinan::find($id);
        return response()->json($disposisiPimpinan);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DisposisiPimpinan::find($id)->delete();

        return response()->json(['success' => 'DisposisiPimpinan deleted successfully.']);
    }
}

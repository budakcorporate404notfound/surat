<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\AsalEkspedisiSuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class AsalEkspedisiSuratMasukController
 * @package App\Http\Controllers
 */
class AsalEkspedisiSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AsalEkspedisiSuratMasuk::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm asal_ekspedisi_surat_masuk-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm asal_ekspedisi_surat_masuk-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.asal-ekspedisi-surat-masuk.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AsalEkspedisiSuratMasuk::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'AsalEkspedisiSuratMasuk saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asalEkspedisiSuratMasuk = AsalEkspedisiSuratMasuk::find($id);
        return response()->json($asalEkspedisiSuratMasuk);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        AsalEkspedisiSuratMasuk::find($id)->delete();

        return response()->json(['success'=>'AsalEkspedisiSuratMasuk deleted successfully.']);
    }
}

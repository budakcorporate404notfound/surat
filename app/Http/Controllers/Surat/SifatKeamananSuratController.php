<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\SifatKeamananSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class SifatKeamananSuratController
 * @package App\Http\Controllers
 */
class SifatKeamananSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SifatKeamananSurat::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm sifat_keamanan_surat-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm sifat_keamanan_surat-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.sifat-keamanan-surat.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SifatKeamananSurat::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'SifatKeamananSurat saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sifatKeamananSurat = SifatKeamananSurat::find($id);
        return response()->json($sifatKeamananSurat);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        SifatKeamananSurat::find($id)->delete();

        return response()->json(['success'=>'SifatKeamananSurat deleted successfully.']);
    }
}

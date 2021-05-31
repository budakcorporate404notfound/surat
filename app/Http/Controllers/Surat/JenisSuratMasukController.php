<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\JenisSuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class JenisSuratMasukController
 * @package App\Http\Controllers
 */
class JenisSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisSuratMasuk::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm jenis_surat_masuk-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm jenis_surat_masuk-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.jenis-surat-masuk.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisSuratMasuk::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'JenisSuratMasuk saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisSuratMasuk = JenisSuratMasuk::find($id);
        return response()->json($jenisSuratMasuk);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        JenisSuratMasuk::find($id)->delete();

        return response()->json(['success'=>'JenisSuratMasuk deleted successfully.']);
    }
}

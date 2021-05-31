<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\JenisDisposisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class JenisDisposisiController
 * @package App\Http\Controllers
 */
class JenisDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisDisposisi::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm jenis_disposisi-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm jenis_disposisi-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.jenis-disposisi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisDisposisi::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'JenisDisposisi saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisDisposisi = JenisDisposisi::find($id);
        return response()->json($jenisDisposisi);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        JenisDisposisi::find($id)->delete();

        return response()->json(['success'=>'JenisDisposisi deleted successfully.']);
    }
}

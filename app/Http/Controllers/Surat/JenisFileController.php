<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\JenisFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class JenisFileController
 * @package App\Http\Controllers
 */
class JenisFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisFile::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm jenis_file-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm jenis_file-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.jenis-file.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        JenisFile::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'JenisFile saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisFile = JenisFile::find($id);
        return response()->json($jenisFile);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        JenisFile::find($id)->delete();

        return response()->json(['success'=>'JenisFile deleted successfully.']);
    }
}

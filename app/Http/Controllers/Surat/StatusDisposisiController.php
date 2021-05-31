<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\StatusDisposisi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class StatusDisposisiController
 * @package App\Http\Controllers
 */
class StatusDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = StatusDisposisi::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-outline-primary btn-sm status_disposisi-edit">Ubah</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger btn-sm status_disposisi-delete">Hapus</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('surat.status-disposisi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusDisposisi::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success'=>'StatusDisposisi saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusDisposisi = StatusDisposisi::find($id);
        return response()->json($statusDisposisi);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        StatusDisposisi::find($id)->delete();

        return response()->json(['success'=>'StatusDisposisi deleted successfully.']);
    }
}

<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\DiskusiSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

/**
 * Class DiskusiSuratController
 * @package App\Http\Controllers
 */
class DiskusiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DiskusiSurat::where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))->orderBy('created_at', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    return $row->User->name;
                })
                ->make(true);
        }

        return view('surat.diskusi-surat.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'id_user' => auth()->user()->id
        ]);

        DiskusiSurat::updateOrCreate(['id' =>  request('id')], request()->except(['_token']));

        return response()->json(['success' => 'Diskusi surat saved successfully.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diskusiSurat = DiskusiSurat::find($id);
        return response()->json($diskusiSurat);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DiskusiSurat::find($id)->delete();

        return response()->json(['success' => 'Diskusi surat deleted successfully.']);
    }
}

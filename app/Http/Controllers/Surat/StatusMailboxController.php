<?php

namespace App\Http\Controllers\Surat;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Surat\StatusMailbox;

/**
 * Class StatusMailboxController
 * @package App\Http\Controllers
 */
class StatusMailboxController extends SuratController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = StatusMailbox::orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('surat.status-mailbox.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), StatusMailbox::rules(), $this->validation_messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if ($statusMailbox = StatusMailbox::updateOrCreate(['id' => request('id')], request()->except(['_token']))) {
            return response()->json(['success' => 'Data berhasil disimpan.', 'data' => $statusMailbox]);
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
        $statusMailbox = StatusMailbox::find($id);
        return response()->json($statusMailbox);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        StatusMailbox::find($id)->delete();

        return response()->json(['success'=>'Status mailbox deleted successfully.']);
    }
}

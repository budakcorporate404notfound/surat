<?php

namespace App\Http\Controllers\Surat;

use DataTables;
use Illuminate\Http\Request;
use App\Models\Surat\JenisFile;
use App\Models\Surat\FileTanggapan;
use App\Http\Controllers\Controller;

/**
 * Class FileTanggapanController
 * @package App\Http\Controllers
 */
class FileTanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $q = FileTanggapan::where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0));

            if (!empty(request('id_surat_keluar'))) {
                $q = $q->orWhere('id_surat_keluar', '=', request('id_surat_keluar' ?? 0));
            }

            $data = $q->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        $jenis_files = JenisFile::all();

        return view('surat.file-tanggapan.index', compact(['jenis_files']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'file'  => 'required|mimes:jpg,jpeg,png,gif,doc,docx,xls,xlsx,ppt,pptx,pdf,txt|max:' . env('APP_MAX_FILE_UPLOAD', 20480),
        ]);

        $upload_path = public_path('uploads');

        if ($file_name = $request->file->getClientOriginalName()) {
            $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
            if ($request->file->move($upload_path, $generated_new_name)) {
                // dd($request->file->getSize());

                FileTanggapan::updateOrCreate([
                    'id' => request('id'),
                    // 'id_surat_masuk' => request('id_surat_masuk'),
                    'file_tanggapan' => $file_name,
                    'storage_file_name' => $generated_new_name,
                    // 'ukuran_file' => Storage::size("{$upload_path}/{$generated_new_name}"),
                ], request()->except(['_token']));

                return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"', 'file' => $generated_new_name]);
            }
        }

        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fileTanggapan = FileTanggapan::find($id);
        return response()->json($fileTanggapan);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        FileTanggapan::find($id)->delete();

        return response()->json(['success' => 'File tanggapan deleted successfully.']);
    }
}

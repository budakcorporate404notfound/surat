<?php

namespace App\Http\Controllers\Surat;

use App\Models\Surat\DokumenSurat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surat\JenisFile;
use DataTables;
use Illuminate\Support\Facades\Storage;

/**
 * Class DokumenSuratController
 * @package App\Http\Controllers
 */
class DokumenSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        if ($request->ajax()) {
            $data = DokumenSurat::latest()->where('id_surat_masuk', '=', request('id_surat_masuk' ?? 0))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex"><div><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" file-name="' . $row->nama_file . '" data-original-title="Edit" class="edit surat-dokumen-surat-edit">' . $row->dokumen_surat . '</a></div>';
                    $btn = $btn . '<div class="ml-auto"><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn surat-dokumen-surat-delete"><i class="fas fa-trash"></i></a></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $jenis_files = JenisFile::all();

        return view('surat.dokumen-surat.index', compact(['jenis_files']));
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

                DokumenSurat::updateOrCreate([
                    'id' => request('id'),
                    // 'id_surat_masuk' => request('id_surat_masuk'),
                    'dokumen_surat' => $file_name,
                    'nama_file' => $generated_new_name,
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
        $dokumenSurat = DokumenSurat::find($id);
        return response()->json($dokumenSurat);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        DokumenSurat::find($id)->delete();

        return response()->json(['success' => 'DokumenSurat deleted successfully.']);
    }
}

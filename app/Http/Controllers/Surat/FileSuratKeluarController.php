<?php

namespace App\Http\Controllers\Surat;

use DataTables;
use App\Helpers\Eoffice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Surat\FileSuratKeluar;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileSuratKeluarController
 * @package App\Http\Controllers
 */
class FileSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = FileSuratKeluar::latest()->where('id_surat_keluar', '=', request('id_surat_keluar' ?? 0))->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex"><div><a href="' . url("/uploads/" . $row->storage_file_name) . '" target="_blank" data-toggle="tooltip"  data-id="' . $row->id . '" file-name="' . $row->storage_file_name . '" data-original-title="Edit" class="edit file_surat_keluar-edit">' . $row->file_surat_keluar . '</a></div>';
                    $btn = $btn . '<div class="ml-auto">' . Eoffice::bytesToHuman($row->ukuran_file) . '&nbsp; <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn file_surat_keluar-delete"><i class="fas fa-trash"></i></a></div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('surat.file-surat-keluar.index');
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
                $file_size = File::size($upload_path . '/' . $generated_new_name);
                FileSuratKeluar::updateOrCreate([
                    'id' => request('id'),
                    // 'id_surat_masuk' => request('id_surat_masuk'),
                    'file_surat_keluar' => $file_name,
                    'storage_file_name' => $generated_new_name,
                    'ukuran_file' => $file_size,
                ], request()->except(['_token']));

                return response()->json([
                    'success' => 'You have successfully uploaded "' . $file_name . '"',
                    'file' => $generated_new_name,
                    'size' => Eoffice::bytesToHuman($file_size),
                ]);
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
        $fileSuratKeluar = FileSuratKeluar::find($id);
        return response()->json($fileSuratKeluar);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        FileSuratKeluar::find($id)->delete();

        return response()->json(['success' => 'FileSuratKeluar deleted successfully.']);
    }
}

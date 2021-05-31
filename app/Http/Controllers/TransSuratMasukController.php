<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransSuratMasukFormRequest;
use App\Models\Models\TransSuratMasuk;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class TransSuratMasukController
 * @package App\Http\Controllers
 */
class TransSuratMasukController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * CompanyController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->authorizeResource(TransSuratMasuk::class);
    }

    /**
     * @return Builder
     */
    public function getModels(): Builder
    {
        return TransSuratMasuk::search($this->request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $trans_surat_masuks = $this->getModels()->paginate(request('limit'));
        return view('trans_surat_masuks.index', compact('trans_surat_masuks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('trans_surat_masuks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TransSuratMasukFormRequest $request
     * @return RedirectResponse
     */
    public function store(TransSuratMasukFormRequest $request): RedirectResponse
    {
        $trans_surat_masuk = new TransSuratMasuk();
        $trans_surat_masuk->fill(
            $request->all()
        )->save();
        return redirect()->route('trans_surat_masuks.show', compact('trans_surat_masuk'))
            ->with('success_message', trans('messages.create.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param TransSuratMasuk $trans_surat_masuk
     * @return View
     */
    public function show(TransSuratMasuk $trans_surat_masuk): View
    {
        return view('trans_surat_masuks.show', compact('trans_surat_masuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TransSuratMasuk $trans_surat_masuk
     * @return View
     */
    public function edit(TransSuratMasuk $trans_surat_masuk): View
    {
        return view('trans_surat_masuks.edit', compact('trans_surat_masuk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TransSuratMasukFormRequest $request
     * @param TransSuratMasuk $trans_surat_masuk
     * @return RedirectResponse
     */
    public function update(TransSuratMasukFormRequest $request, TransSuratMasuk $trans_surat_masuk): RedirectResponse
    {
        $trans_surat_masuk->fill(
            $request->all()
        )->save();
        return redirect()->route('trans_surat_masuks.show', compact('trans_surat_masuk'))
            ->with('success_message', trans('messages.edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TransSuratMasuk $trans_surat_masuk
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(TransSuratMasuk $trans_surat_masuk): RedirectResponse
    {
        $trans_surat_masuk->delete();
        return redirect()->route('trans_surat_masuks.index')
            ->with('success_message', trans('messages.delete.success'));
    }
}

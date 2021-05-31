<?php

namespace App\Http\Controllers\Surat;

use App\Models\User;
use App\Models\Surat\Unit;
use App\Models\Surat\JenisFile;
use App\Models\Surat\ArahanSurat;
use App\Models\Surat\JenisDokumen;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Surat\JenisDisposisi;
use App\Models\Surat\JenisSuratMasuk;
use App\Models\Surat\StatusDisposisi;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Models\Surat\SifatKeamananSurat;
use App\Models\Surat\SifatPenyelesaianSurat;
use App\Models\Surat\AsalEkspedisiSuratMasuk;

/**
 * Class SuratController
 * @package App\Http\Controllers
 */
class SuratController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        // Log::useFiles(storage_path().'/logs/surat.log');
    }

    public static function convertToJsVar($values, $field)
    {
        $var = [];
        foreach ($values as $value) {
            $var[$value->id] = $value[$field];
        }

        return $var;
    }

    public function getIdArahanSuratAtasan()
    {
        $id = auth()->user()->id_unit_kerja;
        // dd($id);
        $arahan_surat = ArahanSurat::where('id', $id)->get();
        // dd($arahan_surat);
        return $arahan_surat[0]->id_arahan_surat_parent;
    }

    public function getAllReferensi()
    {
        $this->referensi['asal_ekspedisi_surat_masuks'] = Cache::rememberForever('AsalEkspedisiSuratMasuk', function () {
            return AsalEkspedisiSuratMasuk::all();
        });

        $this->referensi['jenis_surat_masuks'] = Cache::rememberForever('JenisSuratMasuk', function () {
            return JenisSuratMasuk::all();
        });

        $this->referensi['sifat_keamanan_surats'] = Cache::rememberForever('SifatKeamananSurat', function () {
            return SifatKeamananSurat::all();
        });

        $this->referensi['sifat_penyelesaian_surats'] = Cache::rememberForever('SifatPenyelesaianSurat', function () {
            return SifatPenyelesaianSurat::all();
        });

        $this->referensi['jenis_files'] = Cache::rememberForever('JenisFile', function () {
            return JenisFile::all();
        });

        $this->referensi['arahan_surats'] = Cache::rememberForever('ArahanSurat', function () {
            return ArahanSurat::all();
        });

        $this->referensi['status_disposisis'] = Cache::rememberForever('StatusDisposisi', function () {
            return StatusDisposisi::all();
        });

        $this->referensi['jenis_disposisis'] = Cache::rememberForever('JenisDisposisi', function () {
            return JenisDisposisi::all();
        });

        $this->referensi['units'] = Cache::rememberForever('Unit', function () {
            return Unit::all();
        });

        $this->referensi['jenis_dokumens'] = Cache::rememberForever('JenisDokumen', function () {
            return JenisDokumen::all();
        });

        $this->referensi['id_unit_kerja_user'] = auth()->user()->id_unit_kerja;
        $this->referensi['bawahans']           = User::where('id_unit_kerja', $this->referensi['id_unit_kerja_user'])->where('id_jabatan', null)->get();
        $id_unit_kerja_user                    = $this->referensi['id_unit_kerja_user'];
        $this->referensi['atasan']             = ArahanSurat::where('id', function ($q) use ($id_unit_kerja_user) {
                $q->from('tref_arahan_surat')
                    ->select('id_arahan_surat_parent')
                    ->where('id', $id_unit_kerja_user)
                    ->limit(1);
            })->get();
        $this->referensi['id_unit_kerja_atasan'] = $this->referensi['atasan'][0]->id;
    }
}

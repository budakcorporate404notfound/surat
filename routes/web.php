<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendemailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Retrieve email by Debora 3 Mar 2021
// Route::resource('surat/retrieve-mail', Surat\RetrievemailController::class);
// Route::get('/retrieve', 'RetrievemailController@index')->name('retrieveemail');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', 'UserController');
Route::resource('permission', 'PermissionController');
Route::resource('role', 'RoleController');

Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');
Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');
Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');

Auth::routes(['register' => true]);

//////////////////////////////// axios request

Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
Route::post("/postRole", "RoleController@store");


Route::get('/cobaUnitTest', function () {
    return 'Judul Blog';
});

// e-Mail
Route::get('/kirim-email', 'EmailController@index');
Route::get('/inbox', 'EmailController@inbox');

// surat
// Route::resource('surat-jenis-file', 'Surat\JenisFileController');

// use App\Http\Controllers\Surat\JenisFileController;
// Route::resource('surat/jenisFile', Surat\JenisFileController::class);

Route::resource('surat/jenisFile',  'Surat\JenisFileController');
Route::resource('surat/suratMasuk', 'Surat\SuratMasukController');
// Route::resource('surat/tembusanSurat', 'Surat\TembusanSuratController');


Route::get('/surat/suratMasukUpload', 'Surat\SuratMasukController@upload')->name('suratMasuk.upload');
Route::post('/surat/suratMasukUpload', 'Surat\SuratMasukController@proses_upload')->name('suratMasuk.proses_upload');




// MOD AGUS app/suratmasuk

// Route::get('/', function () {
//     return redirect()->route('login');
// });
// Route::get('/login', 'HomeController@login')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Route::group(['middleware' => ['auth', 'user.management'], 'prefix' => 'usermanagement'], function () {

//     Route::get('/create', 'UserManagementController@create')->name('user.create');
//     Route::post('/create', 'UserManagementController@store')->name('user.store');
//     Route::get('/update', 'UserManagementController@update')->name('user.update.form');
//     Route::put('/update', 'UserManagementController@updateAction')->name('user.update');
//     Route::delete('/delete', 'UserManagementController@delete')->name('user.delete');
//     Route::get('/list', 'UserManagementController@list')->name('user.list');
// });

// Route::group(['middleware' => ['auth', 'report'], 'prefix' => 'report'], function () {

//     Route::get('/user', 'ReportController@user')->name('report.user');
//     Route::get('/inventory', 'ReportController@inventory')->name('report.inventory');
// });

// Route::group(['middleware' => ['auth', 'inventory'], 'prefix' => 'inventory'], function () {

//     Route::get('/add', 'InventoryController@create')->name('inventory.create');
//     Route::post('/add', 'InventoryController@store')->name('inventory.store');
//     Route::get('/list', 'InventoryController@list')->name('inventory.list');
//     Route::delete('/delete', 'InventoryController@delete')->name('inventory.delete');
// });

// TODO

Route::get('qrcode', function () {

    return QrCode::size(250)
        ->backgroundColor(255, 255, 204)
        ->generate('MyNotePaper');

});


Route::get('surat/cetak_pdf', 'Surat\SuratMasukController@cetakPdf');
Route::get('surat/mailbox_read', 'Surat\SuratMasukController@setMailboxRead')->name('suratmasuk.setmailboxread');

Route::get('surat/email', 'Surat\EmailController@sendDisposisiStatus');

// Route::resource('surat/dashboard', Surat\DashboardController::class)->shallow();


Route::resource('surat/surat_masuk', Surat\SuratMasukController::class)->shallow();
// Route::resource('surat/tembusan_surat', Surat\TembusanSuratController::class)->name('surat.tembusan_surat');
Route::resource('surat/tembusan_surat', Surat\TembusanSuratController::class);
Route::resource('surat/disposisi_pimpinan', Surat\DisposisiPimpinanController::class);
Route::resource('surat/disposisi_surat', Surat\DisposisiSuratController::class);
Route::resource('surat/dokumen_surat', Surat\DokumenSuratController::class);
Route::resource('surat/diskusi_surat', Surat\DiskusiSuratController::class);
Route::resource('surat/surat_keluar', Surat\SuratKeluarController::class);
Route::resource('surat/surat_keluar_konsep', Surat\SuratKeluarKonsepController::class);

Route::post('surat/surat_masuk/kirim', 'Surat\SuratMasukController@kirimSurat')->name('suratmasuk.kirimsurat');
Route::post('surat/surat_keluar_konsep/generatepdffromdoc', 'Surat\SuratKeluarKonsepController@generatePdfFromDoc')->name('suratkeluarkonsep.generatePdfFromDoc');




Route::resource('surat/mailbox', Surat\MailboxController::class)->shallow();
Route::post('surat/kirimdraft', 'Surat\SuratKeluarKonsepController@kirimdraft')->name('suratkeluarkonsep.kirimdraft');
Route::post('surat/ceknomorsurat', 'Surat\SuratMasukController@cekNomorSurat')->name('surat.ceknomorsurat');
Route::get('surat/getalldisposisi', 'Surat\DisposisiSuratController@getAllDisposisi')->name('surat.getalldisposisi');
Route::get('surat/generatesurat/{id}', 'Surat\SuratKeluarKonsepController@generatedocx')->name('surat.generatesurat');

// TESTING
Route::get('surat/updatejson/{id}', 'Surat\SuratKeluarKonsepController@updatejson')->name('surat.updatejson');
Route::get('surat/testjson/{id}', 'Surat\SuratKeluarKonsepController@testJson')->name('surat.testJson');

Route::resource('counter_surat', Surat\CounterSuratController::class);
Route::resource('file_surat_keluar', Surat\FileSuratKeluarController::class);
Route::resource('file_tanggapan', Surat\FileTanggapanController::class);
Route::resource('memo_disposisi', Surat\MemoDisposisiController::class);
Route::resource('arahan_surat', Surat\ArahanSuratController::class);
Route::resource('asal_ekspedisi_surat_masuk', Surat\AsalEkspedisiSuratMasukController::class);
Route::resource('jenis_disposisi', Surat\JenisDisposisiController::class);
// Route::resource('jenis_dokumen', Surat\JenisDokumenController::class);
Route::resource('jenis_file', Surat\JenisFileController::class);
Route::resource('jenis_surat_masuk', Surat\JenisSuratMasukController::class);
Route::resource('sifat_keamanan_surat', Surat\SifatKeamananSuratController::class);
Route::resource('sifat_penyelesaian_surat', Surat\SifatPenyelesaianSuratController::class);
Route::resource('status_disposisi', Surat\StatusDisposisiController::class);
Route::resource('unit', Surat\UnitController::class);

Route::get('broadcastemail', 'SendemailController@toMembers');

Route::get('genID', function () {
    // Output: 36e5e4
    // for ($i = 0; $i < 50; $i++) {
    //     $ID = strtoupper(substr(bin2hex(random_bytes(10)), 0, 6));
    //     $arrID[] = $ID;
    //     echo ($i + 1) . ". " . $ID . "<br>";
    // }

    $arrID = ['7F66F8', 'E46214'];
    for ($i = 0, $c = count($arrID); $i < $c; $i++) {
        echo ($i + 1) . ". {$arrID[$i]} : " . bcrypt($arrID[$i]) . "<br>";
    }
});


// Route::resource('sambung/anggota_tim', Sambung\AnggotaTimController::class);
// Route::resource('sambung/file', Sambung\FileController::class);
// Route::resource('sambung/file_kegiatan', Sambung\FileKegiatanController::class);
// Route::resource('sambung/file_kerja', Sambung\FileKerjaController::class);
// Route::resource('sambung/file_lamar_proyek_terbuka', Sambung\FileLamarProyekTerbukaController::class);
// Route::resource('sambung/file_proyek', Sambung\FileProyekController::class);
// Route::resource('sambung/file_tahapan_proyek', Sambung\FileTahapanProyekController::class);
// Route::resource('sambung/kegiatan', Sambung\KegiatanController::class);
// Route::resource('sambung/kerja', Sambung\KerjaController::class);
// Route::resource('sambung/lamar_proyek_terbuka', Sambung\LamarProyekTerbukaController::class);
// Route::resource('sambung/master_jenis_file', Sambung\MasterJenisFileController::class);
// Route::resource('sambung/master_jenis_status', Sambung\MasterJenisStatusController::class);
// Route::resource('sambung/master_kelompok_file', Sambung\MasterKelompokFileController::class);
// Route::resource('sambung/master_model_proyek', Sambung\MasterModelProyekController::class);
// Route::resource('sambung/master_model_tahapan', Sambung\MasterModelTahapanController::class);
// Route::resource('sambung/master_status', Sambung\MasterStatusController::class);
// Route::resource('sambung/proyek', Sambung\ProyekController::class);
// Route::resource('sambung/proyek_terbuka', Sambung\ProyekTerbukaController::class);
// Route::resource('sambung/tahapan', Sambung\TahapanController::class);
// Route::resource('sambung/user', Sambung\UserController::class);

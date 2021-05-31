<?php

namespace App\Models\Surat;

use DateTimeInterface;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SuratMasuk
 *
 * @property $id
 * @property $asal_surat_masuk
 * @property $pejabat_pengirim_surat
 * @property $nomor_surat
 * @property $tanggal_surat
 * @property $kepada
 * @property $perihal
 * @property $id_sifat_keamanan_surat
 * @property $id_sifat_penyelesaian_surat
 * @property $tenggat_waktu_tindak_lanjut
 * @property $mulai_pukul
 * @property $selesai_pukul
 * @property $nomor_agenda
 * @property $tanggal_agenda
 * @property $id_asal_ekspedisi_surat_masuk
 * @property $email_pengirim
 * @property $alamat_pengirim
 * @property $id_jenis_surat_masuk
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SuratMasuk extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $dateFormat = 'U';
    public $timestamps = true;
    protected $table = 'trans_surat_masuk';

    static $rules = [
        'asal_surat_masuk' => 'required',
        'pejabat_pengirim_surat' => 'required',
        'nomor_surat' => 'required',
        'tanggal_surat' => 'required',
        'kepada' => 'required',
        'perihal' => 'required',
        'id_sifat_keamanan_surat' => 'required',
        'id_sifat_penyelesaian_surat' => 'required',
        'nomor_agenda' => 'required',
        'tanggal_agenda' => 'required',
        'id_asal_ekspedisi_surat_masuk' => 'required',
        'id_jenis_surat_masuk' => 'required',
    ];

    protected $casts = [
        'meta' => 'array'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['asal_surat_masuk', 'pejabat_pengirim_surat', 'nomor_surat', 'tanggal_surat', 'kepada', 'perihal', 'id_sifat_keamanan_surat', 'id_sifat_penyelesaian_surat', 'tenggat_waktu_tindak_lanjut', 'mulai_pukul', 'selesai_pukul', 'nomor_agenda', 'tanggal_agenda', 'id_asal_ekspedisi_surat_masuk', 'email_pengirim', 'alamat_pengirim', 'id_jenis_surat_masuk', 'id_arahan_surat', 'meta'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function jenisSuratMasuk()
    {
        return $this->belongsTo('App\Models\Surat\JenisSuratMasuk', 'id_jenis_surat_masuk');
    }

    public function tembusanSurat()
    {
        return $this->hasMany('App\Models\Surat\TembusanSurat', 'id_surat_masuk', 'id');
    }

    public function dokumenSurat()
    {
        return $this->hasMany('App\Models\Surat\DokumenSurat', 'id_surat_masuk', 'id');
    }

    public function disposisiPimpinan()
    {
        return $this->hasMany('App\Models\Surat\DisposisiPimpinan', 'id_surat_masuk', 'id');
    }

    public function disposisiSurat()
    {
        return $this->hasMany('App\Models\Surat\DisposisiSurat', 'id_surat_masuk', 'id');
    }

    public function memoDisposisi()
    {
        return $this->hasMany('App\Models\Surat\MemoDisposisi', 'id_surat_masuk', 'id');
    }

    public function fileTanggapan()
    {
        return $this->hasMany('App\Models\Surat\FileTanggapan', 'id_surat_masuk', 'id');
    }

    public function currentDisposisiSurat()
    {
        return $this->hasOne('App\Models\Surat\DisposisiSurat', 'id_surat_masuk', 'id')->latest();
    }

    public function mailbox()
    {
        return $this->hasMany('App\Models\Surat\Mailbox', 'id_surat_masuk', 'id');
    }
}

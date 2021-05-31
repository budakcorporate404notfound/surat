<?php

namespace App\Models\Surat;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DisposisiSurat
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $id_arahan_surat
 * @property $id_status_disposisi
 * @property $ceklist_disposisi_surat
 * @property $disposisi_surat
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DisposisiSurat extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'trans_disposisi_surat';
    static $rules = [
        'id_surat_masuk' => 'required',
        'id_arahan_surat' => 'required',
        'id_status_disposisi' => 'required',
        // 'ceklist_disposisi_surat' => 'required',
        'disposisi_surat' => 'required',
    ];

    protected $perPage = 20;
    public $timestamps = true;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_arahan_surat', 'id_status_disposisi', 'ceklist_disposisi_surat', 'disposisi_surat', 'id_arahan_surat_dari', 'id_arahan_surat_iduser'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function arahanSuratDari()
    {
        return $this->belongsTo('App\Models\Surat\ArahanSurat', 'id_arahan_surat_dari');
    }

    public function arahanSuratUser()
    {
        return $this->belongsTo('App\Models\User', 'id_arahan_surat_iduser');
    }

    public function arahanSurat()
    {
        return $this->belongsTo('App\Models\Surat\ArahanSurat', 'id_arahan_surat');
    }

    public function statusDisposisi()
    {
        return $this->belongsTo('App\Models\Surat\StatusDisposisi', 'id_status_disposisi');
    }
}

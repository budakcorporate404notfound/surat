<?php

namespace App\Models\Surat;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DiskusiSurat
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $id_user
 * @property $pesan
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DiskusiSurat extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'trans_diskusi_surat';
    static $rules = [
        'id_surat_masuk' => 'required',
        'id_user' => 'required',
        'pesan' => 'required',
    ];

    protected $perPage = 20;
    public $timestamps = true;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_user', 'pesan'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function suratMasuk()
    {
        return $this->belongsTo('App\Models\Surat\SuratMasuk', 'id_surat_masuk');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}

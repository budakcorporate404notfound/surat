<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TembusanSurat
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $id_unit
 * @property $tembusan_surat
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TembusanSurat extends Model
{
    use SoftDeletes;

    protected $table = 'trans_tembusan_surat';
    static $rules = [
        'id_surat_masuk' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_unit', 'tembusan_surat'];

    public function unit()
    {
        return $this->belongsTo('App\Models\Surat\Unit', 'id_unit');
    }
}

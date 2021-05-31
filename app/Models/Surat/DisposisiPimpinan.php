<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DisposisiPimpinan
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $id_unit
 * @property $disposisi_pimpinan
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DisposisiPimpinan extends Model
{
    use SoftDeletes;

    protected $table = 'trans_disposisi_pimpinan';
    static $rules = [
        'id_surat_masuk' => 'required',
        'id_unit' => 'required',
        'disposisi_pimpinan' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_unit', 'disposisi_pimpinan'];

    public function unit()
    {
        return $this->belongsTo('App\Models\Surat\Unit', 'id_unit');
    }
}

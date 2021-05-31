<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsalEkspedisiSuratMasuk
 *
 * @property $id
 * @property $asal_ekspedisi_surat_masuk
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsalEkspedisiSuratMasuk extends Model
{
    use SoftDeletes;

    protected $table = 'tref_asal_ekspedisi_surat_masuk';
    static $rules = [
		'asal_ekspedisi_surat_masuk' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['asal_ekspedisi_surat_masuk'];



}

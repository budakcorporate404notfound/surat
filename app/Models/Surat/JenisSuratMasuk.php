<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisSuratMasuk
 *
 * @property $id
 * @property $jenis_surat_masuk
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JenisSuratMasuk extends Model
{
    use SoftDeletes;

    protected $table = 'tref_jenis_surat_masuk';
    static $rules = [
		'jenis_surat_masuk' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['jenis_surat_masuk'];



}

<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SifatKeamananSurat
 *
 * @property $id
 * @property $sifat_keamanan_surat
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SifatKeamananSurat extends Model
{
    use SoftDeletes;

    protected $table = 'tref_sifat_keamanan_surat';
    static $rules = [
		'sifat_keamanan_surat' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sifat_keamanan_surat'];



}

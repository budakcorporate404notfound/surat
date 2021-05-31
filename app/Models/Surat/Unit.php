<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 *
 * @property $id
 * @property $id_unit
 * @property $unit
 * @property $jabatan
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unit extends Model
{
    use SoftDeletes;

    protected $table = 'tref_unit';
    static $rules = [
		'id_unit' => 'required',
		'unit' => 'required',
		'jabatan' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_unit','unit','jabatan'];



}

<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CounterSurat
 *
 * @property $id
 * @property $id_jenis_surat
 * @property $year
 * @property $last_number
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CounterSurat extends Model
{
    use SoftDeletes;

    protected $table = 'trans_counter_surat';
    static $rules = [
        'id_jenis_surat' => 'required',
        'year' => 'required',
        'last_number' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_jenis_surat', 'year', 'last_number'];
}

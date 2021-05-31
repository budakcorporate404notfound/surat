<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MemoDisposisi
 *
 * @property $id
 * @property $id_disposisi_surat
 * @property $memo_disposisi
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MemoDisposisi extends Model
{
    use SoftDeletes;

    protected $table = 'trans_memo_disposisi';
    static $rules = [
        'id_disposisi_surat' => 'required',
        'memo_disposisi' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_disposisi_surat', 'memo_disposisi'];
}

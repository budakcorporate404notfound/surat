<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DokumenSurat
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $dokumen_surat
 * @property $nama_file
 * @property $id_jenis_file
 * @property $ukuran_file
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DokumenSurat extends Model
{
    use SoftDeletes;

    protected $table = 'trans_dokumen_surat';
    static $rules = [
        'id_surat_masuk' => 'required',
        'nama_file' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'dokumen_surat', 'nama_file', 'id_jenis_file', 'ukuran_file'];
}

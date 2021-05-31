<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FileSuratKeluar
 *
 * @property $id
 * @property $id_surat_keluar
 * @property $id_jenis_dokumen
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
class FileSuratKeluar extends Model
{
    use SoftDeletes;

    protected $table = 'trans_file_surat_keluar';
    static $rules = [
        'id_surat_keluar' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_keluar', 'file_surat_keluar', 'storage_file_name', 'id_jenis_file', 'ukuran_file'];
}

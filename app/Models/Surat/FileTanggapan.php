<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FileTanggapan
 *
 * @property $id
 * @property $id_disposisi_surat
 * @property $perihal
 * @property $keterangan
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
class FileTanggapan extends Model
{
    use SoftDeletes;

    protected $table = 'trans_file_tanggapan';
    static $rules = [
        'id_disposisi_surat' => 'required',
        'perihal' => 'required',
        'keterangan' => 'required',
        'id_jenis_dokumen' => 'required',
        'file_tanggapan' => 'required',
        'storage_file_name' => 'required',
        // 'id_jenis_file' => 'required',
        // 'ukuran_file' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_disposisi_surat', 'perihal', 'keterangan', 'id_jenis_dokumen', 'file_tanggapan', 'storage_file_name', 'id_jenis_file', 'ukuran_file'];
}

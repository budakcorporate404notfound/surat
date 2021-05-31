<?php

namespace App\Models\Surat;

/**
 * Class SuratKeluar
 *
 * @property $id
 * @property $id_surat_masuk
 * @property $id_jenis_dokumen
 * @property $nomor_surat
 * @property $tanggal_surat
 * @property $kepada
 * @property $perihal
 * @property $lampiran
 * @property $alamat
 * @property $kota_penandatangan
 * @property $jabatan_penandatangan
 * @property $isi_surat
 * @property $id_sifat_keamanan_surat
 * @property $id_sifat_penyelesaian_surat
 * @property $tanggal_mulai
 * @property $tanggal_selesai
 * @property $mulai_pukul
 * @property $selesai_pukul
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SuratKeluar extends SuratModel
{
    protected $table = 'trans_surat_keluar';

    protected $rules = [
        'id_jenis_dokumen' => 'required',
        'id_sifat_keamanan_surat' => 'required',
        'id_sifat_penyelesaian_surat' => 'required',
        // 'nomor_surat' => 'required',
        'tanggal_surat' => 'required',
        'kepada' => 'required',
        'perihal' => 'required',
        'kota_penandatangan' => 'required',
        'jabatan_penandatangan' => 'required',
    ];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_surat_masuk', 'id_jenis_dokumen', 'nomor_surat', 'tanggal_surat', 'kepada', 'perihal',  'lampiran', 'alamat', 'kota_penandatangan', 'jabatan_penandatangan', 'isi_surat', 'id_sifat_keamanan_surat', 'id_sifat_penyelesaian_surat', 'tanggal_mulai', 'tanggal_selesai', 'mulai_pukul', 'selesai_pukul'];
}

<?php

namespace App\Models\Surat;

/**
 * Class Mailbox
 *
 * @property $id
 * @property $id_user
 * @property $id_parent_mailbox
 * @property $id_status_mailbox
 * @property $id_surat_masuk
 * @property $id_konsep_surat
 * @property $id_surat_keluar
 * @property $ceklist_arahan_surat
 * @property $ceklist_disposisi_surat
 * @property $disposisi_surat
 * @property $waktu_konsep
 * @property $waktu_terima
 * @property $waktu_baca
 * @property $waktu_proses
 * @property $waktu_kirim
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Mailbox[] $mailboxes
 * @property Mailbox $mailbox
 * @property TransSuratKeluar $transSuratKeluar
 * @property TransSuratKeluarKonsep $transSuratKeluarKonsep
 * @property TransSuratMasuk $transSuratMasuk
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mailbox extends SuratModel
{
    protected $table = 'mailbox';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user', 'id_parent_mailbox', 'id_status_mailbox', 'id_surat_masuk', 'id_konsep_surat', 'id_surat_keluar', 'ceklist_arahan_surat', 'ceklist_disposisi_surat', 'disposisi_surat', 'waktu_konsep', 'waktu_terima', 'waktu_baca', 'waktu_proses', 'waktu_kirim'];

    /**
     * Rules.
     *
     * @var array
     */
    protected $rules = [
        'ceklist_arahan_surat' => 'required',
        'ceklist_disposisi_surat' => 'required',
    ];

    /**
     * Cast.
     *
     * @var array
     */
    protected $casts = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mailboxes()
    {
        return $this->hasMany('App\Models\Mailbox', 'id_parent_mailbox', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mailbox()
    {
        return $this->hasOne('App\Models\Mailbox', 'id', 'id_parent_mailbox');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transSuratKeluar()
    {
        return $this->hasOne('App\Models\TransSuratKeluar', 'id', 'id_surat_keluar');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transSuratKeluarKonsep()
    {
        return $this->hasOne('App\Models\TransSuratKeluarKonsep', 'id', 'id_konsep_surat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transSuratMasuk()
    {
        return $this->hasOne('App\Models\TransSuratMasuk', 'id', 'id_surat_masuk');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}

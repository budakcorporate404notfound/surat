<?php

namespace App\Models\Surat;

/**
 * Class StatusMailbox
 *
 * @property $id
 * @property $status_mailbox
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StatusMailbox extends SuratModel
{
    protected $table = 'tref_status_mailbox';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['status_mailbox'];

    /**
     * Rules.
     *
     * @var array
     */
    protected $rules = [
		'status_mailbox' => 'required',
    ];

    /**
     * Cast.
     *
     * @var array
     */
    protected $casts = [];


}

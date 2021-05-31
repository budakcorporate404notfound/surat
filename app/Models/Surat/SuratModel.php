<?php

namespace App\Models\Surat;

use DateTimeInterface;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;
    protected $casts = ['meta' => 'array'];
    protected $perPage = 20;

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function rules()
    {
        return $this->rules;
    }
}

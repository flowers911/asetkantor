<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'no_hp',
        'keterangan',
    ];
}

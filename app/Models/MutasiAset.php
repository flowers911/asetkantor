<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    protected $fillable = [
        'aset_id',
        'lokasi_asal_id',
        'lokasi_tujuan_id',
        'tanggal_mutasi',
        'keterangan',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function lokasiAsal()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_asal_id');
    }

    public function lokasiTujuan()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_tujuan_id');
    }
}
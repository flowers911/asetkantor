<?php

namespace App\Http\Controllers;

use App\Models\Aset;

class LaporanAsetController extends Controller
{
    public function index()
    {
        $asets = Aset::with(['kategori', 'lokasi'])->get();

        return view('laporan_aset.index', compact('asets'));
    }
}

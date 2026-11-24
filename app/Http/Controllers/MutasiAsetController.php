<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function index()
    {
        $mutasiAsets = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan'])->get();

        return view('mutasi_aset.index', compact('mutasiAsets'));
    }

    public function create()
    {
        $asets = Aset::all();
        $lokasis = Lokasi::all();

        return view('mutasi_aset.create', compact('asets', 'lokasis'));
    }

    public function store(Request $request)
{
    $request->validate([
        'aset_id' => 'required|exists:asets,id',
        'lokasi_asal_id' => 'required|exists:lokasis,id',
        'lokasi_tujuan_id' => 'required|exists:lokasis,id|different:lokasi_asal_id',
        'tanggal_mutasi' => 'required|date',
        'keterangan' => 'nullable',
    ]);

    $mutasi = MutasiAset::create($request->all());

    $mutasi->aset->update([
        'lokasi_id' => $request->lokasi_tujuan_id,
    ]);

    return redirect()->route('mutasi-aset.index')
        ->with('success', 'Data mutasi aset berhasil ditambahkan.');
}

    public function edit(MutasiAset $mutasiAset)
    {
        $asets = Aset::all();
        $lokasis = Lokasi::all();

        return view('mutasi_aset.edit', compact('mutasiAset', 'asets', 'lokasis'));
    }

    public function update(Request $request, MutasiAset $mutasiAset)
{
    $request->validate([
        'aset_id' => 'required|exists:asets,id',
        'lokasi_asal_id' => 'required|exists:lokasis,id',
        'lokasi_tujuan_id' => 'required|exists:lokasis,id|different:lokasi_asal_id',
        'tanggal_mutasi' => 'required|date',
        'keterangan' => 'nullable',
    ]);

    $mutasiAset->update($request->all());

    $mutasiAset->aset->update([
        'lokasi_id' => $request->lokasi_tujuan_id,
    ]);

    return redirect()->route('mutasi-aset.index')
        ->with('success', 'Data mutasi aset berhasil diperbarui.');
}

    public function destroy(MutasiAset $mutasiAset)
    {
        $mutasiAset->delete();

        return redirect()->route('mutasi-aset.index')
            ->with('success', 'Data mutasi aset berhasil dihapus.');
    }
}

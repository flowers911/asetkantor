<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Lokasi;

class AsetController extends Controller
{
    public function index()
    {
        $asets = Aset::with(['kategori', 'lokasi'])->get();

        return view('aset.index', compact('asets'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();

        return view('aset.create', compact('kategoris', 'lokasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required',
        ]);

        Aset::create($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil ditambahkan');
    }

    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();

        return view('aset.edit', compact('aset', 'kategoris', 'lokasis'));
    }

    public function update(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $request->validate([
            'nama_aset' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required',
        ]);

        $aset->update($request->all());

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil diperbarui');
    }

    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);

        $aset->delete();

        return redirect()->route('aset.index')
            ->with('success', 'Aset berhasil dihapus');
    }
}

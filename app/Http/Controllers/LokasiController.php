<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::all();

        return view('lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        Lokasi::create($request->all());

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $request->validate([
            'nama_lokasi' => 'required',
            'keterangan' => 'nullable',
        ]);

        $lokasi->update($request->all());

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $lokasi->delete();

        return redirect()->route('lokasi.index')
            ->with('success', 'Lokasi berhasil dihapus');
    }
}

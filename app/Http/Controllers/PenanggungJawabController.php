<?php

namespace App\Http\Controllers;

use App\Models\PenanggungJawab;
use Illuminate\Http\Request;

class PenanggungJawabController extends Controller
{
    public function index()
    {
        $penanggungJawabs = PenanggungJawab::all();

        return view('penanggung_jawab.index', compact('penanggungJawabs'));
    }

    public function create()
    {
        return view('penanggung_jawab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        PenanggungJawab::create($request->all());

        return redirect()->route('penanggung-jawab.index')
            ->with('success', 'Penanggung jawab berhasil ditambahkan.');
    }

    public function edit(PenanggungJawab $penanggungJawab)
    {
        return view('penanggung_jawab.edit', compact('penanggungJawab'));
    }

    public function update(Request $request, PenanggungJawab $penanggungJawab)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        $penanggungJawab->update($request->all());

        return redirect()->route('penanggung-jawab.index')
            ->with('success', 'Data penanggung jawab berhasil diperbarui.');
    }

    public function destroy(PenanggungJawab $penanggungJawab)
    {
        $penanggungJawab->delete();

        return redirect()->route('penanggung-jawab.index')
            ->with('success', 'Data penanggung jawab berhasil dihapus.');
    }
}

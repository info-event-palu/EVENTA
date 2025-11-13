<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class Controllerkomentar extends Controller
{
    // Menampilkan semua data komentar (READ)
    public function index()
    {
        $komentar = Komentar::all();
        return view('komentar.index', compact('komentar'));
    }

    // Menampilkan form tambah komentar baru (CREATE)
    public function create()
    {
        return view('komentar.create');
    }

    // Menyimpan data baru ke database (STORE)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_event' => 'nullable|integer'
        ]);

        Komentar::create($request->all());

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil ditambahkan!');
    }

    // Menampilkan form edit komentar (EDIT)
    public function edit($id)
    {
        $komentar = Komentar::findOrFail($id);
        return view('komentar.edit', compact('komentar'));
    }

    // Menyimpan hasil update ke database (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'id_event' => 'nullable|integer'
        ]);

        $komentar = Komentar::findOrFail($id);
        $komentar->update($request->all());

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil diperbarui!');
    }

    // Menghapus komentar (DELETE)
    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dihapus!');
    }
}

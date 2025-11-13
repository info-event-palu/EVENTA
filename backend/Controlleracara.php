<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class Controlleracara extends Controller
{
    // Menampilkan semua data acara (READ)
    public function index()
    {
        $acara = Acara::all();
        return view('acara.index', compact('acara'));
    }

    // Menampilkan form untuk menambah data baru (CREATE)
    public function create()
    {
        return view('acara.create');
    }

    // Menyimpan data baru ke database (STORE)
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Tanggal' => 'required|date',
            'Waktu' => 'required',
            'Lokasi' => 'required',
            'Deskripsi' => 'required',
            'Kategori' => 'required'
        ]);

        Acara::create($request->all());

        return redirect()->route('acara.index')->with('success', 'Data acara berhasil ditambahkan!');
    }

    // Menampilkan form edit data (EDIT)
    public function edit($id)
    {
        $acara = Acara::findOrFail($id);
        return view('acara.edit', compact('acara'));
    }

    // Mengupdate data di database (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nama' => 'required',
            'Tanggal' => 'required|date',
            'Waktu' => 'required',
            'Lokasi' => 'required',
            'Deskripsi' => 'required',
            'Kategori' => 'required'
        ]);

        $acara = Acara::findOrFail($id);
        $acara->update($request->all());

        return redirect()->route('acara.index')->with('success', 'Data acara berhasil diperbarui!');
    }

    // Menghapus data dari database (DELETE)
    public function destroy($id)
    {
        $acara = Acara::findOrFail($id);
        $acara->delete();

        return redirect()->route('acara.index')->with('success', 'Data acara berhasil dihapus!');
    }
}

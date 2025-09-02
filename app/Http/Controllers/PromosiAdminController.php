<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promosi; // Pastikan model ini sudah Anda buat
use Illuminate\Support\Facades\Redirect;

class PromosiAdminController extends Controller
{
    /**
     * Tampilkan daftar semua promosi.
     */
    public function index()
    {
        $promos = Promosi::all(); // Mengambil semua data promosi dari database
        return view('admin.promosi', compact('promos'));
    }

    /**
     * Tampilkan form untuk membuat promosi baru.
     */
    public function create()
    {
        return view('admin.promosi_create');
    }

    /**
     * Simpan promosi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Promosi::create($request->all());

        return Redirect::route('admin.promosi.index')->with('success', 'Promosi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit promosi.
     */
    public function edit($id)
    {
        $promosi = Promosi::findOrFail($id);
        return view('admin.promosi_edit', compact('promosi'));
    }

    /**
     * Perbarui data promosi.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'discount' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $promosi = Promosi::findOrFail($id);
        $promosi->update($request->all());

        return Redirect::route('admin.promosi.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    /**
     * Hapus promosi dari database.
     */
    public function destroy($id)
    {
        $promosi = Promosi::findOrFail($id);
        $promosi->delete();

        return Redirect::route('admin.promosi.index')->with('success', 'Promosi berhasil dihapus.');
    }
}
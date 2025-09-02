<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoProfilController extends Controller
{
    // Tampilkan halaman foto profil user
    public function index()
    {
        return view('auth.foto_profil');
    }

    // Update foto profil user
    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/foto_profil'), $filename);

            // Simpan nama file ke database
            $user->foto = $filename;
            $user->save();
        }

        return redirect()->route('foto_profil')->with('success', 'Foto profil berhasil diperbarui!');
    }
}

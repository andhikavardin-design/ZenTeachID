<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input sesuai field di tabel userss
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|string|max:255',
            'gmail'    => 'required|string|email|max:255|unique:userss,gmail',
            'no_telp'  => 'required|string|max:15',
            'username' => 'required|string|max:255|unique:userss,username',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan user baru
        User::create([
            'nama'     => $request->nama,
            'gmail'    => $request->gmail,
            'no_telp'  => $request->no_telp,
            'username' => $request->username,
            // Perbaikan di sini: Gunakan Hash::make()
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
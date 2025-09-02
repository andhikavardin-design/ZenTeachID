<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login_admin');
    }

    public function login(Request $request)
    {
        $username = 'ZenTeachID';
        $password = 'password';

        if ($request->username === $username && $request->password === $password) {
            session()->put('admin_logged_in', true);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    // ✅ Fungsi baru di bawah ini untuk upload foto profil
    public function updatePhoto(Request $request)
    {
        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');

            $file->move(public_path('assets/profile_pics'), 'profile_admin.jpg');

            session()->put('admin_profile_pic', 'profile_admin.jpg');

            return back()->with('success', 'Foto profil berhasil diupload.');
        }
        return back()->with('error', 'Tidak ada file yang dipilih.');
    }
}

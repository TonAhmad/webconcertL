<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menampilkan form login
    public function loginForm()
    {
        return view('admin.login'); // Ganti dengan view form login admin
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari admin berdasarkan username
        $admin = admin::where('username', $request->username)->first();

        // Periksa apakah admin ditemukan dan password cocok
        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan data admin ke sesi
            session(['admin' => $admin]);

            // Redirect ke dashboard admin
            return redirect('/admin/dashboard')->with('success', 'Login successful!');
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'The provided credentials are incorrect.',
        ])->withInput();
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    // Logout admin
    public function logout(Request $request)
    {
        // Hapus sesi admin
        $request->session()->forget('admin');
        $request->session()->flush();

        return redirect()->route('admin.login')->with('success', 'You have been logged out.');
    }
}

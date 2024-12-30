<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function signup(){
        return view('login/signup');
    }
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'user_name' => 'required|string|max:255|unique:user,user_name',
            'phone' => 'required|string|regex:/^\+62\d{9,15}$/|unique:user,phone',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8|confirmed',
            'id_card' => 'required|string|unique:user,id_card',
        ]);

        // Simpan data ke tabel user
        users::create([
            'user_name' => $request->user_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_card' => $request->id_card,
        ]);

        return redirect()->back()->with('success', 'Account created successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = users::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            session(['user' => $user]);

            return redirect()->route('pricing')->with('success', 'Login successful!');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->flush(); // Bisa juga gunakan forget jika hanya session tertentu yang ingin dihapus

        return redirect()->route('home');
    }


}

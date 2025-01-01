<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

            return redirect()->route('ticket.show')->with('success', 'Login successful!');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function account()
    {
        $user = session('user');
        if (!$user || !isset($user->user_id)) {
            return redirect('/signin')->with('error', 'Please log in to access your account.');
        }

        $user_id = $user->user_id;

        // Ambil data user
        $userData = DB::table('user')->where('user_id', $user_id)->first();

        // Ambil riwayat pesanan
        $orders = DB::table('transaction_log')
            ->join('transaction', 'transaction_log.transaction_id', '=', 'transaction.transaction_id')
            ->join('ticket', 'transaction.ticket_id', '=', 'ticket.ticket_id')
            ->join('concert', 'ticket.concert_id', '=', 'concert.concert_id')
            ->where('transaction_log.user_id', $user_id)
            ->where('transaction_log.action', 'BUY')
            ->select(
                'transaction.transaction_id',
                'concert.concert_name',
                'transaction.quantity',
                'transaction_log.timestamp as purchase_date',
                'transaction.fullname',
                'transaction.phone_number',
                'transaction.email'
            )
            ->orderBy('transaction_log.timestamp', 'desc')
            ->get();

        return view('paging.account', compact('userData', 'orders'));
    }

    public function refundTicket(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user->user_id)) {
            return redirect('/signin')->with('error', 'Please log in to process a refund.');
        }

        $validated = $request->validate([
            'transaction_id' => 'required|exists:transaction,transaction_id',
            'refund_quantity' => 'required|integer|min:1',
        ]);

        try {
            DB::statement('CALL refund_ticket(?, ?, ?)', [
                $validated['transaction_id'],
                $user->user_id,
                $validated['refund_quantity'],
            ]);

            return redirect()->route('account')->with('success', 'Refund processed successfully.');
        } catch (\Exception $e) {
            return redirect()->route('account')->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->flush(); // Bisa juga gunakan forget jika hanya session tertentu yang ingin dihapus

        return redirect()->route('home');
    }


}

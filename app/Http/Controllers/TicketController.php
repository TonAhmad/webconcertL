<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{

    public function showTickets()
    {

        $admin = session('admin');
        if (!$admin || !isset($admin->admin_id)) {
            return redirect('/admin')->with('error', 'Admin session not found. Please login to access');
        }

        $tickets = DB::table('ticket')
            ->join('concert', 'ticket.concert_id', '=', 'concert.concert_id')
            ->join('admin', 'ticket.admin_id', '=', 'admin.admin_id')
            ->select('ticket.*', 'concert.concert_name', 'admin.username')
            ->get();

        return view('admin.ticket', compact('tickets'));
    }

    // Menampilkan halaman tambah tiket
    public function showAddTicketForm()
    {
        return view('admin.add-ticket');
    }

    // Menambah tiket ke database menggunakan Stored Procedure
    public function addTicket(Request $request)
    {

        $admin = session('admin');
        if (!$admin || !isset($admin->admin_id)) {
            return redirect('/admin')->with('error', 'Admin session not found. Please login to access');
        }

        $validated = $request->validate([
            'concert_id' => 'required|integer|exists:concert,concert_id',
            'category' => 'required|in:Regular,VIP,VVIP',
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'admin_id' => 'required|exists:admin,admin_id',
            'description' => 'nullable|string',
        ]);


        try {
            DB::statement('CALL add_ticket_with_admin(?, ?, ?, ?, ?, ?)', [
                $validated['concert_id'],
                $validated['category'],
                $validated['stock'],
                $validated['price'],
                $validated['admin_id'],
                $validated['description'],
            ]);

            return redirect()->route('ticket.add')->with('success', 'Ticket added successfully!');
        } catch (\Exception $e) {
            return redirect()->route('ticket.add')->with('error', $e->getMessage());
        }
    }

    public function editTicket($ticket_id)
    {
        $ticket = DB::table('ticket')->where('ticket_id', $ticket_id)->first();

        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }

        return view('admin.edit-ticket', compact('ticket'));
    }



    public function updateTicket($ticket_id, Request $request)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'category' => 'required|in:Regular,VIP,VVIP',
            'description' => 'required|string|max:255',
        ]);

        // Ambil admin_id dari sesi (pastikan admin tersedia di sesi)
        $admin = session('admin');
        if (!$admin || !isset($admin->admin_id)) {
            return redirect('/admin')->with('error', 'Admin session not found. Please login to access');
        }
        $admin_id = $admin->admin_id;

        try {
            DB::statement('CALL update_ticket_with_admin(?, ?, ?, ?, ?, ?)', [
                $ticket_id,
                $validated['stock'],
                $validated['price'],
                $validated['category'],
                $admin_id,
                $validated['description'],
            ]);

            return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function destroy(Request $request, $ticket_id)
    {
        $validated = $request->validate([
            'admin_id' => 'required|exists:admin,admin_id',
            'description' => 'required|string|max:255',
        ]);

        try {
            // Panggil prosedur tersimpan untuk menghapus tiket
            DB::statement('CALL delete_ticket_with_admin(?, ?, ?)', [
                $ticket_id,
                $validated['admin_id'],
                $validated['description'],
            ]);

            return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showTicketsWithConcerts()
    {
        $tickets = DB::table('ticket')
            ->join('concert', 'ticket.concert_id', '=', 'concert.concert_id')
            ->select(
                'ticket.ticket_id',
                'ticket.category',
                'ticket.price',
                'ticket.stock',
                'concert.concert_name',
                'concert.date',
                'concert.time',
                'concert.location'
            )
            ->get();

        return view('paging/pricing', compact('tickets'));
    }

    public function showPurchaseForm(Request $request)
    {
        $ticket = Ticket::findOrFail($request->ticket_id);
        $quantity = $request->quantity;

        // Calculate total price
        $totalPrice = $ticket->price * $quantity;

        return view('paging.purchase', [
            'ticket' => $ticket,
            'quantity' => $quantity,
            'totalPrice' => $totalPrice,
        ]);
    }


    public function processPurchase(Request $request)
    {
        $user = session('user');
        if (!$user || !isset($user->user_id)) {
            return redirect('/signin')->with('error', 'User session not found. please login first');
        }
        $user_id = $user->user_id;

        $validated = $request->validate([
            'ticket_id' => 'required|exists:ticket,ticket_id',
            'quantity' => 'required|integer|min:1',
            'fullname' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'total_price' => 'required|numeric',
        ]);

        $ticket = ticket::findOrFail($validated['ticket_id']);

        if ($ticket->stock < $validated['quantity']) {
            return back()->with('error', 'Insufficient stock for this ticket.');
        }

        // Call the stored procedure to process the purchase
        try {
            DB::statement('CALL purchase_ticket(?, ?, ?, ?, ?, ?, ?)', [
                $ticket->ticket_id,
                $user_id,
                $validated['quantity'],
                $validated['total_price'],
                $validated['fullname'],
                $validated['phone_number'],
                $validated['email'],
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while processing your purchase. Please try again.');
        }

        return redirect()->route('home')->with('success', 'Ticket purchased successfully!');
    }

}

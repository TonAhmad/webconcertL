@extends('layout/admin')

@section('admin')
    <section id="ticket">
        <div class="container-xxl-ticket">
            <h1 class="text-center text-dark-purple">Ticket Data</h1>
            <div class="container">
                <!-- Tombol Tambah Tiket -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="/admin/ticket/add" class="btn btn-primary" id="addTicketBtn">Add Ticket</a>
                </div>

                <!-- Tabel Daftar Tiket -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Ticket ID</th>
                                <th>Admin ID</th>
                                <th>Concert ID</th>
                                <th>Concert Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tickets as $index => $ticket)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ticket->ticket_id }}</td>
                                    <td>{{ $ticket->admin_id }}</td>
                                    <td>{{ $ticket->concert_id }}</td>
                                    <td>{{ $ticket->concert_name }}</td>
                                    <td>{{ $ticket->category }}</td>
                                    <td>Rp.{{ number_format($ticket->price, 2) }}</td>
                                    <td>{{ $ticket->stock }}</td>
                                    <td>
                                        <a href="{{ route('tickets.edit', $ticket->ticket_id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('tickets.destroy', $ticket->ticket_id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="admin_id" value="{{ session('admin')->admin_id }}">
                                            <input type="hidden" name="description"
                                                value="Deleting ticket ID {{ $ticket->ticket_id }}">
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No tickets found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

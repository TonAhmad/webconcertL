@extends('layout/pages')

@section('isi')
    <!-- form section -->
    <section id="form">
        <div class="container py-4">
            <div class="row">
                <h1 class="text-center mb-4">Available Tickets</h1>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($tickets as $ticket)
                        <div class="col">
                            <div class="card ticket-card h-100 shadow-sm">
                                <div class="card-header text-center bg-dark text-white">
                                    <h5 class="mb-0">{{ $ticket->concert_name }}</h5>
                                </div>
                                <div class="card-body">
                                    <p><strong>Date:</strong> {{ $ticket->date }}</p>
                                    <p><strong>Time:</strong> {{ $ticket->time }}</p>
                                    <p><strong>Location:</strong> {{ $ticket->location }}</p>
                                    <p><strong>Category:</strong> {{ $ticket->category }}</p>
                                    <p><strong>Price:</strong> Rp.{{ $ticket->price }}</p>
                                    <p><strong>Stock:</strong> {{ $ticket->stock }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <form method="POST" action="/purchase/{ticket_id}/{quantity}">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}">
                                        <label for="quantity-{{ $ticket->ticket_id }}" class="form-label">Quantity:</label>
                                        <input type="number" name="quantity" id="quantity-{{ $ticket->ticket_id }}"
                                            class="form-control mb-2" min="1" max="{{ $ticket->stock }}" required>
                                        <button type="submit" class="btn btn-primary btn-sm w-100">Buy Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

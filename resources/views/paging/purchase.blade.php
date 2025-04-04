@extends('layout/pages')

@section('isi')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section id="purchase-form">
        <div class="container-xxl py-4">
            <div class="row">
                <h1 class="text-center mb-4">Purchase Ticket</h1>
                <div class="col-md-6 offset-md-3">
                    <form method="POST" action="{{ route('purchase.process') }}">
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}">
                        <input type="hidden" name="quantity" value="{{ $quantity }}">

                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="number" name="total_price" class="form-control" value="{{ $totalPrice }}"
                                readonly>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

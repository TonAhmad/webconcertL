@extends('layout/pages')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@section('isi')
    <section id="account">
            <div class="container-xxl">
                <h1 class="text-center mb-4">Account</h1>

                <!-- Data User -->
                <div class="table-responsive mb-4">
                    <div class="bg-dark text-white">
                        <h4>Profile Details</h4>
                    </div>
                    <div class="table responsive">
                        <p><strong>User ID:</strong> {{ $userData->user_id }}</p>
                        <p><strong>Username:</strong> {{ $userData->user_name }}</p>
                        <p><strong>Phone:</strong> {{ $userData->phone }}</p>
                        <p><strong>Email:</strong> {{ $userData->email }}</p>
                        <p><strong>ID Card:</strong> {{ $userData->id_card }}</p>
                    </div>
                </div>

                <!-- Riwayat Pesanan -->
                <div class="mb-4">
                    <div class="bg-dark text-white">
                        <h4>Order History</h4>
                    </div>
                    <div class="">
                        @if ($orders->isEmpty())
                            <p class="text-center">You have no order history.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Concert Name</th>
                                            <th>Quantity</th>
                                            <th>Purchase Date</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $order)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $order->concert_name }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->purchase_date }}</td>
                                                <td>{{ $order->fullname }}</td>
                                                <td>{{ $order->phone_number }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>
                                                    <!-- Refund Form -->
                                                    <form method="POST" action="{{ route('refund.ticket') }}">
                                                        @csrf
                                                        <input type="hidden" name="transaction_id"
                                                            value="{{ $order->transaction_id }}">
                                                        <input type="number" name="refund_quantity"
                                                            class="form-control mb-2" placeholder="Quantity" min="1"
                                                            max="{{ $order->quantity }}" required>
                                                        <button type="submit" class="btn btn-danger btn-sm">Refund</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
    </section>
@endsection

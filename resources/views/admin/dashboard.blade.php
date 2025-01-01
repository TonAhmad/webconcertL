@extends('layout/admin')

@section('admin')
    <!-- Container -->
    <div class="container mt-4">
        <h1 class="text-center text-dark-purple">Admin Dashboard</h1>
        <p class="text-center">Manage your concert ticket sales data with ease.</p>

        <div class="row mt-4">
            <!-- Card: Total Sales -->
            <div class="col-md-4">
                <div class="card bg-dark-purple mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text"><strong>Rp
                                {{ number_format($salesData->sum('total_revenue'), 0, ',', '.') }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Tickets Sold -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tickets Sold</h5>
                        <p class="card-text"><strong>{{ $salesData->sum('total_sold') }}</strong> tickets</p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Concerts -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Concerts</h5>
                        <p class="card-text"><strong>{{ $salesData->count() }}</strong> active concerts</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Sales Table -->
        <div class="mt-5">
            <h2>Ticket Sales Data</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Concert Name</th>
                        <th>Ticket Category</th>
                        <th>Tickets Sold</th>
                        <th>Total Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesData as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->concert_name }}</td>
                            <td>{{ $data->category }}</td>
                            <td>{{ $data->total_sold }}</td>
                            <td>Rp {{ number_format($data->total_revenue, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

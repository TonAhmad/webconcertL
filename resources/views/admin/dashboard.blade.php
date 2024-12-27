@extends('layout/admin')

@section('admin')
        <!-- Container -->
    <div class="container mt-4">
        <h1 class="text-center text-dark-purple">Dashboard Admin</h1>
        <p class="text-center">Kelola data penjualan tiket konser Anda dengan mudah.</p>

        <div class="row mt-4">
            <!-- Card: Total Penjualan -->
            <div class="col-md-4">
                <div class="card bg-dark-purple mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Penjualan</h5>
                        <p class="card-text"><strong>Rp 0</strong> (Placeholder)</p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Tiket Terjual -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Tiket Terjual</h5>
                        <p class="card-text"><strong>0</strong> tiket</p>
                    </div>
                </div>
            </div>

            <!-- Card: Total Konser -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Konser</h5>
                        <p class="card-text"><strong>0</strong> konser aktif</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Data Penjualan -->
        <div class="mt-5">
            <h2>Data Penjualan Tiket</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Tiket</th>
                        <th>Artis</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Pendapatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Diamond VIP</td>
                        <td>Ariana Grande</td>
                        <td>0</td>
                        <td>Rp 0</td>
                        <td><button class="btn btn-sm btn-primary">Detail</button></td>
                    </tr>
                    <!-- Tambahkan data lainnya di sini -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
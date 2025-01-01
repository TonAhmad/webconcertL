@extends('layout/admin')

@section('admin')
    <section id="add-ticket">
        <div class="container mt-5">
            <h1 class="text-center">Add New Ticket</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <p>Logged in as: <strong>{{ session('admin')->admin_id }}</strong></p>
            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="concert_id" class="form-label">Concert ID</label>
                    <input type="number" class="form-control @error('concert_id') is-invalid @enderror" id="concert_id"
                        name="concert_id" value="{{ old('concert_id') }}">
                    @error('concert_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="">Select Category</option>
                        <option value="Regular" {{ old('category') == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="VIP" {{ old('category') == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="VVIP" {{ old('category') == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                        name="stock" value="{{ old('stock') }}">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                        id="price" name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="admin_id" class="form-label">Admin ID</label>
                    <input type="text" class="form-control @error('admin_id') is-invalid @enderror" id="admin_id"
                        name="admin_id" value="{{ session('admin')->admin_id }}" readonly>
                    @error('admin_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Ticket</button>
            </form>
        </div>
    </section>
@endsection

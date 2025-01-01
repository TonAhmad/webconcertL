@extends('layout/admin')

@section('admin')
    <section id="edit-ticket">
        <div class="container">
            <h1 class="text-center text-dark-purple">Edit Ticket</h1>
            <form method="POST" action="{{ route('tickets.update', $ticket->ticket_id) }}">
                @csrf

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="Regular" {{ $ticket->category == 'Regular' ? 'selected' : '' }}>Regular</option>
                        <option value="VIP" {{ $ticket->category == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="VVIP" {{ $ticket->category == 'VVIP' ? 'selected' : '' }}>VVIP</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $ticket->stock }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $ticket->price }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Ticket</button>
            </form>

        </div>
    </section>
@endsection

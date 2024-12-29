@extends('layout/pages')

@section('isi')
    <!-- artists section -->
    <section id="artists">
        <div class="container-xxl">
            <h1 class="mb-4" style="color: black">Your favorite artists</h1>
            <div class="artists-container">
                @foreach ($artists as $artist)
                    <a href="#">
                        <div class="artists-card">
                            <!-- Menampilkan foto -->
                            <img src="{{ asset('images/' . ($artist->photo_name ?? 'default.jpg')) }}" class="card-img-artist"
                                alt="{{ $artist->artist_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $artist->artist_name }}</h5>
                                <p class="card-text"><strong>Genre:</strong> {{ $artist->genre }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

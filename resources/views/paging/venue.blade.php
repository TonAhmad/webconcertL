@extends('layout/pages')

@section('isi')
    <!-- Venue Section -->
    <section id="venue" class="py-5">
        <div class="container-xxl">
            <div class="row">
                <h1 class="text-center mb-4">Venues for Upcoming Concerts</h1>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="venue-card">
                        <img src="{{asset ('images/GBK.jpg')}}" class="venue-card-img-top" alt="GBK">
                        <div class="venue-card-body">
                            <h5 class="card-title">Gelora Bung Karno (GBK)</h5>
                            <p class="card-text">Jakarta, Indonesia</p>
                            <a href="/ticket" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="venue-card">
                        <img src="{{asset ('images/JIS.JPEG')}}" class="venue-card-img-top" alt="JIS">
                        <div class="venue-card-body">
                            <h5 class="venue-card-title">Jakarta International Stadium (JIS)</h5>
                            <p class="venue-card-text">Jakarta, Indonesia</p>
                            <a href="/ticket" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="venue-card">
                        <img src="{{asset ('images/IstoraSenayan.jpeg')}}" class="venue-card-img-top" alt="Istora">
                        <div class="card-body">
                            <h5 class="venue-card-title">Istora Senayan</h5>
                            <p class="venue-card-text">Jakarta, Indonesia</p>
                            <a href="/ticket" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="venue-card">
                        <img src="{{asset ('images/Kasablankahall.jpg')}}" class="venue-card-img-top" alt="The Kasablanka Hall">
                        <div class="venue-card-body">
                            <h5 class="venue-card-title">The Kasablanka Hall</h5>
                            <p class="venue-card-text">Jakarta, Indonesia</p>
                            <a href="/ticket" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="venue-card">
                        <img src="{{asset ('images/Ancol.jpg')}}" class="card-img-top" alt="O2 Arena">
                        <div class="venue-card-body">
                            <h5 class="venue-card-title">The O2 Arena</h5>
                            <p class="venue-card-text">London, United Kingdom</p>
                            <a href="/ticket" class="btn btn-primary">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

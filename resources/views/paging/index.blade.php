@extends('layout/pages')

@section('isi')
    <!-- hero section -->
    <section id="home">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c1">
                    <img src="https://cdn.pixabay.com/photo/2017/08/02/13/09/confetti-2571539_960_720.jpg" class=""
                        alt="...">
                    <div class="carousel-caption">
                        <h2>Elefthéro</h2>
                        <p>a platform that provides various concert tickets in different part of world</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset ('images/eternal.jpg')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Ariana Grande</h2>
                        <p>See her new album realesed</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset ('images/ANTI.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption">
                        <h2>Rihanna</h2>
                        <p>Album Anti out now!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- isi section -->
    <section id="isi">
        <div class="container-md text-center mx-auto py-3">
            <div class="isi-title">
                <h2>Upcoming Shows</h2>
            </div>
            <div class="row align-items-start grid gap-2">
                <!-- card 1 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="https://readdork.com/wp-content/uploads/2020/11/lany-oct20-59.jpg" class="card-img">
                        <div class="card-body">
                            <h5 class="card-title">Lany</h5>
                            <a href="Arists/lany.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 2 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Niki.2.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Niki</h5>
                            <a href="" class="btn"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 3 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Ariana.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ariana Grande</h5>
                            <a href="Arists/ariana.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 4 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Summer.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Summer</h5>
                            <a href="Arists/summer.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 5 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Justin.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Justin Bieber</h5>
                            <a href="Arists/JB.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 6 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Afgan.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Afgan</h5>
                            <a href="Arists/Afgan.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 7 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Neighbour.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">The Neighbourhood</h5>
                            <a href="Arists/neighbourhood.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>

                <!-- card 8 -->
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset ('images/Nirvana.jpg')}}" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nirvana</h5>
                            <a href="Arists/nirvana.html" class="btn"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News section -->
    <section id="news">
        <div class="container-xxl">
            <div class="news-title">
                <h1>What's new from your favorite artists?</h1>
            </div>
            <div class="row align-item-center grid gap-3  ns">
                <div class="col">
                    <iframe class="yt" width="560" height="315"
                        src="https://www.youtube.com/embed/hNprpOmnzvk?si=ltEgEhpLlPjLQM--" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="col">
                    <iframe class="yt" width="560" height="315"
                        src="https://www.youtube.com/embed/R1MSH43zUSc?si=yCbzzpuJnDqVEYTd" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- playlist section -->
    <div class="container-xxl ply">
        <h1>Checkout our playlist</h1>
        <iframe style="border-radius:12px"
            src="https://open.spotify.com/embed/playlist/774kUuKDzLa8ieaSmi8IfS?utm_source=generator&theme=0"
            width="100%" height="352" frameBorder="0" allowfullscreen=""
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
        </iframe>
    </div>
    <!-- end section -->
    <section id="endpost">
        <div class="container-xxl">
            <div class="container-sm">
                <h1>Sign Up For Exclusive Presales and more!</h1>
            </div>
            <div class="container-sm">
                <p>Register with Elefthéro to be amongst the first to buy Presale tickets to the hottest shows in town!
                    Plus receive the latest events and special offers straight to your inbox.</p>
            </div>
            <div class="buton">
                <button type="button" class="btn btn-danger"
                    onclick="window.location.href='/signin/signup'">Register Now!</button>
            </div>
        </div>
    </section>
@endsection

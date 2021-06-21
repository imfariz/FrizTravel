@extends('layouts.app')

@section('title')
    Friz Travel
@endsection

@section('content')

<!-- Header -->
<header class="text-center">
    <h1>Explore Borneo <br> New World Wonders</h1>
    <p class="mt-3">Feels the heart of earth, <br> feels the nature</p>
    <a href="#popularContent" class="btn btn-cta px-4 mt-4">Get Started</a>
</header>

<main>
    <!-- Statistik -->
    <div class="container">
        <section class="section-stats row justify-content-md-center" id="stats">
            <div class="col-6 col-md-2 stats-detail">
                <h2>20K</h2>
                <p>Members</p>
            </div>
            <div class="col-6 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-6 col-md-2 stats-detail">
                <h2>3K</h2>
                <p>Hotels</p>
            </div>
            <div class="col-6 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <!-- Wisata Popular -->
    <section class="section-popular" id="popular">
        <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Popular Destination</h2>
                    <p>What heals them</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="row section-popular-travel justify-content-center">
                @foreach ($items as $item)
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="card-travel d-flex flex-column text-center" 
                        style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');
                        background-position: center;">
                            <div class="travel-province">{{$item->location}}</div>
                            <div class="travel-place">{{$item->title}}</div>
                            <div class="travel-button mt-auto">
                                <a class="btn btn-travel px-4" href="{{route('detail', $item->slug)}}">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Networks Partnership -->
    <section class="section-networks" id="networks">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Our Partners</h2>
                    <p>Trusting the trusted one <br> Feels like a home</p>
                </div>
                <div class="col-md-8 text-center d-flex align-items-center">
                    <img src="./frontend/images/logo/Partners.png" alt="Logo Partners" class="img-partners">
                </div>
            </div>
    </section>

    <!-- Testimoni -->
    <section class="section-testimonial-heading" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>What they said</h2>
                    <p>More experiences were given <br> more loves we got</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" id="testimonialContent">
        <div class="container">
            <div class="section-testimonial row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/profil/testimonial1.jpg" alt="testi1" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Fariz Ramadhan</h3>
                            <p class="testimonial">
                                " It was glourious and I could not stop to say wohooo for every single moment. Dankeeeeee "
                            </p>
                        </div>
                        <hr>
                        <p class="mt-2 trip-to">
                            Trip to Taman Nasional Kutai
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/profil/testimonial2.jpg" alt="testi2" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Espada</h3>
                            <p class="testimonial">
                                " Most enjoyable trip. Feels like my home village's trip "
                            </p>
                        </div>
                        <hr>
                        <p class="mt-2 trip-to">
                            Trip to Palangkaraya
                        </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="./frontend/images/profil/testimonial3.jpg" alt="testi3" class="mb-4 rounded-circle">
                            <h3 class="mb-4">Fariz Ramadhan</h3>
                            <p class="testimonial">
                                " Funtastic ! It really fulfill my spirit. Goodbye burning out ! "
                            </p>
                        </div>
                        <hr>
                        <p class="mt-2 trip-to">
                            Trip to Pontianak
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn btn-need-help px-4 mt-1 mt-4">
                        Need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-cta px-4 mt-1 mt-4">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
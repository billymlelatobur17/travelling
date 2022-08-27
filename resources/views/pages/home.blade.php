@extends('layouts.app')

@section('title')
    TRAVELRIA - Home
@endsection

@section('content')
    <!--Header-->
    <header class="text-center">
        <h1>
            Explore The Beautiful Word
            <br>
            As Easy One Click
        </h1>
        <p class="mt-3">
            You will see beautiful
            <br>
            moment you never see before
        </p>
        <a class="btn btn-get-started px-4 mt-4" href="#popular">Get Started</a>
    </header>
    <!--Main-->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>20k</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>3k</h2>
                    <p>Hotel</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>Something that you never try</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                                 style="background-image: url('{{$item->galleries->count() ? \Illuminate\Support\Facades\Storage::url($item->galleries->first()->image) : '' }}');">
                                <div class="travel-country">{{$item->location}}</div>
                                <div class="travel-location">{{$item->testimonialHeading}}</div>
                                <div class="travel-button mt-auto">
                                    <a class="btn btn-travel-details px-4" href="{{route('detail',$item->slug)}}">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-network">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>Companies are trusted us
                            <br>
                            more than just a trip
                        </p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img alt="logo partner" class="img-partner" src="frontend/images/partner-logo.png">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Testimonial</h2>
                        <p>What our customers say</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-testimonial-content" id="testimonial-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img alt="user" class="mb-4 rounded-circle image-user"
                                     src="frontend/images/testimonial-2.jpg">
                                <h1 class="mb-4">Nico</h1>
                                <p class="testimonial">
                                    " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                    neque.
                                    Etiam varius orci velit, eget tincidunt nisi pulvinar nec. "
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Bali, Indonesia
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img alt="user" class="mb-4 rounded-circle image-user"
                                     src="frontend/images/testimonial-3.jpg">
                                <h1 class="mb-4">Jeriko</h1>
                                <p class="testimonial">
                                    " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                    neque.
                                    Etiam varius orci velit, eget tincidunt nisi pulvinar nec. "
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Karimun Jawa, Indonesia
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img alt="user" class="mb-4 rounded-circle image-user"
                                     src="frontend/images/testimonial-4.jpg">
                                <h1 class="mb-4">Kevin</h1>
                                <p class="testimonial">
                                    " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar
                                    neque.
                                    Etiam varius orci velit, eget tincidunt nisi pulvinar nec. "
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Nusa Peninda, Indonesia
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a class="btn btn-need-help px-4 mt-4 mx-1" href="">
                            I Need Help
                        </a>
                        <a class="btn btn-get-started px-4 mt-4 mx-1" href="{{route('register')}}">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection



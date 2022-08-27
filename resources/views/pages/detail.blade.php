@extends('layouts.app')
@section('title')
    Detail Travel
@endsection
@section('content')
    <!--main-->
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details mb-4">
                            <h1>{{$item->title}}</h1>
                            <p>{{$item->location}}</p>
                            @if($item->galleries->count())
                                <div class="galery">
                                    <div class="xzoom-container">
                                        <img alt="details-image" class="xzoom" id="xzoom-default"
                                             src="{{Storage::url($item->galleries->first()->image)}}"
                                             xoriginal="{{Storage::url($item->galleries->first()->image)}}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach($item->galleries as $gallery)
                                            <a href="{{Storage::url($gallery->image)}}">
                                                <img alt="details-image" class="xzoom-gallery"
                                                     src="{{Storage::url($gallery->image)}}"
                                                     width="128" xpreview="{{Storage::url($gallery->image)}}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <br>
                            <h2>Tentang Wisata</h2>
                            <p>{!! $item->about !!}</p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img alt="" class="features-image" src="{{asset('frontend/images/ic_event.png')}}">
                                    <div class="description">
                                        <h3>Featured Event</h3>
                                        <p>{{$item->featured_event}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img alt="" class="features-image"
                                         src="{{asset('frontend/images/ic_language.png')}}">
                                    <div class="description">
                                        <h3>Language</h3>
                                        <p>{{$item->language}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img alt="" class="features-image" src="{{asset('frontend/images/ic_foods.png')}}">
                                    <div class="description">
                                        <h3>Foods</h3>
                                        <p>{{$item->food}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members are going</h2>
                            <div class="members my-2 ">
                                <img alt="" class="member-image mr-1 rounded-circle"
                                     src="{{asset('/frontend/images/member/member-1.jpg')}}">
                                <img alt="" class="member-image mr-1 rounded-circle"
                                     src="{{asset('/frontend/images/member/member-2.jpg')}}">
                                <img alt="" class="member-image mr-1 rounded-circle"
                                     src="{{asset('/frontend/images/member/member-4.jpg')}}">
                                <img alt="" class="member-image mr-1 rounded-circle"
                                     src="{{asset('/frontend/images/member/member-3.jpg')}}">
                                <img alt="" class="member-image mr-1 rounded-circle"
                                     src="{{asset('/frontend/images/member/member-1.jpg')}}">
                            </div>
                            <hr>
                            <h2>Trip Informations</h2>
                            <table class="trip-information">
                                <tr>
                                    <th style="width: 50%">
                                        Date of Departure
                                    </th>
                                    <td class="text-right"
                                        style="width: 50%">{{ \Illuminate\Support\Carbon::create($item->departure_date)->format('F n, Y') }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Duration
                                    </th>
                                    <td class="text-right" style="width: 50%">{{$item->duration}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Type
                                    </th>
                                    <td class="text-right" style="width: 50%">{{$item->type}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Price
                                    </th>
                                    <td class="text-right" style="width: 50%">${{$item->price}},00 / person</td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth()
                                <form action="{{route('checkout_process',$item->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">Join Now</button>
                                </form>
                            @endauth
                            @guest()
                                <a class="btn btn-block btn-join-now mt-3 py-2" href="{{route('login')}}">Login or
                                    Register
                                    to join</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--end main-->
@endsection
@push('prepend-style')
    <link href="{{asset('frontend/libraries/x-zoom/xzoom.min.css ')}}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{asset('frontend/libraries/x-zoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush

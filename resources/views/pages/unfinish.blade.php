@extends('layouts.success')
@section('title')
    Checkout Success
@endsection

@section('content')
    <!--main-->
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img alt="mail-success" height="150" src="{{asset('frontend/images/mail-box-icon-20507.jpg')}}">
                <h1>Oops!</h1>
                <p>Your transaction is unfinished.</p>
                <a class="btn btn-home-page mt-3 px-5" href="{{route('home')}}">Home Page</a>
            </div>
        </div>
    </main>
    <!--end main-->
@endsection



@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Tambah Data Paket Travel</h2>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 lg:col-span-12">
                <!-- BEGIN: Form Layout -->
                <form action="{{route('travel-package.store')}}" method="post">
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label for=title" class="form-label">Title</label>
                            <input id="ctitle" type="text" class="form-control w-full" name="title"
                                   placeholder="Title" value="{{old('title')}}">
                        </div>
                        <div>
                            <label for="Location" class="form-label">Location</label>
                            <input id="location" type="text" class="form-control w-full" name="location"
                                   placeholder="Location" value="{{old('location')}}">
                        </div>
                        <div class="mt-3">
                            <label>About</label>
                            <div class="mt-2">
                                 <textarea class="form-control about" id="about"
                                           rows="3" name="about">{{old('about')}}</textarea>
                            </div>
                        </div>
                        <div>
                            <label for="Featured-event" class="form-label">Featured-Event</label>
                            <input id="featured_event" type="text" class="form-control w-full" name="featured_event"
                                   placeholder="Featured-Event" value="{{old('featured_event')}}">
                        </div>
                        <div>
                            <label for="Language" class="form-label">Language</label>
                            <input id="language" type="text" class="form-control w-full" name="language"
                                   placeholder="Language" value="{{old('language')}}">
                        </div>
                        <div>
                            <label for="Food" class="form-label">Food</label>
                            <input id="food" type="text" class="form-control w-full" name="food"
                                   placeholder="Food" value="{{old('food')}}">
                        </div>
                        <div>
                            <label for="Departure-Date" class="form-label">Departure Date</label>
                            <input type="date" data-single-mode="true" name="departure_date" id="departure_date"
                                   value="{{old('departure_date')}}" class="form-control w-full">

                        </div>
                        <div>
                            <label for="Duration" class="form-label">Duration</label>
                            <input id="duration" type="text" class="form-control w-full" name="duration"
                                   placeholder="Duration" value="{{old('duration')}}">
                        </div>
                        <div>
                            <label for="Type" class="form-label">Type</label>
                            <input id="type" type="text" class="form-control w-full" name="type"
                                   placeholder="Type" value="{{old('type')}}">
                        </div>
                        <div>
                            <label for="Price" class="form-label">Price</label>
                            <input id="price" type="number" class="form-control w-full" name="price"
                                   placeholder="Price" value="{{old('price')}}">
                        </div>
                        <div class="text-right mt-5">
                            <a href="{{route('travel-package.index')}}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                            <button type="submit" class="btn btn-primary w-24">Save</button>
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>
@endsection


@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Tambah Data Gallery</h2>
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
                <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label for=travel_packages_id" class="form-label">Paket Travel</label>
                            <select name="travel_packages_id" id="travel_packages_id" class="form-control w-full"
                                    required>
                                <option value="">Pilih Paket Travel</option>
                                @foreach($travel_packages as $travel_package)
                                    <option value="{{$travel_package->id}}">{{$travel_package->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="image" class="form-label">Image</label>
                            <input id="image" type="file" class="form-control w-full" name="image"
                                   placeholder="Image" value="{{old('image')}}">
                        </div>
                        <div class="text-right mt-5">
                            <a href="{{route('gallery.index')}}" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                            <button type="submit" class="btn btn-primary w-24">Save</button>
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>
@endsection


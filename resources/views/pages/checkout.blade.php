@extends('layouts.checkout')
@section('title')
    Checkout
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
                                <li class="breadcrumb-item ">
                                    Details
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h1>Who is Going?</h1>
                            <p>Trip to {{$item->travel_package->title}},{{$item->travel_package->location}}</p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                    <tr>
                                        <td>Picture</td>
                                        <td>Name</td>
                                        <td>Nationality</td>
                                        <td>Vise</td>
                                        <td>Passport</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($item->details as $detail)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" height="60"
                                                     src="https://ui-avatars.com/api/?name={{$detail->username}}">
                                            </td>
                                            <td class="align-middle">{{$detail->username}}</td>
                                            <td class="align-middle">{{$detail->nationality}}</td>
                                            <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                            <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{route('checkout-remove',$detail->id)}}">
                                                    <img alt="" height="20"
                                                         src="{{asset('frontend/images/remove-icon-png-7113.png')}}">
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                No visitor
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Add Member</h2>
                                <form action="{{route('checkout-create',$item->id)}}" class="form-inline" method="post">
                                    @csrf
                                    <label class="sr-only" for="username">Name</label>
                                    <input class="form-control mb-2 mr-sm-2" id="username" name="username"
                                           placeholder="Name"
                                           type="text" required>
                                    <label class="sr-only" for="nationality">Nationality</label>
                                    <input class="form-control mb-2 mr-sm-2" style="width: 50px" id="nationality"
                                           name="nationality"
                                           placeholder="Nationality"
                                           type="text" required>
                                    <label class="sr-only" for="is_visa">Visa</label>
                                    <select class="custom-select mb-2 mr-sm-2" id="is_visa" required name="is_visa">
                                        <option selected value="">VISA</option>
                                        <option value="1">30 Days</option>
                                        <option value="0">N/A</option>
                                    </select>
                                    <label class="sr-only" for="doe_passport">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2" style="width: 200px">
                                        <input class="form-control datepicker" id="doePassport" name="doe_passport"
                                               placeholder="DOE Passport"
                                               type="text">
                                    </div>

                                    <button class="btn btn-add-now mb-2 px-4" type="submit">Add Now</button>
                                </form>
                                <h3 class="mt-2 mb-0">Note</h3>
                                <p class="disclaimer mb-0">
                                    Your are only able to invite member that has already registered in our website.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Checkout Information</h2>
                            <table class="trip-information">
                                <tr>
                                    <th style="width: 50%">
                                        Members
                                    </th>
                                    <td class="text-right" style="width: 50%">{{$item->details->count()}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Additional VISA
                                    </th>
                                    <td class="text-right" style="width: 50%">$ {{$item->additional_visa}},00</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Trip Price
                                    </th>
                                    <td class="text-right" style="width: 50%">$ {{$item->travel_package->price}},00 /
                                        Person
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Sub Total
                                    </th>
                                    <td class="text-right" style="width: 50%">$ {{$item->transaction_total}},00</td>
                                </tr>
                                <tr>
                                    <th style="width: 50%">
                                        Total(+Unique)
                                    </th>
                                    <td class="text-right text-total" style="width: 50%">
                                        <span class="text-blue">$ {{$item->transaction_total}},00</span>
                                        <span class="text-orange">{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2>Payment Instructions</h2>
                            <p class="payment-instruction">Please Complete your payment before going to wonderfully</p>
                            <p class="payment-instruction"></p>
                            <br>
                            <img src="{{asset('frontend/images/pngwing.com.png')}}" class="w-50">
                        </div>
                        <div class="join-container">
                            <a class="btn btn-block btn-join-now mt-3 py-2"
                               href="{{route('checkout-success',$item->id)}}">I Have
                                Made Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a class="text-muted" href="{{route('detail',$item->travel_package->slug)}}">
                                Cancel Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--end main-->
@endsection

@push('prepend-style')
    <link href="{{asset('frontend/libraries/gigjo/css/gijgo.min.css')}}" rel="stylesheet">
@endpush

@push('addon-script')
    <script src="{{asset('frontend/libraries/gigjo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{asset('/frontend/images/calendar-icon-png-4113.png')}}" height="23" >'
                }
            })
        });
    </script>
@endpush

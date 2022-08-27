@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Content -->
    <div class="content">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Ads 1 -->
                    <div class="col-span-12 lg:col-span-6 mt-6">
                        <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                            <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Paket Travel</div>
                            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Paket
                                Travel yang Tersedia
                            </div>
                            <a href="{{route('travel-package.index')}}"
                               class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">{{$travel_packages}}
                            </a>
                            <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2"
                                 alt="Icewall Tailwind HTML Admin Template"
                                 src="{{asset('backend/dist/images/hotel-svgrepo-com (1).svg')}}"
                                 style="max-width: 210px">
                        </div>
                    </div>
                    <!-- END: Ads 1 -->
                    <!-- BEGIN: Ads 1 -->
                    <div class="col-span-12 lg:col-span-6 mt-6">
                        <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                            <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Transaksi</div>
                            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Jumlah
                                Transaksi yang terdapat di database
                            </div>
                            <a href="{{route('transaction.index')}}"
                               class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">{{$transactions}}
                            </a>
                            <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2"
                                 alt="Icewall Tailwind HTML Admin Template"
                                 src="{{asset('backend/dist/images/dollar-svgrepo-com.svg')}}" style="max-width: 210px">

                        </div>
                    </div>
                    <!-- END: Ads 1 -->
                    <!-- BEGIN: Ads 1 -->
                    <div class="col-span-12 lg:col-span-6 mt-6">
                        <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                            <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Pending</div>
                            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Jumlah
                                Transaksi yang menunggu konfirmasi
                            </div>
                            <button
                                class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">{{$transaction_pending}}
                            </button>
                            <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2"
                                 alt="Icewall Tailwind HTML Admin Template"
                                 src="{{asset('backend/dist/images/loading-svgrepo-com.svg')}}"
                                 style="max-width: 210px">

                        </div>
                    </div>
                    <!-- END: Ads 1 -->
                    <!-- BEGIN: Ads 1 -->
                    <div class="col-span-12 lg:col-span-6 mt-6">
                        <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                            <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Sukses</div>
                            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Jumlah
                                Transaksi yang telah berhasil
                            </div>
                            <button
                                class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">{{$transaction_success}}
                            </button>
                            <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2"
                                 alt="Icewall Tailwind HTML Admin Template"
                                 src="{{asset('backend/dist/images/success-svgrepo-com.svg')}}"
                                 style="max-width: 210px">

                        </div>
                    </div>
                    <!-- END: Ads 1 -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content -->
@endsection


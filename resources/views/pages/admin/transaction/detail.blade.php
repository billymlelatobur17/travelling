@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Transaction Details</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('transaction.edit',$item->id)}}" class="btn btn-primary shadow-md mr-2">Edit
                    Status</a>
            </div>
        </div>
        <!-- BEGIN: Transaction Details -->
        <div class="intro-y grid grid-cols-11 gap-5 mt-5">
            <div class="col-span-12 lg:col-span-7 2xl:col-span-8">
                <div class="box p-5 rounded-md">
                    <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                        <div class="font-medium text-base truncate">Transaction</div>
                    </div>
                    <div class="overflow-auto lg:overflow-visible -mt-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap !py-5">ID</th>
                                <th class="whitespace-nowrap text-right">Paket Travel</th>
                                <th class="whitespace-nowrap text-right">Pembeli</th>
                                <th class="whitespace-nowrap text-right">Additional Visa</th>
                                <th class="whitespace-nowrap text-right">Total Transaksi</th>
                                <th class="whitespace-nowrap text-right">Status Transaksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="!py-4">{{$item->id}}</td>
                                <td class="text-right">{{$item->travel_package->title}}</td>
                                <td class="text-right">{{$item->user->name}}</td>
                                <td class="text-right">${{$item->additional_visa}}</td>
                                <td class="text-right">${{$item->transaction_total}}</td>
                                <td class="text-right ">
                                    @if($item->transaction_status === 'IN_CART')
                                        <div class="text-right text-primary">IN CART</div>
                                    @elseif($item->transaction_status === 'PENDING')
                                        <div class="text-right text-warning">PENDING</div>
                                    @elseif($item->transaction_status === 'SUCCESS')
                                        <div class="text-right text-success">SUCCESS</div>
                                    @elseif($item->transaction_status === 'FAILED')
                                        <div class="text-right text-danger">FAILED</div>
                                    @elseif($item->transaction_status === 'CANCEL')
                                        <div class="text-right text-danger">CANCEL</div>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped mt-8">
                            <thead>
                            <tr>
                                <th class=" text-center whitespace-nowrap !py-5">Pembelian</th>
                            </tr>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="whitespace-nowrap !py-5">ID</th>
                                        <th class="whitespace-nowrap text-right">Name</th>
                                        <th class="whitespace-nowrap text-right">Nationality</th>
                                        <th class="whitespace-nowrap text-right">Visa</th>
                                        <th class="whitespace-nowrap text-right">Doe Passport</th>
                                    </tr>
                                    @foreach($item->details as $detail)
                                        <tr>
                                            <td class="!py-4">{{$detail->id}}</td>
                                            <td class="text-right">{{$detail->username}}</td>
                                            <td class="text-right">{{$detail->nationality}}</td>
                                            <td class="text-right">{{$detail->is_visa ? '30Days' : 'N/A'}}</td>
                                            <td class="text-right">{{$detail->doe_passport}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Transaction Details -->
@endsection


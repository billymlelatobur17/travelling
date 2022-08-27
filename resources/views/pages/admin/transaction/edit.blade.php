@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">Edit Data Paket Travel {{$item->title}}</h2>
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
                <form action="{{route('transaction.update',$item->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="intro-y box p-5">
                        <div>
                            <label for=transaction_status" class="form-label">Status</label>
                            <select name="transaction_status" id="transaction_status" class="form-control w-full">
                                <option value="IN_CART" {{$item->transaction_status === 'IN_CART' ? 'selected' : ''}}>
                                    IN CART
                                </option>
                                <option value="PENDING" {{$item->transaction_status === 'PENDING' ? 'selected' : ''}}>
                                    PENDING
                                </option>
                                <option value="SUCCESS" {{$item->transaction_status === 'SUCCESS' ? 'selected' : ''}}>
                                    SUCCESS
                                </option>
                                <option value="CANCEL" {{$item->transaction_status === 'CANCEL' ? 'selected' : ''}}>
                                    CANCEL
                                </option>
                                <option value="FAILED" {{$item->transaction_status === 'FAILED' ? 'selected' : ''}}>
                                    FAILED
                                </option>
                            </select>
                        </div>
                        <div class="text-right mt-5">
                            <a href="{{route('transaction.index')}}"
                               class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                            <button type="submit" class="btn btn-primary w-24">Update</button>
                        </div>
                    </div>
                </form>
                <!-- END: Form Layout -->
            </div>
        </div>
    </div>
@endsection


@extends('layouts.frontapp')
@section('breadcrumb')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href=" {{ url('customer/create') }} ">Create</a></li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container">
    <div class="row">
            <div class="col-12">
                <h1>Customer List</h1>
            </div>
        </div>
    
        @foreach($customers as $customer)
            <div class="row">
                <div class="col-2">
                    {{ $customer->id }}
                </div>
                <div class="col-4">
                    <a href="{{ route('customer.show', ['customer' => $customer]) }}">
                        {{ $customer->name }}
                    </a>
                </div>
                <div class="col-4">{{ $customer->company->name }}</div>
                <div class="col-2">{{ $customer->active }}</div>
            </div>
        @endforeach
    
        <div class="row">
            <div class="col-12 d-flex justify-content-center pt-4">
                {{ $customers->links() }}
            </div>
        </div>
</div>
@endsection

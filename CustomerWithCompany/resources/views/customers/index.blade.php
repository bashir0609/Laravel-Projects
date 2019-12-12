@extends('layouts.app')

@section('title', 'Customer List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <a class="btn btn-info" role="button" href="{{ route('customers.create') }}">Add New Customer</a>
        </div>
    </div>

    @foreach($customers as $customer)
        <div class="row">
            <div class="col-2">
                {{ $customer->id }}
            </div>
            <div class="col-4">
                <a href="{{ route('customers.show', ['customer' => $customer]) }}">
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
@endsection

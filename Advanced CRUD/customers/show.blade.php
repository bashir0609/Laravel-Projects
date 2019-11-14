@extends('layouts.frontapp')

@section('title', 'Details for ' . $customer->name)
@section('breadcrumb')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href=" {{ url('customer') }} ">Customer</a></li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-12">
                    <h1>Details for {{ $customer->name }}</h1>
                    <p><a href="{{ route('customer.edit', ['customer' => $customer]) }}">Edit</a></p>
        
                    <form action="{{ route('customer.destroy', ['customer' => $customer]) }}" method="POST">
                        @method('DELETE')
                        @csrf
        
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        
            <div class="row">
                <div class="col-12">
                    <p><strong>Name</strong> {{ $customer->name }}</p>
                    <p><strong>Email</strong> {{ $customer->email }}</p>
                    <p><strong>Company</strong> {{ $customer->company->name }}</p>
                </div>
            </div>
        
            @if($customer->image)
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('storage/' . $customer->image) }}" alt="" class="img-thumbnail">
                    </div>
                </div>
            @endif
    </div>
@endsection
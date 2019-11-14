@extends('layouts.frontapp')
@section('breadcrumb')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('customer') }}">Customer</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</div>
@endsection
@section('message')
    @include('layouts.message')
@endsection
@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header text-center">Add New Post</div>

            <div class="card-body">
                <form action="{{ url('customer') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
                        <div>{{ $errors->first('name') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
                        <div>{{ $errors->first('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label for="active">Status</label>
                        <select name="active" id="active" class="form-control">
                            <option value="" disabled>Select customer status</option>
                    
                            @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
                                <option value="{{ $activeOptionKey }}" {{ $customer->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="image">Profile Image</label>
                        <input type="file" name="image" class="py-2">
                        <div>{{ $errors->first('image') }}</div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
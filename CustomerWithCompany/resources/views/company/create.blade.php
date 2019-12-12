@extends('layouts.app')

@section('title', 'Add New Company')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Add New Company</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('company.store') }} " method="POST" >
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
                
                @csrf

                <button type="submit" class="btn btn-primary">Add Company</button>
            </form>
        </div>
    </div>
@endsection
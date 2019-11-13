@extends('layouts.app')
@section('breadcrumb')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
    <p>
        <a href=" {{ route('test.create') }} ">Create</a>
    </p>
    <div class="row pt-5">
        
        @foreach ($tests as $test)
            <div class="col-4 pb-4">
                <p>{{ $test->title}}</p>
                <img src="storage/{{$test->image}}" class="w-100">
            </div>
        @endforeach
    </div>
</div>
@endsection

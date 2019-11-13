@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="post image" class="w-100">
        </div>
        <div class="col-4">
            <h1> {{ $post->user->username }} </h1>
            <div> {{ $post->caption }} </div>
        </div>
    </div>
</div>
    
@endsection
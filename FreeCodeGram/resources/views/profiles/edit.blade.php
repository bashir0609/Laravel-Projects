@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

            <div class="col-md-6">
                <input id="url" type="text" class="form-control" name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Profile Image</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control-image" name="image" value="{{ old('image') ?? $user->profile->image }}" autocomplete="image" autofocus>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Update Profile
                </button>
            </div>
        </div>
    </form>
</div>    
@endsection
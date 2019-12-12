@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('product/view')}}">Product List</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $single_product_info->product_name }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header bg-success">
                Edit Product Form
            </div>
            <div class="card-body">
                @if (session('editstatus'))
                    <div class="alert bg-success">
                        {{ session('editstatus') }}
                    </div>
                @endif
                @if ($errors->all())
                    <div class="alert bg-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>                                                        
                        @endforeach
                    </div>                        
                @endif
                <form action=" {{ url('product/edit/update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="hidden" name="product_id" value="{{ $single_product_info->id }}">
                        <input type="text" class="form-control" name="product_name" value="{{ $single_product_info->product_name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea class="form-control" rows="3" name="product_description">{{ $single_product_info->product_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="text" class="form-control" name="product_price" value="{{ $single_product_info->product_price }}">
                    </div>
                    <div class="form-group">
                        <label for="">Product Quantity</label>
                        <input type="text" class="form-control" name="product_quantity" value="{{ $single_product_info->product_quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alert Quantity</label>
                        <input type="text" class="form-control" name="alert_quantity" value="{{ $single_product_info->alert_quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" class="form-control" name="product_image" >
                        <img src=" {{ asset('uploads/product_photos')}}/{{$single_product_info->product_image }} " alt="Not Found" width="100">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
</div>
    
@endsection
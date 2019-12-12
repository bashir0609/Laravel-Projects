@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header bg-success">
                    Added Product List
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL. No</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Alert Quantity</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td> {{ $loop->index +1 }} </td>
                                    <td> {{ $product->product_name }} </td>
                                    <td> {{ str_limit($product->product_description,20) }} </td>
                                    <td> {{ $product->product_price }} </td>
                                    <td> {{ $product->product_quantity }} </td>
                                    <td> {{ $product->alert_quantity }} </td>
                                    <td>
                                        <img src=" {{ asset('uploads/product_photos')}}/{{$product->product_image }} " alt="Not Found" width="100">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href=" {{ url('product/delete') }}/{{ $product->id }}" class="btn btn-sm btn-danger">Delete</a>
                                            <a href=" {{ url('product/edit') }}/{{ $product->id }}" class="btn btn-sm btn-info">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center text-danger">
                                    <td colspan="9">No Product Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-danger">
                    Deleted Product List
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL. No</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Alert Quantity</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($deleted_products as $deleted_product)
                                <tr>
                                    <td> {{ $loop->index +1 }} </td>
                                    <td> {{ $deleted_product->product_name }} </td>
                                    <td> {{ str_limit($deleted_product->product_description,20) }} </td>
                                    <td> {{ $deleted_product->product_price }} </td>
                                    <td> {{ $deleted_product->product_quantity }} </td>
                                    <td> {{ $deleted_product->alert_quantity }} </td>
                                    <td> 
                                            <img src=" {{ asset('uploads/product_photos')}}/{{$deleted_product->product_image }} " alt="Not Found" width="100">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href=" {{ url('product/restore') }}/{{ $deleted_product->id }}" class="btn btn-sm btn-success">Restore</a>
                                            <a href=" {{ url('product/permanentdelete') }}/{{ $deleted_product->id }}" class="btn btn-sm btn-danger">Permanent Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center text-success">
                                    <td colspan="9">No Deleted Product Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-success">
                    Add Product Form
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert bg-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->all())
                        <div class="alert bg-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>                                                        
                            @endforeach
                        </div>                        
                    @endif
                    <form action=" {{ url('product/insert') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="{{ old('product_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Product Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter Product Description" name="product_description">{{ old('product_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Product Price</label>
                            <input type="text" class="form-control" placeholder="Enter Product Price" name="product_price" value="{{ old('product_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Product Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Product Quantity" name="product_quantity" value="{{ old('product_quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Alert Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter Product Quantity" name="alert_quantity" value="{{ old('alert_quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Product Image</label>
                            <input type="file" class="form-control" name="product_image">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Company')

@section('content')
    <div class="row"> 
        <a class="btn-sm btn-info p-3" role="button" href="{{ route('company.create') }} ">Add New Company</a>  
    </div>

    <div class="row">
        <div class="col-12">
            <h1>Company List</h1>
            <ul>
                @foreach ($companies as $company)
                    <li>{{ $company->name }} <span class="text-muted">{{$company->phone}} </span>  </li>                    
                @endforeach
            </ul>
        </div>
    </div>
@endsection
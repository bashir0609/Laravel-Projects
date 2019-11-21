# Laravel-Projects

app.blade.php
-------------
```
@if(session()->has('message'))
    <div class="alert alert-success" role="alert">
	<strong>Success</strong> {{ session()->get('message') }}
    </div
@endif
@if ($errors->all())
    <div class="alert alert-danger">
	@foreach ($errors->all() as $error)
	    <li>{{ $error }}</li>                                                        
	@endforeach
    </div>                        
@endif
```

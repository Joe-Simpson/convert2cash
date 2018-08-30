@extends('layouts.master')

@section('content')
<div class="container">
	
	<div class="row justify-content-end">
		<a href="/clients/create"><button class="btn btn-primary">Create New</button></a>
	</div>

	<hr>

    <div class="row justify-content-center">
    	
        @include('clients.partials.table')

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>
@endsection
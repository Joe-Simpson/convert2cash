@extends('layouts.master')

@section('content')
<div class="container">
	
	<div class="row justify-content-end">
		<a href="/buyin/create"><button class="btn btn-primary">Create New</button></a>
	</div>

	<hr>

    <div class="row justify-content-center">

        @include('buyin.partials.table')

        <!-- This should be a "snackbar", rebuild -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>
@endsection
@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<h3>Buy-Backs Requiring Attention</h3>
	</div>
    <div class="row justify-content-center">
        @include('buyback.partials.table')
    </div>
</div>
@endsection

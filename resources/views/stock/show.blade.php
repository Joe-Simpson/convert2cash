@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>

			    @include('stock.partials.stock')

			    <div class="form-group">
			      <a href="/stock/{{ $stock -> id }}/edit" class="btn btn-primary">Edit</a>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/stock"><button class="btn btn-secondary">Return to Stock</button></a>
    </div>
</div>
@endsection
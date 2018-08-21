@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/stock/{{ $stock -> id }}/edit">

			    {{ csrf_field() }}

			    @include('stock.partials.stock')

			    <div class="form-group">
			      <button type="submit" class="btn btn-primary">Edit</button>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/stock"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
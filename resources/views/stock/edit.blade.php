@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/stock/{{ $stock -> id }}">
			    {{ csrf_field() }}
                {{ method_field('PUT') }}

			    @include('stock.partials.stock')

			    <div class="form-group row justify-content-end">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/stock/{{ $stock -> id }}"><button class="btn btn-secondary">Abandon Changes</button></a>
    </div>
</div>
@endsection
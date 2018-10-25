@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>

			    @include('sales.partials.sales')

			    <div class="form-group">
			      <a href="/sales/{{ $sales -> id }}/edit" class="btn btn-primary">Edit</a>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/sales"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
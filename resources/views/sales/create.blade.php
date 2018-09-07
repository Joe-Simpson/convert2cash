@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/stock">

			    {{ csrf_field() }}

                <div class="form-group row">
                    <h3>Item Details</h3>
                </div>
                
                @include('stock.partials.stock')

                <hr>

                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>
                
                <p>Some form of Client selector goes here</p>

                <hr>

                <div class="form-group row">
                    <h3>Sale Details</h3>
                </div>

			    @include('sales.partials.sales')

			    <div class="form-group">
			      <button type="submit" class="btn btn-primary">Confirm Sale</button>
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
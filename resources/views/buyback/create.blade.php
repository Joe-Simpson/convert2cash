@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/buyback">

			    {{ csrf_field() }}

                <div class="form-group row">
                    <h3>Item Details</h3>
                </div>
                
                @include('stock.partials.stock')

                <hr>

                <div class="form-group row">
                    <h3>Buy-back Details</h3>
                </div>

                @include('buyback.partials.buyback')
                
                <hr>
                
                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>
                
                @include('clients.partials.client')

                <hr>

                <div class="form-group">
			      <button type="submit" class="btn btn-primary">Create</button>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/clients/"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
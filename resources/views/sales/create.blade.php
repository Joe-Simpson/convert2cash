@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/sales">

			    {{ csrf_field() }}

                <div class="form-group row">
                    <h3>Stock Items</h3>
                </div>
                
                @include('sales.partials.stock')
                
                <hr>

                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>

                @include('sales.partials.client')

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
@section('scripts')
    <script>
    $(document).ready(function() {
        $('#client_search').select2();
        $('#stock_search').select2();
    });
    </script>
@stop
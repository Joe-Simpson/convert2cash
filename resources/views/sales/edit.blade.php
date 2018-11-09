@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/sales/{{ $sales -> id }}">

                {{ csrf_field() }}
                {{ method_field('put') }}

			     @include('sales.partials.sales')
                
                <div class="form-group row justify-content-end">
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col">
                        <a class="btn btn-secondary" href="/sales/{{ $sales -> id }}">Abandon Changes</a>
                    </div>
                </div>

			    @include('layouts.errors')

                <hr>

                    <div class="form-group row">
                        <h3>Item Details</h3>
                    </div>

                    @if ( isset( $sales->saleStockLink ) )
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Stock Number</th>
                                <th scope="col">Make</th>
                                <th scope="col">Model</th>
                                <th scope="col">Selling Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales->saleStockLink as $stockLink)
                            <tr>
                                <th scope="row">
                                    {{ sprintf("%'.08d\n", $stockLink->stock->id) }}
                                </th>
                                <td>{{ $stockLink->stock->make }}</td>
                                <td>{{ $stockLink->stock->model }}</td>
                                <td>£ {{ $stockLink->stock->selling_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>Stock Item(s) Deleted</p>
                    @endif

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/sales"><button class="btn btn-secondary">Return to Sales</button></a>
    </div>
</div>
@endsection
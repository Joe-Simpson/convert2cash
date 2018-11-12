@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <a href="/layaways/{{ $layaways -> id }}/payment">
            <button  class="btn btn-success">Add New Payment</button>
        </a>
        @if ($layaways->created_at->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d'))
        <a href="/layaways/{{ $layaways -> id }}/cancel">
            <button class="btn btn-danger">Cancel Layaway</button>
        </a>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>

                @include('layaways.partials.layaways')

			    @include('layouts.errors')

                <hr>

                    <div class="form-group row">
                        <h3>Item Details</h3>
                    </div>

                    @if ( isset( $layaways->layawayStockLink ) )
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
                            @foreach($layaways->layawayStockLink as $stockLink)
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
        <a href="/layaways"><button class="btn btn-secondary">Return to Layaways</button></a>
    </div>
</div>
@endsection
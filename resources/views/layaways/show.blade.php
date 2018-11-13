@extends('layouts.master')

@section('content')
<div class="container">
    @if ($layaways->created_at->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d'))
    <div class="row justify-content-end">
        <a href="/layaways/{{ $layaways -> id }}/cancel">
            <button class="btn btn-danger">Cancel Layaway</button>
        </a>
    </div>
    @endif
    <div class="row">
        <div class="container">
            <h3>Layaway Payments</h3>
        </div>
    </div>
    <div class="row justify-content-between">
        <div class="col justify-content-center">
            <form method="post" action="/layaways-payment">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                @include('layaways.partials.layaways-payment')

                @include('layouts.errors')

            </form>
        </div>
        <div class="col" style="overflow-y: scroll; max-height: 150px;">

            @include('layaways.partials.layaways-payment-table')
        
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="container">
            <h3>Layaway Information</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>

                @include('layaways.partials.layaways')

                @include('layouts.errors')

            </form>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <h3>Layaway Stock Item(s)</h3>
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
    </div>
    <div class="row">
        <a href="/layaways"><button class="btn btn-secondary">Return to Layaways</button></a>
    </div>
</div>
@endsection
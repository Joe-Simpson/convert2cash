@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        @if (! $buyback->cancelled && ! $buyback->stock->seized && ! $buyback->bought_back_date)
        <!-- <div class="col"> -->
            <a href="/buyback/{{ $buyback -> id }}/buy-back">
                <button class="btn btn-success">Buy-Back</button>
            </a>
        <!-- </div> -->
        <!-- <div class="col"> -->
            <a href="/buyback/{{ $buyback -> id }}">
                <button class="btn btn-secondary" disabled>Renew</button>
            </a>
        <!-- </div> -->
        <!-- <div class="col"> -->
            <a href="/buyback/{{ $buyback -> id }}">
                <button class="btn btn-secondary" disabled>Clone</button>
            </a>
        <!-- </div> -->
        <!-- <div class="col"> -->
            <a href="/buyback/{{ $buyback -> id }}/seize">
                <button class="btn btn-danger">Seize</button>
            </a>
            <!-- </div> -->
            @if ($buyback->created_at->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d'))
                <a href="/buyback/{{ $buyback -> id }}/cancel">
                    <button class="btn btn-danger">Cancel</button>
                </a>
            @endif
        @endif
    </div>
    <hr>
</div>
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <form method="GET" action="/buyback/{{ $buyback -> id }}/edit">

                {{ csrf_field() }}
                
                <div class="form-group row">
                    <h3>Buy-Back Details</h3>
                </div>

                @include('buyback.partials.buyback')
                
                <hr>

                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>

                @if ( isset( $buyback->client ) )
                    @include('clients.partials.client')
                @else
                    <p>Client Deleted</p>
                @endif
                
                <hr>

                <div class="form-group row">
                    <h3>Item Details</h3>
                </div>

                @if ( isset( $buyback->stock ) )
                    @include('stock.partials.stock')
                @else
                    <p>Stock Item Deleted</p>
                @endif
                
                <hr>

                <div class="form-group row justify-content-between">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
    <div class="row">
        <a href="/buyback"><button class="btn btn-secondary">Return</button></a>
    </div>
</div>
@endsection
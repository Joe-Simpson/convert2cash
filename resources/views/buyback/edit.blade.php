@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/buyback/{{ $buyback -> id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
    <div class="row">
        <a href="/buyback/{{ $buyback -> id }}"><button class="btn btn-secondary">Abandon Changes</button></a>
    </div>
</div>
@endsection
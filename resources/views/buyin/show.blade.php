@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>

                <div class="form-group row">
                    <h3>Buy-In Details</h3>
                </div>

                @include('buyin.partials.buyin')
                
                <hr>

                <div class="form-group row">
                    <h3>Client Details</h3>
                </div>

                @if ( isset( $buyin->client ) )
                    @include('clients.partials.client')
                @else
                    <p>Client Deleted</p>
                @endif
                
                <hr>

                <div class="form-group row">
                    <h3>Item Details</h3>
                </div>

                @if ( isset( $buyin->stock ) )
                    @include('stock.partials.stock')
                @else
                    <p>Stock Item Deleted</p>
                @endif
                
                <hr>

                <div class="form-group row justify-content-between">
                    <div class="col">
                        <a href="/buyin/{{ $buyin -> id }}/edit" class="btn btn-primary">Edit</a>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
    <div class="row">
        <a href="/buyin"><button class="btn btn-secondary">Return</button></a>
    </div>
</div>
@endsection
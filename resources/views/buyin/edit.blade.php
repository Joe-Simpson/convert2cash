@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/buyin/{{ $buyin -> id }}">

                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>

            <form action="/buyin/{{ $buyin -> id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger" confirmation="test">Delete Buy-In</button>
            </form>

        </div>
    </div>
    <div class="row">
        <a href="/buyin/{{ $buyin -> id }}"><button class="btn btn-secondary">Abandon Changes</button></a>
    </div>
</div>
@endsection
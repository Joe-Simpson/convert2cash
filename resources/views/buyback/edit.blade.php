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
                
                @include('clients.partials.client')

                <hr>

                <div class="form-group row">
                    <h3>Item Details</h3>
                </div>
                
                @include('stock.partials.stock')

                <hr>

                <div class="form-group row justify-content-between">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>

            <form action="/buyback/{{ $buyback -> id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger" confirmation="test">Delete Buy-Back</button>
            </form>

        </div>
    </div>
    <div class="row">
        <a href="/buyback/{{ $buyback -> id }}"><button class="btn btn-secondary">Abandon Changes</button></a>
    </div>
</div>
@endsection
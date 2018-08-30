@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/buyin/{{ $buyin -> id }}/edit">

                {{ csrf_field() }}
                
                <div class="form-group row">
                    <h3>Buy-In Details</h3>
                </div>

                @include('buyin.partials.buyin')
                
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
                        <button type="submit" class="btn btn-primary">Edit</button>
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
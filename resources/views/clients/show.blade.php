@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/clients/{{ $client -> id }}/edit">

                {{ csrf_field() }}
                
                @include('clients.partials.client')
                
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
        <a href="/clients/"><button class="btn btn-secondary">Return</button></a>
    </div>
</div>
@endsection
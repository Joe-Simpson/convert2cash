@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/clients/{{ $client -> id }}">
                @method('put')
                {{ csrf_field() }}
                
                @include('clients.partials.client')
                
                <div class="form-group row justify-content-end">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>

            <form action="/clients/{{ $client -> id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger" confirmation="test">Delete Client</button>
            </form>

        </div>
    </div>
    <div class="row">
        <a href="/clients/{{ $client -> id }}"><button class="btn btn-secondary">Abandon Changes</button></a>
    </div>
</div>
@endsection
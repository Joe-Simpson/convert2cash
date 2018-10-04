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
                        <button type="submit" class="btn btn-primary">Edit Client Details</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="row justify-content-center" id="notes">
        <div class="col-md-8">
            <h3>Notes</h3>
            <form method="post" action="/client-notes">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <input type="text" 
                       name="client_id"
                       id="client_id" 
                       class="form-control"
                       value="{{ $client -> id }}"
                       hidden>
                
                <div class="form-group row">
                    <div class="col">
                        <textarea class="form-control"
                                    id="body"
                                    name="body">{{ old('notes') }}</textarea>
                    </div>
                </div>
                
                <div class="form-group row justify-content-between">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Add New Note</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
    
    @if ( count($client->clientNotes) > 0 )
        <div class="row justify-content-center">
            @include('clients.partials.client-notes')
        </div>
    @endif

    @if ( count($client->buyback) > 0 )
        <div class="row justify-content-center">
            @include('clients.partials.client-buyback-table')
        </div>
    @endif

    <div class="row">
        <a href="/clients/"><button class="btn btn-secondary">Return</button></a>
    </div>

</div>
@endsection
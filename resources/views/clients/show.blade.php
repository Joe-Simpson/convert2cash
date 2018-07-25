@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Client Details</h3>
                        
            <p>{{ $client -> first_name }}</p>
            <p>{{ $client -> surname }}</p>
            <p>{{ $client -> title }}</p>
            <p>{{ $client -> postcode }}</p>
            <p>{{ $client -> address }}</p>
            <p>{{ $client -> dob }}</p>
            <p>{{ $client -> phone_number }}</p>
            <p>{{ $client -> id_verification_type }}</p>
            <p>{{ $client -> customer_banned }}</p>
            <a href="/clients/{{ $client -> id }}/edit"><p>Edit</p></a>

            <form action="/clients/{{ $client -> id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-primary" confirmation="test">Delete</button>
            </form>

            <a href="/clients"><p>Back</p></a>

        </div>
    </div>
</div>
@endsection
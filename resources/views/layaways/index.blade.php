@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('layaways.partials.table')

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>
@endsection
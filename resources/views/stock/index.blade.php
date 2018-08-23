@extends('layouts.master')

@section('content')
<div class="container">
	
	<div class="row justify-content-end">
		<a href="/stock/create"><button class="btn btn-primary">Create New</button></a>
	</div>

	<hr>

    <div class="row justify-content-center">

        <table data-toggle="table" 
               data-pagination="true" 
               data-search="true"
               data-classes="table table-condensed"
               data-striped="true">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Boxed</th>
                    <th scope="col">Condition</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach( $stock as $stock_item )
                        <tr>
                            <td>{{ $stock_item->id }}</th>
                            <td>{{ $stock_item->make }}</td>
                            <td>{{ $stock_item->model }}</td>
                            <td>{{ $stock_item->boxed }}</td>
                            <td>{{ $stock_item->condition }}</td>
                            <td>
                                <a href="/stock/{{ $stock_item -> id }}">
                                    <span class="badge badge-secondary">Details</span>
                                </a>
                            </td>
                       </tr>
                @endforeach
            </tbody>
        </table>
        <!-- This should be a "snackbar", rebuild -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

    </div>
</div>
@endsection
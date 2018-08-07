@extends('layouts.master')

@section('content')
<div class="container">
	
	<div class="row justify-content-end">
		<a href="/clients/create"><button class="btn btn-primary">Create New</button></a>
	</div>

	<hr>

    <div class="row justify-content-center">

        <!-- This should be a "snackbar", rebuild -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    	
        <table class="table table-striped table-hover table-sm">
    		<thead>
    			<tr>
    				<th scope="col">#</th>
    				<th scope="col">First Name</th>
    				<th scope="col">Surname</th>
    				<th scope="col">Title</th>
    				<th scope="col">Date of Birth</th>
    				<th scope="col">Phone Number</th>
    				<th scope="col">Postcode</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach( $clients as $client )
                        <!-- This is a bit too 'in your face'. Redesign as a symbol in the table -->
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
    						<td>{{ $client->first_name }}</td>
    						<td>{{ $client->surname }}</td>
    						<td>{{ $client->title }}</td>
    						<td>{{ $client->dob }}</td>
    						<td>{{ $client->phone_number }}</td>
    						<td>{{ $client->postcode }}</td>
                            <td>
                                @if ( $client->customer_banned == "true" )
                                    <i class="fas fa-ban"></i>
                                @endif
                            </td>
                            <td><a href="/clients/{{ $client -> id }}">Details</a></td>
					   </tr>

	        	@endforeach
    		</tbody>
    	</table>        
    </div>
</div>
@endsection
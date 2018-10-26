<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">First Name</th>
			<th scope="col">Surname</th>
			<th scope="col">Title</th>
			<th scope="col">Date of Birth</th>
			<th scope="col">Phone Number</th>
			<th scope="col">Address</th>
			<th scope="col">Postcode</th>
			<th scope="col" data-visible="false">Address+Postcode</th>
            <th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach( $clients as $client )
            <tr>
                <td>
                    @if ( $client->client_banned == "true" )
                        <i class="fas fa-ban"></i>
                    @else
                        {{ $client->id }}
                    @endif
                </td>
				<td>{{ $client->first_name }}</td>
				<td>{{ $client->surname }}</td>
				<td>{{ $client->title }}</td>
				<td>{{ $client->dob }}</td>
				<td>{{ $client->phone_number }}</td>
				<td>{{ $client->address }}</td>
				<td>{{ $client->postcode }}</td>
				<td hidden>{{ $client->addressSearchString() }}</td>
                <td>
                    <a href="/clients/{{ $client -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
		   </tr>
    	@endforeach
	</tbody>
</table>
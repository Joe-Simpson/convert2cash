<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">Note Created</th>
            <th scope="col">Note Body</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $client->clientNotes as $clientNote )
            <tr>
                <td>{{ $clientNote->created_at->format('d-m-Y') }}</td>
                <td>{{ $clientNote->body }}</td>
           </tr>
        @endforeach
    </tbody>
</table>
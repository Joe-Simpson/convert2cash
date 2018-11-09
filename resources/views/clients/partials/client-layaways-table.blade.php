<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Created</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $client->layaways as $layaways )
            <tr>
                <td>{{ $layaways->id }}</th>
                <td>{{ $layaways->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="/layaways/{{ $layaways -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Created</th>
            <th scope="col">Loan Amount</th>
            <th scope="col">Term</th>
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Stock</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $buybacks as $buyback )
            <tr>
                <td>{{ $buyback->id }}</th>
                <td>{{ $buyback->created_at }}</td>
                <td>£ {{ $buyback->loan_amount }}</td>
                <td>{{ $buyback->term }}</td>
                <td>{{ $buyback->user->name }}</td>
                <td>
                    @if ( isset($buyback->client) )
                    {{ $buyback->client->first_name }} {{ $buyback->client->surname }}
                    @else
                    Client Deleted
                    @endif
                </td>
                <td>
                    @if ( isset($buyback->stock) )
                    {{ $buyback->stock->make }} - {{ $buyback->stock->model }}
                    @else
                    Stock Item Deleted
                    @endif
                </td>
                <td>
                    <a href="/buyback/{{ $buyback -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Created</th>
            <th scope="col">Cost Price</th>
            <th scope="col">Selling Price</th>
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Stock</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $client->buyin as $buyin )
            <tr>
                <td>{{ $buyin->id }}</th>
                <td>{{ $buyin->created_at }}</td>
                <td>{{ $buyin->cost_price }}</td>
                <td>@if ( isset($buyin->stock) )
                    {{ $buyin->stock->selling_price }}
                    @else
                    Stock Item Deleted
                    @endif
                </td>
                <td>{{ $buyin->user->name }}</td>
                <td>
                    @if ( isset($buyin->client) )
                    {{ $buyin->client->first_name }} {{ $buyin->client->surname }}
                    @else
                    Client Deleted
                    @endif
                </td>
                <td>
                    @if ( isset($buyin->stock) )
                    {{ $buyin->stock->make }} - {{ $buyin->stock->model }}
                    @else
                    Stock Item Deleted
                    @endif
                </td>
                <td>
                    <a href="/buyin/{{ $buyin -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
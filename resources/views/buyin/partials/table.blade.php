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
            <th scope="col">User</th>
            <th scope="col">Client</th>
            <th scope="col">Stock</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $buyins as $buyin )
            <tr>
                <td>{{ $buyin->id }}</th>
                <td>{{ $buyin->created_at->format('d-m-Y') }}</td>
                <td>{{ $buyin->cost_price }}</td>
                <td>{{ $buyin->user->name }}</td>
                <td>
                    @if ( isset($buyin->client) )
                    {{ $buyin->client->first_name }} {{ $buyin->client->surname }}
                    @else
                    Client Deleted
                    @endif
                </td>
                <td>
                     @if ( isset($buyin->buyinStockLink) )
                        {{ count($buyin->buyinStockLink) }}
                        @if ( count($buyin->buyinStockLink) > 1)
                            Items
                        @else
                            Item
                        @endif
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
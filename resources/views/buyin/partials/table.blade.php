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
            <th scope="col">Pay Cash</th>
            <th scope="col">Selling Price</th>
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
                <td>{{ $buyin->created_at }}</td>
                <td>{{ $buyin->cost_price }}</td>
                <td>{{ $buyin->pay_cash }}</td>
                <td>{{ $buyin->selling_price }}</td>
                <td>{{ $buyin->user_id }}</td>
                <td>{{ $buyin->client_id }}</td>
                <td>{{ $buyin->stock_id }}</td>
                <td>
                    <a href="/buyin/{{ $buyin -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
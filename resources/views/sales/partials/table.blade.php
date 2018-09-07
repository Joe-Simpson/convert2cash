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
        @foreach( $sales as $sale )
            <tr>
                <td>{{ $sale->id }}</th>
                <td>{{ $sale->created_at }}</td>
                <td>
                    <a href="/sales/{{ $sale -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">Stock Number</th>
            <th scope="col">Make</th>
            <th scope="col">Model</th>
            <th scope="col">Boxed</th>
            <th scope="col">Condition</th>
            <th scope="col">Selling Price</th>
            <th scope="col">Seized</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $stock as $stock_item )
            <tr>
                <td>{{ sprintf("%'.08d\n", $stock_item->id) }}</td>
                <td>{{ $stock_item->make }}</td>
                <td>{{ $stock_item->model }}</td>
                <td>@if ($stock_item->boxed == "true") Yes @else No @endif</td>
                <td>{{ $stock_item->condition }}</td>
                <td>£ {{ $stock_item->selling_price }}</td>
                <td>
                    @if ($stock_item->seized)
                        Seized on {{ $stock_item->seized_date->format('d-m-Y') }}
                    @else
                        No
                    @endif
                </td>
                <td>
                    <a href="/stock/{{ $stock_item -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                    @if ( ! isset($stock_item->sales) )
                        @if( $stock_item->seized 
                            && ! $stock_item->stock_loss_date 
                            || $stock_item->aquisition_type == 'buy-in')
                        <span class="badge badge-success">Sellable</span>
                        @endif
                    @else
                    <a href="/sales/{{ $stock_item -> sales -> id }}">
                        <span class="badge badge-danger">Sold</span>
                    </a>
                    @endif
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
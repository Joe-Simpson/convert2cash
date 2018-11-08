<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Created</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Stock Item(s)</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $sales as $sale )
            <tr>
                <td>{{ $sale->id }}</th>
                <td>{{ $sale->created_at->format('d-m-Y') }}</td>
                <td>{{ $sale->payment_method }}</td>
                <td>
                  @if(isset($sale->saleStockLink))
                    <ol style="margin-bottom: 0; padding-left: 10px;">
                      @foreach ($sale->saleStockLink as $stockLink)
                        <li>
                          {{ sprintf("%'.08d\n", $stockLink->stock->id) }} - {{ $stockLink->stock->make }} - {{ $stockLink->stock->model }}
                        </li>
                      @endforeach
                    </ol>
                  @else
                    Stock Item Deleted
                  @endif
                </td>
                <td>
                    <a href="/sales/{{ $sale -> id }}">
                        <span class="badge badge-secondary">Details</span>
                    </a>
                </td>
           </tr>
        @endforeach
    </tbody>
</table>
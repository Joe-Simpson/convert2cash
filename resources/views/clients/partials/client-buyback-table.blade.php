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
            <th scope="col">Stock</th>
            <th scope="col">Details</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $client->buyback as $buyback )
            <tr>
                <td>{{ $buyback->id }}</th>
                <td>{{ $buyback->created_at->format('d-m-Y') }}</td>
                <td>£ {{ $buyback->loan_amount }}</td>
                <td>{{ $buyback->term }}</td>
                <td>{{ $buyback->user->name }}</td>
                <td>
                    @if ( isset($buyback->stock) )
                        <a href="/stock/{{ $buyback->stock_id }}" >{{ $buyback->stock->make }} - {{ $buyback->stock->model }}</a>
                    @else
                    Stock Item Deleted
                    @endif
                </td>
                <td>
                    @if($buyback->cancelled)
                        Buy back cancelled the same day
                    @elseif($buyback->bought_back_date)
                        Bought back on {{ $buyback->bought_back_date->format('d-m-Y') }}
                    @elseif($buyback->stock && $buyback->stock->seized)
                        Stock seized on {{ $buyback->stock->seized_date->format('d-m-Y') }}
                    @else
                        End on {{ $buyback->created_at->add(\Carbon\CarbonInterval::fromString($buyback->term))->format('d-m-Y') }}
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
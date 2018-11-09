<table data-toggle="table" 
       data-pagination="true" 
       data-search="true"
       data-classes="table table-condensed"
       data-striped="true">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Created</th>
            <th scope="col">Stock Item(s)</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $layaways as $layaway )
            <tr>
                <td>{{ $layaway->id }}</th>
                <td>{{ $layaway->created_at->format('d-m-Y') }}</td>
                <td>
                  @if(isset($layaway->layawayStockLink))
                    <ol style="margin-bottom: 0; padding-left: 10px;">
                      @foreach ($layaway->layawayStockLink as $stockLink)
                        <li>
                          <ul class="list-inline">
                            <li class="list-inline-item">
                              {{ sprintf("%'.08d\n", $stockLink->stock->id) }}   
                            </li>
                            <li class="list-inline-item">
                              {{ $stockLink->stock->make }}
                            </li>
                            <li class="list-inline-item">
                              {{ $stockLink->stock->model }}
                            </li>
                            <li class="list-inline-item">
                              {{ $stockLink->stock->condition }}
                            </li>
                            <li class="list-inline-item">
                              £ {{ $stockLink->stock->selling_price }} 
                            </li>
                          </ul>
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
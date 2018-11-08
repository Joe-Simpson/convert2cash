<div class="form-group row">
    <div class="col-sm-12">
        <select class="form-control"
                id="stock_search"
                name="stock_search[]"
                multiple="multiple">
            @foreach($stocks as $stock)
                <option value="{{ $stock->id }}">
                    <ul class="list-inline">
                      <li class="list-inline-item">{{ sprintf("%'.08d\n", $stock->id) }}</li>
                      <li class="list-inline-item"> - {{ $stock->make }}</li>
                      <li class="list-inline-item"> - {{ $stock->model }}</li>
                      <li class="list-inline-item"> - {{ $stock->condition }}</li>
                      <li class="list-inline-item"> - @if($stock->boxed == "true") Boxed @else No Box @endif</li>
                      <li class="list-inline-item"> - £ {{ $stock->selling_price }}</li>
                    </ul>
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
	<div class="input-group">
		<label for="price_adjustment" class="col-sm-4 col-form-label">Price Adjustment</label>	
        <div class="input-group-prepend">
        	<span class="input-group-text">£</span>
        </div>
      	<input type="string"
                class="form-control"
                id="price_adjustment"
                name="price_adjustment"
                @if ( ! $salesblade['create'] ) 
                	value="{{ $sales -> price_adjustment }}"
                @else
                    value="{{ old('price_adjustment') }}"
                @endif
                @if ( $salesblade['edit'] ) 
                 	required
                @else
                    readonly 
                @endif>
	</div>
</div>
<div class="form-group row">
    <label for="payment_method" class="col-sm-4 col-form-label">Payment Method</label>
    <div class="col">
        <select class="form-control" 
                id="payment_method" 
                name="payment_method"
                @if ( ! $salesblade['edit'] )
                    disabled
                @endif>
            @if ( ! $salesblade['create'] )
                <option value=cash
                        @if ( $sales->payment_method == "cash" )
                            selected="selected"
                        @endif>
                    Cash
                </option>
                <option value=card
                        @if ( $sales->payment_method == "card" )
                            selected="selected"
                        @endif>
                    Card
                </option>
            @else
                <option value="cash"
                        @if ( old('payment_method') == "cash" )
                            selected="selected" 
                        @endif>
                    Cash
                </option>
                <option value="card"
                        @if ( old('payment_method') == "card" )
                            selected="selected" 
                        @endif>
                    Card
                </option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">Operator</label>
    <div class="col-10">
        <input type="text"
                class="form-control"
                id="user"
                name="user"
                @if ( $salesblade['create'] )
                    value="{{ Auth::user()->name }}"
                @else
                    value={{ $sales->user->name }}
                @endif
                readonly>
    </div>
</div>
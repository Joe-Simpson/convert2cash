<div class="form-group row">
	<div class="input-group">
		<label for="cost_price" class="col-sm-2 col-form-label">Cost Price</label>	
	    <div class="input-group-prepend">
	    	<span class="input-group-text">£</span>
	    </div>
    	<input type="text"
               class="form-control"
               id="cost_price"
               name="cost_price"
               @if ( ! $buyinblade['create'] ) 
               	value="{{ $buyin -> cost_price }}" 
               @endif
               @if ( $buyinblade['edit'] ) 
               	required
               @else
                readonly 
               @endif>
	</div>
</div>

<div class="form-group row">
	<div class="input-group">
		<label for="pay_cash" class="col-sm-2 col-form-label">Pay Cash</label>	
	    <div class="input-group-prepend">
	    	<span class="input-group-text">£</span>
	    </div>
    	<input type="text"
               class="form-control"
               id="pay_cash"
               name="pay_cash"
               @if ( ! $buyinblade['create'] ) 
               	value="{{ $buyin -> pay_cash }}" 
               @endif
               @if ( $buyinblade['edit'] ) 
               	required
               @else
                readonly 
               @endif>
	</div>
</div>

<div class="form-group row">
	<div class="input-group">
		<label for="selling_price" class="col-sm-2 col-form-label">Selling Price</label>	
	    <div class="input-group-prepend">
	    	<span class="input-group-text">£</span>
	    </div>
    	<input type="text"
               class="form-control"
               id="selling_price"
               name="selling_price"
               @if ( ! $buyinblade['create'] ) 
               	value="{{ $buyin -> selling_price }}" 
               @endif
               @if ( $buyinblade['edit'] ) 
               	required
               @else
                readonly 
               @endif>
	</div>
</div>
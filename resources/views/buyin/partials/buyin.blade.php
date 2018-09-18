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
                @else
                    value="{{ old('cost_price') }}"
                @endif
                @if ( $buyinblade['edit'] ) 
                 	required
                @else
                    readonly 
                @endif>
	</div>
</div>
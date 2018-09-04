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
    <label for="pay_cash" class="col-sm-2 col-form-label">Pay Cash</label>
    <div class="col-10">
        <select class="form-control" 
            id="pay_cash" 
            name="pay_cash"
            @if ( ! $buyinblade['edit'] )
                disabled
            @endif>
            @if ( ! $buyinblade['create'] )
                <option 
                    value=true
                    @if ( $buyin->pay_cash == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
                <option
                    value=false
                    @if ( $buyin->pay_cash == "false" )
                        selected="selected"
                    @endif>
                    False
                </option>
            @else
                <option value="true">True</option>
                <option value="false">False</option>
            @endif
        </select>
    </div>
</div>
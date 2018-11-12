<div class="form-group row">
	<div class="input-group">
		<label for="price_adjustment" class="col-sm-4 col-form-label">Price Adjustment</label>	
        <div class="input-group-prepend">
        	<span class="input-group-text">£</span>
        </div>
      	<input type="number"
                class="form-control"
                id="price_adjustment"
                name="price_adjustment"
                @if ( ! $layawaysblade['create'] ) 
                	value="{{ $layaways -> price_adjustment }}"
                @else
                    value="{{ old('price_adjustment') }}"
                @endif
                @if ( $layawaysblade['edit'] ) 
                 	required
                @else
                    readonly 
                @endif>
	</div>
</div>
<div class="form-group row">
    <div class="input-group">
        <label for="deposit" class="col-sm-4 col-form-label">Deposit Amount</label>  
        <div class="input-group-prepend">
            <span class="input-group-text">£</span>
        </div>
        <input type="number"
                class="form-control"
                id="deposit"
                name="deposit"
                placeholder="£20 Minimum" 
                @if ( ! $layawaysblade['create'] ) 
                    value="{{ $layaways -> deposit }}"
                @else
                    value="{{ old('deposit') }}"
                @endif
                @if ( $layawaysblade['edit'] ) 
                    required
                @else
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <div class="input-group">
        <label for="deposit_paid" class="col-sm-4 col-form-label">Deposit Paid</label>
        <div class="col-1 align-self-center">
            <input type="radio"
                    class="form-control radio"
                    id="deposit_paid"
                    name="deposit_paid"
                    value="true"
                    required
                    @if ( ! $layawaysblade['create'] )
                        checked="{{ $layaways -> deposit_paid }}"
                    @else
                        value="{{ old('deposit_paid') }}"
                    @endif
                    @if ( ! $layawaysblade['edit'] )
                        readonly
                    @endif>
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">Operator</label>
    <div class="col-10">
        <input type="text"
                class="form-control"
                id="user"
                name="user"
                @if ( $layawaysblade['create'] )
                    value="{{ Auth::user()->name }}"
                @else
                    value={{ $layaways->user->name }}
                @endif
                readonly>
    </div>
</div>
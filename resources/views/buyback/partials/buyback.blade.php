<div class="form-group row">
	<div class="input-group">
		<label for="loan_amount" class="col-sm-3 col-form-label">Loan Amount</label>	
	    <div class="input-group-prepend">
	    	<span class="input-group-text">£</span>
	    </div>
    	<input type="text"
               class="form-control"
               id="loan_amount"
               name="loan_amount"
               @if ( ! $buybackblade['create'] ) 
               	value="{{ $buyback -> loan_amount }}" 
               @endif
               @if ( $buybackblade['edit'] ) 
               	required
               @else
                readonly 
               @endif>
	</div>
</div>
<div class="form-group row">
    <label for="term" class="col-sm-3 col-form-label">Term</label>
      <select class="form-control col-3" 
      id="term" 
      name="term"
            @if ( ! $buybackblade['edit'] )
                disabled
            @endif>
            @if ( ! $buybackblade['create'] )
                <option 
                    value="1 week"
                    @if ( $buyback->term == "1 week")
                        selected="selected"
                    @endif>
                    1 Week
                </option>
                <option 
                    value="2 weeks"
                    @if ( $buyback->term == "2 weeks")
                        selected="selected"
                    @endif>
                    2 Weeks
                </option>
                <option 
                    value="3 weeks"
                    @if ( $buyback->term == "3 weeks")
                        selected="selected"
                    @endif>
                    3 Weeks
                </option>
                <option 
                    value="1 month"
                    @if ( $buyback->term == "1 month")
                        selected="selected"
                    @endif>
                    1 Month
                </option>
            @else
            <option value="1 week">1 Week</option>
            <option value="2 weeks">2 Weeks</option>
            <option value="3 weeks">3 Weeks</option>
            <option value="1 month">1 Month</option>
            @endif
      </select>
</div>
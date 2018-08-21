<div class="form-group row">
    <label for="make" class="col-sm-2 col-form-label">Make</label>
    <div class="col-sm-10">
    	<input type="text"
            class="form-control"
            id="make"
            name="make"
            @if ( ! $create ) 
                value="{{ $stock -> make }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif
            >
    </div>
</div>
<div class="form-group row">
    <label for="model" class="col-sm-2 col-form-label">Model</label>
    <div class="col-10">
    	<input type="text"
            class="form-control"
            id="model"
            name="model"
            @if ( ! $create ) 
                value="{{ $stock -> model }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif
            >
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-10">
    	<input type="text"
            class="form-control"
            id="description"
            name="description"
            @if ( ! $create ) 
                value="{{ $stock -> description }}" 
            @endif 
            @if ( ! $edit )
                readonly 
            @endif
            >
    </div>
</div>
<div class="form-group row">
    <label for="serial" class="col-sm-2 col-form-label">Serial/IMEI</label>
    <div class="col-10">
    	<input type="text"
            class="form-control"
            id="serial"
            name="serial"
            @if ( ! $create ) 
                value="{{ $stock -> serial }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif
            >
    </div>
</div>
<div class="form-group row">
    <label for="passcode" class="col-sm-2 col-form-label">Passcode</label>
    <div class="col-10">
    	<input type="text"
            class="form-control"
            id="passcode"
            name="passcode"
            @if ( ! $create ) 
                value="{{ $stock -> passcode }}" 
            @endif 
            @if ( ! $edit )
                readonly 
            @endif
            >
    </div>
</div>
<div class="form-group row">
    <label for="boxed" class="col-sm-2 col-form-label">Boxed</label>
    <div class="col-10">
    	<select class="form-control" 
			id="boxed" 
			name="boxed"
            @if ( ! $edit )
                disabled
            @endif>
            @if ( ! $create )
                <option 
                    value=true
                    @if ( $stock->boxed == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
                <option
                    value=false
                    @if ( $stock->boxed == "false" )
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
<div class="form-group row">
    <label for="condition" class="col-sm-2 col-form-label">Condition</label>
    <div class="col-10">
    	<select class="form-control" 
			id="condition" 
			name="condition"
            @if ( ! $edit )
                disabled
            @endif>
            @if ( ! $create )
                <option 
                    value="Like New"
                    @if ( $stock->condition == "Like New")
                        selected="selected"
                    @endif>
                    Like New
                </option>
                <option 
                    value="Good"
                    @if ( $stock->condition == "Good")
                        selected="selected"
                    @endif>
                    Good
                </option>
                <option 
                    value="Fair"
                    @if ( $stock->condition == "Fair")
                        selected="selected"
                    @endif>
                    Fair
                </option>
                <option 
                    value="Poor"
                    @if ( $stock->condition == "Poor")
                        selected="selected"
                    @endif>
                    Poor
                </option>
                <option 
                    value="Faulty/Damaged"
                    @if ( $stock->condition == "Faulty/Damaged")
                        selected="selected"
                    @endif>
                    Faulty/Damaged
                </option>
            @else
        		<option value="Like New">Like New</option>
        		<option value="Good">Good</option>
        		<option value="Fair">Fair</option>
        		<option value="Poor">Poor</option>
        		<option value="Faulty/Damaged">Faulty/Damaged</option>
            @endif
    	</select>
    </div>
</div>
<div class="form-group row">
    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
    <div class="col-10">
    	<textarea class="form-control"
			id="notes"
			name="notes"
            @if ( ! $edit )
                readonly 
            @endif>
@if ( ! $create )
{{ $stock -> notes }}
@endif
		</textarea>
    </div>
</div>
<div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">Operator</label>
    <div class="col-10">
    	<input type="text"
            class="form-control"
            id="user"
            name="user"
            @if ( $create )
                value="{{ Auth::user()->name }}"
            @else
                value={{ $stock->user }}
            @endif
            readonly
            >
    </div>
</div>
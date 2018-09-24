<div class="form-group row">
    <label for="make" class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <select class="form-control"
               id="category"
               name="category"
                @if ( ! $stockblade['edit'] )
                disabled
                @endif>
            @foreach(\App\Stock::$categories as $category)
                @if ( ! $stockblade['create'] )
                    <option
                            value="{{ $category }}"
                            @if ( $stock->category == "true" )
                            selected="selected"
                            @endif>
                        {{ $category }}
                    </option>
                @else
                    <option value="{{ $category }}"
                            @if ( old('category') == "true" )
                            selected="selected"
                            @endif>
                        {{ $category }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="make" class="col-sm-2 col-form-label">Make</label>
    <div class="col-sm-10">
    	<input type="text"
                class="form-control"
                id="make"
                name="make"
                @if ( ! $stockblade['create'] ) 
                    value="{{ $stock -> make }}"
                @else
                    value="{{ old('make') }}" 
                @endif 
                @if ( $stockblade['edit'] ) 
                    required 
                @else 
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="model" class="col-sm-2 col-form-label">Model</label>
    <div class="col-10">
    	<input type="text"
                class="form-control"
                id="model"
                name="model"
                @if ( ! $stockblade['create'] ) 
                    value="{{ $stock -> model }}"
                @else
                    value="{{ old('model') }}"
                @endif 
                @if ( $stockblade['edit'] ) 
                    required 
                @else 
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-10">
    	<input type="text"
                class="form-control"
                id="description"
                name="description"
                @if ( ! $stockblade['create'] ) 
                    value="{{ $stock -> description }}"
                @else
                    value="{{ old('description') }}"
                @endif 
                @if ( ! $stockblade['edit'] )
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="serial" class="col-sm-2 col-form-label">Serial/IMEI</label>
    <div class="col-10">
    	<input type="text"
                class="form-control"
                id="serial"
                name="serial"
                @if ( ! $stockblade['create'] ) 
                    value="{{ $stock -> serial }}"
                @else
                    value="{{ old('serial') }}"
                @endif 
                @if ( $stockblade['edit'] ) 
                    required 
                @else 
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="passcode" class="col-sm-2 col-form-label">Passcode removed</label>
    <div class="col-1"><br />
    	<input type="radio"
                class="form-control radio"
                id="passcode"
                name="passcode"
                value="true"
                required
                @if ( ! $stockblade['create'] )
                    checked="{{ $stock -> passcode }}"
                @else
                    value="{{ old('passcode') }}"
                @endif
                @if ( ! $stockblade['edit'] )
                    readonly
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="boxed" class="col-sm-2 col-form-label">Boxed</label>
    <div class="col-10">
    	<select class="form-control" 
    			id="boxed" 
    			name="boxed"
                @if ( ! $stockblade['edit'] )
                    disabled
                @endif>
            @if ( ! $stockblade['create'] )
                <option 
                    value="true"
                    @if ( $stock->boxed == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
                <option
                    value="false"
                    @if ( $stock->boxed == "false" )
                        selected="selected"
                    @endif>
                    False
                </option>
            @else
        		<option value="true"
                        @if ( old('boxed') == "true" )
                            selected="selected" 
                        @endif>
                    True
                </option>
        		<option value="false"
                        @if ( old('boxed') == "false" )
                            selected="selected" 
                        @endif>
                    False
                </option>
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
                @if ( ! $stockblade['edit'] )
                    disabled
                @endif>
            @if ( ! $stockblade['create'] )
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
        		<option value="Like New"
                        @if ( old('condition') == "Like New" )
                            selected="selected" 
                        @endif>
                    Like New
                </option>
        		<option value="Good"
                        @if ( old('condition') == "Good" )
                            selected="selected" 
                        @endif>
                    Good
                </option>
        		<option value="Fair"
                        @if ( old('condition') == "Fair" )
                            selected="selected" 
                        @endif>
                    Fair
                </option>
        		<option value="Poor"
                        @if ( old('condition') == "Poor" )
                            selected="selected" 
                        @endif>
                    Poor
                </option>
        		<option value="Faulty/Damaged"
                        @if ( old('condition') == "Faulty/Damaged" )
                            selected="selected"
                        @endif>
                    Faulty/Damaged
                </option>
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
                    @if ( ! $stockblade['edit'] )
                        readonly 
                    @endif>
@if ( ! $stockblade['create'] )
{{ $stock -> notes }}
@else
{{ old('notes') }}
@endif</textarea>
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
                @if ( ! $stockblade['create'] ) 
                    value="{{ $stock -> selling_price }}" 
                @else
                    value="{{ old('selling_price') }}"
                @endif
                @if ( $stockblade['edit'] ) 
                    required
                @else
                    readonly 
                @endif>
    </div>
</div>
<div class="form-group row">
    <label for="user" class="col-sm-2 col-form-label">Operator</label>
    <div class="col-10">
    	<input type="text"
                class="form-control"
                id="user"
                name="user"
                @if ( $stockblade['create'] )
                    value="{{ Auth::user()->name }}"
                @else
                    value={{ $stock->user->name }}
                @endif
                readonly>
    </div>
</div>
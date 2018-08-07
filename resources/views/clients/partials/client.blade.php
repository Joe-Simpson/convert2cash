<div class="form-group row">
    <div class="col-2">
        <label for="title">Title</label>
        <input type="text" 
            class="form-control" 
            id="title" 
            name="title" 
            @if ( ! $create ) 
                value="{{ $client -> title }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif>
    </div>
    <div class="col-5">
        <label for="surname">First Name</label>
        <input type="text" 
            class="form-control" 
            id="first_name" 
            name="first_name"  
            @if ( ! $create ) 
                value="{{ $client -> first_name }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif>
    </div>
    <div class="col-5">
        <label for="surname">Surname</label>
        <input type="text" 
            class="form-control" 
            id="surname" 
            name="surname" 
            @if ( ! $create ) 
                value="{{ $client -> surname }}" 
            @endif 
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif>
    </div>
</div>

<div class="form-group row">
    <div class="col-2">
        <label for="postcode">Postcode</label>
        <input type="text" 
            class="form-control" 
            id="postcode" 
            name="postcode" 
            @if ( ! $create ) 
                value="{{ $client -> postcode }}"
            @endif
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif>
    </div>
    <div class="col">
        <label for="Address">Address</label>
        <input type="text" 
            class="form-control" 
            id="address" 
            name="address" 
            @if ( ! $create ) 
                value="{{ $client -> Address }}"
            @endif
            @if ( ! $edit ) 
                readonly 
            @endif>
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <label for="dob">Date of Birth:</label> 
        <input type="date" 
            class="form-control col" 
            id="dob" 
            name="dob" 
            @if ( ! $create ) 
                value="{{ $client -> dob }}"
            @endif
            @if ( $edit ) 
                required 
            @else 
                readonly
            @endif>
    </div>
    <div class="col">
        <label for="phone_number">Phone Number:</label> 
        <input type="text" 
            class="form-control" 
            id="phone_number" 
            name="phone_number" 
            @if ( ! $create ) 
                value="{{ $client -> phone_number }}" 
            @endif
            @if ( $edit ) 
                required 
            @else 
                readonly 
            @endif>     
    </div>
    <div class="col-5">
        <label for="id_verification_type">Id Verification Type:</label>
        <select class="form-control" 
            id="id_verification_type" 
            name="id_verification_type"
            @if ( ! $edit ) 
                disabled 
            @endif>
            @if ( ! $create )
                <option
                    @if ( $client->id_verification_type == "Passport")
                        selected="selected"
                    @endif>
                    Passport
                </option>
                <option
                    @if ( $client->id_verification_type == "Driving Licence")
                        selected="selected"
                    @endif>
                    Driving Licence
                </option>
            @else
                <option>Passport</option>
                <option>Driving Licence</option>
            @endif
        </select>
    </div>
</div>

<!-- This bit is too wide. In particular, the select box -->
<div class="form-group row">
    <div class="col">
        <label for="customer_banned">Client Banned:</label>
        <select class="form-control col-2" 
            id="customer_banned" 
            name="customer_banned"
            @if ( ! $edit ) 
                disabled
            @endif>
            @if ( ! $create )
                <option
                    value=false
                    @if ( $client->customer_banned == "false" )
                        selected="selected"
                    @endif>
                    False
                </option>
                <option 
                    value=true
                    @if ( $client->customer_banned == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
            @else
                <option value=false>False</option>
                <option value=true>True</option>
            @endif
        </select>
    </div>
</div>
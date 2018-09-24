@if ( ! $clientblade['create'] )
<input type="text" 
       name="client_id"
       id="client_id" 
       class="form-control"
       value="{{ $client -> id }}"
       hidden>
@endif

<div class="form-group row">
    <div class="col-2">
        <label for="title">Title</label>
        <input type="text" 
            class="form-control" 
            id="title" 
            name="title" 
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> title }}"
            @else
                value="{{ old('title') }}"
            @endif
            @if ( $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> first_name }}"
            @else
                value="{{ old('first_name') }}"
            @endif 
            @if ( $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> surname }}" 
            @else
                value="{{ old('surname') }}"
            @endif 
            @if ( $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> postcode }}"
            @else
                value="{{ old('postcode') }}"
            @endif
            @if ( $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> address }}"
            @else
                value="{{ old('address') }}"
            @endif
            @if ( ! $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> dob }}"
            @else
                value="{{ old('dob') }}"
            @endif
            @if ( $clientblade['edit'] ) 
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
            @if ( ! $clientblade['create'] ) 
                value="{{ $client -> phone_number }}"
            @else
                value="{{ old('phone_number') }}"
            @endif
            @if ( $clientblade['edit'] ) 
                required 
            @else 
                readonly 
            @endif>     
    </div>
</div>
<div class="form-group row">
    <div class="col-5">
        <label for="id_verification_type">Id Verification Type:</label>
        <select class="form-control" 
            id="id_verification_type" 
            name="id_verification_type"
            @if ( ! $clientblade['edit'] ) 
                disabled 
            @endif>
            @foreach(\App\Client::$validationType1 as $validationType)
                @if ( ! $clientblade['create'] )
                    <option
                            @if ( $client->id_verification_type == $validationType)
                            selected="selected"
                            @endif
                            value="{{ $validationType }}">
                        {{ $validationType }}
                    </option>
                @else
                    <option
                            @if( old('id_verification_type') == $validationType )
                            selected="selected"
                            value="{{ $validationType }}"
                            @endif>
                        {{ $validationType }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-5">
        <label for="id_verification_type_2">Second Id Verification Type:</label>
        <select class="form-control"
                id="id_verification_type_2"
                name="id_verification_type_2"
                @if ( ! $clientblade['edit'] )
                disabled
                @endif>
            @foreach(\App\Client::$validationType2 as $validationType)
                @if ( ! $clientblade['create'] )
                    <option
                            @if ( $client->id_verification_type == $validationType)
                            selected="selected"
                            @endif
                            value="{{ $validationType }}">
                        {{ $validationType }}
                    </option>
                @else
                    <option
                            @if( old('id_verification_type') == $validationType )
                            selected="selected"
                            value="{{ $validationType }}"
                            @endif>
                        {{ $validationType }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <label for="notes">Notes</label>
        <textarea
            class="form-control"
            id="notes"
            name="notes"
            @if ( ! $clientblade['edit'] )
                readonly
            @endif>
@if ( ! $clientblade['create'] )
{{ $client -> notes }}
@else
{{ old('notes') }}
@endif</textarea>
    </div>
</div>

<!-- This bit is too wide. In particular, the select box -->
<div class="form-group row">
    <div class="col">
        <label for="client_banned">Client Banned:</label>
        <select class="form-control col-2" 
            id="client_banned" 
            name="client_banned"
            @if ( ! $clientblade['edit'] ) 
                disabled
            @endif>
            @if ( ! $clientblade['create'] )
                <option
                    value=false
                    @if ( $client->client_banned == "false" )
                        selected="selected"
                    @endif>
                    False
                </option>
                <option 
                    value=true
                    @if ( $client->client_banned == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
            @else
                <option
                    value=false
                    @if( old('client_banned') == "false" )
                        selected="selected"
                    @endif>
                    False
                </option>
                <option
                    value=true
                    @if( old('client_banned') == "true" )
                        selected="selected"
                    @endif>
                    True
                </option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col" id="ban-container">
        <label for="client_banned_reason">Ban reason:</label>
        <textarea class="form-control col-12"
                id="client_banned_reason"
                name="client_banned_reason"
                @if ( ! $clientblade['edit'] )
                disabled
                @endif>@if($clientblade['create']){{ old('client_banned_reason') }}@else{{ $client->client_banned_reason }}@endif</textarea>
    </div>
</div>
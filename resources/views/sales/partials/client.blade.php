<div class="form-group row">
    <div class="col-sm-12">
        <select class="form-control"
                id="client_search"
                name="client_search">
            <option value="" selected></option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->full_name }} - {{ $client->postcode }}</option>
            @endforeach
        </select>
    </div>
</div>
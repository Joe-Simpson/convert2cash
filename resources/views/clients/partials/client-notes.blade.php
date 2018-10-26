<input type="text" 
      name="client_id"
      id="client_id" 
      class="form-control"
      value="{{ $client -> id }}"
      hidden>

<div class="form-group row">
    <div class="col">
        <textarea class="form-control"
                  id="body"
                  name="body">{{ old('notes') }}</textarea>
    </div>
</div>
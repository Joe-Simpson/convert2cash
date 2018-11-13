<div class="form-group row">
  <div class="input-group">
    <label for="amount_paid" class="col col-form-label">Amount Paid (excl Deposit)</label>  
    <div class="input-group-prepend">
      <span class="input-group-text">£</span>
    </div>
    <input type="number"
            class="form-control"
            id="amount_paid"
            name="amount_paid"
            value="{{ $layaways->amount_paid }}" 
            disabled>
  </div>
</div>
<div class="form-group row">
  <div class="input-group">
    <label for="amount_due" class="col col-form-label">Amount Due</label>  
    <div class="input-group-prepend">
      <span class="input-group-text">£</span>
    </div>
    <input type="number"
            class="form-control"
            id="amount_due"
            name="amount_due"
            value="{{ $layaways->amount_due }}" 
            disabled>
  </div>
</div>
<div class="form-group row">
  <div class="input-group">
    <label for="payment" class="col col-form-label">Payment Amount</label>  
    <div class="input-group-prepend">
      <span class="input-group-text">£</span>
    </div>
    <input type="number"
            class="form-control"
            id="payment"
            name="payment"
            value="{{ old('payment') }}" 
            required>
  </div>
</div>
<div class="form-group row">
  <div class="input-group">
    <div class="col">
        <button type="submit" 
                class="btn btn-success"
                @if($layaways->amount_due <= 0)
                disabled
                @endif>
          Add New Payment
        </button>
    </div>
  </div>
</div>
<div class="form-group row" hidden>
  <div class="input-group">
    <label for="layaways_id" class="col col-form-label">Layaways Id</label>  
    <input type="string"
            class="form-control"
            id="layaways_id"
            name="layaways_id"
            value="{{ $layaways->id }}" 
            readonly>
  </div>
</div>
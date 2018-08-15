@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="/stock">

			    {{ csrf_field() }}

			    <div class="form-group row">
			        <label for="make" class="col-sm-2 col-form-label">Make</label>
			        <div class="col-sm-10">
			        	<input type="text"
				            class="form-control"
				            id="make"
				            name="make"
				            required
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
				            required
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
				            required
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
				            >
			        </div>
				</div>
			    <div class="form-group row">
			        <label for="boxed" class="col-sm-2 col-form-label">Boxed</label>
			        <div class="col-10">
			        	<select class="form-control" 
            				id="boxed" 
            				name="boxed"
            				>
			        		<option value="true">True</option>
			        		<option value="false">False</option>
			        	</select>
			        </div>
				</div>
			    <div class="form-group row">
			        <label for="condition" class="col-sm-2 col-form-label">Condition</label>
			        <div class="col-10">
			        	<select class="form-control" 
            				id="condition" 
            				name="condition"
            				>
			        		<option value="Like New">Like New</option>
			        		<option value="Good">Good</option>
			        		<option value="Fair">Fair</option>
			        		<option value="Poor">Poor</option>
			        		<option value="Faulty/Damaged">Faulty/Damaged</option>
			        	</select>
			        </div>
				</div>
			    <div class="form-group row">
			        <label for="notes" class="col-sm-2 col-form-label">Notes</label>
			        <div class="col-10">
			        	<textarea class="form-control"
            				id="notes"
            				name="notes"
            				>
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
				            value="{{ Auth::user()->name }}" 
				            readonly 
				            >
			        </div>
				</div>

			    
			    <div class="form-group">
			      <button type="submit" class="btn btn-primary">Create</button>
			    </div>

			    @include('layouts.errors')

		  	</form>
        </div>
    </div>
    <div class="row">
        <a href="/stock"><button class="btn btn-secondary">Abandon</button></a>
    </div>
</div>
@endsection
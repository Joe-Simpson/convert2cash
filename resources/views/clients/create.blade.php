@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Create New Client</h3>
            <form method="POST" action="/clients">

		    {{ csrf_field() }}
		    
		    <div class="form-group row">
		    	<div class="col-2">
		    		<input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
		    	</div>
		    	<div class="col-5">
		    		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
		    	</div>
		    	<div class="col-5">
		    		<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
		    	</div>
		    </div>

		    <div class="form-group row">
		      	<div class="col-2">
		      		<input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required>
		      	</div>
		      	<div class="col">
		      		<input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
		      	</div>
		    </div>


		    <div class="form-group row">
		    	<div class="col">
		    		<label for="dob">Date of Birth:</label> 
		      		<input type="date" class="form-control col" id="dob" name="dob" placeholder="Date of Birth" required>
		    	</div>
		    	<div class="col">
		    		<label for="phone_number">Phone Number:</label> 
		      		<input type="text" class="form-control" id="phone_number" name="phone_number" required>		
		    	</div>
		    	<div class="col-5">
		    		<label for="id_verification_type">Id Verification Type:</label>
		    		<select class="form-control" id="id_verification_type" name="id_verification_type" required>
					  	<option>Passport</option>
					  	<option>Driving Licence</option>
					</select>
		    	</div>
		    </div>

		    <div class="form-group form-check">
		      <input type="checkbox" class="form-check-input" id="customer_banned" name="customer_banned" default="false"><label class="form-check-label" for="customer_banned">Customer Banned</label>
		    </div>
		    
		    <div class="form-group">
		      <button type="submit" class="btn btn-primary">Create</button>
		    </div>

		    @include('layouts.errors')

		  </form>
        </div>
    </div>
</div>
@endsection
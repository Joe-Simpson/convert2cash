@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Create New Client</h3>
            <form method="POST" action="/clients">

		    {{ csrf_field() }}
		    
		    <div class="form-group">
		      <label for="first_name">First Name:</label> 
		      <input type="text" class="form-control" id="first_name" name="first_name" required>
		    </div>
		    
		    <div class="form-group">
		      <label for="surname">Surname:</label> 
		      <input type="text" class="form-control" id="surname" name="surname" required>
		    </div>

		    <div class="form-group">
		      <label for="title">Title:</label> 
		      <input type="text" class="form-control" id="title" name="title" required>
		    </div>

		    <div class="form-group">
		      <label for="postcode">Postcode:</label> 
		      <input type="text" class="form-control" id="postcode" name="postcode" required>
		    </div>

		    <div class="form-group">
		      <label for="address">Address:</label> 
		      <input type="text" class="form-control" id="address" name="address" required>
		    </div>

		    <div class="form-group">
		      <label for="dob">Date of Birth:</label> 
		      <input type="date" class="form-control" id="dob" name="dob" required>
		    </div>

		    <div class="form-group">
		      <label for="phone_number">Phone Number:</label> 
		      <input type="text" class="form-control" id="phone_number" name="phone_number" required>
		    </div>

		    <div class="form-group row">
		      	<label for="id_verification_type">Id Verification Type:</label>
		      	<select class="form-control" id="id_verification_type" name="id_verification_type" required>
				  	<option>Passport</option>
				  	<option>Driving Licence</option>
				</select>
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
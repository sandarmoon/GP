@extends('frontendTemplate')
@section('content')
	<div class="row mt-5">
              <div class="col">
                <div class="card bg-default shadow">
                  <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Add New patients</h3>
                  </div>
                  <div class="container">
                  	
                  	<form method="post" action="{{route('patient.store')}}" enctype="multipart/form-data">
                  		@csrf
                  		<div class="form-group">
                  			<label for="name">Name</label>
                  			<input type="text" class="form-control" id="name" name="name">
                  		</div>
                  		<div class="form-group">
                  			<label for="fathername">FatherName</label>
                  			<input type="text" class="form-control" id="fathername" name="fathername">
                  		</div>
                  		<div class="form-group">
	                  		<div class="row">
	                  			<div class="col-6">
	                  				<label for="age">Age</label>
	                  				<input type="text" class="form-control" id="age" name="age">
	                  			</div>
	                  			<div class="col-6 my-4" >
	                  				<div class="form-check">
	                  					<input class="form-check-input" type="radio" name="child" value="0" id="year" checked>
	                  					<label class="form-check-label" for="year">
	                  						Years
	                  					</label>
	                  				</div>
	                  				<div class="form-check">
	                  					<input class="form-check-input" type="radio" name="child" id="month" value="1">
	                  					<label class="form-check-label" for="month">
	                  						months
	                  					</label>
	                  				</div>
	                  			</div>
	                  		</div>
	                  			
                  		</div>

                  		<div class="form-group">
                  			<label>Gender</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="male" value="male" name="gender">
                  				<label class="form-check-label" for="male">Male</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="female" value="female" name="gender">
                  				<label class="form-check-label" for="female">Female</label>
                  			</div>
                  		</div>
                  		<div class="form-group">
                  			<label for="phoneno">Phoneno</label>
                  			<input type="text" class="form-control" id="phoneno" name="phoneno">
                  		</div>

                  		<div class="form-group">
                  			<label for="address">Address</label>
                  			<textarea class="form-control" id="address" rows="3" name="address"></textarea>
                  		</div>

                  		<div class="form-group">
                  			<label>married_status</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="yes" value="1" name="married">
                  				<label class="form-check-label" for="yes">Yes</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="no" value="0" name="married" checked>
                  				<label class="form-check-label" for="mo" >No</label>
                  			</div>
                  		</div>

                  		<div class="form-group">
                  			<label>pregnant</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="yes" value="1" name="pregnant">
                  				<label class="form-check-label" for="yes">Yes</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="no" value="0" name="pregnant" checked>
                  				<label class="form-check-label" for="mo">No</label>
                  			</div>
                  		</div>

                  		<div class="form-group">
                  			<label for="weight">body weight</label>
                  			<input type="text" class="form-control" id="weight" name="weight">
                  		</div>
                  		<div class="form-group">
                  			<label for="allergy">allergy</label>
                  			<input type="text" class="form-control" id="allergy" name="allergy">
                  		</div>

                  		<div class="form-group">
                  			<label for="job">Job</label>
                  			<input type="text" class="form-control" id="job" name="job">
                  		</div>

                  		<div class="form-group">
                  			<label for="file">File</label>
                  			<input type="file" class="form-control" id="file" name="file[]" multiple="multiple">
                  		</div>
                  		<input type="submit" class="btn btn-primary" value="submit">
                  	</form>
                  </div>
                  
                </div>
              </div>
            </div>
@endsection
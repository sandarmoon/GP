@extends('frontendTemplate')
@section('content')
<div class="row">
    <div class="col-12">

      <div class="card">
        
        <div class=" p-3">

        	<div class="row">
        		<div class="col-md-3">
        			<div class="col-md-9">
        				<img src="{{asset($owner->avatar)}} " class="img-fluid  rounded-circle">
        			</div>
          
        		</div>
        		<div class="col-md-8">
        				<div class="card bg-secondary " >
                 		
		                  <div class="card-body row ">
		                       <h3 class="card-title col-md-12">Contact Information</h3>
		                    <div class="col"><span>Name:</span><h4  class=" ml-2 ">      @if(!empty($owner->user->name))
		                          {{$owner->user->name}} 
		                          @else 
		                          Unknown 
		                          @endif </h4 ></div>
		                    <div class="col"><span>Phone:</span><h4  class=" ml-2 ">  
		                          @if(!empty($owner->phone))
		                          {{$owner->phone}} 
		                          @else 
		                          Unknown 
		                          @endif </h4 ></div>
		                    <div class="col"><span>Account :</span><h4  class=" ml-2 ">
		                          @if(!empty($owner->user->email))
		                          {{$owner->user->email}} 
		                          @else 
		                          Unknown 
		                          @endif 
		                    </h4 ></div>

		                    <div class="col">
		                    	<a href="{{route('owners.edit',$owner->id)}}" class="btn btn-primary">Edit Profile</a>
		                    </div>
		                    
		                  </div>
		                </div>
        		</div>
        	</div>
          
        </div>	
      </div>

    </div>
</div>
@endsection

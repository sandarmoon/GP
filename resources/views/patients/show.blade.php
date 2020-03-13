@extends('frontendTemplate')
@section('content')
 @php
  $uri=$_SERVER['REQUEST_URI'];
  $uriarray=explode('/',$uri);
  $patientid=$uriarray[2];

 @endphp
<div class="row">
   <div class="col-12" style="margin-top: 130px;">
    <nav class="mx-5 my-3">
      <div class="nav nav-tabs my-3"  id="nav-tab" role="tablist">
        <a class="nav-item nav-link text-info active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ptient History</a>
        <a class="nav-item nav-link text-info" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Treatment History</a>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show mx-3 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			<div class="card ml-4">
				<div class="card-header">
					<h2 class="text-center text-dark">{{$patient->name}} </h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<div class="span8">
			    			<h4><b>FatherName:</b> {{$patient->fatherName}}</h4>
			    			<h4><b>Age:</b> {{$patient->age}}
			    										@php 
			    										if($patient->child==0){
			    										echo "year";
			    									}else{
			    									echo"month";
			    								}
			    								@endphp
			    							</h4>
			    			<h4><b>Gender: </b>{{$patient->gender}}</h4>
			    			<h4><b>phoneno: </b>{{$patient->phoneno}}</h4>
			    			

			    		</div>
						</div>

						<div class="col-6">
							<div class="span2">
			    			<h4><b>Address: </b>{{$patient->address}}</h4>

			    			<h4><b>Married:</b> 
			    								@php 
			    								if($patient->married_status==0){
			    								echo "no";
			    							}else{
			    							echo"yes";
			    						}
			    						@endphp
			    					</h4>

			    			<h4><b>Pregnant:</b> 
			    						@php 
			    						if($patient->pregnant==0){
			    						echo "no";
			    					}else{
			    					echo"yes";
			    				}
			    				@endphp
			    			</h4>
			    			@foreach(json_decode($patient->file) as $photo)
			    			<a target="_blank" href="{{asset($photo)}}">
			    				<img src="{{asset($photo)}}" width="100px" height="100px">
			    			</a>

			    			@endforeach
			    			
			    		</div>
			    		

							
						</div>
					</div>


					@php
			    		$dlength=count($doctors);
			    		@endphp
			    		@if($dlength>1)
			    		<button class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal" data-target="#staticBackdrop">incharge</button>
			    		@else
			    		<form method="post" action="{{route('incharge')}}" class="d-inline-block">
			    			@csrf
			    			<input type="hidden" name="patient_id" value="{{$patient->id}}">
			    			<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">incharge</button>
			    		</form>
			    		@endif

				</div>
			</div> 



		</div>



    	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    		<div class="accordion" id="accordionExample">

          @php $i=1; @endphp
          @foreach($treatments as $treatment)
          <div class="card my-3 ml-5">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                  {{$treatment->created_at}}
                </button>
              </h2>
            </div>

            <div id="collapse{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
               <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <p class="card-text"><strong>Complaint:  </strong>{{$treatment->complaint}} </p>
                  <p class="card-text"><strong>SPO2:</strong>{{$treatment->spo2}} </p>
                  <p class="card-text"><strong>PR:  </strong>{{$treatment->pr}} </p>
                  <p class="card-text"><strong>Temperature:</strong>{{$treatment->temperature}} </p>
                  <p class="card-text"><strong>Blood pressure:</strong>{{$treatment->bp}} </p>
                  <p class="card-text"><strong>RB2:</strong>{{$treatment->rbs}} </p>
                  <p class="card-text"><strong>Diagnosis:</strong>{{$treatment->diagnosis}}}} </p>
                  <p class="card-text"><strong>Body Weight:</strong>{{$treatment->body_weight}}}} </p>
                  <p class="card-text"><strong>Next Visit Date:</strong>{{$treatment->next_visit_date}}}} </p>
                  <p class="card-text"><strong>relevant_info:</strong>{{$treatment->relevant_info}}}} </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="row my-5">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Treatment and Drug</h3>
                        <table class="table text-center table-bordered table-dark">
                          <thead class="">
                            <th>drug name</th>
                            <th>tab</th>
                            <th>Interval</th>
                            <th>Meal</th>
                            <th>Duration</th>
                          </thead>
                          <tbody>
                            @php
                            $alltreaments=$treatment->medicines;

                            
                            @endphp
                            <!-- {{$alltreaments}} -->
                            @foreach($alltreaments as $key => $alldrugs)
                            @if($alldrugs->pivot->type==null)
                            <tr>
                              <td>{{$alldrugs->name}}</td>
                              <td>{{$alldrugs->pivot->tab}}</td>
                              <td>{{$alldrugs->pivot->interval}}</td>
                              <td>{{$alldrugs->pivot->meal}}</td>
                              <td>{{$alldrugs->pivot->during}}</td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Injection/Prodecure</h3>
                        <table class="table text-center table-bordered table-dark w-50">
                          <thead class="">
                            <th>injection</th>
                            <th>injection type</th>
                          </thead>
                          <tbody>
                            @php
                            $alltreaments=$treatment->medicines;
                            @endphp
                            <!-- {{$alltreaments}} -->
                            @foreach($alltreaments as $key => $allinjections)
                            @if($allinjections->pivot->type)
                            <tr>
                              <td>{{$allinjections->name}}</td>
                              <td>{{$allinjections->pivot->type}}</td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        @php $i++; @endphp
        @endforeach
    		</div>

    	</div>
    </div>

</div>
</div>



<div class="modal fade indoctor" id="staticBackdrop"data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       			 </button>
			<form method="post" action="{{route('incharge')}}" class="d-inline-block">
					@csrf
					<input type="hidden" name="patient_id" value="{{$patient->id}}">
					<div class="form-group">
						<label for="doctor" style="margin-left: 100px">Please choose doctor</label><br>
						<select name="doctor"  id="doctor" class="form-control" style="margin-left: 100px">
							@foreach($doctors as $row)
							<option value="{{$row->id}}">{{$row->user->name}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">save</button>
				</form>
					
			</div>
			
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection
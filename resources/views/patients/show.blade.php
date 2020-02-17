@extends('frontendTemplate')
@section('content')
<div class="container">
	<div class="row">


		<div class="card col-md-6 col-lg-6 bg-secondary ">

			<div class="panel panel-default">
				<div class="panel-heading">  <h2>Patient Detail</h2></div>
				<div class="panel-body">

					<div class="box box-info">

						<div class="box-body">
							
							<div class="col-sm-6">
								<h2 style="color:#00b1b1;">{{$patient->name}} </h2></span>            
							</div>
							<div class="clearfix"></div>
							<hr style="margin:5px 0 5px 0;">

							<div class="row-fluid">
        
        
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
									
								</div>

								<div class="span2">
									@foreach(json_decode($patient->file) as $photo)
									 <a target="_blank" href="{{asset($photo)}}">
                         			<img src="{{asset($photo)}}" width="100px" height="100px">
                         			</a>

                       				@endforeach
								</div>
							</div>
							 
						</div>
						<!-- /.box -->

					</div>


				</div> 
			</div>
		</div>  

		<div class="card col-md-6 col-lg-6 bg-secondary"></div>

	</div>
</div>
@endsection
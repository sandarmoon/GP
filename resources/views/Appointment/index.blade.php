@extends('frontendTemplate')
@section('content')
<div class="row">
   <div class="col-12" style="margin-top: 130px;">

  <div class="card-header border-0">
    <a href="{{route('patient.create')}}" class="btn btn-primary float-right">Add New Patient</a>
      <h3 class="mb-0">Patient tables</h3>
    </div>
    <div class="table-responsive">
       <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php $i=1;?>
                @foreach($treatments as $row)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$row->patient->name}}</td>
                    <td>{{$row->patient->fatherName}}</td>
                    <td>{{$row->patient->age}}</td>
                    <td><a href="{{asset('appointpatienthistory/'.$row->id.'/'.$row->patient_id)}}" data-id="$row->id" data-patient_id="$row->patient_id" class="btn btn-info pending">Pending</a></td>

                </tr>
                @endforeach
                
              </tbody>
            </table>
    </div>
   
  </div>
</div>
  
	
@endsection
@section('script')
<script type="text/javascript">
 
 

</script>

@endsection

   
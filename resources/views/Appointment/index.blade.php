@extends('frontendTemplate')
@section('content')

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
              <tbody>
                <?php $i=1;?>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->fatherName}}</td>
                    <td>{{$patient->age}}</td>
                    <td><a href="{{route('appointpatienthistory',$patient->id)}}" data-id="$patient->id" class="btn btn-info pending">Pending</a></td>

                </tr>
                @endforeach
                
              </tbody>
            </table>
    </div>
   
  
  
	
@endsection
@section('script')
<script type="text/javascript">
 
</script>

@endsection

   
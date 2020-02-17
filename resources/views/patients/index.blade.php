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
              <tbody id="medicineTable">
                <?php $i=1;?>
                @foreach($patients as $patient)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$patient->name}}</td>
                    <td>{{$patient->fatherName}}</td>
                    <td>{{$patient->age}}</td>
                    <td><a href="{{route('patient.edit',$patient->id)}}"><i class="btn fas fa-edit text-white"  style="background-color: #825ee4"></i></a>
                    
                    <a href="{{route('patient.show',$patient->id)}}" > <i class="btn fas fa-info text-white" style="background-color: #825ee4"></i></a>

                      <form method="post" action="{{route('patient.destroy',$patient->id)}}" class="d-inline-block">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" style="background-color: #825ee4"><i class="fas fa-trash text-white" ></i></button>
                      </form>
                    </td>

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

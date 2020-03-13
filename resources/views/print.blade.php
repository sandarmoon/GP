@extends('frontendTemplate')
@section('content')
	
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Print Out</h3>
          <div class="alert alert-primary success d-none my-3" role="alert"></div>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>LatestInchargeDate</th>
                    <th>Phone</th>
                    <th>Address</th>
                  </tr>
                </thead>
                <tbody id="usertable">
                </tbody>
            </table>
          </div>    
        </div>             
      </div>
    </div>
  </div>
           
@endsection
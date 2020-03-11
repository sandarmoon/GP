@extends('frontendTemplate')
@section('content')
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header border-0">

          <h3 class="mb-0">Doctor List</h3>

          <div class="alert alert-success success d-none" role="alert"></div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-white table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="ownerTable">
                  
            </tbody>
          </table>
        </div>	
      </div>

    </div>
</div>
@endsection
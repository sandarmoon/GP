@extends('frontendTemplate')
@section('content')
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header border-0">

          <h3 class="mb-0">Doctor List</h3>

          @if( Session::has("success") )
          <div class="alert alert-success alert-block" role="alert">
              <button class="close" data-dismiss="alert"></button>
              {{ Session::get("success") }}
          </div>
          @endif

          <div class="alert alert-success success d-none" role="alert"></div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-white table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Owner Name</th>
                <th>Clinic Name</th>
                <th>Email</th>
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
@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.alert').fadeOut(3000);

    
    getOnwers();
    function getOnwers(){
        $.get("{{route('getOwners')}}",function(response){
            var j=1;
            var html='';
            $.each(response,function(i,v){
              console.log(v);
                    html+=`<tr>
                              <td>${j++}</td>
                              <td>${v.user.name}</td>
                              <td>${v.clinic_name}</td>
                              <td>${v.user.email}</td>
                              <td>
                                 <a href='' class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.id}"><i class="ni ni-settings"></i></a>
                                 <a href="" class="btn btn-warning btn-sm d-inline-block btnDetail " data-id="${v.id}"><i class="ni ni-collection"></i></a>
                                <button  class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.id}" data-userid="${v.id}"> <i class="ni ni-fat-delete"></i></button>

                                 
                              </td>

                          </tr>`;

                  })

            $('#ownerTable').html(html);
          })
    }

     $('#ownerTable').on('click','.btnEdit',function(){
          var id=$(this).data('id');
          var url="{{route('owners.edit',':id')}}";
      
          url=url.replace(':id',id);
          $(this).attr('href',url);
       })

     $('#ownerTable').on('click','.btnDelete',function(){

          var id=$(this).data('id');
          var url="{{route('owners.destroy',':id')}}";
      
           url=url.replace(':id',id);
           
           $.ajax({
              url:url,
              type:"post",
              data:{"_method": 'DELETE'},
              dataType:'json',
              success:function(res){
                if(res.success){
                $('.success').removeClass('d-none');
                $('.success').addClass('text-danger');
                    $('.success').show();
                    $('.success').text('successfully Deleted');
                    $('.success').fadeOut();
                    getOnwers();

                }},
                

            });
        })





  })

 
</script>
@endsection
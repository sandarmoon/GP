@extends('frontendTemplate')
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="alert alert-primary success d-none" role="alert"></div>
    </div>

    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card" id="AddMedicineType">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Add New Medicine Type</h3>
        </div>

        <div class="card-body pt-0">
          <!-- Add form start -->
          <form id="AddMedicineTypeForm">
         
            <div class="form-group">
              <label for="cname" class="sfont">Medicine Type Name</label>
              <span class="Ename error d-block" ></span>
              <input type="text" name="name" id="mtname" placeholder="enter medicine type name" class="d-inline form-control ">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
            </div>
          </form>
          <!-- Add form end -->
        </div>
      </div>

      <div class="card" id="EditMedicineType">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Edit Medicine Type</h3>
        </div>

        <div class="card-body pt-0">
          <!-- Update form start -->
          <form id="EditMedicineForm">
            <div class="form-group">
              <label for="ucname" class="sfont">Medicine Type Name</label>
              <span class="UEname error d-block" ></span>
              <input type="text" name="name" id="umtname" class="d-inline form-control "> 
            </div>
            <input type="hidden" name="" class="medid">
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-md  float-right update">Update</button>
            </div>
          </form>
          <!-- Update form end -->
        </div>
      </div>
    </div>

    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Medicine Types </h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-white table-flush" id="medicineType">
            <thead class="thead-light">
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Action</th>
                
               
              </tr>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
  $('document').ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //datatable js start here

    getData();
    function getData(){
      var i=1;
          $('#medicineType').DataTable({
          
          "processing": true,
          destroy:true,
          "sort":false,
          pagingType: 'full_numbers',
           pageLength: 5,
           language: {
             oPaginate: {
               sNext: '<i class="fa fa-forward"></i>',
               sPrevious: '<i class="fa fa-backward"></i>',
               sFirst: '<i class="fa fa-step-backward"></i>',
               sLast: '<i class="fa fa-step-forward"></i>'
               }
             } ,
             "serverSide": true,
             "stateSave": true,  //restore table state on page reload,
           "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
          "ajax": "{{ route('medicineType.getType') }}",
          "columns":[

               {render:function(){
                
                return i++;
               }},
              { "data": "name" },
              { "data": "id",
                sortable:false,
                render:function(data){
                  return `<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data}"><i class="ni ni-settings"></i></button>
                            <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data}"> <i class="ni ni-fat-delete"></i></button>`;
                }
               }
          ],
          "info":false
          
       });
    }

    $('#medicineType').on('click','.btnEdit',function(){
        // $('#EditMedicineType').show();
        // $('#AddMedicineType').hide();
         var id=$(this).data('id');
         alert(id);
        // var name=$(this).data('name');
        // //alert(id,name);
      
        //   $('#ucname').val(name);
        //   $('.medTypeid').val(id);
      
      })

    









    //end here






    $('#EditMedicineType').hide();

    $('.btnEdit').click(function(){
      var id=$(this).data('id');
      var name=$(this).data('name');
      $('#medEdit').show(1500);
      $('#medCreate').hide(1500);

      $('.ename').val(name);
      $('.eid').val(id);    
      var url="{{route('medicineType.update',':id')}}";
      url=url.replace(':id',id);

      $('#med_update').attr('action',url);
    })


    $('#Add').click(function(){
      $('#medEdit').hide(1500);
      $('#medCreate').show(1500);
    })

    $('.btnUpdate').click(function(){
      var name=$('.ename').val();
      var id=$('.eid').val();
      


        // $.ajax({
        //   url:url,
        //   type:"PUT",
        //   data:{name:name},
        //   success:function(response){
        //     console.log(response);
        //   },
        //   error:function(error){
        //     console.log(error);
        //   }
          

        // })
     // console.log(name,id);
    })


  })
</script>

@endsection

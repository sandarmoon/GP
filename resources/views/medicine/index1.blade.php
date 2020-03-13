@extends('frontendTemplate')
@section('content')

  <!-- Table -->
  <div class="row">
    <div class="col-12">
      <div class="alert alert-primary success d-none" role="alert"></div>
    </div>

    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card" id="AddMedicine">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Add New Medicine</h3>
        </div>

        <div class="card-body pt-0">
          <!-- Add form start -->
          <form id="AddMedicineForm">
  			 
  		      <div class="form-group">
  		        <label for="cname" class="sfont">Medicine Name</label>
  		        <span class="Ename error d-block" ></span>
  		        <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
  		      </div>

  		      <div class="form-group">
  		        <label for="medicineType" class="sfont">Choose Medicine Type</label>
  	            <select class="form-control" name="type_id"  id="medicineType">
                  <option value="">Choose Type</option>
  	              @foreach($medTypes as $medType)
  	              <option value="{{$medType->id}}">{{$medType->name}}</option>
  	              @endforeach
  	            </select>
  		      </div>
  		      <div class="form-group">
  		        <label for="chemical" class="sfont">Enter Chemicals</label>
  		        <span class="Echemical error d-block"></span>
  		        <textarea class="form-control" id="chemical" rows="3"></textarea>
  		      </div>
  		      <div class="form-group">
  		        <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
  		      </div>
  			  </form>
  	      <!-- Add form end -->
        </div>
      </div>

      <div class="card" id="EditMedicine">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Edit Medicine</h3>
        </div>

        <div class="card-body pt-0">
    			<!-- Update form start -->
    			<form id="EditMedicineForm">
  	        <div class="form-group">
  		        <label for="ucname" class="sfont">Medicine Name</label>
  		        <span class="UEname error d-block" ></span>
  		        <input type="text" name="name" id="ucname" placeholder="enter medicine name" class="d-inline form-control "> 
  		      </div>
  		      <input type="hidden" name="" class="medid">
  		      <div class="form-group">
  		        <label for="umedicineType" class="sfont">Choose Medicine Type</label>
              <select class="form-control" name="typeid"  id="umedicineType">
                @foreach($medTypes as $medType)
                <option class="medtype-{{$medType->id}}" value="{{$medType->id}}">{{$medType->name}}</option>
                @endforeach
              </select>
  		      </div>
  		      <div class="form-group">
  		        <label for="uchemical" class="sfont">Enter Chemicals</label>
  		        <span class="UEchemical error d-block"></span>
  		        <textarea class="form-control" name="chemical" id="uchemical" rows="3"></textarea> 
  		      </div>
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
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Medicines</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="medicineTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Chemical Things</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        
      </div>
    </div>
  </div>

@endsection

@section('script')
<script type="text/javascript">
  $('document').ready(function(){
  	getData();
    //getDatas();

  	$('#EditMedicine').hide();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.alert').hide(2000);
    $('#medicineEdit').hide();


    // getData
    //  function getData(){
    // 	console.log('you make it');
    // 	$.get("{{route('getMedicine')}}",function(response){
    // 		var j=1;
    // 		var html='';
    // 		$.each(response,function(i,v){
    // 			// console.log(v);
    //         		html+=`<tr>
			 //                    <td>${j++}</td>
			 //                    <td>${v.name}</td>
			 //                    <td>${v.medcinetype}</td>
			 //                    <td>${v.chemical}</td>
			 //                    <td>
			 //                       <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.id}"><i class="ni ni-settings"></i></button>
				// 	                  <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>
			                       
			 //                    </td>

			 //                </tr>`;

    //         	})

				// $('#medicineTable').html(html);
    // 	})
    // }

    //datatable js start
      function getData(){
          var i=1;
              $('#medicineTable').DataTable({
              
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
              "ajax": "{{route('getMedicine')}}",
              "columns":[

                   {render:function(){
                    
                    return i++;
                   }},

                  { "data": "name",
                  render:function(data){
                    $('.btnEdit').attr('data-name', data);
                    return data;
                  } },

                  { "data": "medcinetype"
                  } ,

                  { "data": "chemical"
                  } ,

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

    // end datatablejs here

    


    $('.addNew').click(function(){
      var name=$('#cname').val();
      var id=$( "#medicineType option:selected" ).val();
      var chemical=$('#chemical').val();
      var url="{{route('medicine.store')}}"
    
       $.ajax({
          url:url,
          type:"post",
          data:{name:name,typeid:id,chemical:chemical},
          dataType:'json',
          success:function(response){
            if(response.success){
            	getData();
               $('.Ename').text('');
              $('span.error').removeClass('text-danger');
              $('.Echemical').text('');
              $('.success').removeClass('d-none');
              $('.success').show();
              $('.success').text('successfully added');
              $('.success').fadeOut(3000);
              $('#cname').val('');
              $( "#medicineType option:selected" ).val('');
              chemical=$('#chemical').val('');
              
            }
          },
          error:function(error){
            var message=error.responseJSON.message;
            var errors=error.responseJSON.errors;
            console.log(error.responseJSON.errors);
            if(errors){
              var chemical=errors.chemical;
              var name=errors.name;
              $('.Ename').text(name);
              $('span.error').addClass('text-danger');
              $('.Echemical').text(chemical);
            }

          }
          

        })

       
    })

    $('#medicineTable').on('click','.btnEdit',function(){
    	$('#EditMedicine').show();
    	$('#AddMedicine').hide();
    	var id=$(this).data('id');
    	var url="{{route('medicine.edit',':id')}}";
    	
    	url=url.replace(':id',id);
    	$.get(url,function(res){
    	  $('#ucname').val(res.name);
    	  $( ".medtype-"+`${res.medicinetype_id}` ).attr('selected','selected');
	      
	      $('#uchemical').text(res.chemical);
	      $('.medid').val(res.id);
	     
    	})


    })

    $('.update').click(function(){
    	var id=$('.medid').val();
    	var obj=$('#EditMedicineForm').serialize();
    	var url="{{route('medicine.update',':id')}}";
    	url=url.replace(':id',id);
    	$.ajax({
    		url:url,
    		type:'PATCH',
    		data:obj,
    		dataType:'json',
    		success:function(res){
    			// console.log('heloo world');
    			if(res.success){
    				$('.success').removeClass('d-none');
		              $('.success').show();
		              $('.success').text('successfully updated');
		              $('.success').fadeOut(3000);
		              $('#ucname').val('');
		               $('#uchemical').text('');
				      $('.medid').val('');
				      $('#EditMedicine').hide();
    					$('#AddMedicine').show();
    				getData();
    			}
    			
    			
    		},
    		error:function(error){
    			var message=error.responseJSON.message;
	            var errors=error.responseJSON.errors;
	            console.log(error.responseJSON.errors);
	            if(errors){
	              var chemical=errors.chemical;
	              var name=errors.name;
	              $('.UEname').text(name);
	              $('span.error').addClass('text-danger');
	              $('.UEchemical').text(chemical);
	            }
    		}
    	})
    	
    	
    })


    $('#medicineTable').on('click','.btnDelete',function(){
    	
    	if(confirm('Are you sure to delete?')){
          var id=$(this).data('id');
            console.log(id);
             var url="{{route('medicine.destroy',':id')}}";
            
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
                      $('.success').fadeOut(3000);
                      getData();

                  }},
                  

              });
      }

    	})
    
    
      

   

       
     // console.log(name,id);
    })


 
</script>

@endsection
<?php $__env->startSection('content'); ?>

	<div class=" ">
      <div class="row pr-2 mb-2">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow p-2 mt-5 bg-secondary CR" >
            
            <form id="AddMedicine">
			    
			     <h2>Add New Medicine</h2>
			      <div class="form-group">
			        <label for="cname ">Medicine Name</label>
			        <span class="Ename error d-block" ></span>
			        <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
			        
			      </div>
			      <div class="form-group">
			        <label for="medicineType " >Choose MedicineType</label>
			            <select class="form-control" name="type_id"  id="medicineType">
			              <?php $__currentLoopData = $medTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			              <option value="<?php echo e($medType->id); ?>"><?php echo e($medType->name); ?></option>
			              
			              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </select>
			      </div>
			      <div class="form-group">
			        <label for="chemical">Enter Chemically</label>
			        <span class="Echemical error d-block"></span>
			          <textarea class="form-control" id="chemical" rows="3"></textarea>
			          
			      </div>
			      <div class="form-group">
			        <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
			        
			      </div>
			</form>
			<!-- Add form end -->
			<!-- Update form start -->
			<form id="EditMedicine">
			    
			     <h2>Update Medicine</h2>
			      <div class="form-group">
			        <label for="ucname ">Medicine Name</label>
			        <span class="UEname error d-block" ></span>
			        <input type="text" name="name" id="ucname" placeholder="enter medicine name" class="d-inline form-control ">
			        
			      </div>
			      <input type="hidden" name="" class="medid">
			      <div class="form-group">
			        <label for="umedicineType" >Choose MedicineType</label>
			            <select class="form-control" name="typeid"  id="umedicineType">
			              <?php $__currentLoopData = $medTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			              <option class="medtype-<?php echo e($medType->id); ?>" value="<?php echo e($medType->id); ?>"><?php echo e($medType->name); ?></option>
			              
			              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			            </select>
			      </div>
			      <div class="form-group">
			        <label for="uchemical">Enter Chemically</label>
			        <span class="UEchemical error d-block"></span>
			          <textarea class="form-control" name="chemical" id="uchemical" rows="3"></textarea>
			          
			      </div>
			      <div class="form-group">
			        <button type="button" class="btn btn-primary btn-md  float-right update">Update</button>
			        
			      </div>
			</form>
            
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Medicine</h3>
                  <div class="alert alert-primary success d-none" role="alert">
			        
			     </div>
                </div>
                
              </div>
            </div>
            <div class="card-body">
              	<div class="table-responsive p-1">
			       <table  class="table align-items-center table-white table-flush">
			              <thead class="thead-light">
			                <tr>
			                  <th>No</th>
			                  <th>Name</th>
			                  <th>Type</th>
			                  <th>Chemical Things</th>
			                  <th>Action</th>
			                </tr>
			              </thead>
			              <tbody id="medicineTable" >
			                
			                
			              </tbody>
			            </table>
			    </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $('document').ready(function(){
  	getData();

 

  	$('#EditMedicine').hide();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.alert').hide(2000);
    $('#medicineEdit').hide();


    // getData
     function getData(){
    	console.log('you make it');
    	$.get("<?php echo e(route('getMedicine')); ?>",function(response){
    		var j=1;
    		var html='';
    		$.each(response.data,function(i,v){
    			// console.log(v);
            		html+=`<tr>
			                    <td>${j++}</td>
			                    <td>${v.medicine['name']}</td>
			                    <td>${v.medcinetype}</td>
			                    <td>${v.medicine.chemical}</td>
			                    <td>
			                       <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.medicine.id}"><i class="ni ni-settings"></i></button>
					                  <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.medicine.id}"> <i class="ni ni-fat-delete"></i></button>
			                       
			                    </td>

			                </tr>`;

            	})

				$('#medicineTable').html(html);
    	})
    }

    //using datatable js

    // function getData(){
    //   if ( $.fn.dataTable.isDataTable( '#medicineTable' ) ) {
    //     console.log('yes it is');
    //       table = $('#medicineTable').DataTable();
    //   }else{
    //     console.log('no it is not');
    //      table = $('#medicineTable').DataTable( {
    //         paging: false
    //     } );
    //   }
      
    // }






    $('.addNew').click(function(){
      var name=$('#cname').val();
      var id=$( "#medicineType option:selected" ).val();
      var chemical=$('#chemical').val();
      var url="<?php echo e(route('medicine.store')); ?>"
    
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
    	var url="<?php echo e(route('medicine.edit',':id')); ?>";
    	
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
    	var obj=$('#EditMedicine').serialize();
    	var url="<?php echo e(route('medicine.update',':id')); ?>";
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
    	
    	var id=$(this).data('id');
    	console.log(id);
    	 var url="<?php echo e(route('medicine.destroy',':id')); ?>";
    	
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

    	})
    
    
      

   

       
     // console.log(name,id);
    })


 
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/medicine/index1.blade.php ENDPATH**/ ?>
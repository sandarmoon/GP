<?php $__env->startSection('content'); ?>

  <div class=" ">
      <div class="row pr-2 mb-2">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow p-2 mt-5 bg-secondary CR" >
            
            <form id="AddMedicineType">
			    
			     <h2>Add New MedicineType</h2>
			      <div class="form-group">
			        <label for="cname ">Medicine Name</label>
			        <span class="Ename error d-block" ></span>
			        <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
			       
			      </div>
			      
			      <div class="form-group">
			        <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
			        
			      </div>
			</form>
			<!-- Add form end -->
			<!-- Update form start -->
			<form id="EditMedicineType">
			    
			     <h2>Update MedicineType</h2>
			      <div class="form-group">
			        <label for="ucname ">Medicine Name</label>
			        <span class="UEname error d-block" ></span>
			        <input type="text" name="name" id="ucname" placeholder="enter medicine name" class="d-inline form-control ">
			        
			      </div>
			      <input type="hidden" name="" class="medTypeid">
			     
			      <div class="form-group">
			        <button type="submit" class="btn btn-primary btn-md  float-right update">Update</button>
			        
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
			       <table  class="table align-items-center table-white table-flush table-flush example"  id="medicineType">
			              <thead class="thead-light">
			                <tr>
			                  <th>No</th>
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
      </div>
      <!-- Footer -->
      
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		//common js
		getMedicineType();

		$('#EditMedicineType').hide();

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });



		//start here

		function getMedicineType(){
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
          "ajax": "<?php echo e(route('medicineType.getType')); ?>",
          "columns":[

               {render:function(){
                
                return i++;
               }},
              { "data": "name",
              render:function(data){
              	$('.btnEdit').attr('data-name', data);
              	return data;
              } },
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



		//end here














		//go to medicineType.index
		// function getMedicineType(){
		// 	$.get('/getMedicineType',function(response){
		// 		// console.log(response);
		// 		var data=response;var html=''; var j=1;
		// 		$.each(data,function(i,v){
		// 			html+=`<tr>
		//                     <td>${j++}</td>
		//                     <td>${v.name}</td>
		                    
		//                     <td>
		//                     	<button class="btn btn-primary btn-sm d-inline-block btnEdit " data-name="${v.name}" data-id="${v.id}"><i class="ni ni-settings"></i></button>
		// 		                  <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>
		//                     </td>

		//                 	</tr>`
		// 		})
		// 		$('#medicineType').html(html);
		// 	})
		// }



		//creat data 
	$('.addNew').click(function(){
      var name=$('#cname').val();
      var url="<?php echo e(route('medicineType.store')); ?>"
	      $.ajax({
	          url:url,
	          type:"post",
	          data:{name:name},
	          dataType:'json',
	          success:function(response){
	            if(response.success){
	            	getMedicineType();
	               $('.Ename').text('');
	              $('span.error').removeClass('text-danger');
	              $('.success').removeClass('d-none');
	              $('.success').show();
	              $('.success').text('successfully added');
	              $('.success').fadeOut(3000);
	              $('#cname').val('');
 
	            }

	          },
	          error:function(error){
	            var message=error.responseJSON.message;
	            var errors=error.responseJSON.errors;
	            console.log(error.responseJSON.errors);
	            if(errors){
	              
	              var name=errors.name;
	              $('.Ename').text(name);
	              $('span.error').addClass('text-danger');
	             
	            }

	          }
	         
	          
	        })
  		})
	//edit the data
		$('#medicineType').on('click','.btnEdit',function(){
			// alert('heow');
	    	$('#EditMedicineType').show();
	    	$('#AddMedicineType').hide();
	    	var id=$(this).data('id');
	    	var name=$(this).data('name');
	    	//alert(id,name);
	    
	    	  $('#ucname').val(name);
	    	  $('.medTypeid').val(id);
	    
	    })

	   

	    $('#EditMedicineType').submit(function(e){
	      e.preventDefault();
	      	var id=$('.medTypeid').val();
	      var formdata= new FormData(this);
	       	var url="<?php echo e(route('medicineType.update',':id')); ?>";
	    	url=url.replace(':id',id);
	      formdata.append('_method', 'PUT');
	          $.ajax({
	                type:'POST',
	                url: url,
	                data: formdata,
	                cache:false,
	                contentType: false,
	                processData: false,
	                success: (data) => {
	                  $('.success').removeClass('d-none');
			              $('.success').show();
			              $('.success').text('successfully updated');
			              $('.success').fadeOut(3000);
			              $('#ucname').val('');
			               
					      $('.medid').val('');
					      $('#EditMedicineType').hide();
	    					$('#AddMedicineType').show();
	    				getMedicineType();
	                        
	                },
	                error: function(error){
		                  var message=error.responseJSON.message;
			            var errors=error.responseJSON.errors;
			            console.log(error.responseJSON.errors);
			            if(errors){
			             
			              var name=errors.name;
			              $('.UEname').text(name);
			              $('span.error').addClass('text-danger');
							}
	                }
	            });

	          
	    })


	    //delete process
	     $('#medicineType').on('click','.btnDelete',function(){
	      //alert('i am delete');
	     		if(confirm('Are you sure to delete?')){
	     			 var id=$(this).data('id');
					      console.log(id);
					       var url="<?php echo e(route('medicineType.destroy',':id')); ?>";
					      
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
					                   getMedicineType();

					                }},
					                

					            });
	     		}
	    })


	})


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/medicinetype/index1.blade.php ENDPATH**/ ?>
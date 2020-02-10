<?php $__env->startSection('content'); ?>

  <div class="card-header border-0">
      <h3 class="mb-0">Medicine tables</h3>
      <div class="alert alert-success success d-none" role="alert">
          
      </div>
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
              <tbody id="doctorTable">
                    
              </tbody>
            </table>
    </div>
    



<!-- Modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




  
  
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $('document').ready(function(){
    getData();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function getData(){
          console.log('you make it');
          $.get("<?php echo e(route('getDoctor')); ?>",function(response){
            var j=1;
            var html='';
            $.each(response.data,function(i,v){
              console.log(v);
                    html+=`<tr>
                              <td>${j++}</td>
                              <td>${v.doctorinfo.name}</td>
                              <td>${v.doctorinfo.email}</td>
                              <td>${v.doctor.phone}</td>
                              <td>
                                 <a href='' class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.doctor.id}"><i class="ni ni-settings"></i></a>
                                 <a href="" class="btn btn-warning btn-sm d-inline-block btnDetail " data-id="${v.doctor.id}"><i class="ni ni-collection"></i></a>
                                <button  class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.doctor.id}" data-userid="${v.doctorinfo.id}"> <i class="ni ni-fat-delete"></i></button>

                                 
                              </td>

                          </tr>`;

                  })

            $('#doctorTable').html(html);
          })
        }
   
        //Edit

        $('#doctorTable').on('click','.btnEdit',function(){
          var id=$(this).data('id');
          var url="<?php echo e(route('doctor.edit',':id')); ?>";
      
          url=url.replace(':id',id);
          $(this).attr('href',url);
        })

        $('#doctorTable').on('click','.btnDelete',function(){

          var id=$(this).data('id');
          var url="<?php echo e(route('doctor.destroy',':id')); ?>";
      
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
                    getData();

                }},
                

            });
        })

        $('#doctorTable').on('click','.btnDetail',function(){
             var id=$(this).data('id');
             console.log(id);;
            var url="<?php echo e(route('doctor.show',':id')); ?>";
        
             url=url.replace(':id',id);
            
          $(this).attr('href',url);
        
        })
     
    })


 
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/doctor/index.blade.php ENDPATH**/ ?>
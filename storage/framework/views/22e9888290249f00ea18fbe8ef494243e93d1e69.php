<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header border-0">

          <h3 class="mb-0">Doctor List</h3>

          <?php if( Session::has("success") ): ?>
          <div class="alert alert-success alert-block" role="alert">
              <button class="close" data-dismiss="alert"></button>
              <?php echo e(Session::get("success")); ?>

          </div>
          <?php endif; ?>

          <div class="alert alert-success success d-none" role="alert"></div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-white table-flush" id="ownerTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Owner Name</th>
                <th>Clinic Name</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody >
                  
            </tbody>
          </table>
        </div>	
      </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.alert').fadeOut(3000);

    
    getOnwers();
    // function getOnwers(){
    //     $.get("<?php echo e(route('getOwners')); ?>",function(response){
    //         var j=1;
    //         var html='';
    //         $.each(response,function(i,v){
    //           console.log(v);
    //                 html+=`<tr>
    //                           <td>${j++}</td>
    //                           <td>${v.user.name}</td>
    //                           <td>${v.clinic_name}</td>
    //                           <td>${v.user.email}</td>
    //                           <td>
    //                              <a href='' class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.id}"><i class="ni ni-settings"></i></a>
    //                              <a href="" class="btn btn-warning btn-sm d-inline-block btnDetail " data-id="${v.id}"><i class="ni ni-collection"></i></a>
    //                             <button  class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.id}" data-userid="${v.id}"> <i class="ni ni-fat-delete"></i></button>

                                 
    //                           </td>

    //                       </tr>`;

    //               })

    //         $('#ownerTable').html(html);
    //       })
    // }
    function getOnwers(){
        var i=1;
            $('#ownerTable').DataTable({
            
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
            "ajax": "<?php echo e(route('getOwners')); ?>",
            "columns":[

                 {render:function(){
                  
                  return i++;
                 }},
                { "data": "user.name"},
                {"data":"clinic_name"},
                {"data":"user.email"},
                { "data": "id",
                  sortable:false,
                  render:function(data){
                    return `<button class="btn btn-primary btn-sm d-inline-block btnEdit "  data-id="${data}"><i class="ni ni-settings"></i></button>
                    <button class="btn btn-warning btn-sm d-inline-block btnDetail "  data-id="${data}"><i class="ni ni-circle-08"></i></button>

                              <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${data}"> <i class="ni ni-fat-delete"></i></button>`;
                  }
                 }
            ],
            "info":false
            
         });
    }


    $('#ownerTable').on('click','.btnDetail',function(){
      console.log('helo');
          var id=$(this).data('id');
          var url="<?php echo e(route('owners.show',':id')); ?>";
      
          url=url.replace(':id',id);
          window.location.href=url;
       })

     $('#ownerTable').on('click','.btnEdit',function(){
      console.log('helo');
          var id=$(this).data('id');
          var url="<?php echo e(route('owners.edit',':id')); ?>";
      
          url=url.replace(':id',id);
          window.location.href=url;
       })

     $('#ownerTable').on('click','.btnDelete',function(){
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          if(confirm("Are you sure to delete?")){
              var id=$(this).data('id');
              var url="<?php echo e(route('owners.destroy',':id')); ?>";
          
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
                        $('.success').hide(3000);
                        getOnwers();

                    }},
                    

                });
          }
          
        })





  })

 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/owner/index.blade.php ENDPATH**/ ?>
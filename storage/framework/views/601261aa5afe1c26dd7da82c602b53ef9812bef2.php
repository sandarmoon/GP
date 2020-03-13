<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header border-0">

          <h3 class="mb-0">Doctor List</h3>

          <div class="alert alert-success success d-none" role="alert"></div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-white table-flush"  id="doctorTable">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Clinic</th>
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

        // function getData(){
        //   console.log('you make it');
        //   $.get("<?php echo e(route('getDoctor')); ?>",function(response){
        //     var j=1;
        //     var html='';
        //     $.each(response,function(i,v){
        //       console.log(v);
        //             html+=`<tr>
        //                       <td>${j++}</td>
        //                       <td>${v.doctorinfo.name}</td>
        //                       <td>${v.doctorinfo.email}</td>
        //                       <td>${v.doctor.phone}</td>
        //                       <td>${v.ownerinfo.clinic_name}</td>
        //                       <td>
        //                          <a href='' class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${v.doctor.id}"><i class="ni ni-settings"></i></a>
        //                          <a href="" class="btn btn-warning btn-sm d-inline-block btnDetail " data-id="${v.doctor.id}"><i class="ni ni-collection"></i></a>
        //                         <button  class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.doctor.id}" data-userid="${v.doctorinfo.id}"> <i class="ni ni-fat-delete"></i></button>

                                 
        //                       </td>

        //                   </tr>`;

        //           })

        //     $('#doctorTable').html(html);
        //   })
        // }

        //start the datatable js
          function getData(){
            var i=1;
                $('#doctorTable').DataTable({
                
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
                "ajax": "<?php echo e(route('getDoctor')); ?>",
                "columns":[

                     {render:function(){
                      
                      return i++;
                     }},
                    { "data": "doctorinfo.name",
                    render:function(data){
                      $('.btnEdit').attr('data-name', data);
                      return data;
                    } },
                    {"data":"doctorinfo.email"},
                    {"data":"doctor.phone"},
                    {"data":"ownerinfo.clinic_name"},
                    { "data": "doctor.id",
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
        //end the datatable js

   
        //Edit

        $('#doctorTable').on('click','.btnEdit',function(){
          //alert('helo');
          var id=$(this).data('id');
          var url="<?php echo e(route('doctor.edit',':id')); ?>";
      
          url=url.replace(':id',id);
          // $(this).attr('href',url);
          window.location.href=url;
        })

        $('#doctorTable').on('click','.btnDelete',function(){
            if(confirm('Are you sure to delete?')){
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
            }
          
        })

        $('#doctorTable').on('click','.btnDetail',function(){
             var id=$(this).data('id');
             console.log(id);;
            var url="<?php echo e(route('doctor.show',':id')); ?>";
        
             url=url.replace(':id',id);
            
          window.location.href=url;
        
        })
     
    })


 
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/doctor/index.blade.php ENDPATH**/ ?>
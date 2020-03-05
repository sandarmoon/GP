<?php $__env->startSection('content'); ?>
  
    <!-- Page content -->
    <div class="container-fluid mt-3 text-sm-center text-lg-left text-md-left">
      
      <div class="row   ">
        <div class="col-lg-4 px-xl-2 col-sm-4">
          <img src="<?php echo e(asset($doctor->avatar)); ?> " class="profilemedia w-100 pl-sm-3 pl-lg-0 mt-5  rounded-circle">
          <br>
            
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6 order-lg-0 order-md-0 col-md-6  order-sm-1 mt-sm-2">
                <h2 class="">General Information</h2>
                    <div class="p-3">
                        <div><span>Name:</span><h3 class="ml-2 d-inline-block"><?php echo e($doctor->user->name); ?></h3></div>
                       <div><span>Age:</span><h3 class="ml-2 d-inline-block">
                        <?php if(!empty($doctor->age)): ?>
                        <?php echo e($doctor->age); ?> years
                        <?php else: ?> 
                        Unknown 
                        <?php endif; ?>  </h3></div>
                       <div><span>Date of Birth:</span><h3 class="ml-2 d-inline-block">
                        <?php if(!empty($doctor->age)): ?>
                        <?php echo e($doctor->dob); ?> 
                        <?php else: ?> 
                        Unknown 
                        <?php endif; ?> </h3></div>
                    </div>
                <h2 class="mt-3">Eduction Information</h2>

                    <div class="p-3">
                        <div><span>Degree:</span><h3 class="ml-2 d-inline-block">
                          <?php if(!empty($doctor->degree)): ?>
                          <?php echo e($doctor->degree); ?> 
                          <?php else: ?> 
                          Unknown 
                          <?php endif; ?> 
                        </h3></div>
                       <div id="preview-certificate" data-img=<?php echo e($doctor->certificate); ?>><span>Certificate:</span>
                        <?php if(!empty($doctor->certificate)): ?>
                          
                          <?php $array=json_decode($doctor->certificate,true);
                            foreach($array as $k=>$a):?>
                            <img src="<?php echo e(asset($a)); ?>" class="showimg"  data-id="<?php echo e($k); ?>" data-img="<?php echo e($doctor->certificate); ?>" width="40" height="40">
                          
                          <?php endforeach; ?>
                         
                          <?php endif; ?>



                       </div>
                       <div id="preview-license" data-img=<?php echo e($doctor->license); ?>><span>License:</span>
                        <?php if(!empty($doctor->license)): ?>
                          
                          <?php $array=json_decode($doctor->license,true);
                            foreach($array as $k=>$a):?>
                            <img src="<?php echo e(asset($a)); ?>" class="showimg" data-id="<?php echo e($k); ?>"   width="40" height="40">
                          
                          <?php endforeach; ?>
                         
                          <?php endif; ?>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 order-md-0  order-lg-0">
                <div class="card mt-5 " >
                 
                  <div class="card-body bg-secondary">
                       <h3 class="">Contact Information</h3>
                    <div><span>Address:</span><h4  class=" ml-2 d-inline-block">      <?php if(!empty($doctor->address)): ?>
                          <?php echo e($doctor->address); ?> 
                          <?php else: ?> 
                          Unknown 
                          <?php endif; ?> </h4 ></div>
                    <div><span>Phone:</span><h4  class=" ml-2 d-inline-block">  
                          <?php if(!empty($doctor->phone)): ?>
                          <?php echo e($doctor->phone); ?> 
                          <?php else: ?> 
                          Unknown 
                          <?php endif; ?> </h4 ></div>
                    <div><span>Account :</span><h4  class=" ml-2 d-inline-block">
                          <?php if(!empty($doctor->user->email)): ?>
                          <?php echo e($doctor->user->email); ?> 
                          <?php else: ?> 
                          Unknown 
                          <?php endif; ?> 
                    </h4 ></div>
                    <a href="<?php echo e(route('doctor.edit',$doctor->id)); ?>" class="btn btn-primary">Edit Profile</a>
                  </div>
                </div>
            </div>
          </div>

          <h2 class="mt-3 order-sm-2">Experience Information</h2>

              <div class="p-3">
                  <div><h4>
                    <?php if(!empty($doctor->experience)): ?>
                          <?php echo e($doctor->experience); ?> 
                          <?php else: ?> 
                          Unknown 
                          <?php endif; ?> 
                  </h4></div>
                 
              </div>    
        </div>
      </div>
      
    </div>

    <div class="modal fade bd-example-modal-lg" id="showphoto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!-- carousel start -->
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bigpreview">
                  
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            <!-- carousel end -->
        </div>
      </div>
    </div>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content preimages">
         
          
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script type="text/javascript">
  $('document').ready(function(){
    

     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    
            

     $('#preview-certificate').on('click','.showimg',function(){
        var list=$('#preview-certificate').data('img');
       
      showCarousel(list,'Certificate');

     })

     $('#preview-license').on('click','.showimg',function(){
        var list=$('#preview-license').data('img');
        showCarousel(list,"License");
     })

     function showCarousel(list,text){
          var html=''; var isfrist=true;
          $.each(list,function(i,v){

            var carou=`<div class="`
            if(isfrist){
              carou+=`active `;
            }

            carou+=`carousel-item">

          <img src="<?php echo e(asset(':v')); ?>" class="d-block w-100" height = '500' alt="...">
        </div>`;
            carou=carou.replace(':v',v);
            html+=carou;
            isfrist=false;
          })
          $('.caption').html(text);
          $('.bigpreview').html(html);
          $('#showphoto').modal('show');
     }
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/doctor/detail.blade.php ENDPATH**/ ?>
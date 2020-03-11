<?php $__env->startSection('content'); ?>
	
    <!-- Page content -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 mt-5">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">

                <div class="card-profile-image " id="profileImg">
                  <a href="#">
                    <img src="<?php echo e(asset($doctor->avatar)); ?>" class="rounded-circle">
                  </a>
                  <div class="Text "><a href="#" >Change Profile</a></div>
                </div>

              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <!-- <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div> -->
            </div>
            <div class="card-body pt-0 pt-md-4 mt">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
            <form id="doctorResumeUpdate" enctype="multipart/formData">
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="name"  value="<?php echo e($doctor->user->name); ?>" type="text">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" name="email" value="<?php echo e($doctor->user->email); ?>"  type="email">
                    </div>
                  </div> -->
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-settings"></i>
                           <img src="" width="30" height="30" class="d-none" id="profileholder">

                        </span>

                      </div>
                      <input class="form-control" name="avatar"  type="file">
                    </div>
                  </div>
                  <div class="form-group">
                    <!-- <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" name="password"  placeholder="Password" type="password">
                    </div> -->
                  </div>

                   <div class="text-center">
                      <input type="submit" class="btn btn-primary mt-4" value="Update information"/>
                    </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Fill Resume</h3>
                </div>
                <div class="col-4 text-right">
                  <!-- <a href="#!" class="btn btn-sm btn-primary">skip</a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              
                <h6 class="heading-small text-muted mb-4">General information</h6>
                <div class="pl-lg-4">

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-nrc">NRC</label>
                        <input type="text" id="input-nrc" name="nrc" class="form-control form-control-alternative"  value="<?php echo e($doctor->nrc); ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-age">Age</label>
                        <input type="text" id="input-age" name="age" value="<?php echo e($doctor->age); ?>" class="form-control form-control-alternative" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-dob">Date of Birth</label>
                        <input type="text" id="input-dob" name="dob" value="<?php echo e($doctor->dob); ?>" class="form-control form-control-alternative" >
                      </div>
                    </div>
                  </div>
                  
                </div>
                 <hr class="my-4" />
                <!-- Eduction -->
                <h6 class="heading-small text-muted mb-4">Skill information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-degree">Degree</label>
                        <input id="input-degree" class="form-control form-control-alternative" name="degree" value="<?php echo e($doctor->degree); ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-certificate">Certificate</label>

                        <input type="hidden" name="oldcertificate" value="<?php echo e($doctor->certificate); ?>">
                        <input type="hidden" name="oldlicense" value="<?php echo e($doctor->license); ?>">
                        <input type="hidden" name="oldid" value="<?php echo e($doctor->id); ?>">
                        <input type="hidden" name="oldavatar" value="<?php echo e($doctor->avatar); ?>">

                        

                        <!-- start here -->

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old-certificate" role="tab" aria-controls="home" aria-selected="true">Old</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-certificate" role="tab" aria-controls="profile" aria-selected="false">New</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="old-certificate" role="tabpanel" aria-labelledby="home-tab">
                          
                        </div>
                        <div class="tab-pane fade" id="new-certificate" role="tabpanel" aria-labelledby="profile-tab">
                          <input type="file" id="input-certificate" multiple="multiple" name="certificate[]" class="form-control form-control-alternative" >
                        </div>
                       
                      </div>


                        <!-- end here -->

                      </div>
                    </div>
                    <div class="col-lg-6">



                      <div class="form-group">
                        <label class="form-control-label" for="input-license">License</label>

                          <!-- start here -->

                          <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old-license" role="tab" aria-controls="home" aria-selected="true">Old</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-license" role="tab" aria-controls="profile" aria-selected="false">New</a>
                          </li>
                          
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="old-license" role="tabpanel" aria-labelledby="home-tab">
                            
                          </div>
                          <div class="tab-pane fade" id="new-license" role="tabpanel" aria-labelledby="profile-tab">
                            <input type="file" id="input-license" name="license[]" class="form-control form-control-alternative" multiple="multiple">
                          </div>
                         
                        </div>


                          <!-- end here -->
                        
                      </div>
                    </div>
                    
                  </div>
                </div>

                <hr class="my-4" />
                <!-- Experience -->
                <h6 class="heading-small text-muted mb-4">Working Experience</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label> Experience</label>
                    <textarea rows="4" name="experience" class="form-control form-control-alternative" ><?php echo e($doctor->experience); ?></textarea>
                  </div>
                </div>




                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input type="text" id="input-address" name="address" class="form-control form-control-alternative" placeholder="address" value="<?php echo e($doctor->address); ?>" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Phone</label>
                        <input type="text" id="input-phone" name="phone" class="form-control form-control-alternative" placeholder="phone no" value="<?php echo e($doctor->phone); ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <div class=" text-right">
                  <!-- <input type="submit" value="Submit Now!" class="btn btn-sm btn-primary AddNew"/>or -->
                  <a href="#!" class="">Skip</a>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  //for showing the photo see start
    
    window.onload=function start(){
      var certificates=document.querySelector('[name="oldcertificate"]');
       var list=certificates.value;

       var list=JSON.parse(list);

        var html1='';var license='';
      for(var j=0;j<list.length;j++){
        console.log(list[j]);
            var frame=`<img src="<?php echo e(asset(':v')); ?>" class="ml-2" width="40" height="40" >`;
            html1+=frame.replace(':v',list[j]);
            document.querySelector('#old-certificate').innerHTML=html1;

        }

        var licenses=document.querySelector('[name="oldlicense"]');
       var list=licenses.value;

       var list=JSON.parse(list);

        
      for(var l=0;l<list.length;l++){
        console.log(list[l]);
            var frame=`<img src="<?php echo e(asset(':v')); ?>" class="ml-2" width="40" height="40" >`;
            license+=frame.replace(':v',list[l]);
            document.querySelector('#old-license').innerHTML=license;

        }
    }
    



    //end here

    //function for loading

    function loading(list,placement){
      
    }


	$('document').ready(function(){
    




		 $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });


    $('input[name="avatar"]').change(function(){
      alert('hello');
      var  reader=new FileReader();
      reader.onload=(e)=>{

        $('#profileholder').attr('src',e.target.result);
        $('#profileholder').removeClass('d-none');
        $('.ni-settings').hide();
      }
      reader.readAsDataURL(this.files[0]); 
    })

    $('#doctorResumeUpdate').submit(function(e){

      e.preventDefault();
    var formData= new FormData(this);
    var id=$('input[name="oldid"]').val();
    var name=$('input[name="name"]').val();
   
      // var form_data = $("#doctorResumeUpdate").serialize();
    
    formData.append('_method', 'PUT');
      console.log(name);
      var url="<?php echo e(route('doctor.update',':id')); ?>";
      
      url=url.replace(':id',id);
      $.ajax({
                type:'post',
                url: url,
                data:formData,
                cache:false,
                dataType:'json',
                contentType: false,
                processData: false,
                success: (data) => {
                  window.location.href="<?php echo e(route('doctor.index')); ?>";
                    //this.reset();
                    //alert('Image has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
                }
            });
    })
	})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/GP/resources/views/doctor/edit.blade.php ENDPATH**/ ?>
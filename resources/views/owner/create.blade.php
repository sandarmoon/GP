@extends('frontendTemplate')
@section('content')
	
    <!-- Page content -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 mt-5">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">

                <div class="card-profile-image " id="profileImg">
                  <a href="#">
                    <img src="{{asset('storages/img/team-4-800x800.jpg')}}" class="rounded-circle">
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
                <form id="OwnerResume" enctype="multipart/formData">
                  <div class="form-group">
                    <span class="Ename error "></span>
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="name" placeholder="Name" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <span class="Eemail error "></span>
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" name="email" placeholder="Email" type="email">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend " >
                        <span class="input-group-text" id="avataricon"><i class="ni ni-settings profileicon "></i>
                          <img src="" width="30" height="30" class="d-none" id="profileholder">
                        </span>
                      </div>
                      <input class="form-control" name="avatar" placeholder="Profile" type="file">
                    </div>
                  </div>

                  <div class="form-group">
                    <span class="Epassword error "></span>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" name="password" placeholder="Password" type="password">
                    </div>
                  </div>

                  <div class="text-center">
                    <input type="submit" class="btn btn-primary mt-4" value="Create Account"/>
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
                  <h3 class="mb-0">Fill Owner Informations</h3>
                </div>
                <div class="col-4 text-right">
                  <!-- <a href="#!" class="btn btn-sm btn-primary">skip</a> -->
                </div>
              </div>
            </div>
            <div class="card-body">
              
                <h6 class="heading-small text-muted mb-4">General information</h6>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-nrc">NRC</label>
                        <input type="text" id="input-nrc" name="nrc" class="form-control form-control-alternative" placeholder="enter nrc" value="9/AMZ(n)093211">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-age">Age</label>
                        <input type="text" id="input-age" name="age" class="form-control form-control-alternative" placeholder="23">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-dob">Date of Birth</label>
                        <input type="date" id="input-dob" name="dob" class="form-control form-control-alternative" placeholder="">
                      </div>
                    </div>
                  </div>

            




                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Clinic information</h6>

                  <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          
                          <label class="form-control-label" for="input-clinic_name">Name</label>
                          <input type="text" id="input-clinic_name" name="clinic_name" class="form-control form-control-alternative" placeholder="" >
                          <span class="Eclinic_name error "></span>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">

                          <label class="form-control-label" for="input-clinic_logo">Logo</label>
                          <input type="file" id="input-clinic_logo" name="clinic_logo" class="form-control form-control-alternative" placeholder="" >
                          <span class="Eclinic_logo error "></span>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-clinic_time">Time of Clinic</label>
                          <input type="text" id="input-clinic_time" name="clinic_time" class="form-control form-control-alternative" placeholder="" >
                          <span class="Eclinic_time error "></span>
                        </div>
                      </div>
                  </div>

                  
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-phone">Phone</label>
                          <input type="text" id="input-phone" name="phone" class="form-control form-control-alternative" placeholder="" >
                          <span class="Ephone error "></span>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label"  for="input-address">Address</label>
                        <textarea rows="4" name="address" id="input-address" class="form-control form-control-alternative">
                          
                        </textarea>
                        <span class="Eaddress error "></span>
                        
                      </div>
                    </div>
                  </div>
                  
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->

     
      
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



    

    $('#OwnerResume').submit(function(e){
      e.preventDefault();
      var formData= new FormData(this);
      var url="{{route('owners.store')}}";
      $.ajax({
                type:'POST',
                url: url,
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                   
                 window.location.href="{{route('owners.index')}}";
                    
                },
                error: function(error){
                   var errors=error.responseJSON.errors;
                   if(errors){
                   
                     $('.Ename').text(errors.name);
                     $('.Epassword').text(errors.password);
                     $('.Eemail').text(errors.email);
                     $('.Eclinic_name').text(errors.clinic_name);
                     $('.Eclinic_logo').text(errors.clinic_logo);
                     $('.Eclinic_time').text(errors.clinic_time);
                     $('.Ephone').text(errors.phone);
                     $('.Eaddress').text(errors.address);
                     $('span.error').addClass('text-danger');
                   }
                }
            });
    })

    $('input[name="avatar"]').change(function(){
      //alert('hello');
      var  reader=new FileReader();
      reader.onload=(e)=>{

        $('#profileholder').attr('src',e.target.result);
        $('#profileholder').removeClass('d-none');
        $('.ni-settings').hide();
      }
      reader.readAsDataURL(this.files[0]); 
    })
  })
</script>
@endsection
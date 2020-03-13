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
                    <img src="{{asset($owner->avatar)}}" class="rounded-circle">
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
                <form id="OwnerResumeUpdate" enctype="multipart/formData">
                  <div class="form-group">
                    <span class="Ename error "></span>
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="name" value="{{$owner->user->name}}"  type="text">
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

                  

                  <div class="text-center">
                    <input type="submit" class="btn btn-primary mt-4" value="Update Now!"/>
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
                        <input type="text" id="input-nrc" name="nrc" class="form-control form-control-alternative" placeholder="enter nrc" value="{{$owner->nrc}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-age">Age</label>
                        <input type="text" id="input-age" name="age" class="form-control form-control-alternative" value="{{$owner->age}}" >
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-dob">Date of Birth</label>
                        <input type="date" id="input-dob" name="dob" value="{{$owner->dob}}" class="form-control form-control-alternative" >
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
                          <input type="text" id="input-clinic_name" value="{{$owner->clinic_name}}" name="clinic_name" class="form-control form-control-alternative" placeholder="" >
                        </div>
                      </div>
                      <div class="col-lg-6">

                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old logo</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Logo</a>
                           
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              <div class="form-group">
                                <img src="{{asset($owner->clinic_logo)}}" width="50" height="50">
                              </div>
                          </div>
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                              <div class="form-group">
                                
                                <input type="file" id="input-new_clinic_logo" name="new_clinic_logo" class="form-control form-control-alternative" placeholder="" >
                                <input type="hidden" name="old_clinic_logo" value="{{$owner->clinic_logo}}">
                                <input type="hidden" name="oldid" value="{{$owner->id}}" name="">
                              </div>
                          </div>
                          
                        </div>
                        
                      </div>



                      
                  </div>

                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-clinic_time">Time of Clinic</label>
                          <input type="text" id="input-clinic_time" name="clinic_time" class="form-control form-control-alternative" value="{{$owner->clinic_time}}" placeholder="" >
                        </div>
                      </div>
                  </div>

                  
                  <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-phone">Phone</label>
                          <input type="text" id="input-phone" name="phone" class="form-control form-control-alternative" value="{{$owner->phone}}" placeholder="" >
                        </div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label"  for="input-address">Address</label>
                        <textarea rows="4" name="address"  id="input-address" class="form-control form-control-alternative">
                          {{$owner->address}}
                        </textarea>
                        
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

    $('input[name="avatar"]').change(function(){
      // alert('hello');
      var  reader=new FileReader();
      reader.onload=(e)=>{

        $('#profileholder').attr('src',e.target.result);
        $('#profileholder').removeClass('d-none');
        $('.ni-settings').hide();
      }
      reader.readAsDataURL(this.files[0]); 
    })

 $('#OwnerResumeUpdate').submit(function(e){

      e.preventDefault();
    var formData= new FormData(this);
    var id=$('input[name="oldid"]').val();
    var name=$('input[name="name"]').val();
   
      // var form_data = $("#doctorResumeUpdate").serialize();
    
    formData.append('_method', 'PUT');
      console.log(name);
      var url="{{route('owners.update',':id')}}";
      
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
                 window.location.href="{{route('owners.index')}}";
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
@endsection
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
            <form id="doctorResume" enctype="multipart/formData">
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                      </div>
                      <input class="form-control" name="name" placeholder="Name" type="text">
                    </div>
                  </div>
                  <div class="form-group">
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
                        <input type="text" id="input-nrc" name="nrc" class="form-control form-control-alternative" placeholder="enter nrc" value="9/AMZ(n)093211">
                      </div>
                        <input type="hidden" name="oldid" value="{{$doctor->id}}">
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
                        <input type="text" id="input-dob" name="dob" class="form-control form-control-alternative" placeholder="jesse@example.com">
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
                        <input id="input-degree" class="form-control form-control-alternative" name="degree" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-certificate">Certificate</label>
                        <input type="file" id="input-certificate" multiple="multiple" name="certificate[]" class="form-control form-control-alternative" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-license">License</label>
                        <input type="file" id="input-license" name="license[]" class="form-control form-control-alternative" multiple="multiple">
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
                    <textarea rows="4" name="experience" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
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
                        <input type="text" id="input-address" name="address" class="form-control form-control-alternative" placeholder="" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Phone</label>
                        <input type="text" id="input-phone" name="phone" class="form-control form-control-alternative" placeholder="" >
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
@endsection
@section('script')
<script type="text/javascript">
	$('document').ready(function(){
		 $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });



		// $('.AddNew').click(function(){
		// 	var obj=$('#doctorResume').serialize();
		// 	var data= new FormData();
		// 	var cer=$('input[name=certificate]').get(0).files;
		// 	// var license=$('input[name=license]').get(0).files;
		// 	var certificate=new Array();
		//   if (cer.length>0) {
		// 	    var count = 0;
		// 	    $(cer).each(function(i, value){
		// 	    	console.log(value);
		// 	        count++;
		// 	        var variableName = "name" + count;
		// 	        certificate.push(value);
			       
		// 	    })
		// 	}
		// 	console.log(certificate);
		// 	//var certi=JSON.stringify(certificate);
		// 	//console.log(certi);
		// 	data.append('certificate',certificate);

		// 	console.log(data);
		// 	//  if (license.length>0) {
		// 	//     var count = 0;
		// 	//     $(license).each(function(i, value){
		// 	//     	//console.log(value);
		// 	//         count++;
		// 	//         var variableName = "name" + count;
		// 	//         data.append(variableName, value[i]);
		// 	//     })
		// 	// }
			
		// 	var url="{{route('doctor.store')}}";
    
		//        $.ajax({
		//           url:url,
		//           type:"post",
		//           data:data,
		//           dataType:'json',
		//           cache : false,
  //  					 processData: false,
		//           success:function(response){
		//             console.log(response);
		//           },
		//           error:function(error){
		            
		//             console.log(error);

		//           }
		          

		//         })
		// })

		$('#doctorResume').submit(function(e){
			e.preventDefault();
			var d= new FormData(this);
			var id=$('input[name="oldid"]').val();
		      // var oldcertificate=$('input[name="name"]').val();
		      var formDatas= new FormData(this);

		      // console.log(oldcertificate);
		      var url="{{route('doctor.update',':id')}}";
		      url=url.replace(':id',id);
			$.ajax({
                type:'PUT',
                url: url,
                data: d,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                   // alert('Image has been uploaded successfully');
                },
                error: function(data){
                    console.log(data);
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
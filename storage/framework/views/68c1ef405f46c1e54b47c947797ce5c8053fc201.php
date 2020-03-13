<?php $__env->startSection('content'); ?>
	
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0">
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Add Reception
          </button>
          <h3 class="mb-0">Receptions</h3>
          <div class="alert alert-primary success d-none my-3" role="alert"></div>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Adress</th>
                    <th>phone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="usertable">
                </tbody>
            </table>
          </div>    
        </div>             
      </div>
    </div>
  </div>
           
<?php $__env->stopSection(); ?>


<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update reception</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             
        <form method="POST" enctype="multipart/form-data" id="editupload_form" >
            <input type="hidden" name="" id="editid" value="">
            <input type="hidden" name="userid" id="user_id" value="">

        <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" value="" name="name" id="editname"/>
                                            <span class="Ename error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <textarea  class="form-control" placeholder="Address *" value="" name="address" id="editaddres" ></textarea>
                                            <span class="Eaddress error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value=""  name="password" id="editpassword" readonly />
                                            <input type="password" class="form-control" placeholder="Password *" value=""  name="newpassword" id="resetpassword" />
                                            <input type="checkbox" class="reset" >resetpassword


                                            <span class="Epassword error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old files</a>
                                              </li>
                                              <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">new files</a>
                                              </li>

                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                              <input type="hidden" name="oldimg" value="" id="oldimg">

                                              <img src="" width="100px" height="100px" class="editfile">

                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                              <label for="file">File</label>
                                              <input type="file" class="form-control" id="editfile" name="file" >
                                        </div>

                                  </div> 


                            </div>
                                        <span id="cp"></span>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" id="editemail" />
                                            <span class="Eemail error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" name="phoneno" id="editphoneno"/>
                                            <span class="Ephone error d-block" ></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Education *" value="" name="education" id="editeducation" />
                                            <span class="Eeducation error d-block" ></span>
                                        </div>
                                        <div class="form-group my-5">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" class="gender-male" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" class="gender-female" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                          <div class="offset-4 col-4 offset-4">
                                                <button type="submit" class="btn btn-primary btn-block"  id="update"/>update</button>
                                                
                                          </div>
       </div>
      </form>

      
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create reception</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             
        <form method="POST" enctype="multipart/form-data" id="upload_form" action="javascript:void(0)">
        <div class="row register-form">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" value="" name="name" id="name"/>
                                            <span class="Ename error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <textarea  class="form-control" placeholder="Address *" value="" name="address" id="addres" ></textarea>
                                            <span class="Eaddress error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value=""  name="password" id="password"/>
                                            <span class="Epassword error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control"  placeholder="photo *" value=""  name="file" id="file" />
                                            <span class="Efile error d-block" ></span>
                                        </div>
                                        <span id="cp"></span>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" id="email" />
                                            <span class="Eemail error d-block" ></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" name="phoneno" id="phoneno"/>
                                            <span class="Ephone error d-block" ></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Education *" value="" name="education" id="education" />
                                            <span class="Eeducation error d-block" ></span>
                                        </div>
                                        <div class="form-group my-5">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                          <div class="offset-4 col-4 offset-4">
                                                <button type="submit" class="btn btn-primary btn-block"  id="repregister"/>Register</button>
                                                
                                          </div>
       </div>
      </form>

      
    </div>
  </div>
</div>
</div>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $(document).ready(function(){
      getData();
             $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $("#exampleModal").on('submit','#upload_form',function(e){
                  e.preventDefault();
                 // alert("ok");
                  var formData = new FormData(this);
                  //console.log(formData);

                  $.ajax({
                type:'POST',
                url: "<?php echo e(url('reception')); ?>",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                     if(data.success){
                        getData();
                        $("#exampleModal").modal("hide");
                         $('span.error').removeClass('text-danger');
                         $('.success').removeClass('d-none');
                          $('.success').show();
                          $('.success').text('successfully added');
                          $('.success').fadeOut(3000);
                         $('.Ename').text('');
                         $('.Eemail').text('');
                         $('.Ephone').text('');
                         $('.Epassword').text('');
                         $('.Eaddress').text('');
                         $('.Efile').text('');
                         $('.Eeducation').text('');


                     }
                },
                error: function(error){
                  var message=error.responseJSON.message;
                   var errors=error.responseJSON.errors;
                  //console.log(error.responseJSON.errors);
                  if(errors){
                        var name=errors.name;
                        var email=errors.email;
                        var phone=errors.txtEmpPhone;
                        var password=errors.password;
                        var address=errors.address;
                        var file=errors.file;
                        var education=errors.education
                         $('span.error').addClass('text-danger');
                        $('.Ename').text(name);
                         $('.Eemail').text(email);
                         $('.Ephone').text(phone);
                         $('.Epassword').text(password);
                         $('.Eaddress').text(address);
                         $('.Efile').text(file);
                         $('.Eeducation').text(education);
                   }
                    
                }
            });
            })



            function getData(){
      $.get("<?php echo e(route('getuser')); ?>",function(response){
          //  console.log(response)
            var j=1;
            var html='';
                  $.each(response,function(i,v){
                   // console.log(v);
                       $.each(v,function(j,k){
                        //console.log(k);
                        html+=`<tr>
                                      <td>${j++}</td>
                                      <td>${k.user.name}</td>
                                      <td>${k.user.email}</td>
                                      <td>${k.reception.address}</td>
                                      <td>${k.reception.phoneno}</td>
                                      
                                      <td>
                                         <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="${k.reception.id}"><i class="ni ni-settings"></i></button>
                                                <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${k.reception.id}"> <i class="ni ni-fat-delete"></i></button>
                                         
                                      </td>

                                  </tr>`;
                       })
                     $('#usertable').html(html);

                  });

                       
            
      })
    }






            $("tbody").on('click','.btnEdit',function(){
                  

                  var id=$(this).data('id');
                  var url="<?php echo e(route('reception.edit',':id')); ?>";
      
            url=url.replace(':id',id);
            $.get(url,function(res){
              //console.log(res);
            $('#editname').val(res[0].name);
            $('#editaddres').val(res[0].address);
            $('#editemail').val(res[0].email);
            //var gender=$(".gender").val();
            //console.log(gender);
        $( ".gender-"+`${res[0].gender}` ).attr('checked','checked');
             $("#editpassword").show();
             $("#resetpassword").hide();
            $('#editid').val(res[0].id);
            $('#editphoneno').val(res[0].phoneno);
            $('#editeducation').val(res[0].education);
            $('#editpassword').val(res[0].password);
            $(".reset").click(function(){
            $("#editpassword").hide();
             $("#resetpassword").show();
            })
            
            $(".editfile").attr('src',res[0].file);
            $("#oldimg").val(res[0].file);
            //console.log($("#oldimg").val());
            $("#user_id").val(res[0].user_id);

            $("#updateModal").modal("show");
           
      })

      })


      $("#updateModal").on('submit','#editupload_form',function(e){
                  e.preventDefault();
                  var id=$("#editid").val();
                  
                 // alert("ok");
                 var formData = new FormData(this);
                 formData.append('_method','PUT');
                //console.log(formData);
                  var url="<?php echo e(route('reception.update',':id')); ?>";
                  url=url.replace(':id',id);
                  $.ajax({
                type:'post',
                url: url,
                data: formData,
                dataType:'json',
                processData: false,
                contentType: false,
                success: (data) => {
                    if(data.success){
                        getData();
                        $("#updateModal").modal("hide");
                         $('span.error').removeClass('text-danger');
                         $('.success').removeClass('d-none');
                          $('.success').show();
                          $('.success').text('successfully update');
                          $('.success').fadeOut(3000);
                         $('.Ename').text('');
                         $('.Eemail').text('');
                         $('.Ephone').text('');
                         $('.Epassword').text('');
                         $('.Eaddress').text('');
                         $('.Efile').text('');
                         $('.Eeducation').text('');


                     }
                },
                error: function(error){
                  console.log(error.responseJSON);
                  var message=error.responseJSON.message;
                   var errors=error.responseJSON.errors;
                    if(errors){
                        var name=errors.name;
                        var email=errors.email;
                        var phone=errors.txtEmpPhone;
                        var password=errors.password;
                        var address=errors.address;
                        var file=errors.file;
                        var education=errors.education
                         $('span.error').addClass('text-danger');
                        $('.Ename').text(name);
                         $('.Eemail').text(email);
                         $('.Ephone').text(phone);
                         $('.Epassword').text(password);
                         $('.Eaddress').text(address);
                         $('.Efile').text(file);
                         $('.Eeducation').text(education);
                   }
                }
            });
            });


      $('tbody').on('click','.btnDelete',function(){
      
      var id=$(this).data('id');
      //console.log(id);
       var url="<?php echo e(route('reception.destroy',':id')); ?>";
      
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
     });
})
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/reception/create.blade.php ENDPATH**/ ?>
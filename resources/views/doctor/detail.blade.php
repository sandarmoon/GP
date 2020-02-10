@extends('frontendTemplate')
@section('content')
  
    <!-- Page content -->
    <div class="container-fluid mt-3 text-sm-center text-lg-left text-md-left">
      
      <div class="row   ">
        <div class="col-lg-4 px-xl-2 col-sm-4">
          <img src="{{asset($doctor->avatar)}} " class="profilemedia w-100 pl-sm-3 pl-lg-0 mt-5  rounded-circle">
          <br>
            
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6 order-lg-0 order-md-0 col-md-6  order-sm-1 mt-sm-2">
                <h2 class="">General Information</h2>
                    <div class="p-3">
                        <div><span>Name:</span><h3 class="ml-2 d-inline-block">{{$doctor->user->name}}</h3></div>
                       <div><span>Age:</span><h3 class="ml-2 d-inline-block">
                        @if(!empty($doctor->age))
                        {{$doctor->age}} years
                        @else 
                        Unknown 
                        @endif  </h3></div>
                       <div><span>Date of Birth:</span><h3 class="ml-2 d-inline-block">
                        @if(!empty($doctor->age))
                        {{$doctor->dob}} 
                        @else 
                        Unknown 
                        @endif </h3></div>
                    </div>
                <h2 class="mt-3">Eduction Information</h2>

                    <div class="p-3">
                        <div><span>Degree:</span><h3 class="ml-2 d-inline-block">
                          @if(!empty($doctor->degree))
                          {{$doctor->degree}} 
                          @else 
                          Unknown 
                          @endif 
                        </h3></div>
                       <div><span>Certificate:</span><h3 class="ml-2 d-inline-block"> 
                        @if(!empty($doctor->certificate))
                          @php 
                          $array=json_decode($doctor->certificate,true);
                          echo "<span data-list=$doctor->certificate class='showImage'>".count($array)."files</span>";
                          @endphp
                         
                          @endif



                       </h3></div>
                       <div><span>License:</span><h3 class="ml-2 d-inline-block"> @if(!empty($doctor->license))
                          @php 
                          $array=json_decode($doctor->license,true);
                          echo "<span data-list=$doctor->license class='showImage'>".count($array)."files</span>";
                          @endphp
                         
                          @endif</h3></div>
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 order-md-0  order-lg-0">
                <div class="card mt-5 " >
                 
                  <div class="card-body bg-secondary">
                       <h3 class="">Contact Information</h3>
                    <div><span>Address:</span><h4  class=" ml-2 d-inline-block">      @if(!empty($doctor->address))
                          {{$doctor->address}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                    <div><span>Phone:</span><h4  class=" ml-2 d-inline-block">  
                          @if(!empty($doctor->phone))
                          {{$doctor->phone}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                    <div><span>Account :</span><h4  class=" ml-2 d-inline-block">
                          @if(!empty($doctor->user->email))
                          {{$doctor->user->email}} 
                          @else 
                          Unknown 
                          @endif 
                    </h4 ></div>
                    <a href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-primary">Edit Profile</a>
                  </div>
                </div>
            </div>
          </div>

          <h2 class="mt-3 order-sm-2">Experience Information</h2>

              <div class="p-3">
                  <div><h4>
                    @if(!empty($doctor->experience))
                          {{$doctor->experience}} 
                          @else 
                          Unknown 
                          @endif 
                  </h4></div>
                 
              </div>    
        </div>
      </div>
      
    </div>

    <div class="modal fade" id="showphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body show">
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="showphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body show">
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
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

    
            

     $('.showImage').click(function(){
      var list=$(this).data('list');
      //var listarray=JSON.parse(list);
      var html="";
      let frame= '<div > <img src={{asset(":v")}} class="preview" data-img=":va" width=50 height=50 alt="hello"></img></div>';
      $.each(list,function(i,v){
        frame=frame.replace(':v',v);
        frame=frame.replace(':va',v);
        html+=frame;
      })
      $('.show').html(html);
      $( "#showphoto" ).modal( "show" );
     });

     // $('.show').on('click','.preview',function(){
     //  let image=$(this).data('img');
     //  let h='';
     //  h=`<img src=${image} class="preview" data-img=":va" width=50 height=50 alt="hello"></img>`;
     //  $('.show').html(h);
     //  $('#showphoto').modal(show);

     // })



     // $('.certiButton').click(function(){
     //  var list=$(this).data('list');
     //  //var listarray=JSON.parse(list);
     //  var html="";
     //  let frame= '<div> <img src={{asset(":v")}} width=50 height=50 alt="hello"></img></div>';
     //  $.each(list,function(i,v){
     //    frame=frame.replace(':v',v);
     //    html+=frame;
     //  })
     //  $('.show').html(html);
     //  $( "#showphoto" ).modal( "show" );
     // })

    

    // $('#doctorResume').submit(function(e){
    //   e.preventDefault();
    //   var formData= new FormData(this);
    //   var url="{{route('doctor.store')}}";
    //   $.ajax({
    //             type:'POST',
    //             url: url,
    //             data: formData,
    //             cache:false,
    //             contentType: false,
    //             processData: false,
    //             success: (data) => {
    //                 this.reset();
    //                 window.location.href="{{route('doctor.index')}}"
    //             },
    //             error: function(error){
    //                var errors=error.responseJSON.errors;
    //                if(errors){
                   
    //                 $('.Ename').text(errors.name);
    //                 $('.Epassword').text(errors.password);
    //                  $('.Eemail').text(errors.email);
    //                 $('span.error').addClass('text-danger');
    //                }
    //             }
    //         });
    // })

    // $('input[name="avatar"]').change(function(){
    //   //alert('hello');
    //   var  reader=new FileReader();
    //   reader.onload=(e)=>{

    //     $('#profileholder').attr('src',e.target.result);
    //     $('#profileholder').removeClass('d-none');
    //     $('.ni-settings').hide();
    //   }
    //   reader.readAsDataURL(this.files[0]); 
    // })
  })
</script>
@endsection
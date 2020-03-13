@extends('frontendTemplate')
@section('content')
  
    <!-- Page content -->
    <div class="container-fluid mt-7 text-sm-center text-lg-left text-md-left">
      
      <div class="row">
        <div class="col-lg-4 px-xl-2 col-sm-4">
          <img src="{{asset($owner->avatar)}} " class="img-fluid profilemedia w-100 pl-sm-3 pl-lg-0 mt-5  rounded-circle">
          <br>
            
        </div>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6 order-lg-0 order-md-0 col-md-6  order-sm-1 mt-sm-2">
                <h2 class="">General Information</h2>
                    <div class="p-3">
                        <div><span>Name:</span><h3 class="ml-2 d-inline-block">{{$owner->user->name}}</h3></div>
                       <div><span>Age:</span><h3 class="ml-2 d-inline-block">
                        @if(!empty($owner->age))
                        {{$owner->age}} years
                        @else 
                        Unknown 
                        @endif  </h3></div>
                        <div><span>NRC:</span><h3 class="ml-2 d-inline-block">
                        @if(!empty($owner->nrc))
                        {{$owner->nrc}} 
                        @else 
                        Unknown 
                        @endif </h3></div>
                       <div><span>Date of Birth:</span><h3 class="ml-2 d-inline-block">
                        @if(!empty($owner->age))
                        {{$owner->dob}} 
                        @else 
                        Unknown 
                        @endif </h3></div>
                    </div>
                <h2 class="mt-3">Clinic Information</h2>

                    <div class="p-3">
                        <div><span>Name:</span><h3 class="ml-2 d-inline-block">
                          @if(!empty($owner->clinic_name))
                          {{$owner->clinic_name}} 
                          @else 
                          Unknown 
                          @endif 
                        </h3></div>

                        <div><span>Logo:</span><h3 class="ml-2 d-inline-block">
                          @if(!empty($owner->clinic_logo))
                          <img src="{{asset($owner->clinic_logo)}}" width="50" height="50"/> 
                          @else 
                          No logo is assigned!
                          @endif 
                        </h3></div>

                        <div><span>Time:</span><h3 class=" d-inline-block">
                          @if(!empty($owner->clinic_time))
                          {{$owner->clinic_time}} 
                          @else 
                          Unknown 
                          @endif 
                        </h3></div>

                        

                        <div><span>Address:</span><h4  class=" ml-2 d-inline-block">      @if(!empty($owner->address))
                          {{$owner->address}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                    <div><span>Phone:</span><h4  class=" ml-2 d-inline-block">  
                          @if(!empty($owner->phone))
                          {{$owner->phone}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                         
                       
                       
                    </div>
            </div>
            <div class="col-lg-6 col-md-6 order-md-0  order-lg-0">
                <div class="card mt-5 " >
                 
                  <div class="card-body bg-secondary">
                       <h3 class="">Contact Information</h3>
                    <div><span>Address:</span><h4  class=" ml-2 d-inline-block">      @if(!empty($owner->address))
                          {{$owner->address}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                    <div><span>Phone:</span><h4  class=" ml-2 d-inline-block">  
                          @if(!empty($owner->phone))
                          {{$owner->phone}} 
                          @else 
                          Unknown 
                          @endif </h4 ></div>
                    <div><span>Account :</span><h4  class=" ml-2 d-inline-block">
                          @if(!empty($owner->user->email))
                          {{$owner->user->email}} 
                          @else 
                          Unknown 
                          @endif 
                    </h4 ></div>
                    <a href="{{route('owners.edit',$owner->id)}}" class="btn btn-primary">Edit Profile</a>
                  </div>
                </div>
            </div>
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
@endsection
@section('script')

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

          <img src="{{asset(':v')}}" class="d-block w-100" height = '500' alt="...">
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
@endsection
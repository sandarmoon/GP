@extends('frontendTemplate')
@section('add')

<div class="card p-3">
    <form>
    <div class="alert alert-primary success d-none" role="alert">
        
     </div>
      <div class="form-group">
        <label for="cname">Medicine Name</label>
        <input type="text" name="name" id="cname" placeholder="enter medicine name" class="d-inline form-control ">
        <span class="Ename error" ></span>
      </div>
      <div class="form-group">
        <label for="medicineType" >Choose MedicineType</label>
            <select class="form-control" name="type_id"  id="medicineType">
              @foreach($medTypes as $medType)
              <option value="{{$medType->id}}">{{$medType->name}}</option>
              
              @endforeach
            </select>
      </div>
      <div class="form-group">
        <label for="chemical">Enter Chemically</label>
          <textarea class="form-control" id="chemical" rows="3"></textarea>
          <span class="Echemical error"></span>
      </div>
      <div class="form-group">
        <button type="button" class="btn btn-primary border-dark form-control addNew">Add</button>
      </div>
    </form>
</div>



  
@endsection
@section('content')

  <div class="card-header border-0">
      <h3 class="mb-0">Medicine tables</h3>
    </div>
    <div class="table-responsive p-3">
       <table class="table align-items-center table-white table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Chemical Things</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="medicineTable">
                <?php $i=1;?>
                @foreach($medicines as $medType)
                <tr class="med-{{medType->id}}">
                    <td>{{$i++}}</td>
                    <td>{{$medType->name}}</td>
                    <td>{{$medType->medicinetype->name}}</td>
                    <td>{{$medType->chemical}}</td>
                    <td>
                      <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="{{$medType->id}}" data-name="{{$medType->name}}"><i class="ni ni-settings"></i></button>
                      <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="{{$medType->id}}" data-name="{{$medType->name}}"> <i class="ni ni-fat-delete"></i></button>

                    </td>

                </tr>
                @endforeach
                
              </tbody>
            </table>
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
    $('.alert').fadeOut(2000);
    $('#medicineEdit').hide();

    $('.addNew').click(function(){
      var name=$('#cname').val();
      var id=$( "#medicineType option:selected" ).val();
      var chemical=$('#chemical').val();
      var url="{{route('medicine.store')}}"
      // $.post("{{route('medicine.store')}}",{name:name,typeid:id,chemical:chemical},function(response){
      //     if(response.success){
      //       console.log(response.success);
      //     }else{
      //       console.log(response);
      //     }
      //   })

       $.ajax({
          url:url,
          type:"post",
          data:{name:name,typeid:id,chemical:chemical},
          dataType:'json',
          success:function(response){
            if(response.success){
               $('.Ename').html('');
              $('span.error').removeClass('text-danger');
              $('.Echemical').html('');
              $('.success').removeClass('d-none');
              $('.success').show();
              $('.success').text('successfully added');
              $('.success').hide(2000);
              $('#cname').val('');
              $( "#medicineType option:selected" ).val('');
              chemical=$('#chemical').val('');
              
            }
          },
          error:function(error){
            var message=error.responseJSON.message;
            var errors=error.responseJSON.errors;
            console.log(error.responseJSON.errors);
            if(errors){
              var chemical=errors.chemical;
              var name=errors.name;
              $('.Ename').html(name);
              $('span.error').addClass('text-danger');
              $('.Echemical').html(chemical);
            }

           
          

          }
          

        })
    })
    
    
      


       
     // console.log(name,id);
    })


 
</script>

@endsection

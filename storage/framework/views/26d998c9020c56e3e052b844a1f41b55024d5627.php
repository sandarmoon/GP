<?php $__env->startSection('style'); ?>
<style type="text/css">
  .parent {
  position: relative;
  text-align: center;
  color: white;
}
  .top-right {
  position: absolute;
  top: -26px;
  right: 0px;

}
.img-remove:hover{
  cursor: pointer;
}

.danger{
  border: none;
  background-color: transparent;
  color: red;
  font-size: 20px;
  cursor: pointer;
}
.danger:hover{
  border: ;
  background-color: transparent;
  color: red;
  font-size: 20px;
  cursor: pointer;
}


</style>

@endseciton
<?php $__env->startSection('add'); ?>
	<div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                  <span class="h2 font-weight-bold mb-0">350,897</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                  <span class="h2 font-weight-bold mb-0">2,356</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                <span class="text-nowrap">Since last week</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                  <span class="h2 font-weight-bold mb-0">924</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span class="text-nowrap">Since yesterday</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                  <span class="h2 font-weight-bold mb-0">49,65%</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="fas fa-percent"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row mt-5 p-2">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Expense Record</h3>
                 
                </div>
                
                   <div class="col alert alert-success success d-none" role="alert">
          
                  </div>
                
                <div class="col text-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addExpense">
					  Add Expense!
					</button>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="expenseTable">
                  
                  
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <div class="col-md-12 mt-4">
          
          <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Search Here for Profit</h3>
                    </div>
                    <div class="col text-right">
                      <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                    </div>
                  </div>
                </div>
                <div class="row p-3">
                      <div class="col-md-4">
                          <!-- from start -->
                            <form id="search" method="post">
                              <div class="alert alert-primary success d-none" role="alert">
                                  
                               </div>
                                <div class="form-group">
                                  <label for="startDate">Start Date</label>
                                  <input type="date" name="startdate" id="startDate" placeholder="enter Start date" class="d-inline form-control ">
                                  <span class="Sdate error" ></span>
                                </div>

                                <div class="form-group">
                                  <label for="endDate">End Date</label>
                                  <input type="date" name="enddate" id="endDate" placeholder="enter End date" class="d-inline form-control ">
                                  <span class="Edate error" ></span>
                                </div>
                                
                                
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary border-dark form-control ">Search Now</button>
                                </div>
                              </form>
                            <!-- from end -->
                      </div>
                      <div class="col-md-8 text-center">
                          
                          <div class="mt-3">
                            <h3>Report of Search</h3>
                            <div class="form-group">
                                  
                              <p><b>Total Expense</b> Amount: <span class="totalExpense"></span>kyats</p>
                              
                            </div>

                             <div class="form-group">
                                  
                              <p><b>Total Income</b> Amount:  <span class="totalIncome"></span>kyats</p>
                         
                              
                            </div>

                            <div class="form-group">
                              
                               <p><b>Total Profit</b> Amount:  <span class="totalProfit"></span>kyats</p>

                            </div>

                          </div>
                      </div>

                </div>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card shadow">
                <div class="card-header border-0">
                  <div class="row align-items-center">
                    <div class="col">
                      <h3 class="mb-0">Social traffic</h3>
                    </div>
                    <div class="col text-right">
                      <a href="#!" class="btn btn-sm btn-primary">See all</a>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <canvas id="myChart" width="200" height="200"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        

  </div>


    

    


      <!-- modal start -->
      <!-- Button trigger modal -->


      <!-- Add Model -->
<div class="modal fade" id="addExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Expense</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form start -->
      <form id="expense-from" method="post" enctype="multipart/form-data">
          <div class="modal-body p-2">
            	
            		
    				  
        			  <div class="col-md-12">
        			      <div class="form-group ">
        			        <input type="date" name="date" placeholder="" class="form-control is-valid" />
                      
        			      </div>
        			    </div>



        			    <div class="col-md-12">
        			      <div class="form-group">
        			      	<label for="description">Description</label>
        			        <input type="text" name="description" class="form-control" id="description" placeholder="why use?" />
                       <span class="description error "></span>
        			      </div>
                   
                    
        			    </div>
        			    
        			  
        			 
        			    <div class="col-md-12">
        			      <div class="form-group">
        			      	<label for="amount">Amount</label>
        			        <div class="input-group ">
        			        	
        			          <div class="input-group-prepend">
        			            <span class="input-group-text"><i class="ni  ni-credit-card"></i></span>
        			          </div>
        			           <input class="form-control" name="amount" id="amount" placeholder="$$$" type="text">

        			        </div>

                        <span class="amount error "></span>
                       
        			      </div>
        			    </div>
        			    

        			  
        			  
        			    <div class="col-md-12">
        			      <div class="form-group remove1">
        			      	<label for="Recepits" class="d-block">Recepits</label>
        			        <input type="file" name="file1" id="Recepits" placeholder="Success" class=" " />
                     <!--  <button type="button"  class="btn btn-danger btn-sm float-right delete1" data-id="1" ><span>×</span></button> -->
        			      </div>
                    
        			    </div>
                  
                    <div class="col-md-12 a" >
                      
                    </div>
                  

                  <div class="col-md-12" title="add more Recepits">
                      <button onclick="JavaScript:addmore(0);" type="button" class="btn btn-success" >
                      <i class="ni ni-fat-add "></i>
                      </button>
                    </div>
    				    
    				 
    				
            	
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary " value="Add Expense"/>
          </div>
      </form>
      <!-- form end -->
    </div>
  </div>
</div>
      <!-- modal end -->


      <!-- Edit Modal -->
<div class="modal fade" id="editExpense" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Expense</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- form start -->
      <form id="expense-from-edit" method="post" enctype="multipart/form-data">
          <div class="modal-body p-2">
              
                <!-- old id -->
                <input type="hidden" name="oldid" id="oldID">
              
                <div class="col-md-12">
                    <div class="form-group ">
                      <input type="date" name="date" id="edate" class="form-control is-valid" />
                    </div>
                  </div>



                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="edescription">Description</label>
                      <input type="text" name="description" id="edescription" class="form-control" id="description" placeholder="why use?">
                      <span class="edescription error "></span>
                    </div>
                  </div>
                  
                
               
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="eamount">Amount</label>
                      <div class="input-group">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni  ni-credit-card"></i></span>
                        </div>
                        <input class="form-control" name="amount" id="eamount" placeholder="$$$" type="text">
                      </div>
                      <span class="eamount error "></span>
                    </div>
                  </div>

                  <div class="col-md-12 my-4">
                    <label for="eRecepits" class="d-block">Recepits</label>
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldRecepits" role="tab" >Old</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newRecepits" role="tab" >New</a>
                      </li>
                      
                      </ul>
                      <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="oldRecepits" role="tabpanel" aria-labelledby="home-tab">I am old photo</div>
                      <div class="tab-pane fade" id="newRecepits" role="tabpanel" aria-labelledby="profile-tab">
                        
                         <div class="col-md-12 mt-2">
                            <div class="form-group remove1">
                              
                              <input type="file" name="file1" id="eRecepits" placeholder="Success" class=" " />
                             <!--  <button type="button"  class="btn btn-danger btn-sm float-right delete1" data-id="1" ><span>×</span></button> -->

                             <!-- old image -->
                             <input type="hidden" name="oldimage" id="oldimage">

                            </div>
                            
                          </div>
                          
                            <div class="col-md-12 Edit">
                              
                            </div>
                          

                          <div class="col-md-12" title="add more Recepits">
                              <button onclick="JavaScript:addmoreEdit(0);" type="button" class="btn btn-success" >
                              <i class="ni ni-fat-add "></i>
                              </button>
                            </div>

                      </div>
                      
                      </div>
                  </div>
                  

                
                
                 
                
             
            
              
          </div>
          <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary " value="Add Expense"/>
          </div>
      </form>
      <!-- form end -->
    </div>
  </div>
</div>
      <!-- modal end -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
//chart start
/*var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});*/

//chart end



	//get today date with js start
	var date = new Date();

	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();

	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;

	var today = year + "-" + month + "-" + day;


	document.querySelector('#expense-from input[type="date"]').value = today;
	// end date
  

	
		// document.querySelector('#addMoreFile').addEventListener('click',(function(){
  //     alert('helo');
  //     var btn= `<div class="form-group">
  //                     <label for="Recepits">Recepits</label>
  //                     <input type="file" name="file1" id="Recepits" placeholder="Success" class="form-control " />
  //                   </div>`;
  //   })
  //   );
  var i=2;


  //adding more file for add_from
  function addmore(){
    console.log(i);
    console.log("make");
    
    var btn= `<div class="form-group remove${i}">
                       <label for="Recepits" class="d-block">Recepits</label>
                       <input type="file" name="file${i}" data-id="${i}" id="Recepits" placeholder="Success" class="" />
                       <button type="button"  class="btn btn-danger btn-sm float-right delete" data-id="${i}" ><span>×</span></button>
                   </div>`;
                   i++;


                  document.querySelector('.a').innerHTML+=btn;
  }

 //adding more file for edit_from
  function addmoreEdit(){
    console.log(i);
    console.log("make");
    
    var btn= `<div class="form-group remove${i}">
                       <label for="Recepits" class="d-block">Recepits</label>
                       <input type="file" name="file${i}" data-id="${i}" id="Recepits" placeholder="Success" class="" />
                       <button type="button"  class="btn btn-danger btn-sm float-right delete" data-id="${i}" ><span>×</span></button>
                   </div>`;
                   i++;


                  document.querySelector('.Edit').innerHTML+=btn;
  }

  $(document).ready(function(){
    //csrf toten
    getData();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//searchreport

  $('#search').submit(function(e){
    e.preventDefault();
    // alert('helo');
     var formdata= new FormData(this);
    var startdate=$('#search input[name="startdate"]').val();
    var enddate=$('#search input[name="enddate"]').val();
    // console.log(startdate,enddate);
      var url="<?php echo e(route('searchReport')); ?>";
      $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                   if(data){
                    var expense=data.totalExpense;
                    var income=data.totalIncome;
                    var profit=income-expense;
                    $('.totalExpense').text(expense);
                    $('.totalIncome').text(income);
                    $('.totalProfit').text(profit);
                    $('.totalExpense').addClass('text-dark');
                    $('.totalIncome').addClass('text-dark');
                    $('.totalProfit').addClass('text-dark');
                   }
                       
                },
                error: function(error){
                   var errors=error.responseJSON.errors;
                   if(errors){
                      $('.Sdate').text(errors.startdate);
                      $('.Edate').text(errors.enddate);
                      $('span.error').addClass('text-danger');
                   }
                }
            });




  })









//deleting file for add_from

    $('.a').on('click','.delete',function(){
        var id=$(this).data('id');
        $(`.remove${id}`).remove();
    })

 //deleting file for edit_from

     $('.Edit').on('click','.delete',function(){
        var id=$(this).data('id');
        $(`.remove${id}`).remove();
    })



    // $('.delete1').click(function(){
    //   $('.remove1').remove();
    // })

    //add expense
    $('#expense-from').submit(function(e){
      e.preventDefault();
      var formdata= new FormData(this);
      var url="<?php echo e(route('expense.store')); ?>";
      // formData.append('_method', 'PUT');
          $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                   $('#addExpense').modal('hide');
                        getData();
                   $('.success').removeClass('d-none');
                    $('.success').addClass('text-danger');
                        $('.success').show();
                        $('.success').text('successfully Added');
                        $('.success').fadeOut(3000);
                         i=2;
                       
                },
                error: function(error){
                   var errors=error.responseJSON.errors;
                   if(errors){
                   
                    $('.date').text(errors.name);
                    $('.description').text(errors.description);
                     $('.amount').text(errors.amount);
                    $('span.error').addClass('text-danger');
                   }
                }
            });

         
    })

    //edit expense
    $('#expense-from-edit').submit(function(e){
      e.preventDefault();
      var id=$('#oldID').val();
      var formdata= new FormData(this);
      var url="<?php echo e(route('expense.update',':oldID')); ?>";
      url=url.replace(':oldID',id);
      formdata.append('_method', 'PUT');
          $.ajax({
                type:'POST',
                url: url,
                data: formdata,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                  $('#editExpense').modal('hide');
                        getData();
                   $('.success').removeClass('d-none');
                    $('.success').addClass('text-danger');
                        $('.success').show();
                        $('.success').text('successfully updated');
                        $('.success').fadeOut(3000);
                          i=2;
                        
                },
                error: function(error){
                   $('.edate').text(errors.name);
                    $('.edescription').text(errors.description);
                     $('.eamount').text(errors.amount);
                    $('span.error').addClass('text-danger');
                }
            });

          
    })

    function getData(){
      console.log('you make it');

      $.get("<?php echo e(route('getExpense')); ?>",function(response){
        console.log(response);
        var j=1;
        var html='';
        console.log(response);
        $.each(response.expenses,function(i,v){
         console.log(v);
                html+=`<tr>
                    <th scope="row">
                     ${j++}
                    </th>
                    <td>
                     ${v.date}
                    </td>
                    <td>
                      ${v.description}
                    </td>
                    <td>
                      ${v.amount}
                    </td>
                    <td>
                      <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-date="${v.date}" data-description="${v.description}" data-amount="${v.amount}" data-files=${v.files} data-id="${v.id}"><i class="ni ni-settings"></i></button>
                            <button class="btn btn-danger btn-sm d-inline-block btnDelete " data-id="${v.id}"> <i class="ni ni-fat-delete"></i></button>
                    </td>
                  </tr>`;

              })

         $('#expenseTable').html(html);

       var obj=response.report;
       var chart = Object.values(obj);

       // console.log(Object.values(obj));
       // var arr=Object.entries(obj);
       // $.each(arr,function(i,v){
       //    // console.log(v[0]);
       //    // console.log(v[1]);

       //    chart+=v[1]+",";
       // })
       // chart+= ']';
       // console.log(chart);

       //start here
       var ctx = $('#myChart');
        var graph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May"],
                datasets: [{
                    label: "Sales",
                    data: chart,
                    fill: false,
                    borderColor: '#07C',
                }]
            }
        });
       //end here
      })
    }

    //show edit form of expense
    $('#expenseTable').on('click','.btnEdit',function(){
      // alert('i am edit');
        var id=$(this).data('id');
        var description=$(this).data('description');
        var amount=$(this).data('amount');
        var date=$(this).data('date');
        var files=$(this).data('files');
        $('#edate').val(date);
        $('#edescription').val(description);
        $('#eamount').val(amount);
        // console.log(files);
        showImage('#oldRecepits',files)




         $('#eamount').val(amount);
         $('#oldimage').val(JSON.stringify(files));
         $('#oldID').val(id);
       $('#editExpense').modal('show');

     // var url="<?php echo e(route('expense.edit',':id')); ?>";
    })
//image show after deleting one by one

function showImage(palcement,files){
    var html2='';
        $.each(files,function(i,v){
          var frame= `
          <div class="d-inline parent my-2">
              <img src="<?php echo e(asset(':v')); ?>" width ='100px' height="80px" class="img-fluid p-2"/>
              <div  class="top-right d-inline text-danger  img-remove" data-id="${i}">
                 <i class="ni ni-fat-remove" title="delete it!"></i>
              </div>
          </div>

            
          `;

          frame=frame.replace(':v',v);
          html2+=frame;
        })

        $(palcement).html(html2);
}



    //image delete by one by one

    $('#oldRecepits').on('click','.img-remove',function(e){
        e.preventDefault();
      var id=$(this).data('id');
      var files=$('.btnEdit').data('files');
        files.splice(id, 1);
        showImage('#oldRecepits',files);
         $('#oldimage').val(JSON.stringify(files));
      
    })






    //delete process
     $('#expenseTable').on('click','.btnDelete',function(){
      //alert('i am delete');
      var id=$(this).data('id');
      console.log(id);
       var url="<?php echo e(route('expense.destroy',':id')); ?>";
      
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
    })
  })//end js


// chart start




 


</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/GP/resources/views/expense/index.blade.php ENDPATH**/ ?>
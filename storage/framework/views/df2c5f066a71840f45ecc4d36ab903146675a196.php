<?php $__env->startSection('content'); ?>
  <div class="row">
    <div class="col-12">
      <div class="alert alert-primary success d-none" role="alert"></div>
    </div>

    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card" id="AddMedicineType">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Add New Medicine Type</h3>
        </div>

        <div class="card-body pt-0">
          <!-- Add form start -->
          <form id="AddMedicineTypeForm">
         
            <div class="form-group">
              <label for="cname" class="sfont">Medicine Type Name</label>
              <span class="Ename error d-block" ></span>
              <input type="text" name="name" id="mtname" placeholder="enter medicine type name" class="d-inline form-control ">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary btn-md  float-right addNew">Add</button>
            </div>
          </form>
          <!-- Add form end -->
        </div>
      </div>

      <div class="card" id="EditMedicineType">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Edit Medicine Type</h3>
        </div>

        <div class="card-body pt-0">
          <!-- Update form start -->
          <form id="EditMedicineForm">
            <div class="form-group">
              <label for="ucname" class="sfont">Medicine Type Name</label>
              <span class="UEname error d-block" ></span>
              <input type="text" name="name" id="umtname" class="d-inline form-control "> 
            </div>
            <input type="hidden" name="" class="medid">
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-md  float-right update">Update</button>
            </div>
          </form>
          <!-- Update form end -->
        </div>
      </div>
    </div>

    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Medicine Types </h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-white table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="medicineTable">
              <?php $i=1;?>
              <?php $__currentLoopData = $medTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td><?php echo e($i++); ?></td>
                  <td><?php echo e($medType->name); ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm d-inline-block btnEdit " data-id="<?php echo e($medType->id); ?>" data-name="<?php echo e($medType->name); ?>">Edit</button>
                     <form onsubmit="return confirm('are you sure to delete?')" action="<?php echo e(route('medicineType.destroy',$medType->id)); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                       <input type="submit" class="btn btn-danger btn-sm " value="delete">
                     </form>
                  </td>

              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
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

    $('#EditMedicineType').hide();

    $('.btnEdit').click(function(){
      var id=$(this).data('id');
      var name=$(this).data('name');
      $('#medEdit').show(1500);
      $('#medCreate').hide(1500);

      $('.ename').val(name);
      $('.eid').val(id);    
      var url="<?php echo e(route('medicineType.update',':id')); ?>";
      url=url.replace(':id',id);

      $('#med_update').attr('action',url);
    })


    $('#Add').click(function(){
      $('#medEdit').hide(1500);
      $('#medCreate').show(1500);
    })

    $('.btnUpdate').click(function(){
      var name=$('.ename').val();
      var id=$('.eid').val();
      


        // $.ajax({
        //   url:url,
        //   type:"PUT",
        //   data:{name:name},
        //   success:function(response){
        //     console.log(response);
        //   },
        //   error:function(error){
        //     console.log(error);
        //   }
          

        // })
     // console.log(name,id);
    })


  })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/GP/resources/views/medicinetype/index.blade.php ENDPATH**/ ?>
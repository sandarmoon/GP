<?php $__env->startSection('add'); ?>
  <div class="row mt-2">
    <div class="col">
      <div class="card bg-default shadow">
        <div id="medCreate" class="card-header bg-transparent border-0">
          <form action="<?php echo e(route('medicineType.store')); ?>" id="med_store" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">

                <input type="text" name="name" placeholder="enter medicine name" class="d-inline form-control col-md-6">
                <button class="ml-3 btn d-inline-block btn-outline-secondary ">
                  Add New
                </button>
            </div>
          </form>

          
        </div>

        <div id="medEdit" class="card-header bg-transparent border-0">
          <form id="med_update" method="post">
           <?php echo csrf_field(); ?>
           <?php echo method_field('PUT'); ?>
            <div class="row">

              
                <input type="text" name="name" placeholder="enter medicine name" class="d-inline form-control col-md-6 ename">
                <!-- <button type="submit" class="ml-3 btn d-inline-block btnUpdate btn-outline-secondary">
                  Edit
                </button> -->
                <input type="submit" name="" value="Edit" class="ml-3 btn d-inline-block btnUpdate btn-outline-secondary" >
                <button type="button" class="ml-3 btn d-inline-block btn-outline-secondary" id="Add">
                  Add New
                </button>
            </div>
          </form>

          
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

  <div class="card-header border-0">
      <h3 class="mb-0">Medicine Types </h3>
    </div>
    <div class="table-responsive p-3">
       <table class="table align-items-center table-white table-flush">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Action</th>
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
    
  
  
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
  $('document').ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#medEdit').hide();

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

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/medicinetype/index.blade.php ENDPATH**/ ?>
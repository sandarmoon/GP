<?php $__env->startSection('content'); ?>
<div class="row">
   <div class="col-12" style="margin-top: 130px;">

  <div class="card-header border-0">
    <a href="<?php echo e(route('patient.create')); ?>" class="btn btn-primary float-right">Add New Patient</a>
      <h3 class="mb-0">Patient tables</h3>
    </div>
    <div class="table-responsive">
       <table class="table table-bordered align-items-center table-white table-flush example" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-light">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Age</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tbody">
                <?php $i=1;?>
                <?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($row->patient->name); ?></td>
                    <td><?php echo e($row->patient->fatherName); ?></td>
                    <td><?php echo e($row->patient->age); ?></td>
                    <td><a href="<?php echo e(asset('appointpatienthistory/'.$row->id.'/'.$row->patient_id)); ?>" data-id="$row->id" data-patient_id="$row->patient_id" class="btn btn-info pending">Pending</a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </tbody>
            </table>
    </div>
   
  </div>
</div>
  
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
 
 

</script>

<?php $__env->stopSection(); ?>

   
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/Appointment/index.blade.php ENDPATH**/ ?>
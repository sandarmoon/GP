<?php $__env->startSection('content'); ?>

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
              <tbody>
                <?php $i=1;?>
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($patient->name); ?></td>
                    <td><?php echo e($patient->fatherName); ?></td>
                    <td><?php echo e($patient->age); ?></td>
                    <td><a href="<?php echo e(route('appointpatienthistory',$patient->id)); ?>" data-id="$patient->id" class="btn btn-info pending">Pending</a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </tbody>
            </table>
    </div>
   
  
  
	
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
 
</script>

<?php $__env->stopSection(); ?>

   
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/Appointment/index.blade.php ENDPATH**/ ?>
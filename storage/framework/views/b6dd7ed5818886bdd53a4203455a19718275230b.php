<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">

      <div class="card">
        
        <div class=" p-3">

        	<div class="row">
        		<div class="col-md-3">
        			<div class="col-md-9">
        				<img src="<?php echo e(asset($owner->avatar)); ?> " class="img-fluid  rounded-circle">
        			</div>
          
        		</div>
        		<div class="col-md-8">
        				<div class="card bg-secondary " >
                 		
		                  <div class="card-body row ">
		                       <h3 class="card-title col-md-12">Contact Information</h3>
		                    <div class="col"><span>Name:</span><h4  class=" ml-2 ">      <?php if(!empty($owner->user->name)): ?>
		                          <?php echo e($owner->user->name); ?> 
		                          <?php else: ?> 
		                          Unknown 
		                          <?php endif; ?> </h4 ></div>
		                    <div class="col"><span>Phone:</span><h4  class=" ml-2 ">  
		                          <?php if(!empty($owner->phone)): ?>
		                          <?php echo e($owner->phone); ?> 
		                          <?php else: ?> 
		                          Unknown 
		                          <?php endif; ?> </h4 ></div>
		                    <div class="col"><span>Account :</span><h4  class=" ml-2 ">
		                          <?php if(!empty($owner->user->email)): ?>
		                          <?php echo e($owner->user->email); ?> 
		                          <?php else: ?> 
		                          Unknown 
		                          <?php endif; ?> 
		                    </h4 ></div>

		                    <div class="col">
		                    	<a href="<?php echo e(route('owners.edit',$owner->id)); ?>" class="btn btn-primary">Edit Profile</a>
		                    </div>
		                    
		                  </div>
		                </div>
        		</div>
        	</div>
          
        </div>	
      </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/teach_prj/clinic/resources/views/owner/detail1.blade.php ENDPATH**/ ?>
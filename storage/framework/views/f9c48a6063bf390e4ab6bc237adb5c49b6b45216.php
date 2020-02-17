<?php $__env->startSection('content'); ?>
	
  <div class="container">
                  	
                  	<form method="post" action="<?php echo e(route('patient.update',$patient->id)); ?>" enctype="multipart/form-data">
                  		<?php echo csrf_field(); ?>
                      <?php echo method_field('PUT'); ?>

                  		<div class="form-group">
                  			<label for="name">Name</label>
                  			<input type="text" class="form-control" id="name" name="name" value="<?php echo e($patient->name); ?>">
                  		</div>
                  		<div class="form-group">
                  			<label for="fathername">FatherName</label>
                  			<input type="text" class="form-control" id="fathername" name="fathername" value="<?php echo e($patient->fatherName); ?>">
                  		</div>
                  		<div class="form-group">
	                  		<div class="row">
	                  			<div class="col-6">
	                  				<label for="age">Age</label>
	                  				<input type="text" class="form-control" id="age" name="age" value="<?php echo e($patient->age); ?>">
	                  			</div>
	                  			<div class="col-6 my-4" >
	                  				<div class="form-check">
	                  					<input class="form-check-input" type="radio" name="child" id="year"  value="0"  <?php echo e(($patient->child=="0")? "checked" : ""); ?>>
	                  					<label class="form-check-label" for="year">
	                  						Years
	                  					</label>
	                  				</div>
	                  				<div class="form-check">
	                  					<input class="form-check-input" type="radio" name="child" id="month" value="1"  <?php echo e(($patient->child=="1")? "checked" : ""); ?>>
	                  					<label class="form-check-label" for="month">
	                  						months
	                  					</label>
	                  				</div>
	                  			</div>
	                  		</div>
	                  			
                  		</div>

                  		<div class="form-group">
                  			<label>Gender</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="male"  value="male" name="gender" <?php echo e(($patient->gender=="male")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="male">Male</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="female" value="female" name="gender" <?php echo e(($patient->gender=="female")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="female">Female</label>
                  			</div>
                  		</div>
                  		<div class="form-group">
                  			<label for="phoneno">Phoneno</label>
                  			<input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo e($patient->phoneno); ?>">
                  		</div>

                  		<div class="form-group">
                  			<label for="address">Address</label>
                  			<textarea class="form-control" id="address" rows="3" name="address"><?php echo e($patient->address); ?></textarea>
                  		</div>

                  		<div class="form-group">
                  			<label>married_status</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="yes" value="1" name="married" <?php echo e(($patient->married_status=="1")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="yes">Yes</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="no" value="0" name="married" <?php echo e(($patient->married_status=="0")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="mo" >No</label>
                  			</div>
                  		</div>

                  		<div class="form-group">
                  			<label>pregnant</label></br>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="yes" value="1" name="pregnant" <?php echo e(($patient->pregnant=="1")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="yes">Yes</label>
                  			</div>
                  			<div class="form-check form-check-inline">
                  				<input class="form-check-input" type="radio" id="no" value="0" name="pregnant" <?php echo e(($patient->pregnant=="0")? "checked" : ""); ?>>
                  				<label class="form-check-label" for="mo">No</label>
                  			</div>
                  		</div>

                  		<div class="form-group">
                  			<label for="weight">body weight</label>
                  			<input type="text" class="form-control" id="weight" name="weight" value="<?php echo e($patient->body_weight); ?>">
                  		</div>
                  		<div class="form-group">
                  			<label for="allergy">allergy</label>
                  			<input type="text" class="form-control" id="allergy" name="allergy" value="<?php echo e($patient->allergy); ?>">
                  		</div>

                  		<div class="form-group">
                  			<label for="job">Job</label>
                  			<input type="text" class="form-control" id="job" name="job" value="<?php echo e($patient->job); ?>">
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
                        
                          <input type="hidden" name="oldimg" value="<?php echo e($patient->file); ?>">
                       <?php $__currentLoopData = json_decode($patient->file); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <img src="<?php echo e(asset($photo)); ?>" width="100px" height="100px">

                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

                        
                          
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          <label for="file">File</label>
                        <input type="file" class="form-control" id="file" name="file[]" multiple="multiple">
                        </div>
                        
                      </div> 

                  			
                  		</div>
                  		<input type="submit" class="btn btn-primary" value="submit">
                  	</form>
 </div>
                  
              
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/patients/edit.blade.php ENDPATH**/ ?>
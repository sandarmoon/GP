<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">


		<div class="card col-md-6 col-lg-6 bg-secondary ">

			<div class="panel panel-default">
				<div class="panel-heading">  <h2>Patient Detail</h2></div>
				<div class="panel-body">

					<div class="box box-info">

						<div class="box-body">
							
							<div class="col-sm-6">
								<h2 style="color:#00b1b1;"><?php echo e($patient->name); ?> </h2></span>            
							</div>
							<div class="clearfix"></div>
							<hr style="margin:5px 0 5px 0;">

							<div class="row-fluid">
        
        
								<div class="span8">
									<h4><b>FatherName:</b> <?php echo e($patient->fatherName); ?></h4>
									<h4><b>Age:</b> <?php echo e($patient->age); ?>

									<?php 
									if($patient->child==0){
									echo "year";
									}else{
									echo"month";
									}
									?>
									</h4>
									<h4><b>Gender: </b><?php echo e($patient->gender); ?></h4>
									<h4><b>phoneno: </b><?php echo e($patient->phoneno); ?></h4>
									<h4><b>Address: </b><?php echo e($patient->address); ?></h4>

									<h4><b>Married:</b> 
									<?php 
									if($patient->married_status==0){
									echo "no";
									}else{
									echo"yes";
									}
									?>
									</h4>

									<h4><b>Pregnant:</b> 
									<?php 
									if($patient->pregnant==0){
									echo "no";
									}else{
									echo"yes";
									}
									?>
									</h4>
									
								</div>

								<div class="span2">
									<?php $__currentLoopData = json_decode($patient->file); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									 <a target="_blank" href="<?php echo e(asset($photo)); ?>">
                         			<img src="<?php echo e(asset($photo)); ?>" width="100px" height="100px">
                         			</a>

                       				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
							 
						</div>
						<!-- /.box -->

					</div>


				</div> 
			</div>
		</div>  

		<div class="card col-md-6 col-lg-6 bg-secondary"></div>

	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/GP/resources/views/patients/show.blade.php ENDPATH**/ ?>
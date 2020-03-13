<?php $__env->startSection('content'); ?>
 <?php
  $uri=$_SERVER['REQUEST_URI'];
  $uriarray=explode('/',$uri);
  $patientid=$uriarray[2];

 ?>
<div class="row">
   <div class="col-12" style="margin-top: 130px;">
    <nav class="mx-5 my-3">
      <div class="nav nav-tabs my-3"  id="nav-tab" role="tablist">
        <a class="nav-item nav-link text-info active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ptient History</a>
        <a class="nav-item nav-link text-info" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Treatment History</a>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
		<div class="tab-pane fade show mx-3 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

			<div class="card ml-4">
				<div class="card-header">
					<h2 class="text-center text-dark"><?php echo e($patient->name); ?> </h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
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
			    			

			    		</div>
						</div>

						<div class="col-6">
							<div class="span2">
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
			    			<?php $__currentLoopData = json_decode($patient->file); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    			<a target="_blank" href="<?php echo e(asset($photo)); ?>">
			    				<img src="<?php echo e(asset($photo)); ?>" width="100px" height="100px">
			    			</a>

			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    			
			    		</div>
			    		

							
						</div>
					</div>


					<?php
			    		$dlength=count($doctors);
			    		?>
			    		<?php if($dlength>1): ?>
			    		<button class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal" data-target="#staticBackdrop">incharge</button>
			    		<?php else: ?>
			    		<form method="post" action="<?php echo e(route('incharge')); ?>" class="d-inline-block">
			    			<?php echo csrf_field(); ?>
			    			<input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
			    			<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">incharge</button>
			    		</form>
			    		<?php endif; ?>

				</div>
			</div> 



		</div>



    	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    		<div class="accordion" id="accordionExample">

          <?php $i=1; ?>
          <?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="card my-3 ml-5">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($i); ?>" aria-expanded="true" aria-controls="collapseOne">
                  <?php echo e($treatment->created_at); ?>

                </button>
              </h2>
            </div>

            <div id="collapse<?php echo e($i); ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
               <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <p class="card-text"><strong>Complaint:  </strong><?php echo e($treatment->complaint); ?> </p>
                  <p class="card-text"><strong>SPO2:</strong><?php echo e($treatment->spo2); ?> </p>
                  <p class="card-text"><strong>PR:  </strong><?php echo e($treatment->pr); ?> </p>
                  <p class="card-text"><strong>Temperature:</strong><?php echo e($treatment->temperature); ?> </p>
                  <p class="card-text"><strong>Blood pressure:</strong><?php echo e($treatment->bp); ?> </p>
                  <p class="card-text"><strong>RB2:</strong><?php echo e($treatment->rbs); ?> </p>
                  <p class="card-text"><strong>Diagnosis:</strong><?php echo e($treatment->diagnosis); ?>}} </p>
                  <p class="card-text"><strong>Body Weight:</strong><?php echo e($treatment->body_weight); ?>}} </p>
                  <p class="card-text"><strong>Next Visit Date:</strong><?php echo e($treatment->next_visit_date); ?>}} </p>
                  <p class="card-text"><strong>relevant_info:</strong><?php echo e($treatment->relevant_info); ?>}} </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="row my-5">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Treatment and Drug</h3>
                        <table class="table text-center table-bordered table-dark">
                          <thead class="">
                            <th>drug name</th>
                            <th>tab</th>
                            <th>Interval</th>
                            <th>Meal</th>
                            <th>Duration</th>
                          </thead>
                          <tbody>
                            <?php
                            $alltreaments=$treatment->medicines;

                            
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $alldrugs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($alldrugs->pivot->type==null): ?>
                            <tr>
                              <td><?php echo e($alldrugs->name); ?></td>
                              <td><?php echo e($alldrugs->pivot->tab); ?></td>
                              <td><?php echo e($alldrugs->pivot->interval); ?></td>
                              <td><?php echo e($alldrugs->pivot->meal); ?></td>
                              <td><?php echo e($alldrugs->pivot->during); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-12">
                      <div class="table-responsive">
                        <h3 class="">Injection/Prodecure</h3>
                        <table class="table text-center table-bordered table-dark w-50">
                          <thead class="">
                            <th>injection</th>
                            <th>injection type</th>
                          </thead>
                          <tbody>
                            <?php
                            $alltreaments=$treatment->medicines;
                            ?>
                            <!-- <?php echo e($alltreaments); ?> -->
                            <?php $__currentLoopData = $alltreaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $allinjections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($allinjections->pivot->type): ?>
                            <tr>
                              <td><?php echo e($allinjections->name); ?></td>
                              <td><?php echo e($allinjections->pivot->type); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</div>

    	</div>
    </div>

</div>
</div>



<div class="modal fade indoctor" id="staticBackdrop"data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
       			 </button>
			<form method="post" action="<?php echo e(route('incharge')); ?>" class="d-inline-block">
					<?php echo csrf_field(); ?>
					<input type="hidden" name="patient_id" value="<?php echo e($patient->id); ?>">
					<div class="form-group">
						<label for="doctor" style="margin-left: 100px">Please choose doctor</label><br>
						<select name="doctor"  id="doctor" class="form-control" style="margin-left: 100px">
							<?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row->id); ?>"><?php echo e($row->user->name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary incharge" style="margin-left: 200px;"data-toggle="modal">save</button>
				</form>
					
			</div>
			
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontendTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GP\resources\views/patients/show.blade.php ENDPATH**/ ?>



<?php $__env->startSection('css'); ?>

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="block-header">
		<h2>
			Menu
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Attribuer menu


					</h2>
				</div>
				<div class="body">

					<form class="form-horizontal" method="post" action="<?php echo e(route('MenuAttr')); ?>" >
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

						<div class="form-group">
							<div class="col-sm-6">
								<label for="inp-type-1" style="vertical-align:middle; margin-top: 1%;" class="col-sm-6  ">Rôle : </label>
								<div class="col-sm-6">
									<input type="hidden" name="role" value="<?php echo e($role->idRole); ?>" />
									<input type="text" class="form-control" id="inp-type-1" value="<?php echo e($role->libelle); ?>"  name="libelle">
								</div>
							</div>			
						</div>

						<div class="form-group">
							<div class="col-sm-12">
								<label for="inp-type-1" style="vertical-align:middle; margin-top: 1%;" class="col-sm-12  ">Attribuer un menu : </label>

								<?php $__currentLoopData = $allmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<div class="col-sm-6">

									<div class="col-sm-12"> 
										
										<?php if(count($auto_menu) != 0): ?>
										<?php if(in_array(strval($menu->idMenu), $auto_menu)): ?>
										<center>
											<input  type="checkbox" id="men<?php echo e($menu->idMenu); ?>" name="menu[]" value="<?php echo e($menu->idMenu); ?>" style="height: 25px; width: 25px;background-color: #0000ff;" checked>
											<label for="men<?php echo e($menu->idMenu); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  "><?php echo e($menu->libelleMenu); ?> </label>
										</center>
										<?php else: ?>
										<center>
											<input type="checkbox" id="men<?php echo e($menu->idMenu); ?>" name="menu[]" value="<?php echo e($menu->idMenu); ?>" style="height: 25px; width: 25px;background-color: #0000ff;">
											<label for="men<?php echo e($menu->idMenu); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  "><?php echo e($menu->libelleMenu); ?> </label>
										</center>
										<?php endif; ?>
										<?php else: ?>
										<center>
											<input  type="checkbox" id="men<?php echo e($menu->idMenu); ?>" name="menu[]" value="<?php echo e($menu->idMenu); ?>" style="height: 25px; width: 25px;background-color: #0000ff;">
											<label for="men<?php echo e($menu->idMenu); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12  "><?php echo e($menu->libelleMenu); ?> </label>
										</center>
										<?php endif; ?>

									</div>
									<div class="col-sm-10">

										<?php $allaction_this = App\Providers\InterfaceServiceProvider::actionMenu($menu->idMenu);
										?>

										<?php $__currentLoopData = $allaction_this; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-sm-12">
											<div class="col-sm-12">
												<?php if(count($auto_action) != 0): ?> 
												<?php
												$array = array();
												foreach($auto_action as $all){
													if($all->Menu == $menu->idMenu)
														array_push($array, $all->ActionMenu);
												}
												?>
												<?php if(in_array(strval($action->id), $array)): ?>
												<center><input 
													type="checkbox" id="act<?php echo e($action->id); ?>" 
													name="action[]" value="<?php echo e($action->id); ?>" style="height: 25px; width: 25px;background-color: #0000ff;" checked>
													<label for="act<?php echo e($action->id); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12"><?php echo e($action->action); ?> </label>
												</center>
													<?php else: ?>
													<center>
														<input type="checkbox" id="act<?php echo e($action->id); ?>" name="action[]" value="<?php echo e($action->id); ?>" style="height: 25px; width: 25px;background-color: #0000ff;">
														<label for="act<?php echo e($action->id); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12"><?php echo e($action->action); ?> </label>
													</center>
													<?php endif; ?>
													<?php else: ?>
													<center>
														<input type="checkbox" id="act<?php echo e($action->id); ?>" name="action[]" value="<?php echo e($action->id); ?>" style="height: 25px; width: 25px;background-color: #0000ff;">
														<label for="act<?php echo e($action->id); ?>" style="vertical-align:middle; margin-top: 1%; font-size: 18px" class="col-sm-12"><?php echo e($action->action); ?> </label>
													</center>
													<?php endif; ?>

											</div>
										</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								</div>

							</div>			
						</div>

						<div class="form-group " style="display: block;" >
							<div class="col-sm-12">
								<button type="submit" data-color="deep-orange" class=" btn-sm bg-deep-orange waves-effect waves-light" style="float:right; margin-top: -60px; margin-left: 15px; width: 25%;">Attribuer
								</button>
							</div>
						</div>
					</form>	

				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/role/menu.blade.php ENDPATH**/ ?>
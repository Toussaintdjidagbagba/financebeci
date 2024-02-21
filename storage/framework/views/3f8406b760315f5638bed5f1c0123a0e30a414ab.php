
<?php $__env->startSection('css'); ?>

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="block-header">
		<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
						Modifier un menu de <?php echo e(config('app.name')); ?> 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="<?php echo e(route('SML')); ?>" >
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
							<input type="hidden" name="id" value="<?php echo e($info->idMenu); ?>">
							
							<div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="libelle">Libellé menu</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="libelle" name="lib" value="<?php echo e($info->libelleMenu); ?>" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="titre">Titre page</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="titre" name="titre"  value="<?php echo e($info->titre_page); ?>" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="routes">Route</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="routes" name="rout" value="<?php echo e($info->route); ?>" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="icone">Icon</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="icone" name="icon" value="<?php echo e($info->iconee); ?>" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="pose">Position</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="pose" name="pos" value="<?php echo e($info->num_ordre); ?>" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="menn">Menu parent</label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="menn" name="parent" class="form-control show-tick" placeholder="">
                                	<option value="<?php echo e($info->Topmenu_id); ?>"><?php echo e(App\Providers\InterfaceServiceProvider::libmenu($info->Topmenu_id)); ?></option>
                                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $par): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($par->Topmenu_id == 0): ?>
                                                <option value="<?php echo e($par->idMenu); ?>"><?php echo e($par->libelleMenu); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
							

							<div class="form-group" style="display: block;" >
								<div class="col-sm-12">
									<button type="submit" class="btn bg-deep-orange waves-effect" style="float:right; margin-top: 20px; margin-left: 15px; width: 25%;">Mettre à jour
									</button>
								</div>
							</div>
						</form>	
					</div>

				</div>
			</div>
		</div>
		
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/menu/modifmenu.blade.php ENDPATH**/ ?>
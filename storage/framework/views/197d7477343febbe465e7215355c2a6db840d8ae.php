
<?php $__env->startSection('css'); ?>

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="block-header">
		<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<h2>£
		Utilisateurs
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier un utilisateur de <?php echo e(config('app.name')); ?> 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="<?php echo e(route('MTUS')); ?>" >
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
							
							<div class="row clearfix">
								<div class="col-sm-6">
									<label for="identifiant">Identifiant</label>
									<input type="hidden" name="id" value="<?php echo e($info->idUser); ?>" />
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="identifiant" name="login" class="form-control" value="<?php echo e($info->login); ?>"required>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<label for="nom">Nom </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="nom" class="form-control" value="<?php echo e($info->nom); ?>" name="nom" >
										</div>
									</div>			
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-md-6">
									<label for="prenom">Prénom</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo e($info->prenom); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label for="sexe">Sexe</label>
									<div class="form-group">
										<div class="form-line">
											<select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
												<option value="<?php echo e($info->sexe); ?>"><?php echo e(App\Providers\InterfaceServiceProvider::sexe($info->sexe)); ?></option>
												<?php if( $info->sexe == 'M'): ?>
												<option value="F">Féminin</option>
												<?php else: ?>
												<option value="M">Masculin</option>
												<?php endif; ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-md-6">
									<label for="tel">Téléphone</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="tel" name="tel" class="form-control" value="<?php echo e($info->tel); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label for="adr">Adresse</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="adr" name="adress" class="form-control" value="<?php echo e($info->adresse); ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-md-6">
									<label for="email">Email</label>
									<div class="form-group">
										<div class="form-line">
											<input type="email" id="email" name="mail" class="form-control" value="<?php echo e($info->mail); ?>">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<label for="autr">Autres</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="autr" name="autres" class="form-control" value="<?php echo e($info->other); ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-md-12">
									<label for="role">Rôle</label>
									<div class="form-group">
										<div class="form-line">
											<select type="text" id="role" name="role" class="form-control show-tick" placeholder="">
												<option value="<?php echo e($info->Role); ?>"><?php echo e(App\Providers\InterfaceServiceProvider::LibelleRole($info->Role)); ?></option>
												<?php $__currentLoopData = $allRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($role->idRole != $info->Role): ?>
												<option value="<?php echo e($role->idRole); ?>"><?php echo e($role->libelle); ?></option>
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/modifusers.blade.php ENDPATH**/ ?>
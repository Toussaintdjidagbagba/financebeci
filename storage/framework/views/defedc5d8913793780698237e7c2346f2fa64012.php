
<?php $__env->startSection('css'); ?>

<!-- Bootstrap Select Css -->
<link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="block-header">
		<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<h2>
			Entreprises
			<small></small>
		</h2>
	</div>
	<div class="row clearfix">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Modifier un entreprise 
					</h2>
				</div>
				<div class="body">
					<div class="row">
						
						<form style="padding : 20px" method="post" action="<?php echo e(route('SSL')); ?>" >
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
							<input type="hidden" name="id" value="<?php echo e($info->id); ?>" />
							<div class="row clearfix">

								<div class="col-sm-6">
									<label for="libelle">Libelle : </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="libelle" class="form-control" value="<?php echo e($info->libelle); ?>" name="libelle" >
										</div>
									</div>			
								</div>
								<div class="col-sm-6">
									<label for="imma">Immatriculation : </label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="imma" class="form-control" value="<?php echo e($info->imma); ?>" name="imma" >
										</div>
									</div>			
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-md-6">
			                        <label for="struc">Structure : </label> 
			                       <div class="form-group">
			                        <div class="form-line">
			                            <select type="text" id="struc" name="struc" onchange="seedirection()" class="form-control" placeholder="">
			                                <option>DIRECTION</option>
			                                <option>SERVICE</option>
			                            </select>
			                        </div>
			                       </div>
			                    </div>
			                    <div class="col-md-6">
			                        <label for="chef">Chef : </label> 
			                       <div class="form-group">
			                        <div class="form-line">
			                            <select type="text" id="chef" name="chef" class="form-control" placeholder="">
			                                <?php 
			                                    $users = App\Providers\InterfaceServiceProvider::allutilisateurspersonnel();
			                                ?> 
			                                <option value="<?php echo e($info->chef); ?>"><?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($info->chef)); ?></option>
			                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                                    <option value="<?php echo e($user->idUser); ?>"><?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></option>
			                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                            </select>
			                        </div>
			                       </div>
			                    </div>
			                </div>
			                <div class="row clearfix" id="controledirect" style="display: none;">
		                        <div class="col-md-6">
		                            <label for="direct">Hieararchie direction : </label> 
		                           <div class="form-group">
		                            <div class="form-line">
		                                <select type="text" id="direct" name="direct" class="form-control" placeholder="">
		                                    <?php 
		                                        $structure = App\Providers\InterfaceServiceProvider::alldirections();
		                                    ?> 
		                                    <?php $__currentLoopData = $structure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $structurehierarchie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                                        <option value="<?php echo e($structurehierarchie->id); ?>"><?php echo e($structurehierarchie->libelle); ?></option>
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
<script type="text/javascript">
        function seedirection() {
            structure = document.getElementById("struc").value;

            if(structure == "SERVICE")
            {
                document.getElementById('controledirect').style.display = "block";
            }else{
                document.getElementById('controledirect').style.display = "none";
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/service/modifservice.blade.php ENDPATH**/ ?>
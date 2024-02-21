

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Utilisateurs
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des utilisateurs
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>Identifiant</th>
										<th data-priority="1">Nom</th>
										<th data-priority="3">Prénom(s)</th>
										<th data-priority="1">Téléphone</th>
										<th data-priority="3">Profession</th>
                                        <th data-priority="3">Service</th>
										<th data-priority="3">Rôle</th> 
										<th data-priority="6">Actions</th>
									</tr>
									</thead>
									<tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th><span class="co-name"><?php echo e($user->login); ?></span></th>
                                            <td><?php echo e($user->nom); ?></td>
                                            <td><?php echo e($user->prenom); ?></td>
                                            <td><?php echo e($user->tel); ?></td>
                                            <td><?php echo e($user->other); ?></td>
                                            <td><?php echo e(App\Providers\InterfaceServiceProvider::LibelleService($user->Service)); ?></td>
                                            <td><?php echo e(App\Providers\InterfaceServiceProvider::LibelleRole($user->Role)); ?></td>
                                            <td>
                                            <?php if(in_array("update_user", session("auto_action"))): ?>
                                            <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                <a href="<?php echo e(url('modif-utilisateur-')); ?><?php echo e($user->idUser); ?>" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                
                                            </button>
                                            <?php endif; ?>

                                            <?php if(in_array("delete_user", session("auto_action"))): ?>
                                            <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('delete-utilisateur-')); ?><?php echo e($user->idUser); ?>" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                            <?php endif; ?>

                                            <?php if(in_array("reset_user", session("auto_action"))): ?>
                                            <button type="button" title="Réinitialiser"  class="btn btn-warning btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('reinitialiser-utilisateur-')); ?><?php echo e($user->idUser); ?>" style="color:white;"> <i class="material-icons">restore</i></a></button>
                                            <?php endif; ?>

                                            <?php if(in_array("status_user", session("auto_action"))): ?>
                                                <?php if($user->statut == "0"): ?>
                                                <button type="button" title="Désactivé ?"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href=" <?php echo e(url('desactivé-utilisateur-')); ?><?php echo e($user->idUser); ?>" style="color:white;"> <i class="material-icons">toggle_on</i></a></button>
                                                <?php endif; ?>
                                                <?php if($user->statut == "1"): ?>
                                                <button type="button" title="Activé ?"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" style="background-color:grey"><a href="<?php echo e(url('activé-utilisateur-')); ?><?php echo e($user->idUser); ?>" style="color:white;"> <i class="material-icons">toggle_off</i></a></button>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(in_array("status_user", session("auto_action"))): ?>
                                                <?php if($user->activereceiveincident == 0): ?>
                                                <button type="button" title="Voulez-vous désactivé l'utilisateur à recevoir les mails d'incident ?"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href=" <?php echo e(route('DSUM', $user->idUser)); ?>" style="color:white;"> <i class="material-icons">contact_mail</i></a></button>
                                                <?php endif; ?>
                                                <?php if($user->activereceiveincident == 1): ?>
                                                <button type="button" title="Voulez-vous activé l'utilisateur à recevoir les mails d'incident ?"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" style="background-color:grey"><a href="<?php echo e(route('ATUM', $user->idUser)); ?>" style="color:white;"> <i class="material-icons">mail_outline</i></a></button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7"><center>Pas d'utilisateur enregistrer!!!</center> </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
								</table>
                                <?php echo e($list->links()); ?>

							</div> 
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Enregistrer un utilisateur : </h4>
			</div>
            <form method="post" action="<?php echo e(route('setuser')); ?>">
			<div class="modal-body">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="identifiant">Identifiant</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="identifiant" name="login" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="email">Email</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="email" id="email" name="mail" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="nom">Nom</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nom" name="nom" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="prenom">Prénom</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="tel">Téléphone</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tel" name="tel" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="adr">Adresse</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="adr" name="adress" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="sexe">Sexe</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                    	<option value="F">Féminin</option>
										<option value="M">Masculin</option>	
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="role">Rôle</label>
                           <div class="form-group">
                            <div class="form-line">
                                <?php
                                    $roles = App\Providers\InterfaceServiceProvider::AllRole();
                                ?>
                                <select type="text" id="role" name="role" class="form-control show-tick" placeholder="">
                                	<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->idRole); ?>"><?php echo e($role->libelle); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="autres">Profession</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="autres" name="autres" class="form-control" placeholder="">
                                    	
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <label for="autres">Service</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <?php
                                        $services = App\Providers\InterfaceServiceProvider::AllService();
                                    ?>
                                    <select type="text" id="autres" name="serv" class="form-control" placeholder="">
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->libelle); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
				<button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
			</div>
            </form>
		</div>
	</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/dash_utilisateur.blade.php ENDPATH**/ ?>


<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    R么les
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Listes des r么les
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>Code</th>
										<th data-priority="1">Libelle</th>
										<th data-priority="3">Action Utilisateur</th>
										<th data-priority="6">Actions</th>
									</tr>
									</thead>
									<tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th><span class="co-name"><?php echo e($role->code); ?></span></th>
                                            <td><?php echo e($role->libelle); ?></td>
                                            <td><?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($role->user_action)); ?></td>
                                            

                                            <td>
                                            <?php if(in_array("update_role", session("auto_action"))): ?>
                                            <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                <a href="<?php echo e(url('modif-roles-')); ?><?php echo e($role->idRole); ?>" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                
                                            </button>
                                            <?php endif; ?>

                                            <?php if(in_array("delete_role", session("auto_action"))): ?>
                                            <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('delete-roles-')); ?><?php echo e($role->idRole); ?>" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                            <?php endif; ?>

                                            <?php if(in_array("menu_role", session("auto_action"))): ?>
                                            <button type="button" title="Menu"  class="btn btn-warning btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('menu-roles-')); ?><?php echo e($role->idRole); ?>" style="color:white;"> <i class="material-icons green-color">menu_book</i></a></button>
                                            <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7"><center>Pas de rôle enregistrer!!!</center> </td>
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
				<h4 class="modal-title" id="myModalLabel">Enregistrer un r么le : </h4>
			</div>
            <form method="post" action="<?php echo e(route('AR')); ?>">
			<div class="modal-body">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                             	<label for="code">Code</label>
                                <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="code" name="code" class="form-control" placeholder="" required>
                                </div>
                                </div>
                        </div>

                        <div class="col-md-6">
                        	<label for="lib">Libelle</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/role/listrole.blade.php ENDPATH**/ ?>
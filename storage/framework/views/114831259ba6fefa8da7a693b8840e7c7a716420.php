

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                Liste des Services/Directions
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Libelle</th>
                                        <th data-priority="1">Immatriculation</th>
                                        <th data-priority="1">Chef directeur</th>
                                        <th data-priority="1">Structure</th>
                                        <th data-priority="1">Hierarchie Direction</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <?php echo e($serv->libelle); ?>

                                            </td>
                                            <td>
                                                <?php echo e($serv->imma); ?>

                                            </td>
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($serv->chef)); ?>

                                            </td>
                                            <td>
                                                <?php echo e($serv->structure); ?>

                                            </td>
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::LibService($serv->hierarchiedirection)); ?>

                                            </td>
                                            <td>
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(route('MSC', $serv->id)); ?>" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(route('DS', $serv->id)); ?>" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3"><center>Pas d'entreprise enregistrer!!!</center> </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrer une Service / Direction : </h4>
            </div>
            <form method="post" action="<?php echo e(route('AS')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Libelle : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="imma">Immatriculation :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="imma" name="imma" class="form-control" placeholder="">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">AJOUTER</button>
            </div>
            </form>
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Documents\DSAF TECHNOLOGIE\DJIDAGBAGBA\Finance\financebeci\resources\views/viewadmindste/service/listservice.blade.php ENDPATH**/ ?>
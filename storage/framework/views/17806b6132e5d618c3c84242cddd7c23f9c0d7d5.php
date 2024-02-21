

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Reception de facture
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des factures receptionnées
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Numéro</th>
                                        <th data-priority="1">Objet</th>
                                        <th data-priority="1">Facture</th>
                                        <th data-priority="1">Montant HT</th>
                                        <th data-priority="1">Ligne budgétaire</th>
                                        <th data-priority="1">Date d'échéance</th>
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
                                            <td colspan="10"><center>Pas de facture receptionnée enregistrer!!!</center> </td>
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

        <script type="text/javascript">
           
        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer une facture : </h4>
            </div>
            <form method="post" action="<?php echo e(route('AS')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Numéro : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                      
                        
                    </div>
                    <div class="row clearfix">
                            
                        <div class="col-md-6">
                            <label for="lib">Objet : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lib">Montant HT : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div> 
                    </div>
                    
                    <div class="row clearfix">
                            <div class="col-md-6">
                                    <label for="sexe">Ligne budgetaire</label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">ACO</option>
                                            <option value="M">ADM</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                    <label for="sexe">Sous-compte</label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">Fonctionnement</option>
                                            <option value="M">Social</option>
                                            <option value="M">Investissement</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-6">
                                    <label for="sexe">Projet</label>
                                    <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="sexe" name="sexe" class="form-control show-tick" placeholder="">
                                            <option value="F">Projet 1</option>
                                            <option value="M">Projet 2</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <label for="imma">Facture :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        
                    </div>

                    <div class="row clearfix">
                              <div class="col-md-6">
                            <label for="imma">Date d'entrée :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="imma">Date d'échéance :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="imma" name="imma" class="form-control" placeholder="">
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/receptionfacture.blade.php ENDPATH**/ ?>
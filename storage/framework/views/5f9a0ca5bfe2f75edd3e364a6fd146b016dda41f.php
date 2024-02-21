

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Budget
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des budgets
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Numéro</th>
                                        <th data-priority="1">Date</th>
                                        <th data-priority="1">Libellé</th>
                                        <th data-priority="1">Montant prévisonnel</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <th data-priority="1">1</th>
                                        <th data-priority="1">10-10-2023</th>
                                        <th data-priority="1">Projet 2</th>
                                        <th data-priority="1">5 000 000</th>
                                            <td>
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="#" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="#" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                                <?php endif; ?>

                                            </td>
                                        
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
                <h4 class="modal-title" id="myModalLabel">Créer un budget : </h4>
            </div>
            <form method="post" action="<?php echo e(route('AS')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="imma">Date :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="imma" name="imma" class="form-control" placeholder="">
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
                                            <option value="F">ADC</option>
                                            <option value="M">ACM</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <label for="lib">Montant prévisionnel : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/etatgeneral.blade.php ENDPATH**/ ?>


<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Création de fiche projet
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des projets
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Titre projet</th>
                                        <th data-priority="1">Numero contrat</th>
                                        <th data-priority="1">Objet</th>
                                        <th data-priority="1">Titulaire</th>
                                        <th data-priority="1">Libellé 3</th>
                                        <th data-priority="1">Libellé 4</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Projet 1</td>
                                            <td>000147</td>
                                            <td>lorem stup jfb dndhd</td>
                                            <td>BECI</td>
                                            <td>tpu hdta  a</td>
                                            <td>ta da do j</td>
                                            <td>
                                                <button type="button" title="Détail"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(route('GDP')); ?>" style="color:white;"> <i class="material-icons">apps</i></a> 
                                                </button>
                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                </button>
                                                
                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                                
                                            </td>
                                        </tr>
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
                <h4 class="modal-title" id="myModalLabel">Créer un projet : </h4>
            </div>
            <form method="post" action="<?php echo e(route('AS')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                          <div class="col-md-6">
                            <label for="lib">Titre du projet : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lib">Numéro du contrat : </label>
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
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lib">Titulaire : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                              <div class="col-md-6">
                            <label for="imma">Libellé 3 :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                            <div class="col-md-6">
                            <label for="imma">Libellé 4 :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="imma" name="imma" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                
                        <div class="col-md-6">
                            <label for="imma">Choisir un fichier :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="imma" name="imma" class="form-control" placeholder="">
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/projet.blade.php ENDPATH**/ ?>
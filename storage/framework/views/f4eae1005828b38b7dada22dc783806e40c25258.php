

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style type="text/css">
        
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Suivi de projet
                    <small></small>
                </h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <div style="text-align : center;"> <?php echo e($info->titre); ?> </div>
                            
                            <nav class="user-info">
                                <div class="image">
                                    <img src="public/images/user.png" class="circle" width="90" height="90" alt="User" />
                                    <img src="public/images/user.png" style="float: right;" class="circle text-right" width="90" height="90" alt="User" />
                                    <div style="text-align: center; float: center;" class="text">
                                        <?php echo e($info->objet); ?>

                                    </div>
                                </div>
                                <div class="info">
                                    <div class="name">Client</div>
                                    <div class="email">client@example.com</div>
                                </div>
                            </nav>

                                                        

                            <div class="extra-info pull-right m-t--45">
                                <div class="text">
                                    <div class="text-right"> 
                                        Chef projet
                                    </div>
                                    <span> actor@example.com </span> 
                                </div>
                            </div>                        
                        </div>                    
                        <div class="body">
                            
                            <span>  Compte :  xxx.xxx.xxx CFA </span><br>
                            <span>  Dépense : xxx.xxx.xxx CFA </span>
                           
                            <span class="pull-right">
                                <a class="btn bg-light-blue waves-effect" role="button" data-toggle="collapse" href="#bplan" aria-expanded="false"
                                    aria-controls="bplan">
                                        Plan de trésorerie
                                </a>
                                <button class="btn waves-effect" type="button" data-toggle="collapse" data-target="#execution" aria-expanded="false"
                                        aria-controls="execution">
                                    Créance
                                </button>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#aperçu" data-toggle="tab">Situation projet</a></li>
                                <li role="presentation"><a href="#devis" data-toggle="tab">Devis</a></li>
                                <li role="presentation"><a href="#bplan" data-toggle="tab">Bussness plan</a></li>
                                <li role="presentation"><a href="#recap" data-toggle="tab">Récapitulatif</a></li>
                                <li role="presentation"><a href="#pdt" data-toggle="tab">Plan de trésorerie</a></li>
                                <li role="presentation"><a href="#execution" data-toggle="tab">Exécution</a></li>
                                <li role="presentation"><a href="#avenant" data-toggle="tab">Avenant</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="aperçu">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Evolution du projet
                                                </div>

                                                        <!--div class="font-bold">
                                                            <div class="pull-right m-r-10 m-t--15">
                                                                <select name="" id="" class="">
                                                                    <option value="" disabled="disabled" selected>Charges sociales</option>
                                                                    <option value="">Charges sociales 1</option>
                                                                    <option value="">Charges sociales 2</option>
                                                                    <option value="">Charges sociales 3</option>
                                                                    <option value="">Charges sociales 4</option>
                                                                </select>
                                                            </div>
                                                        </div-->
                                                        
                                                        


                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="devis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                
                                                    <div class="header">
                                                        <h2>
                                                    <div class="text-primary font-bold font-15">
                                                        Dévis
                                                    </div>
                                                    <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> add </i> </button>
                                                    </h2>
                                                    </div>

                                                <div class="body"> 
                                                <div class="table-responsive" data-pattern="priority-columns">
                                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th data-priority="1">#</th>
                                                            <th data-priority="1">Désignation</th>
                                                            <th data-priority="1">Unité</th>
                                                            <th data-priority="1">Quantité</th>
                                                            <th data-priority="1">Prix Unitaire</th>
                                                            <th data-priority="1">Montant</th>
                                                            <th data-priority="6">Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="listdevis">
                                                            <?php $__empty_1 = true; $__currentLoopData = $listdevis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <tr>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->id); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->designation); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->unite); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->quantite); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->unitaire); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->quantite * $serv->unitaire); ?></td>
                                                                <td style="vertical-align:middle; text-align: center;">
                                                                    <?php if(in_array("update_service", session("auto_action"))): ?>
                                                                    <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e($serv->designation); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                                         <i class="material-icons">system_update_alt</i> 
                                                                    </button>
                                                                    <?php endif; ?>

                                                                    <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                                    <button onclick="getdelete(<?php echo e($serv); ?>)"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                                    </button>
                                                                    <?php endif; ?>

                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <tr>
                                                                <td colspan="7"><center>Pas de ligne devis enregistrer!!!</center> </td>
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
                                <div role="tabpanel" class="tab-pane fade" id="bplan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Bussness plan
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="recap">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Récapitulatif
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="pdt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Plan de trésorerie
                                                </div>

                                                <div class="row clearfix">
                                                    <!-- Etat d'évolution du plan de trésorerie -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="">
                                                            <div class="body">
                                                                <div class="table-responsive" data-pattern="priority-columns">
                                                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th data-priority="1">Mois</th>
                                                                            <th data-priority="1">Solde début</th>
                                                                            <th data-priority="1">Janvier</th>
                                                                            <th data-priority="1">Février</th>
                                                                            <th data-priority="1">Mars</th>
                                                                            <th data-priority="1">Avril</th>
                                                                            <th data-priority="1">Mai</th>
                                                                            <th data-priority="1">Juin</th>
                                                                            <th data-priority="1">Juillet</th>
                                                                            <th data-priority="1">Août</th>
                                                                            <th data-priority="1">Septembre</th>
                                                                            <th data-priority="1">Octobre</th>
                                                                            <th data-priority="1">Novembre</th>
                                                                            <th data-priority="6">Décembre</th>
                                                                            <th data-priority="6">Total</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Total Encaissement</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Total Décaissement</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Différence</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th data-priority="1">Trésorerie nette</th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="1"></th>
                                                                            <th data-priority="6"></th>
                                                                            <th data-priority="6"></th>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div> 
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <!-- Encaissement -->
                                                <div class="row clearfix">
                                                    <div class="col-md-6">
                                                        <div class="text-primary font-bold font-15">
                                                            Encaissement
                                                        </div>
                                                        <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#"><i class="material-icons"> add </i> </button>
                                                        <div class="table-responsive" data-pattern="priority-columns">
                                                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th data-priority="1">#</th>
                                                                    <th data-priority="1">Désignation</th>
                                                                    <th data-priority="1">Montant</th>
                                                                    <th data-priority="1">Statut</th>
                                                                    <th data-priority="1">Actions</th> 
                                                                    <!-- Dans nous aurons : Visualiser, modifier et suppression 
                                                                        
                                                                    -->
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listpdtencaissement">
                                                                    <!-- -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                

                                                <!-- Décaissement -->
                                                    <div class="col-md-6">
                                                        <div class="text-primary font-bold font-15">
                                                            Décaissement
                                                        </div>
                                                        <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#"><i class="material-icons"> add </i> </button>

                                                        <div class="table-responsive" data-pattern="priority-columns">
                                                            <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                                                <thead>
                                                                <tr>
                                                                    <th data-priority="1">#</th>
                                                                    <th data-priority="1">Désignation</th>
                                                                    <th data-priority="1">Montant</th>
                                                                    <th data-priority="1">Statut</th>
                                                                    <th data-priority="1">Actions</th> 
                                                                    <!-- Dans nous aurons : Visualiser, modifier et suppression 
                                                                        NB : 
                                                                            - Décaissement est générer depuis business plan et sera disponible déjà dans la liste pour édition du pair mois et valeur
                                                                            - Prévoir Solde début comme mois dans la liste de mois
                                                                            - Avec la possibilité d'ajouter d'autre encaissemnt  
                                                                            - Le bouton suppression est disponible uniquement pour les ajouts manuel
                                                                    -->
                                                                </tr>
                                                                </thead>
                                                                <tbody id="listpdtdecaissement">
                                                                    <!-- -->
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                                        
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="execution">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-body m-l-25">
                                                <div class="text-primary font-bold font-15">
                                                    Exécution
                                                </div>

                                                        
                                                        
                                                        jhjhdfbnbnv
                                                        

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            function getlistdevis() {
                // Affichage des devis
            }
           
        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer un dévis : </h4>
            </div>
            <form method="post" action="<?php echo e(route('AS')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="lib">Désignation : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                            <label for="lib">Quantité : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="sexe">Unité</label>
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
                            <div class="col-md-6">
                                <label for="lib">Prix unitaire : </label>
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/projet/detailprojet.blade.php ENDPATH**/ ?>
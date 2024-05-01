

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                Budget Général
                             
                            <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> note_add </i> </button>
                            <button type="button" title="Importer" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#imp"><i class="material-icons"> cloud_upload </i> </button>
                            <button type="button" title="Importer budget antérieur" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#impant"><i class="material-icons"> book </i> </button>
                            <button type="button" title="Exporter"  style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#exp"><i class="material-icons">picture_as_pdf</i> </button>
                            </h2>
                        </div>
                        <div class="body"> 
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Année</th>
                                        <th data-priority="1">Mode</th>
                                        <th data-priority="1">Code</th>
                                        <th data-priority="1">Nature de dépense</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Réalisation</th>
                                        <th data-priority="1">Taux</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->periode); ?></td>
                                            <?php $lg = App\Providers\InterfaceServiceProvider::getlg($serv->nature) ?>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc)); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($lg->code); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($lg->description); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->montant, 0, '.', ' ')); ?></td> 
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->realisation, 0, '.', ' ')); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e((($serv->realisation / $serv->montant) * 100)); ?>%</td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getdetail(<?php echo e($serv); ?>, '<?php echo e($lg->description); ?>', '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#detail" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">visibility</i> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e($lg->description); ?>', '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->sc)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if( $serv->realisation == 0 && in_array("delete_service", session("auto_action"))): ?>
                                                <button onclick="getdelete(<?php echo e($serv); ?>, '<?php echo e($lg->description); ?>')" type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8"><center>Pas de budget enregistrer!!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrement d'une ligne budgétaire : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoadd"></label>
                    <input type="hidden" name="tableaumoismontant" id="tableaumoismontant">
                    <input type="hidden" name="sommetotal" id="sommetotal">
                    <div class="row clearfix">

                        <div class="col-md-4">
                            <label for="mbg">Mode ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="mbg" name="mbg" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label for="nbg">Nature de dépense ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="nbg" name="nbg" class="form-control" placeholder="">
                                        <?php 
                                            $lbg = App\Providers\InterfaceServiceProvider::alllignebudgetaire();
                                        ?> 
                                        <?php $__currentLoopData = $lbg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="aebdt">Année d'exercice budgétaire ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onkeyup="plageexercice()" onchange="plageexercice()" min="1900" max="2099" step="1" id="aebdt" name="aebdt" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="aedd">Année d'exercice <br> Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="aedd" name="aedd" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="aedf">Année d'exercice <br> Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="aedf" name="aedf" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="comptesys">Compte Syscohada : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="comptesys" name="comptesys" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <label for="commentaire">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire" name="commentaire" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <label for="monttotaux">Montant total : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" disabled id="monttotaux" name="monttotaux" class="form-control" placeholder="">
                            </div>
                            <label id="seemonttotaux"></label>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix" style="border: 2px solid antiquewhite;">
                        <div class="col-md-5">
                            <label for="montantbg">Montant ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" min="0" step="1" id="montantbg" name="montantbg" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="mois">Mois : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="mois" name="mois" class="form-control">
                                    <option value="0"> Sélectionner le mois </option>
                                    <option> Janvier </option>
                                    <option> Février </option>
                                    <option> Mars </option>
                                    <option> Avril </option>
                                    <option> Mai </option>
                                    <option> Juin </option>
                                    <option> Juillet </option>
                                    <option> Août </option>
                                    <option> Septembre </option>
                                    <option> Octobre </option>
                                    <option> Novembre </option>
                                    <option> Décembre </option>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <center> <button onclick="validemontant()" id="modif" class="btn bg-default waves-effect">AJOUTER</button> <br><br> </center> 
                        </div>
                        <div class="col-md-12" id="seeerror">
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Mois</th>
                                            <th data-priority="1">Montant</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenumontant">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="validelb()" id="modif" class="btn bg-deep-orange waves-effect">AJOUTER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modification d'une ligne budgétaire : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="idupdate" name="idupdate" />
                    <label id="infoupdate"></label>
                    <input type="hidden" name="tableaumoismontant_u" id="tableaumoismontant_u">
                    <input type="hidden" name="sommetotal_u" id="sommetotal_u">
                    <div class="row clearfix">

                        <div class="col-md-4">
                            <label for="mbg_u">Mode ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line" id="seembg">
                                    <select type="text" id="mbg_u" name="mbg_u" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <label for="nbg_u">Nature de dépense ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line" id="see_nature">
                                    <select type="text" id="nbg_u" name="nbg_u" class="form-control" placeholder="">
                                        <?php 
                                            $lbg = App\Providers\InterfaceServiceProvider::alllignebudgetaire();
                                        ?> 
                                        <?php $__currentLoopData = $lbg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="aebdt_u">Année d'exercice budgétaire ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onkeyup="plageexercice()" onchange="plageexercice()" min="1900" max="2099" step="1" id="aebdt_u" name="aebdt_u" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="aedd_u">Année d'exercice <br> Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="aedd_u" name="aedd_u" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="aedf_u">Année d'exercice <br> Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="aedf_u" name="aedf_u" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="comptesys_u">Compte Syscohada : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="comptesys_u" name="comptesys_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <label for="commentaire_u">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire_u" name="commentaire_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                            <label for="monttotaux_u">Montant total : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" disabled id="monttotaux_u" name="monttotaux_u" class="form-control" placeholder="">
                            </div>
                            <label id="seemonttotaux_u"></label>
                           </div>
                        </div>
                    </div>

                    <div class="row clearfix" style="border: 2px solid antiquewhite;">
                        <div class="col-md-5">
                            <label for="montantbg_u">Montant ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" min="0" step="1" id="montantbg_u" name="montantbg_u" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="mois_u">Mois : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="mois_u" name="mois_u" class="form-control">
                                    <option value="0"> Sélectionner le mois </option>
                                    <option> Janvier </option>
                                    <option> Février </option>
                                    <option> Mars </option>
                                    <option> Avril </option>
                                    <option> Mai </option>
                                    <option> Juin </option>
                                    <option> Juillet </option>
                                    <option> Août </option>
                                    <option> Septembre </option>
                                    <option> Octobre </option>
                                    <option> Novembre </option>
                                    <option> Décembre </option>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <center> <button onclick="validemontant_u()" id="modif" class="btn bg-default waves-effect">AJOUTER</button> <br><br> </center> 
                        </div>
                        <div class="col-md-12" id="seeerror_u">
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Mois</th>
                                            <th data-priority="1">Montant</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenumontant_u">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="valideupdate()" id="modif" class="btn bg-deep-orange waves-effect">MODIFIER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Détail d'une ligne budgétaire : </h4>
            </div>
            <div class="modal-body">
                <label id="seenature_detail"></label> <br>
                <label id="seenature_mode"></label> <br>
                <label id="seenature_periode"></label> <br>
                <label id="seenature_realisation"></label> <br>
                <label id="seenature_taux"></label> <br>
                <label id="seemonttotaux_detail"></label>
                    <div class="row clearfix" style="border: 2px solid antiquewhite;">
                        <div class="col-md-12">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Mois</th>
                                            <th data-priority="1">Montant</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenumontant_detail">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Suppression d'une ligne : </h4>
            </div>
            <div class="modal-body">
                
                    <div class="row clearfix">
                        <input type="hidden" id="code_d" name="code_d" class="form-control" placeholder="">
                        <label id="infodelete"></label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="validedelete()" id="modif" class="btn bg-deep-orange waves-effect">SUPPRIMER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="impant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Importation du budget antérieur : </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('SIBGA')); ?>"  enctype="multipart/form-data">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="dlesc">Télécharger le fichier exemplaire : <a href="<?php echo e(route('GLBFORBGA')); ?>"> Exemplaire_budget_anterieur.xlsx </a> </label>
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="imbga">Mode ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="imbga" name="imbga" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iaebdta">Année d'exercice budgétaire ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onkeyup="plageexerciceia()" onchange="plageexerciceia()" min="1900" max="2099" step="1" id="iaebdta" name="iaebdta" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="iaedda">Année d'exercice <br> Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="iaedda" name="iaedda" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iaedfa">Année d'exercice <br> Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="iaedfa" name="iaedfa" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="dataa">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="dataa" name="dataa" class="form-control" placeholder="">
                                </div>
                               </div>
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="imp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Importation du budget : </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('SLGI')); ?>"  enctype="multipart/form-data">
                    
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="dlesc">Télécharger le fichier exemplaire : <a href="<?php echo e(route('GLBFORBG')); ?>"> Exemplaire_budget.xlsx </a> </label>
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="imbg">Mode ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="imbg" name="imbg" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iaebdt">Année d'exercice budgétaire ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onkeyup="plageexercicei()" onchange="plageexercicei()" min="1900" max="2099" step="1" id="iaebdt" name="iaebdt" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="iaedd">Année d'exercice <br> Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="iaedd" name="iaedd" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iaedf">Année d'exercice <br> Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="iaedf" name="iaedf" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="data">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="data" name="data" class="form-control" placeholder="">
                                </div>
                               </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Exporter en excel : </h4>
            </div>
            <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="embg">Mode ( <i style="color: red;">*</i> ): </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" onchange="exportparam()" id="embg" name="embg" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="eaebdt">Année d'exercice budgétaire ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onkeyup="plageexercicee()" onchange="exportparam()" onblur="exportparam()" min="1900" max="2099" step="1" id="eaebdt" name="eaebdt" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="eaedd">Année d'exercice <br> Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="eaedd" name="eaedd" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="eaedf">Année d'exercice <br> Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" disabled step="1" id="eaedf" name="eaedf" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <a href="" id="exportbuget" onclick="exportparam()" class="btn bg-deep-orange waves-effect">EXPORTER</a>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">
        let data = [];
        let dataupdate = []; 

        function validemontant() {

            mois = document.getElementById("mois").value;
            montantbg = document.getElementById("montantbg").value;

            if(mois == 0 || mois == "" || montantbg == ""){ 
                error = "";
                if(mois == 0 || mois == "")
                    error += ". Veuillez renseigner le mois <br>";
                if(montantbg == "")
                    error += ". Veuillez renseigner le montant du mois <br>";
                document.getElementById('seeerror').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
            }else{

                // Vérification de l'unicité du mois
                dataactu = document.getElementById("tableaumoismontant").value;
                let controle = 0;

                if(dataactu != ""){
                    tabdjson = JSON.parse(dataactu);
                    

                    // Parcourir le tableau pour vérifier l'unicité
                    tabdjson.forEach(function(item, index, arr) {
                        if(item["mois"] == mois) controle = 1;
                    });
                }

                if(controle == 1)
                {
                    document.getElementById('seeerror').innerHTML = "<div class='alert alert-danger alert-block'> Ce mois figure dans la liste. Veuillez vérifier avant de continuer </div>";
                }else{

                    // Après conclure le formulaire

                    document.getElementById('seeerror').innerHTML = "";

                    // Création de l'objet de données avec un identifiant unique
                    let donnee = {
                        id: Date.now(),
                        mois: mois,
                        montant: montantbg
                    };

                    data.push(donnee); // Ajout à l'objet JavaScript

                    let list = document.getElementById("contenumontant");
                    let line = list.insertRow(-1);
                    line.setAttribute('data-id', donnee.id); 

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1; 
                    line.insertCell(1).innerHTML = mois;
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(montantbg);

                    // Ajout d'un bouton de suppression
                    let cellAction = line.insertCell(3);
                    let btnSupprimer = document.createElement("button");
                    btnSupprimer.innerHTML = "Sup" //"<i class='material-icons'>delete_sweep</i>";
                    //btnSupprimer.setAttribute(class,"btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light")
                    btnSupprimer.onclick = function() {
                        let tr = this.closest("tr");
                        let id = tr.getAttribute('data-id'); // Récupère l'identifiant unique

                        // Suppression de l'élément de l'objet JavaScript
                        data = data.filter(d => d.id.toString() !== id);

                        // Suppression de la ligne du tableau
                        tr.remove();

                        // Mise à jour de la numérotation
                        let line = list.getElementsByTagName("tr");
                        for(let i = 1; i < line.length; i++) {
                            line[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                        }

                        // Mettre à jour le champ caché avec les données du tableau
                        document.getElementById("tableaumoismontant").value = JSON.stringify(data);

                        // Mettre à jour le montant total

                        tabdjson = data;
                        somme = 0;

                        tabdjson.forEach(function(item, index, arr) {
                            somme = parseInt(somme, 10) + parseInt(item["montant"], 10); // incrémentation de la somme
                        });
                        document.getElementById("seemonttotaux").innerHTML = new Intl.NumberFormat('fr-FR').format(somme); // conversion au format monnaie franco^hone
                        document.getElementById("monttotaux").value = somme; // affichage dans le champ Montant total
                        document.getElementById('sommetotal').value = somme; // sauvegarde de la somme total
                    };

                    cellAction.appendChild(btnSupprimer);

                    // Réinitialisation des champs du formulaire
                    document.getElementById("mois").value = '';
                    document.getElementById("montantbg").value = '';
                    
                    // Mettre à jour le champ caché avec les données du tableau
                    document.getElementById("tableaumoismontant").value = JSON.stringify(data);
                    
                    // Calcul du montant total 
                    tabdjson = data;
                    somme = 0;

                    tabdjson.forEach(function(item, index, arr) {
                        somme = parseInt(somme, 10) + parseInt(item["montant"], 10); // incrémentation de la somme
                    });
                    document.getElementById("seemonttotaux").innerHTML = new Intl.NumberFormat('fr-FR').format(somme); // conversion au format monnaie franco^hone
                    document.getElementById("monttotaux").value = somme; // affichage dans le champ Montant total
                    document.getElementById('sommetotal').value = somme; // sauvegarde de la somme total
                }
            }
        
        }

        function validemontant_u() {

            mois = document.getElementById("mois_u").value;
            montantbg = document.getElementById("montantbg_u").value;

            if(mois == 0 || mois == "" || montantbg == ""){ 
                error = "";
                if(mois == 0 || mois == "")
                    error += ". Veuillez renseigner le mois <br>";
                if(montantbg == "")
                    error += ". Veuillez renseigner le montant du mois <br>";
                document.getElementById('seeerror_u').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
            }else{

                // Vérification de l'unicité du mois
                dataactu = document.getElementById("tableaumoismontant_u").value;
                let controle = 0;

                if(dataactu != ""){
                    tabdjson = JSON.parse(dataactu);
                    

                    // Parcourir le tableau pour vérifier l'unicité
                    tabdjson.forEach(function(item, index, arr) {
                        if(item["mois"] == mois) controle = 1;
                    });
                }

                if(controle == 1)
                {
                    document.getElementById('seeerror_u').innerHTML = "<div class='alert alert-danger alert-block'> Ce mois figure dans la liste. Veuillez vérifier avant de continuer </div>";
                }else{

                    // Après conclure le formulaire

                    document.getElementById('seeerror_u').innerHTML = "";

                    // Création de l'objet de données avec un identifiant unique
                    let donnee = {
                        id: Date.now(),
                        mois: mois,
                        montant: montantbg
                    };

                    dataupdate.push(donnee); // Ajout à l'objet JavaScript

                    let list = document.getElementById("contenumontant_u");
                    let line = list.insertRow(-1);
                    line.setAttribute('data-id', donnee.id); 

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1; 
                    line.insertCell(1).innerHTML = mois;
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(montantbg);

                    // Ajout d'un bouton de suppression
                    let cellAction = line.insertCell(3);
                    let btnSupprimer = document.createElement("button");
                    btnSupprimer.innerHTML = "Sup" //"<i class='material-icons'>delete_sweep</i>";
                    //btnSupprimer.setAttribute(class,"btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light")
                    btnSupprimer.onclick = function() {
                        let tr = this.closest("tr");
                        let id = tr.getAttribute('data-id'); // Récupère l'identifiant unique

                        // Suppression de l'élément de l'objet JavaScript
                        dataupdate = dataupdate.filter(d => d.id.toString() !== id);

                        // Suppression de la ligne du tableau
                        tr.remove();

                        // Mise à jour de la numérotation
                        let line = list.getElementsByTagName("tr");
                        for(let i = 1; i < line.length; i++) {
                            line[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                        }

                        // Mettre à jour le champ caché avec les données du tableau
                        document.getElementById("tableaumoismontant_u").value = JSON.stringify(dataupdate);

                        // Mettre à jour le montant total

                        tabdjson = dataupdate;
                        somme = 0;

                        tabdjson.forEach(function(item, index, arr) {
                            somme = parseInt(somme, 10) + parseInt(item["montant"], 10); // incrémentation de la somme
                        });
                        document.getElementById("seemonttotaux_u").innerHTML = new Intl.NumberFormat('fr-FR').format(somme); // conversion au format monnaie franco^hone
                        document.getElementById("monttotaux_u").value = somme; // affichage dans le champ Montant total
                        document.getElementById('sommetotal_u').value = somme; // sauvegarde de la somme total
                    };

                    cellAction.appendChild(btnSupprimer);

                    // Réinitialisation des champs du formulaire
                    document.getElementById("mois_u").value = '';
                    document.getElementById("montantbg_u").value = '';
                    
                    // Mettre à jour le champ caché avec les données du tableau
                    document.getElementById("tableaumoismontant_u").value = JSON.stringify(dataupdate);
                    
                    // Calcul du montant total 
                    tabdjson = dataupdate;
                    somme = 0;

                    tabdjson.forEach(function(item, index, arr) {
                        somme = parseInt(somme, 10) + parseInt(item["montant"], 10); // incrémentation de la somme
                    });
                    document.getElementById("seemonttotaux_u").innerHTML = new Intl.NumberFormat('fr-FR').format(somme); // conversion au format monnaie franco^hone
                    document.getElementById("monttotaux_u").value = somme; // affichage dans le champ Montant total
                    document.getElementById('sommetotal_u').value = somme; // sauvegarde de la somme total
                }
            }
        
        }

        function exportparam(){
            mode = document.getElementById('embg').value;
            an = document.getElementById('eaebdt').value;
            document.getElementById('exportbuget').href = "<?php echo e(route('EBG')); ?>?mode="+mode+"&an="+an;
        }

        function plageexercice() {
            let an = document.getElementById('aebdt').value;

            if( (an / 1000) > 1 ){
                document.getElementById("aedd").value = "01-01-"+an;
                document.getElementById("aedf").value = "31-12-"+an;
            }else{
                document.getElementById("aedd").value = "";
                document.getElementById("aedf").value = "";
            }
        }

        function plageexercicei() {
            let an = document.getElementById('iaebdt').value;

            if( (an / 1000) > 1 ){
                document.getElementById("iaedd").value = "01-01-"+an;
                document.getElementById("iaedf").value = "31-12-"+an;
            }else{
                document.getElementById("iaedd").value = "";
                document.getElementById("iaedf").value = "";
            }
        }

        function plageexerciceia() {
            let an = document.getElementById('iaebdta').value;

            if( (an / 1000) > 1 ){
                document.getElementById("iaedda").value = "01-01-"+an;
                document.getElementById("iaedfa").value = "31-12-"+an;
            }else{
                document.getElementById("iaedda").value = "";
                document.getElementById("iaedfa").value = "";
            }
        }

        function plageexercicee() {
            let an = document.getElementById('eaebdt').value;

            if( (an / 1000) > 1 ){
                document.getElementById("eaedd").value = "01-01-"+an;
                document.getElementById("eaedf").value = "31-12-"+an;
            }else{
                document.getElementById("eaedd").value = "";
                document.getElementById("eaedf").value = "";
            }
        }

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value; // token 
                aebdt = document.getElementById("aebdt").value; // Année d'exercice
                mbg = document.getElementById("mbg").value; // Sous compte d'objectif 
                nbg = document.getElementById("nbg").value; // Nature de dépense que constitute la ligne budgétaire
                comptesys = document.getElementById("comptesys").value; // Numéro de compte Syscohada
                commentaire = document.getElementById("commentaire").value; // commentaire
                datamensuelle = document.getElementById("tableaumoismontant").value; // data mensuelle
                somme = document.getElementById('sommetotal').value; // somme de la ligne budgetaire
                
            
                if(token == "" || aebdt == "" || mbg == "" || nbg == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(aebdt == "")
                        error += ". Le champ Année d'exercice ne peut pas être vide <br>";
                    if((aebdt / 1000) > 1)
                        error += ". Le champ Année d'exercice ne peut pas être inférieur à 1900 <br>";
                    if(mbg == "")
                        error += ". Le champ Mode ne peut pas être vide <br>";
                    if(nbg == "")
                        error += ". Le champ Nature ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, bgaebdt: aebdt, bgm: mbg, bgn: nbg, lgcomptesys: comptesys, lgcommentaire: commentaire, bgsomme: somme , bgdatamensuelle: datamensuelle
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('ABG')); ?>",
                            {
                                method: 'POST',
                                headers: { 
                                            'Access-Control-Allow-Credentials': true,
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json',
                                        },
                                body: JSON.stringify(dat)
                            });
                            if(response.status == 200)
                            {
                                data = await response.text();

                                reponse = JSON.parse(data);

                                if(reponse.status == 0)
                                {
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×-</button><strong>'+reponse.messages+'</strong></div>';
                                    
                                    setTimeout(function(){
                                        window.location.href = "<?php echo e(route('GLBG')); ?>";
                                    }, 3000);

                                }else{
                                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoadd").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoadd").innerHTML = error;
                        } 
                }
        }

        async function getupdate(data, name, lib){
            document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de <i style='color:#0F056B'> "+name+" sur la période de "+data.debutperiode+" au "+data.finperiode+" </i> ? <br>";

            document.getElementById('idupdate').value = data.id;
            document.getElementById('monttotaux_u').value = data.montant;
            document.getElementById('sommetotal_u').value = data.montant;
            document.getElementById('tableaumoismontant_u').value = data.detailbudget;
            document.getElementById("seemonttotaux_u").innerHTML = new Intl.NumberFormat('fr-FR').format(data.montant);

            document.getElementById('aebdt_u').value = data.periode;
            document.getElementById('aedd_u').value = data.debutperiode; 
            document.getElementById('aedf_u').value = data.finperiode;
            document.getElementById('comptesys_u').value = data.comptesys;
            document.getElementById('commentaire_u').value = data.commentaire;
            document.getElementById('seembg').innerHTML = '<select type="text" id="mbg_u" name="mbg_u" class="form-control" placeholder=""> <option value="'+data.sc+'"> '+lib+' </option> <?php $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes(); ?>  <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($compte->id); ?>"><?php echo e($compte->compte); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>'; 
            document.getElementById('see_nature').innerHTML = '<select type="text" id="nbg_u" name="nbg_u" class="form-control" placeholder=""> <option value="'+data.nature+'"> '+name+' </option>  <?php  $lbg = App\Providers\InterfaceServiceProvider::alllignebudgetaire(); ?>  <?php $__currentLoopData = $lbg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>';
            dataupdate = JSON.parse(data.detailbudget);

            document.getElementById("contenumontant_u").innerHTML = "";

            dataupdate.forEach(function(item, index, arr) {
                    let list = document.getElementById("contenumontant_u");
                    let line = list.insertRow(-1); 
                    line.setAttribute('data-id', item["id"]);

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1; 
                    line.insertCell(1).innerHTML = item["mois"];
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(item["montant"]);

                    // Ajout d'un bouton de suppression
                    let cellAction = line.insertCell(3);
                    let btnSupprimer = document.createElement("button");
                    btnSupprimer.innerHTML = "Sup" //"<i class='material-icons'>delete_sweep</i>";
                    //btnSupprimer.setAttribute(class,"btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light")
                    btnSupprimer.onclick = function() {
                        let tr = this.closest("tr");
                        let id = tr.getAttribute('data-id'); // Récupère l'identifiant unique

                        // Suppression de l'élément de l'objet JavaScript
                        dataupdate = dataupdate.filter(d => d.id.toString() !== id);

                        // Suppression de la ligne du tableau
                        tr.remove();

                        // Mise à jour de la numérotation
                        let line = list.getElementsByTagName("tr");
                        for(let i = 1; i < line.length; i++) {
                            line[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                        }

                        // Mettre à jour le champ caché avec les données du tableau
                        document.getElementById("tableaumoismontant_u").value = JSON.stringify(dataupdate);

                        // Mettre à jour le montant total

                        console.log(dataupdate);

                        tabdjson = dataupdate;
                        somme = 0;

                        tabdjson.forEach(function(item, index, arr) {
                            somme = parseInt(somme, 10) + parseInt(item["montant"], 10); // incrémentation de la somme
                        });
                        document.getElementById("seemonttotaux_u").innerHTML = new Intl.NumberFormat('fr-FR').format(somme); // conversion au format monnaie franco^hone
                        document.getElementById("monttotaux_u").value = somme; // affichage dans le champ Montant total
                        document.getElementById('sommetotal_u').value = somme; // sauvegarde de la somme total
                    };

                    cellAction.appendChild(btnSupprimer);
            });

        }

        async function getdetail(data, name, lib){
            document.getElementById("seenature_detail").innerHTML = "Nature de dépense : "+name;
            document.getElementById("seenature_mode").innerHTML = "Mode : "+lib;
            document.getElementById("seenature_periode").innerHTML = "Période : "+data.periode;
            document.getElementById("seenature_realisation").innerHTML = "Réalisation : "+new Intl.NumberFormat('fr-FR').format(data.realisation)+" F CFA";
            document.getElementById("seenature_taux").innerHTML = "Taux de réalisation : "+(data.realisation / data.montant)+" %";
            document.getElementById("seemonttotaux_detail").innerHTML = "Montant total : "+new Intl.NumberFormat('fr-FR').format(data.montant)+" F CFA";
            datadetail = JSON.parse(data.detailbudget);
            document.getElementById("contenumontant_detail").innerHTML = "";
            datadetail.forEach(function(item, index, arr) {
                    let list = document.getElementById("contenumontant_detail");
                    let line = list.insertRow(-1); 
                    line.setAttribute('data-id', item["id"]);

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1; 
                    line.insertCell(1).innerHTML = item["mois"];
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(item["montant"]);
            });

        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value; // token 
                aebdt = document.getElementById("aebdt_u").value; // Année d'exercice
                mbg = document.getElementById("mbg_u").value; // Sous compte d'objectif 
                nbg = document.getElementById("nbg_u").value; // Nature de dépense que constitute la ligne budgétaire
                comptesys = document.getElementById("comptesys_u").value; // Numéro de compte Syscohada
                commentaire = document.getElementById("commentaire_u").value; // commentaire
                datamensuelle = document.getElementById("tableaumoismontant_u").value; // data mensuelle
                somme = document.getElementById('sommetotal_u').value; // somme de la ligne budgetaire
                id = document.getElementById("idupdate").value; // id de modification
                
            
                if(token == "" || aebdt == "" || mbg == "" || nbg == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(aebdt == "")
                        error += ". Le champ Année d'exercice ne peut pas être vide <br>";
                    if((aebdt / 1000) > 1)
                        error += ". Le champ Année d'exercice ne peut pas être inférieur à 1900 <br>";
                    if(mbg == "")
                        error += ". Le champ Mode ne peut pas être vide <br>";
                    if(nbg == "")
                        error += ". Le champ Nature ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, bgid: id, bgaebdt: aebdt, bgm: mbg, bgn: nbg, lgcomptesys: comptesys, lgcommentaire: commentaire, bgsomme: somme , bgdatamensuelle: datamensuelle
                    };

                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('ABG')); ?>",
                            {
                                method: 'POST',
                                headers: { 
                                            'Access-Control-Allow-Credentials': true,
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json',
                                        },
                                body: JSON.stringify(dat)
                            });
                            if(response.status == 200)
                            {
                                data = await response.text();

                                reponse = JSON.parse(data);

                                if(reponse.status == 0)
                                {
                                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    setTimeout(function(){
                                        window.location.href = "<?php echo e(route('GLBG')); ?>";
                                    }, 3000);
                                }else{
                                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoupdate").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoupdate").innerHTML = error;
                        } 
                }
        }

        async function getdelete(data, name){
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+name+" sur la période de "+data.debutperiode+" au "+data.finperiode+" </i> ?";
            document.getElementById('code_d').value = data.id;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("code_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DBG')); ?>",
                            {
                                method: 'POST',
                                headers: {
                                                'Access-Control-Allow-Credentials': true,
                                                'Content-Type': 'application/json',
                                                'Accept': 'application/json',
                                            },
                                body: JSON.stringify(dat)
                            });
                            if(response.status == 200)
                            {
                                data = await response.text();
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                setTimeout(function(){
                                        window.location.href = "<?php echo e(route('GLBG')); ?>";
                                    }, 3000);
                            }
                            else{
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodelete").innerHTML = error;
                        } 
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/budgetgeneral/list.blade.php ENDPATH**/ ?>
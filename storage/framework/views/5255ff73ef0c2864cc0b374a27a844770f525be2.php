

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <style>
    @keyframes  clignotant {  
      50% { background-color: red; }
    }

    .bouton-clignotant {
      animation: clignotant 1s infinite;
      border: none;
      color: white;
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    @keyframes  montant {  
      50% { background-color: red; }
    }

    .bouton-montant {
      animation: montant 1s infinite;
      border: none;
      color: white;
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Projets
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Projets
                                <div class="row pull-right m-r-8" style="display: flex; justify-content: space-between;">
                                    <div class="col-3">
                                        <button type="button" title="Ajouter" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">
                                            <i class="material-icons"> note_add </i> 
                                        </button>
                                    </div>&nbsp;
                                    
                                    <div class="col-3">
                                        <a href="<?php echo e(route('GELB')); ?>"> 
                                            <button type="button" title="Exporter"  class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#exp">
                                               <i class="material-icons">picture_as_pdf</i> 
                                           </butt0on>
                                       </a>
                                    </div>&nbsp;
                                </div>
                            </h2>
                        </div>
                        <div class="body"> 
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">#</th>
                                        <th data-priority="1">Titre</th>
                                        <th data-priority="1">Ref. Interne</th>
                                        <th data-priority="1">Ref. Marché</th>
                                        <th data-priority="1">Date Début</th>
                                        <th data-priority="1">Date Fin </th>
                                        <th data-priority="1">Client </th>
                                        <th data-priority="1">Montant TTC </th>
                                        <th data-priority="1">Statut </th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"> 1 </td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->titre); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->refinterne); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->refcontrat); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->datedebut); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->datefin); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(App\Providers\InterfaceServiceProvider::libelleClient($serv->client)); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->montantttc, 0, '.', ' ')); ?></td>
                                            <td style="vertical-align:middle; text-align: center;">  </td> 
                                            <td style="vertical-align:middle; text-align: center;">

                                            <?php if($serv->client == "" || $serv->client == null || $serv->client == 0): ?>
                                            <button onclick="getactor(<?php echo e($serv); ?>)" type="button" title="Définir les acteurs" data-toggle="modal" data-target="#acteur" class="btn btn-circle btn-xs margin-bottom-10 bouton-clignotant">
                                                     <i class="material-icons">group</i>
                                            </button>
                                            <?php else: ?>
                                            <button onclick="getactor(<?php echo e($serv); ?>)" type="button" title="Définir les acteurs" data-toggle="modal" data-target="#acteur" class="btn btn-circle btn-xs margin-bottom-10 ">
                                                     <i class="material-icons">group</i>
                                            </button>
                                            <?php endif; ?>

                                            <button onclick="getvalidactor(<?php echo e($serv); ?>)" type="button" title="Validation" data-toggle="modal" data-target="#acteur" class="btn btn-circle btn-xs margin-bottom-10 ">
                                                     <i class="material-icons">playlist_add_check</i>
                                            </button>

                                            <a href="<?php echo e(route('GDFP', $serv->titre)); ?>"> 
                                            <button type="button" title="Fiche de projet" class="btn btn-circle btn-xs margin-bottom-10 ">
                                                     <i class="material-icons">view_list</i>
                                            </button>
                                            </a>

                                            <!--
                                            <?php if($serv->montantttc == "" || $serv->montantttc == null || $serv->montantttc == 0): ?>
                                            <button onclick="getdevis(<?php echo e($serv); ?>)" type="button" title="Définir les acteurs" data-toggle="modal" data-target="#devis" class="btn btn-circle btn-xs margin-bottom-10 bouton-montant">
                                                     <i class="material-icons">view_list</i>
                                            </button>
                                            <?php else: ?>
                                            <button onclick="getdevis(<?php echo e($serv); ?>)" type="button" title="Définir les acteurs" data-toggle="modal" data-target="#devis" class="btn btn-circle btn-xs margin-bottom-10 ">
                                                     <i class="material-icons">view_list</i>
                                            </button>
                                            <?php endif; ?> -->


                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e(App\Providers\InterfaceServiceProvider::ProjetListe($serv->idProj)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                <button onclick="getdelete(<?php echo e($serv->idProj); ?>)"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8"><center>Pas de projet enregistrer!!!</center> </td>
                                            <td colspan="1"> 
                                                <button class="btn btn-circle btn-xs margin-bottom-10 bouton-clignotant">B</button>
                                            </td>
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
                <h4 class="modal-title" id="myModalLabel">Ajout d'un projet : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="titre_projet">Titre du projet ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" step="1"  id="titre_projet" name="titre_projet" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="refinterne">Référence interne ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="refinterne" name="refinterne" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="refcontrat">Référence marché ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="refcontrat" name="refcontrat" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="objet">Objet du contrat </label> 
                           <div class="form-group">
                                <div class="form-line">
                                    <textarea type="text" name="objet" id="objet" rows="3" class="form-control"></textarea>
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="datedebut">Date début ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="datedebut" name="datedebut" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="datefin">Date fin ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="datefin" name="datefin" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="zone">Zone de couverture ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="zone" name="zone" class="form-control" placeholder="">
                                        <option>BENIN</option>
                                        <option>TOGO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="nature">Nature ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text"  id="nature" name="nature" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="adresse">Adresse ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text"  id="adresse" name="adresse" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="financement">Financement ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="financement" name="financement" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="banque">Banque ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="banque" name="banque" class="form-control" placeholder="">
                                        <option>BOA</option>
                                        <option>NSIA</option>
                                        <option>ECOBANK</option>
                                        <option>NSIA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="comptebancaire">Numéro Compte ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="comptebancaire" name="comptebancaire" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="validelb()" id="addProjet" class="btn bg-deep-orange waves-effect">AJOUTER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="acteur" tabindex="-1" role="dialog" aria-labelleddby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: 2px solid red;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Définition des acteurs : </h4>
            </div>
            <div class="modal-body">
                <label id="infoactor"></label>
                <input type="hidden" id="ipprojet" />
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="maitre">Maitre d'ouvrage (Client)</label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="maitre" name="maitre" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allutilisateurs();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($compte->idUser); ?>"><?php echo e($compte->nom); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="chefprojet">Maitre d'oeuvre (Chef projet) </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="chefprojet" name="chefprojet" class="form-control" placeholder="">
                                        <?php 
                                            $lbg = App\Providers\InterfaceServiceProvider::allutilisateurs();
                                        ?> 
                                        <?php $__currentLoopData = $lbg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lb->idUser); ?>"><?php echo e($lb->nom); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="appui">Appui à la coordination </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="appui" name="appui" class="form-control" placeholder="">
                                        <?php 
                                            $lbg = App\Providers\InterfaceServiceProvider::allutilisateurs();
                                        ?> 
                                        <?php $__currentLoopData = $lbg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lb->idUser); ?>"><?php echo e($lb->nom); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="partenaire">Partenaire </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="partenaire" name="partenaire" class="form-control" placeholder="">
                                        <?php 
                                            $part = App\Providers\InterfaceServiceProvider::allpartenaire();
                                        ?> 
                                        <option value="">Sémectionner un partenaire</option>
                                        <?php $__currentLoopData = $part; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($prt->id); ?>"><?php echo e($prt->nom); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nompart">Nom partenaire :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nompart" name="nompart" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="adressepart">Adresse partenaire :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="adressepart" name="adressepart" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <center> <button onclick="validepartenaire()" id="modif" class="btn bg-default waves-effect">AJOUTER AU PROJET</button> <br><br> </center> 
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Nom partenaire</th>
                                            <th data-priority="1">Adresse partenaire</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="contenupartenaire">
                                        
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="setdefinitionactor()" id="defactor" class="btn bg-deep-orange waves-effect">VALIDER</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="devis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Définition du devis : </h4>
            </div>
            <div class="modal-body">
                    <label id="infodevis"></label>
                    <input type="hidden" id="ipprojetfina" />
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="mht">Montant Hors Taxe  ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" step="1" onblur="seemontantttc()" id="mht" name="mht" onkeyup="seemontantht()" class="form-control" placeholder="">
                                </div>
                                <label id="seemht"></label>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <label for="tauxtva">Taux TVA ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" min="1" max="3" onblur="seemontantttc()" step="0.01" onkeyup="seetauxtva()" id="tauxtva" name="tauxtva" class="form-control" placeholder="">
                                </div>
                                <label id="seetva"></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="mtva">Montant TVA ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" disabled min="1" max="3" step="0.01" id="mtva" name="mtva" class="form-control" placeholder="">
                                </div>
                                <label id="seemtva"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="redevance">Redevance ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" step="1" onblur="seemontantttc()" id="redevance" onkeyup="seeredevance()" name="redevance" class="form-control" placeholder="">
                                </div>
                                <label id="seeredevance"></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="tauxi">Taux Impôt ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" min="1" onblur="seemontantttc()" max="3" step="0.01" onkeyup="seetauximpot()" id="tauxi" name="tauxi" class="form-control" placeholder="">
                                </div>
                                <label id="seei"></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="mimpot">Montant Impôt ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" disabled min="1" max="3" step="0.01" id="mimpot" name="mimpot" class="form-control" placeholder="">
                                </div>
                                <label id="seemi"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="part">Part de BECI BTP ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" onblur="seemontantttc()" step="1"  id="part" onkeyup="seepart()" name="part" class="form-control" placeholder="">
                                </div>
                                <label id="seep"></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="mpart">Montant Part ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" disabled min="1" max="3" step="0.01" id="mpart" name="mpart" class="form-control" placeholder="">
                                </div>
                                <label id="seemp"></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="mttc">Montant TTC ( <i style="color: red;">*</i> ) :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" min="1" max="3" step="0.01" id="mttc" name="mttc" class="form-control" placeholder="">
                                </div>
                                <label id="seemttc"></label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button onclick="setdevis()" id="addProjet" class="btn bg-deep-orange waves-effect">VALIDER</button>
            </div>
        </div>
    </div>
</div>



    <script type="text/javascript">

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                titre_projet = document.getElementById("titre_projet").value;
                refinterne = document.getElementById("refinterne").value;
                refcontrat = document.getElementById("refcontrat").value;
                objet = document.getElementById("objet").value;
                datedebut = document.getElementById("datedebut").value;
                datefin = document.getElementById("datefin").value;
                financement = document.getElementById("financement").value;
                zone = document.getElementById("zone").value;
                nature = document.getElementById("nature").value;
                comptebancaire = document.getElementById("comptebancaire").value;
                banque = document.getElementById("banque").value;
                adresse = document.getElementById("adresse").value;
                
            
                if(token == "" || titre_projet == "" || refinterne == "" || refcontrat == ""|| datedebut == "" || datefin == "" || financement == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(titre_projet == "")
                        error += ". Le champ Titre ne peut pas être vide <br>";
                    if(refinterne == "")
                        error += ". Le champ Référence interne ne peut pas être vide <br>";
                    if(refcontrat == "")
                        error += ". Le champ Référence marché ne peut pas être vide <br>";
                    if(datedebut == "")
                        error += ". Le champ Date début ne peut pas être vide <br>";
                    if(datefin == "")
                        error += ". Le champ Date fin ne peut pas être vide <br>";
                    if(financement == "")
                        error += ". Le champ financement ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    dat = {
                        _token: token,
                        lp_titre: titre_projet,
                        lp_refinterne: refinterne,
                        lp_refcontrat: refcontrat, 
                        lp_objet: objet,
                        lp_datedebut: datedebut,
                        lp_financement: financement,
                        lp_datefin: datefin,
                        lp_zone: zone,
                        lp_nature: nature,
                        lp_comptebancaire: comptebancaire,
                        lp_adresse: banque,
                        lp_banque: adresse,
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SAP')); ?>",
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
                                        window.location.href = "<?php echo e(route('GP')); ?>";
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

        async function getactor(data){
            document.getElementById('ipprojet').value = data.id;
            getlistpartenaire(data.id);
        }

        async function getlistpartenaire(projet){
            try {
                        let response = await fetch("<?php echo e(route('GPTNP')); ?>?ap_projet="+projet,
                        {
                            method: 'get',
                            headers: {
                                'Access-Control-Allow-Credentials': true,
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                        });
                        if(response.status == 200)
                        {
                            data = await response.text();
                            contenu = "";
                            list = JSON.parse(data).data;
                            list.forEach(function(currentline, index, arry){
                                contenu += '<tr>';
                                contenu += '<th> <span class="co-name">'+(index + 1)+'</span></th>';
                                contenu += '<td>'+currentline["nom"]+'</td>';
                                contenu += '<td>'+currentline["adresse"]+'</td>';
                                contenu += '<td>';
                                contenu += '<button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#deleteantecedent" onclick="getdeletepartenaireinprojet('+currentline["id"]+', \''+currentline["nom"]+'\')"><i class="material-icons">delete_sweep</i></a> </button>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenupartenaire').innerHTML = '<tr> <td colspan="4"><center> Aucun partenaire associé au projet. </center> </td> </tr>';
                            else
                                document.getElementById('contenupartenaire').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
        }

        async function validepartenaire(){
            token = document.getElementById("_token").value;
            adressepart = document.getElementById("adressepart").value;
            nompart = document.getElementById("nompart").value;
            partenaire = document.getElementById("partenaire").value;
            projet = document.getElementById("ipprojet").value;
            
                if(token === "" || (nompart === "" && partenaire === "")){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(nompart == "")
                        error += ". Veuillez sélectionner ou renseigner le nom du partenaire. <br>";

                    document.getElementById('infoactor').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    dat = {
                        _token: token,
                        ap_nom: nompart,
                        ap_adresse: adressepart,
                        ap_partenaire: partenaire,
                        ap_projet: projet
                    };

                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('GPTNP')); ?>",
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
                                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×-</button><strong>'+reponse.messages+'</strong></div>';
                                    
                                    getlistpartenaire(projet);
                                }else{
                                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoactor").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoactor").innerHTML = error;
                        } 
                }
        }

        async function getdeletepartenaireinprojet(id, name){
            document.getElementById('infoactor').innerHTML = "<div class='alert alert-warning alert-block'> <button type='button' class='close' data-dismiss='alert'>×</button><strong> Vous voulez vraiment supprimer le partenaire <i style='color:#0F056B'> "+name+"</i> du projet ? </strong></div>";
            //document.getElementById('code_u').value = data;
        }

        async function setdefinitionactor(){
            token = document.getElementById("_token").value;
            maitre = document.getElementById("maitre").value;
            chefprojet = document.getElementById("chefprojet").value;
            appui = document.getElementById("appui").value;
            projet = document.getElementById("ipprojet").value;
            
                if(token === "" || (maitre === "" || chefprojet === "")){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(maitre == "")
                        error += ". Veuillez sélectionner le maitre d'ouvrage. <br>";
                    if(chefprojet == "")
                        error += ". Veuillez sélectionner le maitre d'oeuvre. <br>";

                    document.getElementById('infoactor').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    dat = {
                        _token: token,
                        apd_maitre: maitre,
                        apd_chefprojet: chefprojet,
                        apd_appui: appui,
                        apd_projet: projet
                    };

                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SAAP')); ?>",
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
                                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×-</button><strong>'+reponse.messages+'</strong></div>';
                                    
                                    setTimeout(function(){
                                        window.location.href = "<?php echo e(route('GP')); ?>";
                                    }, 3000);
                                }else{
                                    document.getElementById("infoactor").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoactor").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoactor").innerHTML = error;
                        } 
                }
        }

        async function getdevis(data){
            document.getElementById('ipprojetfina').value = data.id;
        }

        function seemontantht() {
            montant = document.getElementById("mht").value;

            document.getElementById('seemht').innerHTML = new Intl.NumberFormat('fr-FR').format(montant)+" F CFA ";

            //montantttc();
        }

        function seetauxtva() {
            taux = document.getElementById("tauxtva").value;

            document.getElementById('seetva').innerHTML = taux+" % ";

            montant = document.getElementById("mht").value;

            if (montant > 0) {
                montanttva = montant * taux / 100;

                document.getElementById('mtva').value = montanttva;

                document.getElementById('seemtva').innerHTML = new Intl.NumberFormat('fr-FR').format(montanttva)+" F CFA ";
            }
            //montantttc();
        }

        function seetauximpot() {
            taux = document.getElementById("tauxi").value;

            document.getElementById('seei').innerHTML = taux+" % ";

            montant = document.getElementById("mht").value;

            if (montant > 0) {
                montanti = montant * taux / 100;

                document.getElementById('mimpot').value = montanti;

                document.getElementById('seemi').innerHTML = new Intl.NumberFormat('fr-FR').format(montanti)+" F CFA ";
            }

            //montantttc();
        }

        function seeredevance() {
            montant = document.getElementById("redevance").value;

            document.getElementById('seeredevance').innerHTML = new Intl.NumberFormat('fr-FR').format(montant)+" F CFA ";

            //montantttc();
        }

        function seepart() {
            taux = document.getElementById("part").value;

            document.getElementById('seep').innerHTML = taux+" % ";

            montant = document.getElementById("mht").value;

            if (montant > 0) {
                montantp = montant * taux / 100;

                document.getElementById('mpart').value = montantp;

                document.getElementById('seemp').innerHTML = new Intl.NumberFormat('fr-FR').format(montantp)+" F CFA ";
            }

            ///montantttc();
        }

        function seemontantttc() {
            montant = document.getElementById("mht").value;

            montantp = 0; montanttva = 0; mredevance = 0; montanti = 0; montantttc = 0;

            tauxtva = document.getElementById("tauxtva").value;
            if(tauxtva > 0){
                montanttva = parseInt(montant) * parseInt(tauxtva) / 100;
                //montantttc -= montanttva;
                console.log(montanttva);
            }

            redevance = document.getElementById("redevance").value;
            if (redevance > 0) {
                mredevance = redevance;
                console.log(mredevance);
            }

            tauxi = document.getElementById("tauxi").value;
            if(tauxi > 0){
                montanti = montant * tauxi / 100;
            }

            part = document.getElementById("part").value;
            if(part > 0){
                montantp = montant * part / 100;
            }


            if (montant > 0) {
                montantttc = parseInt(montant, 10) - parseInt(montantp, 10) - parseInt(montanttva, 10) - parseInt(mredevance, 10) - parseInt(montanti, 10);

                document.getElementById('mttc').value = montantttc;

                document.getElementById('seemttc').innerHTML = new Intl.NumberFormat('fr-FR').format(montantttc)+" F CFA ";
            }
        }





        async function getupdate(data, name){
            document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code').value = data.idProj;
            document.getElementById('titre_projets').value = data.titre_projets;
            document.getElementById('numero_contrats').value = data.numero_contrats; 
            document.getElementById('maitres').value = data.maitres;
            document.getElementById('titulaires').value = data.titulaires;
            document.getElementById('prestations').value = data.prestations;
            document.getElementById('tp_financements').value = data.tp_financements;
            document.getElementById('financements').value = data.financements;
            document.getElementById('montants').value = data.montants;
            document.getElementById('delaiExecutions').value = data.delaiExecutions;
            document.getElementById('objets').value = data.objets;
            //document.getElementById('see_u').innerHTML = '<select type="text" id="sc_u" name="sc_u" class="form-control" placeholder=""> <option value="'+data.souscompte+'">'+name+'</option> <?php $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes(); ?> <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>'; 
        }

        async function valideupdate() {
            // Récupération des données du formulaire
            const token = document.getElementById("_token").value;
            const titre_projet = document.getElementById("titre_projets").value;
            const numero_contrat = document.getElementById("numero_contrats").value;
            const maitre = document.getElementById("maitres").value;
            const titulaire = document.getElementById("titulaires").value;
            const prestation = document.getElementById("prestations").value;
            const tp_financement = document.getElementById("tp_financements").value;
            const financement = document.getElementById("financements").value;
            const montant = document.getElementById("montants").value;
            const delaiExecution = document.getElementById("delaiExecutions").value;
            const objet = document.getElementById("objets").value;

            // Vérification des champs requis
            if (token === "" || titre_projet === "" || numero_contrat === "" || maitre === "" || titulaire === "" || prestation === "" || tp_financement === "" || financement === "" || montant === "" || delaiExecution === "" || objet === "") {
                let error = "";
                if (token === "") error += ". Veuillez vous reconnecter pour continuer <br>";
                if (titre_projet === "") error += ". Le champ Titre Projet ne peut pas être vide <br>";
                if (numero_contrat === "") error += ". Le champ Numéro Contrat ne peut pas être vide <br>";
                if (maitre === "") error += ". Le champ Maître ne peut pas être vide <br>";
                if (titulaire === "") error += ". Le champ Titulaire ne peut pas être vide <br>";
                if (prestation === "") error += ". Le champ Prestation ne peut pas être vide <br>";
                if (tp_financement === "") error += ". Le champ Financement TP ne peut pas être vide <br>";
                if (financement === "") error += ". Le champ Financement ne peut pas être vide <br>";
                if (montant === "") error += ". Le champ Montant ne peut pas être vide <br>";
                if (delaiExecution === "") error += ". Le champ Délai d'exécution ne peut pas être vide <br>";
                if (objet === "") error += ". Le champ Objet ne peut pas être vide <br>";

                document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
            } else {
                // Création de l'objet de données
                const dat = {
                    _token: token,
                    tp_objet: objet,
                    tp_montant: montant,
                    financement: financement,
                    tp_delaiExecution: delaiExecution,
                    tp_prestation: prestation,
                    tp_financement: tp_financement,
                };

                // Affichage du message de traitement
                document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';

                try {
                    // Envoi de la requête
                    const response = await fetch("<?php echo e(route('SAP')); ?>", {
                        method: 'POST',
                        headers: {
                            'Access-Control-Allow-Credentials': true,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(dat)
                    });

                    // Traitement de la réponse
                    if (response.status === 200) {
                        const data = await response.text();
                        const reponse = JSON.parse(data);

                        if (reponse.status === 0) {
                            document.getElementById("infoupdate").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' + reponse.messages + '</strong></div>';
                            setTimeout(function () {
                                window.location.href = "<?php echo e(route('GLBGT')); ?>";
                            }, 3000);
                        } else {
                            document.getElementById("infoupdate").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>' + reponse.messages + '</strong></div>';
                        }
                    } else {
                        document.getElementById("infoupdate").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite ' + response.status + ' </strong></div>';
                    }
                } catch (error) {
                    document.getElementById("infoupdate").innerHTML = error;
                }
            }
        }

        async function getdelete(data){
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code_u').value = data;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("code_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DLBGT')); ?>",
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
                                        window.location.href = "<?php echo e(route('GLBGT')); ?>";
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/projet/list.blade.php ENDPATH**/ ?>
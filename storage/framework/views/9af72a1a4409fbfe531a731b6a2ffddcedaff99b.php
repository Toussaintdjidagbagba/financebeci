

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
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Mois</th>
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
                                    </tr>
                                    </thead>
                                </table>
                            </div> 
                            
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Plan de trésorerie Général
                            
                            <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> note_add </i> </button>
                            <button type="button" title="Importer" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#imp"><i class="material-icons"> cloud_upload </i> </butt0on>
                            <button type="button" title="Exporter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#exp"><i class="material-icons">picture_as_pdf</i> </butt0on>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Année</th>
                                        <th data-priority="1">Ligne budgétaire</th>
                                        <th data-priority="1">Sous compte</th>
                                        <th data-priority="1">Mois</th>
                                        <th data-priority="1">Solde début</th>
                                        <th data-priority="1">Montant</th>
                                        <th data-priority="1">Type</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->annee); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire)); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte)); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->mois); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->soldedebut, 0, '.', ' ')); ?></td> 
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->montant, 0, '.', ' ')); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"> <?php echo e($serv->type); ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e(App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire)); ?>', '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                     <i class="material-icons">system_update_alt</i> 
                                                </button>
                                                <?php endif; ?>

                                                <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                <button onclick="getdelete(<?php echo e($serv); ?>, '<?php echo e(App\Providers\InterfaceServiceProvider::LibLigneBudgetaire($serv->lignebudgetaire)); ?>', '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte)); ?>')"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                </button>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8"><center>Pas d'information enregistrer dans le plan de trésorerie général!!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrement : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="typeptg">Type : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="typeptg" name="typeptg" onchange="seechangeptg()" class="form-control" placeholder="">
                                    <option>ENCAISSEMENT</option>
                                    <option>DECAISSEMENT</option>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="an">Année : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="1900" max="2099" step="1" id="an" name="an" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="mois">Mois : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="month" id="mois" name="mois" min="2023-12" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6" id="enclg">
                            <label for="lb">Ligne budgétaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="lb" name="lb" class="form-control" placeholder="">
                                    <option value="">Sélectionner une ligne budgétaire</option>
                                    <?php 
                                        $lbs = App\Providers\InterfaceServiceProvider::alllignebudgetaire();
                                    ?> 
                                    <?php $__currentLoopData = $lbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6" id="decsc" style="display: none;">
                            <label for="sc">Sous compte : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="sc" name="sc" class="form-control" placeholder="">
                                    <option value="">Sélectionner un sous compte</option>
                                    <?php 
                                        $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                    ?> 
                                    <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="controledirect">
                        <div class="col-md-6">
                            <label for="soldedb">Solde début : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="0" id="soldedb" name="soldedb" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="montant">Montant : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="0" id="montant" name="montant" class="form-control" placeholder="">
                            </div>
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
                <h4 class="modal-title" id="myModalLabel">Modification : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="typeptg_u">Type : </label> 
                           <div class="form-group">
                            <div class="form-line" id="seetypeptg_u">
                                <select type="text" id="typeptg_u" name="typeptg_u" onchange="seechangeptg()" class="form-control" placeholder="">
                                    <option>ENCAISSEMENT</option>
                                    <option>DECAISSEMENT</option>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="an_u">Année : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="1900" max="2099" step="1" id="an_u" name="an_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="mois_u">Mois : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="month" id="mois_u" name="mois_u" min="2023-12" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6" id="enclg_u">
                            <label for="lb_u">Ligne budgétaire : </label> 
                           <div class="form-group">
                            <div class="form-line" id="seelb_u">
                                <select type="text" id="lb_u" name="lb_u" class="form-control" placeholder="">
                                    <option value="">Sélectionner une ligne budgétaire</option>
                                    <?php 
                                        $lbs = App\Providers\InterfaceServiceProvider::alllignebudgetaire();
                                    ?> 
                                    <?php $__currentLoopData = $lbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6" id="decsc_u">
                            <label for="sc_u">Sous compte : </label> 
                           <div class="form-group">
                            <div class="form-line" id="seesc_u">
                                <select type="text" id="sc_u" name="sc_u" class="form-control" placeholder="">
                                    <option value="">Sélectionner un sous compte</option>
                                    <?php 
                                        $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                    ?> 
                                    <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="controledirect">
                        <div class="col-md-6">
                            <label for="soldedb_u">Solde début : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="0" id="soldedb_u" name="soldedb_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="montant_u">Montant : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="0" id="montant_u" name="montant_u" class="form-control" placeholder="">
                            </div>
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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Suppression : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    
                    <div class="row clearfix">
                        <input type="hidden" id="id_d" name="id_d" class="form-control" placeholder="">
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

<div class="modal fade" id="imp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Importer : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="data">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="data" name="data" class="form-control" placeholder="">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-12">
                                <label for="dlesc">Télécharger le fichier exemplaire :</label>
                               <div class="form-group">
                                <br>
                                    <a href="public/Exemplaire_plan_tresorerie.xlsx"> Exemplaire_Plan_Trésorerie.xlsx </a>
                                
                               </div>
                            </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button id="modif" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        function seechangeptg() {
            typeptg = document.getElementById("typeptg").value;

            if(typeptg == "DECAISSEMENT")
            {
                document.getElementById('decsc').style.display = "block";
                document.getElementById('enclg').style.display = "none";
            }else{
                document.getElementById('enclg').style.display = "block";
                document.getElementById('decsc').style.display = "none";
            }
        }

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                typeptg = document.getElementById("typeptg").value;
                an = document.getElementById("an").value;
                sc = document.getElementById("sc").value;
                lb = document.getElementById("lb").value;
                mois = document.getElementById("mois").value;
                soldedb = document.getElementById("soldedb").value; 
                montant = document.getElementById("montant").value;                 
            
                if((token == "" || typeptg == "" || an == "")) {
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(typeptg == "")
                        error += ". Le champ Type ne peut pas être vide <br>";
                    if(an == "")
                        error += ". Le champ Année ne peut pas être vide <br>";

                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, ptgtypeptg: typeptg, ptgan: an, ptgsc: sc, pfglb: lb, ptgmois: mois, ptgsoldedb: soldedb, ptgmontant: montant,
                    };

                    if(typeptg == "DECAISSEMENT" && sc == "")
                    {
                        document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> Veuillez sélectionner le sous compte avant de continuer. </div>";
                    }else{
                        if(typeptg == "ENCAISSEMENT" && lb == "")
                        {
                            document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> Veuillez sélectionner la ligne budgétaire avant de continuer. </div>";
                        }else{

                            document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                            // En cours d'envoie
                            try {
                                let response = await fetch("<?php echo e(route('APVS')); ?>",
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
                                        document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
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
                }
        }

        async function getupdate(data, ligne, sc){
            if(data.type == "ENCAISSEMENT"){
                document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de l'encaissement de la ligne budgétaire <i style='color:#0F056B'> "+ligne+"</i> ?";
                document.getElementById('enclg_u').style.display = "block";
                document.getElementById('decsc_u').style.display = "none";
            }
            if(data.type == "DECAISSEMENT"){
                document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations du décaissement du sous compte <i style='color:#0F056B'> "+sc+"</i> ?";
                document.getElementById('decsc_u').style.display = "block";
                document.getElementById('enclg_u').style.display = "none";
            }
            document.getElementById('seetypeptg_u').innerHTML = '<select type="text" id="typeptg_u" name="typeptg_u" onchange="seechangeptg()" class="form-control" placeholder=""> <option>'+data.type+'</option> <option>ENCAISSEMENT</option><option>DECAISSEMENT</option></select>';
            document.getElementById('an_u').value = data.annee;
            document.getElementById('mois_u').value = data.mois;
            document.getElementById('seelb_u').innerHTML = '<select type="text" id="lb_u" name="lb_u" class="form-control" placeholder=""> <option value="'+data.lignebudgetaire+'">'+ligne+' </option> <option value="">Sélectionner une ligne budgétaire</option><?php $lbs = App\Providers\InterfaceServiceProvider::alllignebudgetaire();?> <?php $__currentLoopData = $lbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($lb->id); ?>"><?php echo e($lb->description); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>';
            document.getElementById('seesc_u').innerHTML = '<select type="text" id="sc_u" name="sc_u" class="form-control" placeholder=""> <option value="'+data.souscompte+'"> '+sc+' </option> <option value="">Sélectionner un sous compte</option> <?php $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes(); ?> <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>';
            document.getElementById('soldedb_u').value = data.soldedebut;
            document.getElementById('montant_u').value = data.montant;
        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                typeptg = document.getElementById("typeptg_u").value;
                an = document.getElementById("an_u").value;
                sc = document.getElementById("sc_u").value;
                lb = document.getElementById("lb_u").value;
                mois = document.getElementById("mois_u").value;
                soldedb = document.getElementById("soldedb_u").value; 
                montant = document.getElementById("montant_u").value;                 
            
                if((token == "" || typeptg == "" || an == "")) {
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(typeptg == "")
                        error += ". Le champ Type ne peut pas être vide <br>";
                    if(an == "")
                        error += ". Le champ Année ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, ptgtypeptg: typeptg, ptgan: an, ptgsc: sc, pfglb: lb, ptgmois: mois, ptgsoldedb: soldedb, ptgmontant: montant,
                    };

                    if(typeptg == "DECAISSEMENT" && sc == "")
                    {
                        document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> Veuillez sélectionner le sous compte avant de continuer. </div>";
                    }else{
                        if(typeptg == "ENCAISSEMENT" && lb == "")
                        {
                            document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> Veuillez sélectionner la ligne budgétaire avant de continuer. </div>";
                        }else{

                            document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                            // En cours d'envoie
                            try {
                                let response = await fetch("<?php echo e(route('APVS')); ?>",
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
                }
        }

        async function getdelete(data, ligne, sc){
            if(data.type == "ENCAISSEMENT")
                document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de l'encaissement de la ligne budgétaire <i style='color:#0F056B'> "+ligne+"</i> ?";
            if(data.type == "DECAISSEMENT")
                document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations du décaissement du sous compte <i style='color:#0F056B'> "+sc+"</i> ?";
            document.getElementById('id_d').value = data.id;
        }

        async function validedelete(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("id_d").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DPVS')); ?>",
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/prevision/list.blade.php ENDPATH**/ ?>
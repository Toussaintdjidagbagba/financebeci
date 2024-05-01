<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Liste des Unités
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Unités
                                <div class="row pull-right m-r-8" style="display: flex; justify-content: space-between;">
                                    <div class="col-3">
                                        <button type="button" title="Ajouter" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#addUnite"><i class="material-icons"> note_add </i> </button>
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
                                        <th data-priority="1">Unités</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($unite->id); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($unite->libelle); ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                    <button onclick="getupdate(<?php echo e($unite); ?>)" type="button" title="Modifier" data-toggle="modal" data-target="#updateUnite" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                        <i class="material-icons">system_update_alt</i> 
                                                    </button>
                                                <?php endif; ?>

                                                <?php if(in_array("delete_service", session("auto_action"))): ?>
                                                    <button onclick="getdelete(<?php echo e($unite); ?>)" type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><i class="material-icons">delete_sweep</i> 
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8"><center>Pas d'information enregistrer dans la liste des Unités!!!</center> </td>
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

    <div class="modal fade" id="addUnite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                            <div class="col-md-12">
                                <label for="unitelibelle">Unite : </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="unitelibelle" name="unitelibelle" class="form-control" placeholder="">
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

<div class="modal fade" id="updateUnite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modification : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <input type="hidden" id="updatehidden" name="updatehidden" value="UPDATES" />
                    <input type="hidden" id="id_unite" name="id_unite" value="" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="uniteUpdate">Unite : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="uniteUpdate" name="uniteUpdate" class="form-control" placeholder="">
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
                                    <a href="Exemplaire_plan_tresorerie.xlsx"> Exemplaire_Plan_Trésorerie.xlsx </a>
                                
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

        async function validelb(){
            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            unitelibelle = document.getElementById("unitelibelle").value;           
        
            if((token == "" || unitelibelle == "")) {
                error = "";
                if(token == "")
                    error += ". Veuillez vous reconnecter pour continuer <br>";
                if(unitelibelle == "")
                    error += ". Le champ Libelle ne peut pas être vide <br>";

                document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
            }else{
                // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                dat = {
                    _token: token, unite: unitelibelle
                };
                // En cours d'envoie
                try {
                    let response = await fetch("<?php echo e(route('SAUTE')); ?>",
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
                            setTimeout(function(){
                                window.location.href = "<?php echo e(route('GLUTE')); ?>";
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

        async function getupdate(data){
            if(data.id != null){
                document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de l'unité ?";
                document.getElementById('uniteUpdate').value = data.libelle;
                document.getElementById('id_unite').value = data.id;
            }
        }

        async function valideupdate(){
            // récupération des données du formulaire 
            token = document.getElementById("_token").value;
            updateUnite = document.getElementById("uniteUpdate").value;     
            updatehidden = document.getElementById("updatehidden").value; 
            id = document.getElementById('id_unite').value;   
        
            if((token == "" || updateUnite == ""|| updatehidden == "")) {
                error = "";
                if(token == "")
                    error += ". Veuillez vous reconnecter pour continuer <br>";
                if(updateUnite == "")
                    error += ". Le champ Unité ne peut pas être vide <br>";
                if(updatehidden == "")
                    error += ". Le champ de Mise à jours caché ne peut pas être vide <br>";

                document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
            }else{
                // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                dat = {
                    id: id, _token: token, unite: updateUnite, update: updatehidden
                };
                
                document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
        
                // En cours d'envoie
                try {
                    let response = await fetch("<?php echo e(route('SAUTE')); ?>",
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
                                window.location.href = "<?php echo e(route('GLUTE')); ?>";
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

        async function getdelete(data){
            if(data.id != null)
                document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de l'unité  ?";
            document.getElementById('id_d').value = data.id;
        }

        async function validedelete(){
            token = document.getElementById("_token").value;
            iddelete = document.getElementById("id_d").value;
                
            dat = {_token: token, id: iddelete,};

            document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
            
            // En cours d'envoie
            try {
                let response = await fetch("<?php echo e(route('DLUTE')); ?>",
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
                        window.location.href = "<?php echo e(route('GLUTE')); ?>";
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/unite/listunite.blade.php ENDPATH**/ ?>
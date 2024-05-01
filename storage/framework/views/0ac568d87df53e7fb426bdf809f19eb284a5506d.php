

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Paramètres
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Liste des dépenses
                            
                            <button type="button" title="Ajouter" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add"><i class="material-icons"> note_add </i> </button>
                            <button type="button" title="Importer" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#imp"><i class="material-icons"> cloud_upload </i> </butt0on>
                            <a href="<?php echo e(route('GELB')); ?>">  <button type="button" title="Exporter"  style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#exp"><i class="material-icons">picture_as_pdf</i> </butt0on></a>
                            </h2>
                        </div>
                        <div class="body"> 
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Code</th>
                                        <th data-priority="1">Description</th>
                                        <!--th data-priority="1">Sous compte syscoahada</th-->
                                        <th data-priority="1">Commentaire</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->code); ?></td>
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->description); ?></td>
                                            <!--td style="vertical-align:middle; text-align: center;"><?php echo e(number_format($serv->comptesyscoahada, 0, '.', ' ')); ?></td--> 
                                            <td style="vertical-align:middle; text-align: center;"><?php echo e($serv->commentaire); ?></td>
                                            <td style="vertical-align:middle; text-align: center;">
                                                <?php if(in_array("update_service", session("auto_action"))): ?>
                                                <button onclick="getupdate(<?php echo e($serv); ?>, '<?php echo e(App\Providers\InterfaceServiceProvider::LibSouscompte($serv->souscompte)); ?>')" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
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
                                            <td colspan="4"><center>Pas de ligne budgétaire préalablement enregistrer!!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrer une ligne : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoadd"></label>
                    <div class="row clearfix">
                        
                        <div class="col-md-6">
                            <label for="code">Code ( <i style="color: red;">*</i> ) : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="code" name="code" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dlesc">Description ( <i style="color: red;">*</i> ) :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="dlesc" name="dlesc" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="comptesys">Compte SysHoada : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="comptesys" name="comptesys" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="commentaire">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire" name="commentaire" class="form-control" placeholder="">
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
                <h4 class="modal-title" id="myModalLabel">Modifier une ligne : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <label id="infoupdate"></label>
                    <div class="row clearfix">
                        
                        <div class="col-md-6">
                            <label for="code_u">Code ( <i style="color: red;">*</i> ) : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" id="code_u" name="code_u" class="form-control" placeholder="">
                                <input type="text" id="seecode_u" name="code_u" disabled class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dlesc_u">Description ( <i style="color: red;">*</i> ) :</label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="dlesc_u" name="dlesc_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="comptesys_u">Compte SysHoada : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="comptesys_u" name="comptesys_u" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="commentaire_u">Commentaire : </label> 
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="commentaire_u" name="commentaire_u" class="form-control" placeholder="">
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
                <h4 class="modal-title" id="myModalLabel">Suppression d'une ligne : </h4>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    
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

<div class="modal fade" id="imp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Importer : </h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('SIELBD')); ?>"  enctype="multipart/form-data">
                    <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="data">Télécharger les données : </label> 
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="data" name="data" class="form-control" placeholder="">
                                </div>
                               </div>
                        </div>
                        <!--div class="col-md-6">
                            <label for="isc">Sous-compte : </label> 
                            <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="isc" name="isc" class="form-control" placeholder="">
                                        <?php 
                                            $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                        ?> 
                                        <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div-->
                        <div class="col-md-6">
                            <label for="dlesc">Télécharger le fichier exemplaire :</label>
                               <div class="form-group">
                                <br>
                                <a href="public/Exemplaire_Nature_Depense.xlsx"> Exemplaire_Nature_Depense.xlsx </a>
                            
                               </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="submit" class="btn bg-deep-orange waves-effect">IMPORTER</button>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">

        async function validelb(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                code = document.getElementById("code").value;
                dlesc = document.getElementById("dlesc").value;
                comptesys = document.getElementById("comptesys").value;
                commentaire = document.getElementById("commentaire").value;
                
            
                if(token == "" || code == "" || dlesc == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(code == "")
                        error += ". Le champ Code ne peut pas être vide <br>";
                    if(dlesc == "")
                        error += ". Le champ Description ne peut pas être vide <br>";
                    
                    document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, lbcode: code, lbdlesc: dlesc, lbcomptesys: comptesys, lbcommentaire: commentaire,
                    };

                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('ALBGT')); ?>",
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
                                    //getlistAntecedent();
                                    setTimeout(function(){
                                        window.location.href = "<?php echo e(route('GLBGT')); ?>";
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

        async function getupdate(data, name){
            document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code_u').value = data.code;
            document.getElementById('seecode_u').value = data.code; 
            document.getElementById('dlesc_u').value = data.description;
            document.getElementById('comptesys_u').value = data.comptesyscoahada;
            document.getElementById('commentaire_u').value = data.commentaire;
            //document.getElementById('see_u').innerHTML = '<select type="text" id="sc_u" name="sc_u" class="form-control" placeholder=""> <option value="'+data.souscompte+'">'+name+'</option> <?php $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes(); ?> <?php $__currentLoopData = $comptes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($sc->id); ?>"><?php echo e($sc->compte); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>'; 
        }

        async function valideupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                code = document.getElementById("code_u").value;
                dlesc = document.getElementById("dlesc_u").value;
                comptesys = document.getElementById("comptesys_u").value;
                commentaire = document.getElementById("commentaire_u").value;
                
            
                if(token == "" || code == "" || dlesc == "" ){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(code == "")
                        error += ". Le champ Code ne peut pas être vide <br>";
                    if(dlesc == "")
                        error += ". Le champ Description ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    // lb pour ligne budgetaire suivi du libellé des données en empaquetage 
                    dat = {
                        _token: token, lbcode: code, lbdlesc: dlesc, lbcomptesys: comptesys, lbcommentaire: commentaire,
                    };

                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('ALBGT')); ?>",
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
                                        window.location.href = "<?php echo e(route('GLBGT')); ?>";
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
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'> "+data.description+"</i> ?";
            document.getElementById('code_d').value = data.code;
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
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/naturedepense/list.blade.php ENDPATH**/ ?>
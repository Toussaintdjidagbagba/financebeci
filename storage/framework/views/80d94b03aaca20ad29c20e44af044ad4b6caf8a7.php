

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <h2>
                    Types prestation
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card"> 
                        <div class="header">
                            <h2>
                                Listes des types de prestation
                            
                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Ajouter</button>
                       		</h2>
                        </div>
                        <div class="body">
                        	<div class="table-responsive" data-pattern="priority-columns">
								<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th data-priority="1">Libelle</th>
										<th data-priority="6">Actions</th>
									</tr>
									</thead>
									<tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listpresta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <th><span class="co-name"><?php echo e($listpresta->id); ?></span></th>
                                            <td><?php echo e($listpresta->libelle); ?></td>
                                            

                                            <td>
                                            <?php if(in_array("update_role", session("auto_action"))): ?>
                                            <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                <a href="<?php echo e(url('modif-roles-')); ?><?php echo e($listpresta->idRole); ?>" style="color:white;"> <i class="material-icons">system_update_alt</i></a> 
                                                
                                            </button>
                                            <?php endif; ?>

                                            <?php if(in_array("delete_role", session("auto_action"))): ?>
                                            <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('delete-prestation-')); ?><?php echo e($listpresta->id); ?>" style="color:white;"><i class="material-icons">delete_sweep</i></a> </button>
                                            <?php endif; ?>

                                            <?php if(in_array("menu_role", session("auto_action"))): ?>
                                            <button type="button" title="Menu"  class="btn btn-warning btn-circle btn-xs  margin-bottom-10 waves-effect waves-light"><a href="<?php echo e(url('menu-roles-')); ?><?php echo e($listpresta->id); ?>" style="color:white;"> <i class="material-icons green-color">menu_book</i></a></button>
                                            <?php endif; ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="7"><center>Pas de type de prestation enregistrer!!!</center> </td>
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
                <div id="infoadd"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enregistrer un type de prestation :</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>" /> <!-- Corrected the name attribute and added an id attribute -->
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label for="lib">Libellé</label> <!-- Corrected the id attribute -->
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="lib" name="lib" class="form-control" placeholder=""> <!-- Corrected the id attribute -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                <button type="button" onclick="addTypeprestation()" id="addTypeprestation" class="btn bg-deep-orange waves-effect">AJOUTER</button> <!-- Changed type="submit" to type="button" -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    async function addTypeprestation() { 
        // récupération des données du formulaire 
         token = document.getElementById("_token").value; 
         libelle = document.getElementById("lib").value;
        
        if (token === "" || libelle === "") {
            error = "";
            if (token === "")
                error += "Veuillez vous reconnecter pour continuer <br>";
            if (libelle === "")
                error += "Le champ libellé ne peut pas être vide <br>";

            document.getElementById('infoadd').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
        } else {
            // tp pour titre projet suivi du libellé des données en empaquetage 
            dat = {
                _token: token,
                libelle: libelle,
            };

            document.getElementById("infoadd").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement..<br>Veuillez patienter!</strong></div>';

            // En cours d'envoi
            try {
                let response = await fetch("<?php echo e(route('AP')); ?>", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(dat)
                });

                console.log(response); // Affiche la réponse complète

                // Extrait les données JSON de la réponse
                const responseData = await response.json();
                console.log(responseData);

                if (response.status == 200) {
                    if (responseData.status == 0) {
                        document.getElementById("infoadd").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>' + responseData.messages + '</strong></div>';
                        setTimeout(function() {
                            window.location.href = "<?php echo e(route('GTP')); ?>";
                        }, 3000);
                    } else {
                        document.getElementById("infoadd").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>' + responseData.messages + '</strong></div>';
                    }
                } else {
                    document.getElementById("infoadd").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite ' + response.status + ' </strong></div>';
                }
            }
            catch (error) {
                document.getElementById("infoadd").innerHTML = error;
            }
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/typesprestation/listtypesprestation.blade.php ENDPATH**/ ?>
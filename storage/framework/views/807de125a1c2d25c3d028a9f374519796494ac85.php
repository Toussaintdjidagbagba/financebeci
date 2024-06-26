

<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Expression du besoin
                    <small></small>
                </h2>
            </div>

            <div class="row clearfix">

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Validations
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Date</th>
                                        <th data-priority="1">Niveau</th>
                                        <th data-priority="1">Nom et Prénoms</th>
                                        <th data-priority="1">Service</th>
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $listValidate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $besoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr <?php if($besoin->urgence == "CRITIQUE"): ?>
                                            style="background-color: #FFF0F5;"
                                        <?php endif; ?> >
                                            <td>
                                                <?php echo e($besoin->dateemission); ?>

                                            </td>
                                            <td>
                                                <?php echo e($besoin->urgence); ?>

                                            </td>
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($besoin->user)); ?>

                                            </td>
                                            
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::UserService($besoin->user)); ?>

                                            </td>
                                            <td>
                                                <button type="button" title="Supprimer"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(url('validatebesoin-')); ?><?php echo e($besoin->id); ?>" style="color:white;">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5"><center>Vous n'avez pas encore d'expression du besoin à valider !!!</center> </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
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
                                Mes Besoins

                            <button type="button" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#add">Nouvelles Demandes</button>
                            
                            
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Date</th>
                                        <th data-priority="1">Niveau</th>
                                        <th data-priority="1">Nom et Prénoms</th>
                                        
                                        <th data-priority="1">Service</th>
                                        
                                        
                                        <th data-priority="6">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $besoin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <?php echo e($besoin->dateemission); ?>

                                            </td>
                                            <td>
                                                <?php echo e($besoin->urgence); ?>

                                            </td>
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::LibelleUser($besoin->user)); ?>

                                            </td>
                                            
                                            <td>
                                                <?php echo e(App\Providers\InterfaceServiceProvider::UserService($besoin->user)); ?>

                                            </td>
                                            <td>
                                                <button type="button" title="Supprimer"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(url('viewbesoin-')); ?><?php echo e($besoin->id); ?>" style="color:white;">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                </button>

                                                <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(url('modifierbesoin-')); ?><?php echo e($besoin->id); ?>" style="color:white;">
                                                        <i class="material-icons">system_update_alt</i>
                                                    </a>
                                                </button>

                                                <button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                    <a href="<?php echo e(url('supprimerbesoin-')); ?><?php echo e($besoin->id); ?>" style="color:white;">
                                                        <i class="material-icons">delete_sweep</i>
                                                    </a>
                                                </button>

                                                

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="5"><center>Vous n'avez pas encore exprimé un besoin !!!</center> </td>
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
                <h4 class="modal-title" id="myModalLabel">Enregistrer une expression de besoins : </h4>
            </div>
            <form method="post" action="<?php echo e(route('ajouterbesoin')); ?>">
            <div class="modal-body">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                    <!-- Champ caché pour stocker les données du tableau -->
                    <input type="hidden" name="tableauDonnees" id="tableauDonneesJSON">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="date">Date d'émission : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="date" name="date" class="form-control" placeholder="">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="demandeur">Demandeur : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="demandeur" name="demandeur" class="form-control" placeholder="">
                                    <?php
                                        $users = App\Providers\InterfaceServiceProvider::allutilisateurspersonnel();
                                    ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->idUser); ?>"><?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                        
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="struc">Niveau d'Urgence : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="urgence" name="urgence" onchange="seedirection()" class="form-control" placeholder="">
                                    <option>MODERE</option>
                                    <option>CRITIQUE</option>
                                    <option>ELEVE</option>
                                    <option>FAIBLE</option>
                                </select>
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="chef">Chef : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <select type="text" id="chef" name="chef" class="form-control" placeholder="">
                                    <?php
                                        $userschef = App\Providers\InterfaceServiceProvider::UtilisateurChef();
                                    ?>
                                    <?php $__currentLoopData = $userschef; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->idUser); ?>"><?php echo e($user->nom); ?> <?php echo e($user->prenom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="date">Libéllé : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="libelle" class="form-control" placeholder="Libellé">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="date">Quantité : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="quantite" class="form-control" placeholder="Quantité">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="date">Montant : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="montant" class="form-control" placeholder="Montant">
                            </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                            <label for="date">Motif : </label>
                           <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" id="motif" placeholder="Motif">
                            </div>
                           </div>
                        </div>
                        <button type="button" class="btn btn-bg bg-deep-orange waves-effect" onclick="ajouterDonnees()">Ajouter au tableau</button>
                    </div>
                    <div class="row clearfix">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="tableauDonnees" class="table table-middle-font table-bordered table-striped">
                                <tr>
                                    <th>Numéro</th> <!-- Colonne ajoutée pour le numéro d'ordre -->
                                    <th>Libellé</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    <th>Motif</th>
                                    <th>Action</th> <!-- Colonne ajoutée pour les actions (supprimer) -->
                                </tr>
                            </table>
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

    <script type="text/javascript">
        let donneesJson = []; // Assurez-vous que cet objet est accessible là où il est nécessaire

        function ajouterDonnees() {
            let libelle = document.getElementById("libelle").value.trim();
            let quantite = document.getElementById("quantite").value.trim();
            let montant = document.getElementById("montant").value.trim();
            let motif = document.getElementById("motif").value.trim();

            // Vérification que tous les champs sont remplis
            if (!libelle || !quantite || !montant || !motif) {
                alert("Veuillez remplir tous les champs.");
                return; // Sortie anticipée de la fonction si l'un des champs est vide
            }

            // let libelle = document.getElementById("libelle").value;
            // let quantite = document.getElementById("quantite").value;
            // let montant = document.getElementById("montant").value;
            // let motif = document.getElementById("motif").value;

            // Création de l'objet de données avec un identifiant unique
            let donnee = {
                id: Date.now(), // Utilisation du timestamp comme identifiant unique
                libelle: libelle,
                quantite: quantite,
                montant: montant,
                motif: motif
            };

            donneesJson.push(donnee); // Ajout à l'objet JavaScript

            let tableau = document.getElementById("tableauDonnees");
            let nouvelleLigne = tableau.insertRow(-1); // Ajoute une ligne à la fin du tableau
            nouvelleLigne.setAttribute('data-id', donnee.id); // Stocke l'identifiant unique dans l'attribut de la ligne

            // Ajout du numéro d'ordre et des autres données
            nouvelleLigne.insertCell(0).innerHTML = tableau.rows.length - 1; // La numérotation commence à 1 et exclut l'entête
            nouvelleLigne.insertCell(1).innerHTML = libelle;
            nouvelleLigne.insertCell(2).innerHTML = quantite;
            nouvelleLigne.insertCell(3).innerHTML = montant;
            nouvelleLigne.insertCell(4).innerHTML = motif;

            // Ajout d'un bouton de suppression
            let cellAction = nouvelleLigne.insertCell(5);
            let btnSupprimer = document.createElement("button");
            btnSupprimer.innerHTML = "Supprimer"//"<i class="material-icons">delete_sweep</i>";
            // btnSupprimer.setAttribute(class,"btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light")
            btnSupprimer.onclick = function() {
                let tr = this.closest("tr");
                let id = tr.getAttribute('data-id'); // Récupère l'identifiant unique

                // Suppression de l'élément de l'objet JavaScript
                donneesJson = donneesJson.filter(d => d.id.toString() !== id);

                // Suppression de la ligne du tableau
                tr.remove();

                // Mise à jour de la numérotation
                let toutesLesLignes = tableau.getElementsByTagName("tr");
                for(let i = 1; i < toutesLesLignes.length; i++) {
                    toutesLesLignes[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                }
            };
            cellAction.appendChild(btnSupprimer);

            // Réinitialisation des champs du formulaire
            document.getElementById("libelle").value = '';
            document.getElementById("quantite").value = '';
            document.getElementById("montant").value = '';
            document.getElementById("motif").value = '';
            // alert(donneesJson)
            // Mettre à jour le champ caché avec les données du tableau
            document.getElementById("tableauDonneesJSON").value = JSON.stringify(donneesJson);
        }


        function seedirection() {
            structure = document.getElementById("struc").value;

            if(structure == "SERVICE")
            {
                document.getElementById('controledirect').style.display = "block";
            }else{
                document.getElementById('controledirect').style.display = "none";
            }
        }
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
<script>
	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(6000).fadeOut(350);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\financebeci\resources\views/viewadmindste/besoin/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('css'); ?>

    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Tableau de bord
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h5>
                            <button type="button" style="margin-right: 30px; float: right; color:white; padding-right: 30px; padding-left: 30px;" 
                                class="btn bg-deep-orange waves-effect" data-toggle="modal" data-target="#add"> Ajouter
                            </button> 
                            <h6>Liste du personnel</h6>
                            </h5>
                        </div>
                        <div class="body">
                            <div>
                                <div class="table-responsive" data-pattern="priority-columns">
                                <div class="">
                                    
                                    <div class="row clearfix">
                                    <div class="col-md-4">
                                            <label for="search">Rechercher</label>
                                            <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="search" name="search" class="form-control">
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>IT</th>
                                            <th>Nom</th>
                                            <th>Prénoms</th>
                                            <th>Entreprise</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datalist" >
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <script type="text/javascript">
            async function getlist() {
                    try {
                        let response = await fetch("<?php echo e(route('GP')); ?>",
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
                                contenu += '<th> <span class="co-name">'+currentline["identificationpersonnel"]+'</span></th>';
                                contenu += '<td>'+currentline["nom"]+'</td>';
                                contenu += '<td>'+currentline["prenom"]+'</td>';
                                contenu += '<td>'+currentline["libelle"]+'</td>';
                                contenu += '<td>';
                                personnel = currentline["nom"]+' '+currentline["prenom"];
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#update" onclick="getupdatepersonnel('+currentline["id"]+', \''+personnel+'\', \''+currentline["libelle"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#deletepersonnel" onclick="getdeletepersonnel('+currentline["id"]+', \''+personnel+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?><a href="<?php echo e(route("GAP")); ?>?id='
                                +currentline["id"]+'"> <button type="button" title="Dossier médical"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" > <i class="material-icons">create_new_folder</i> </button></a> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('datalist').innerHTML = '<tr> <td colspan="6"><center> Aucun personnel enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('datalist').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }
            getlist();

            async function validepersonnel(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                entre = document.getElementById("saveentre").value;
                it = document.getElementById("saveit").value;
                sexe = document.getElementById("savesexe").value;
                nom = document.getElementById("savenom").value;
                prenom = document.getElementById("saveprenom").value;
                nationalite = document.getElementById("savenationalite").value;
                nais = document.getElementById("savenais").value;
                lieu = document.getElementById("savelieu").value;
                adresse = document.getElementById("saveadr").value;
                taille = document.getElementById("savetaille").value;
                electro = document.getElementById("saveelectro").value;
                nombreenfant = document.getElementById("savenenfant").value;
                groupesanguin = document.getElementById("savegsr").value;
                sm = document.getElementById("savesm").value;
                cnss = document.getElementById("savecnss").value;
                ecan = document.getElementById("saveecan").value;
                ecal = document.getElementById("saveecal").value;
                ecat = document.getElementById("saveecat").value;
                dateemb = document.getElementById("savedemb").value;
                datedepart = document.getElementById("saveddentr").value;
                motifdepart = document.getElementById("savemotifdpt").value;
                qualif = document.getElementById("savequalif").value;
                

                if(token == "" || entre == 0 || it == "" || sexe == "" || nom == "" || prenom == "" || nationalite == "" || nais == "" || lieu == "" || adresse == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(entre == 0)
                        error += ". Le champ Entreprise ne peut pas être vide <br>";
                    if(it == "")
                        error += ". Le champ Identification du Travailleur ne peut pas être vide <br>";
                    if(sexe == "")
                        error += ". Le champ Sexe ne peut pas être vide <br>";
                    if(nom == "")
                        error += ". Le champ Nom ne peut pas être vide <br>";
                    if(prenom == "")
                        error += ". Le champ Prénom ne peut pas être vide <br>";
                    if(nationalite == "")
                        error += ". Le champ Nationalité ne peut pas être vide <br>";
                    if(nais == "")
                        error += ". Le champ Date de naissance ne peut pas être vide <br>";
                    if(lieu == "")
                        error += ". Le champ Lieu ne peut pas être vide <br>";
                    if(adresse == "")
                        error += ". Le champ Adresse ne peut pas être vide <br>";

                    document.getElementById('infosaveentre').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, entre: entre, it: it, sexe: sexe, nom: nom, prenom: prenom, nationalite: nationalite, nais: nais, lieu: lieu, adresse: adresse, taille: taille,  electro: electro,  nombreenfant: nombreenfant,  groupesanguin: groupesanguin,  sm: sm,  cnss: cnss, ecan: ecan, ecal: ecal, ecat: ecat, dateemb: dateemb, datedepart: datedepart,motifdepart: motifdepart,qualif: qualif,
                    };

                    document.getElementById("infosaveentre").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
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
                                    document.getElementById("infosaveentre").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    setTimeout(function(){
                                        window.location.href = "<?php echo e(route('dashboard')); ?>";
                                    }, 3000);
                                }else{
                                    document.getElementById("infosaveentre").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infosaveentre").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infosaveentre").innerHTML = error;
                        } 
                }
            }

            async function getdeletepersonnel(id, nom){
                document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer "+nom+" ?";
                document.getElementById('iddelete').value = id;
            }

            async function setdeletepersonnel(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddelete").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DP')); ?>",
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
                                               window.location.reload();
                                        }, 3000);
                            }
                            else{
                                document.getElementById("infodelete").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodelete").innerHTML = error;
                        } 
            }

            async function getupdatepersonnel(id, nom, entreprise){
                document.getElementById('infoupdate').innerHTML = "Vous voulez vraiment modifier les informations de "+nom+" ?";
                document.getElementById('idupdate').value = id;

                try {
                        let response = await fetch("<?php echo e(route('GUP')); ?>?id="+id,
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
                            document.getElementById('seeentreprise').innerHTML = '<select type="text" class="form-control"> <option>'+entreprise+'</option> </select>';
                            document.getElementById('updateit').value = list.identificationpersonnel;
                            document.getElementById("seesexe").innerHTML = '<select type="text" id="updatesexe" name="updatesexe" class="form-control" required><option>'+list.sexe+'</option><option>MASCULIN</option><option>FEMININ</option></select>';
                            document.getElementById("updatenom").value = list.nom;
                            document.getElementById("updateprenom").value = list.prenom;
                            document.getElementById("updatenationalite").value = list.nationalite;
                            document.getElementById("updatenais").value = list.naissance;
                            document.getElementById("updatelieu").value = list.lieu;
                            document.getElementById("updateadr").value = list.adresse; 
                            document.getElementById("seeetrop").innerHTML = '<select type="text" id="updateelectro" name="updateelectro" class="form-control"><option>'+list.electrophorese+'</option><option>AA</option><option>AS</option><option>SS</option><option>AC</option></select>';
                            document.getElementById("updatetaille").value = list.taille;
                            document.getElementById("updatenenfant").value = list.nombreenfant; 
                            document.getElementById("seegsr").innerHTML = '<select type="text" id="updategsr" name="updategsr" class="form-control"><option>'+list.groupesanguin+'</option><option>AB+</option><option>AB-</option><option>A+</option><option>A-</option><option>B+</option><option>B-</option><option>O+</option><option>O-</option></select>';  
                            document.getElementById("updatequalif").value = list.qualification;
                            document.getElementById("updatemotifdpt").value = list.motifdepart;
                            document.getElementById("updateddentr").value = list.datedepart;
                            document.getElementById("updatedemb").value = list.dateembauche;
                            document.getElementById("updateecat").value = list.eca_tel;
                            document.getElementById("updateecal").value = list.eca_lieu;
                            document.getElementById("updatecnss").value = list.cnss;
                            document.getElementById("updatesm").value = list.situationmatrimoniale;
                            document.getElementById("updateecan").value = list.eca_nom;
                        }
                        else{
                            return "";
                        }
                } catch (error) {
                    return "";
                }
            }

            async function valideupdatepersonnel(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                id = document.getElementById("idupdate").value;
                it = document.getElementById("updateit").value;
                sexe = document.getElementById("updatesexe").value;
                nom = document.getElementById("updatenom").value;
                prenom = document.getElementById("updateprenom").value;
                nationalite = document.getElementById("updatenationalite").value;
                nais = document.getElementById("updatenais").value;
                lieu = document.getElementById("updatelieu").value;
                adresse = document.getElementById("updateadr").value;
                taille = document.getElementById("updatetaille").value;
                electro = document.getElementById("updateelectro").value;
                nombreenfant = document.getElementById("updatenenfant").value;
                groupesanguin = document.getElementById("updategsr").value;
                sm = document.getElementById("updatesm").value;
                cnss = document.getElementById("updatecnss").value;
                ecan = document.getElementById("updateecan").value;
                ecal = document.getElementById("updateecal").value;
                ecat = document.getElementById("updateecat").value;
                dateemb = document.getElementById("updatedemb").value;
                datedepart = document.getElementById("updateddentr").value;
                motifdepart = document.getElementById("updatemotifdpt").value;
                qualif = document.getElementById("updatequalif").value;
                

                if(token == "" || it == "" || sexe == "" || nom == "" || prenom == "" || nationalite == "" || nais == "" || lieu == "" || adresse == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(it == "")
                        error += ". Le champ Identification du Travailleur ne peut pas être vide <br>";
                    if(sexe == "")
                        error += ". Le champ Sexe ne peut pas être vide <br>";
                    if(nom == "")
                        error += ". Le champ Nom ne peut pas être vide <br>";
                    if(prenom == "")
                        error += ". Le champ Prénom ne peut pas être vide <br>";
                    if(nationalite == "")
                        error += ". Le champ Nationalité ne peut pas être vide <br>";
                    if(nais == "")
                        error += ". Le champ Date de naissance ne peut pas être vide <br>";
                    if(lieu == "")
                        error += ". Le champ Lieu ne peut pas être vide <br>";
                    if(adresse == "")
                        error += ". Le champ Adresse ne peut pas être vide <br>";

                    document.getElementById('infoupdate').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, id: id, it: it, sexe: sexe, nom: nom, prenom: prenom, nationalite: nationalite, nais: nais, lieu: lieu, adresse: adresse, taille: taille,  electro: electro,  nombreenfant: nombreenfant,  groupesanguin: groupesanguin,  sm: sm,  cnss: cnss, ecan: ecan, ecal: ecal, ecat: ecat, dateemb: dateemb, datedepart: datedepart,motifdepart: motifdepart,qualif: qualif,
                    };

                    document.getElementById("infoupdate").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SUP')); ?>",
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
                                        window.location.href = "<?php echo e(route('dashboard')); ?>";
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
        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Enregistrer un personnel : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <label id="infosaveentre"></label>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="saveentre">Entreprise [*] :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <?php 
                                        $all = App\Providers\InterfaceServiceProvider::AllService();
                                    ?> 
                                    <select type="text" id="saveentre" name="saveentre" class="form-control" required>
                                        <option value="0">Sélectionner un entreprise</option>
                                        <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entreprise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($entreprise->id); ?>"> <?php echo e($entreprise->libelle); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="saveit">Identification du Travailleur (IT) [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="saveit" name="saveit" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="savesexe">Sexe [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="savesexe" name="savesexe" class="form-control" required>
                                        <option>MASCULIN</option>
                                        <option>FEMININ</option>
                                    </select>
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="savenom">Nom [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savenom" name="savenom" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="saveprenom">Prénoms [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="saveprenom" name="saveprenom" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="savenationalite">Nationalité [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savenationalite" name="savenationalite" class="form-control" required>
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="savenais">Date de naissance [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="savenais" name="savenais" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="savelieu">Lieu [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savelieu" name="savelieu" class="form-control" required>
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="saveadr">Adresse [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="saveadr" name="saveadr" class="form-control" required>
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="savetaille">Taille : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="savetaille" name="savetaille" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="saveelectro">Electrophorese de l'hémoglobine : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="saveelectro" name="saveelectro" class="form-control">
                                        <option>AA</option>
                                        <option>AS</option>
                                        <option>SS</option>
                                        <option>AC</option>
                                    </select>
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-3">
                                <label for="savenenfant">Nombre d'enfant</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="savenenfant" name="savenenfant" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="savegsr">Groupe sanguin-rhesus:</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <select type="text" id="savegsr" name="savegsr" class="form-control">
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                    </select>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="savesm">Situation matrimoniale : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savesm" name="savesm" class="form-control">
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="savecnss">Affiliation CNSS : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savecnss" name="savecnss" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="saveecan">En cas d'accident <br> Nom :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="saveecan" name="saveecan" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="saveecal">En cas d'accident <br> Lieu :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="saveecal" name="saveecal" class="form-control">
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="saveecat">En cas d'accident <br> Téléphone : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="saveecat" name="saveecat" class="form-control">
                                </div>
                               </div>
                            </div>    

                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="savedemb">Date d'embauche :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="savedemb" name="savedemb" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="saveddentr">Date de départ de l'entreprise :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="saveddentr" name="saveddentr" class="form-control">
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">    
                            <div class="col-md-6">
                                <label for="savemotifdpt">Motif de départ : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savemotifdpt" name="savemotifdpt" class="form-control">
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-6">
                                <label for="savequalif">Qualification : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="savequalif" name="savequalif" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="validepersonnel()" class="btn bg-deep-orange waves-effect">AJOUTER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletepersonnel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Suppression : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="iddelete" name="iddelete" />
                        <label id="infodelete"></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="setdeletepersonnel()" class="btn bg-deep-red waves-effect">SUPPRIMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification du personnel : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="idupdate" name="idupdate" />
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <label id="infoupdate"></label>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="updateentre">Entreprise [*] :</label>
                               <div class="form-group">
                                <div class="form-line" id="seeentreprise">
                                    
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="updateit">Identification du Travailleur (IT) [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updateit" name="updateit" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="updatesexe">Sexe [*] : </label>
                               <div class="form-group">
                                <div class="form-line" id="seesexe">
                                    
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="updatenom">Nom [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatenom" name="updatenom" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="updateprenom">Prénoms [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updateprenom" name="updateprenom" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="updatenationalite">Nationalité [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatenationalite" name="updatenationalite" class="form-control" required>
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="updatenais">Date de naissance [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="updatenais" name="updatenais" class="form-control" required>
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="updatelieu">Lieu [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatelieu" name="updatelieu" class="form-control" required>
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="updateadr">Adresse [*] : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updateadr" name="updateadr" class="form-control" required>
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-3">
                                <label for="updatetaille">Taille : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="updatetaille" name="updatetaille" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="updateelectro">Electrophorese de l'hémoglobine : </label>
                               <div class="form-group">
                                <div class="form-line" id="seeetrop">
                                    
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-3">
                                <label for="updatenenfant">Nombre d'enfant</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="updatenenfant" name="updatenenfant" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="updategsr">Groupe sanguin-rhesus:</label>
                               <div class="form-group">
                                <div class="form-line" id="seegsr">
                                    
                                </div>
                               </div>
                            </div>
                            <div class="col-md-4">
                                <label for="updatesm">Situation matrimoniale : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatesm" name="updatesm" class="form-control">
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="updatecnss">Affiliation CNSS : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatecnss" name="updatecnss" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="updateecan">En cas d'accident <br> Nom :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updateecan" name="updateecan" class="form-control">
                                </div>
                               </div>
                            </div> 
                            <div class="col-md-4">
                                <label for="updateecal">En cas d'accident <br> Lieu :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updateecal" name="updateecal" class="form-control">
                                </div>
                               </div>
                            </div>    
                            <div class="col-md-4">
                                <label for="updateecat">En cas d'accident <br> Téléphone : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="updateecat" name="updateecat" class="form-control">
                                </div>
                               </div>
                            </div>    

                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="updatedemb">Date d'embauche :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="updatedemb" name="updatedemb" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="updateddentr">Date de départ de l'entreprise :</label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="date" id="updateddentr" name="updateddentr" class="form-control">
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="row clearfix">    
                            <div class="col-md-6">
                                <label for="updatemotifdpt">Motif de départ : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatemotifdpt" name="updatemotifdpt" class="form-control">
                                </div>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <label for="updatequalif">Qualification : </label>
                               <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="updatequalif" name="updatequalif" class="form-control">
                                </div>
                               </div>
                            </div>    
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="valideupdatepersonnel()" class="btn bg-deep-orange waves-effect">MODIFIER</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/dash.blade.php ENDPATH**/ ?>


<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Select Css -->
    <link href="cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="cssdste/js/pages/jquery.countTo.js"></script> 

    <script src="cssdste/js/pages/infobox-4.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
            <div class="block-header">
                <h2>
                    Tableau de bord / <?php echo e($info->nom); ?> <?php echo e($info->prenom); ?>

                    <input type="hidden" id="personnel" value="<?php echo e($info->id); ?>" />
                    <small></small>
                </h2>
            </div>
           
            <div class="row clearfix">
                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#antecedentadd" onclick="getantecedent()">
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">ANTECEDENTS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20">125</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#posteantadd" onclick="getposteant()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">POSTES ANTERIEUREMENT</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#posteactuadd" onclick="getposteactu()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">POSTES ACTUELLEMENT</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#vaccinationadd" onclick="getvaccination()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">VACCINATION</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#absenteismeadd" onclick="getAbsenteisme()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">ABSENTEISME</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#accidentadd" onclick="getAccident()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">ACCIDENT DU TRAVAIL </div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#maladieadd" onclick="getMaladie()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">MALADIE PROFESSIONNELLE </div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#convocationadd" onclick="getConvocation()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">CONVOCATION </div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#consultationadd" onclick="getConsultation()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">CONSULTATION</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" data-toggle="modal" data-target="#visiteadd" onclick="getVisite()"> 
                    <div class="info-box-3 bg-indigo">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">VISITE MEDICALE</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>  
            </div> 
        </div>

        <script type="text/javascript">
            /** Antécédent */
            function setdetailmedicaux(medi) {
                tab = medi.split("|");
                affiche = "";
                if(tab.includes("hta"))
                    affiche += "Hypertension artérielle; ";
                if(tab.includes("hota"))
                    affiche += "Hypotension  artérielle; ";
                if(tab.includes("dbt"))
                    affiche += "Diabète; ";
                if(tab.includes("ucr"))
                    affiche += "Ulcère; ";
                if(tab.includes("atm"))
                    affiche += "Asthme; ";
                if(tab.includes("snt"))
                    affiche += "Sinusite; ";
                if(tab.includes("mdh"))
                    affiche += "Maladie hémorroïdaire; ";
                if(tab.includes("epp"))
                    affiche += "Epilepsie; ";
                if(tab.includes("dpc"))
                    affiche += "Drépanocytose; ";
                if(tab.includes("hptt"))
                    affiche += "Hépatite; ";
                if(tab.includes("tbc"))
                    affiche += "Tabac (café thé sommeil sedentarité ); ";
                if(tab.includes("acl"))
                    affiche += "Alcool; ";
                if(tab.includes("ats"))
                    affiche += "Autres; ";
                return affiche;
            }

            function seedetailmedicaux(medi) {
                tab = medi.split("|");
                
                    document.getElementById("hta").checked = false;
                    document.getElementById("hota").checked = false;
                    document.getElementById("dbt").checked = false;
                    document.getElementById("ucr").checked = false;
                    document.getElementById("atm").checked = false;
                    document.getElementById("snt").checked = false;
                    document.getElementById("mdh").checked = false;
                    document.getElementById("epp").checked = false;
                    document.getElementById("dpc").checked = false;
                    document.getElementById("hptt").checked = false;
                    document.getElementById("tbc").checked = false;
                    document.getElementById("acl").checked = false;
                    document.getElementById("ats").checked = false;

                if(tab.includes("hta"))
                    document.getElementById("hta").checked = true;
                if(tab.includes("hota"))
                    document.getElementById("hota").checked = true;
                if(tab.includes("dbt"))
                    document.getElementById("dbt").checked = true;
                if(tab.includes("ucr"))
                    document.getElementById("ucr").checked = true;
                if(tab.includes("atm"))
                    document.getElementById("atm").checked = true;
                if(tab.includes("snt"))
                    document.getElementById("snt").checked = true;
                if(tab.includes("mdh"))
                    document.getElementById("mdh").checked = true;
                if(tab.includes("epp"))
                    document.getElementById("epp").checked = true;
                if(tab.includes("dpc"))
                    document.getElementById("dpc").checked = true;
                if(tab.includes("hptt"))
                    document.getElementById("hptt").checked = true;
                if(tab.includes("tbc"))
                    document.getElementById("tbc").checked = true;
                if(tab.includes("acl"))
                    document.getElementById("acl").checked = true;
                if(tab.includes("ats"))
                    document.getElementById("ats").checked = true;
            }

            async function getantecedent(){
                getlistAntecedent();
            }

            async function getlistAntecedent() {
                    try {
                        let response = await fetch("<?php echo e(route('GPA')); ?>",
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
                                contenu += '<th> <span class="co-name">'+currentline["type"]+'</span></th>';
                                contenu += '<td>'+setdetailmedicaux(currentline["medicaux"])+'</td>';
                                contenu += '<td>'+currentline["chirurgicaux"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#updateantecedent" onclick="getupdateantecedent('+currentline["id"]+', \''+currentline["type"]+'\', \''+currentline["chirurgicaux"]+'\', \''+currentline["medicaux"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" data-toggle="modal" data-target="#deleteantecedent" onclick="getdeleteantecedent('+currentline["id"]+', \''+currentline["type"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuantecedent').innerHTML = '<tr> <td colspan="4"><center> Aucun antécédent enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuantecedent').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideantecedent(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                chirurgicaux = document.getElementById("chirurgicaux").value;
                typeantecedent = document.getElementById("typeantecedent").value;
                personnel = document.getElementById("personnel").value;
                
                medicaux = "";
                
                chks = document.getElementsByName('medi');
                for (var checkbox of chks)
                {
                    if (checkbox.checked) {
                        medicaux += "|"+checkbox.value;
                    }
                }
                

                if(token == "" || typeantecedent == "" || chirurgicaux == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(typeantecedent == "")
                        error += ". Le champ Type ne peut pas être vide <br>";
                    if(chirurgicaux == "")
                        error += ". Le champ chirurgicaux ne peut pas être vide <br>";

                    document.getElementById('infoantecedent').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, typeantecedent: typeantecedent, chirurgicaux: chirurgicaux, medicaux: medicaux, personnel: personnel,
                    };

                    document.getElementById("infoantecedent").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SAPA')); ?>",
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
                                    document.getElementById("infoantecedent").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getlistAntecedent();
                                }else{
                                    document.getElementById("infoantecedent").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoantecedent").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoantecedent").innerHTML = error;
                        } 
                }
            }

            async function getdeleteantecedent(id, nom){
                document.getElementById('infodeleteantecedent').innerHTML = "Vous voulez vraiment supprimer la ligne "+nom+" ?";
                document.getElementById('iddeleteantecedent').value = id;
                document.getElementById('bloquesuppantecedent').style.display = "block";
                document.getElementById('bloqueaddantecedent').style.display = "none";
                document.getElementById('myModalLabelant').innerHTML = "Suppression : ";
                document.getElementById('addplus').style.display = "block";
            }

            async function setdeleteantecedent(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteantecedent").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DPA')); ?>",
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
                                document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getlistAntecedent();
                            }
                            else{
                                document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteantecedent").innerHTML = error;
                        } 
            }

            async function getupdateantecedent(id, nom, chirurgicaux, medi){
                document.getElementById('infoantecedent').innerHTML = "Vous voulez vraiment modifier les informations de "+nom+" ?";
                document.getElementById('myModalLabelant').innerHTML = "Modification : ";
                document.getElementById('bloquesuppantecedent').style.display = "none";
                document.getElementById('bloqueaddantecedent').style.display = "block"; 
                document.getElementById('modif').innerHTML = "MODIFER";
                document.getElementById('chirurgicaux').value = chirurgicaux;
                document.getElementById('seetype').innerHTML = '<select type="text" id="typeantecedent" name="typeantecedent" class="form-control" required><option>'+nom+'</option><option>PERSONNELS</option><option>PROFESSIONNELS</option><option>FAMILIAUX</option><option>SOCIAUX </option></select>';
                seedetailmedicaux(medi);
                document.getElementById('addplus').style.display = "block";
            }

            function afficheajouter() {
                document.getElementById('addplus').style.display = "none";
                document.getElementById('bloquesuppantecedent').style.display = "none";
                document.getElementById('bloqueaddantecedent').style.display = "block"; 
                document.getElementById('chirurgicaux').value = "";
                document.getElementById("hta").checked = false;
                document.getElementById("hota").checked = false;
                document.getElementById("dbt").checked = false;
                document.getElementById("ucr").checked = false;
                document.getElementById("atm").checked = false;
                document.getElementById("snt").checked = false;
                document.getElementById("mdh").checked = false;
                document.getElementById("epp").checked = false;
                document.getElementById("dpc").checked = false;
                document.getElementById("hptt").checked = false;
                document.getElementById("tbc").checked = false;
                document.getElementById("acl").checked = false;
                document.getElementById("ats").checked = false;
                document.getElementById('seetype').innerHTML = '<select type="text" id="typeantecedent" name="typeantecedent" class="form-control" required><option>PERSONNELS</option><option>PROFESSIONNELS</option><option>FAMILIAUX</option><option>SOCIAUX </option></select>';
                document.getElementById('infoantecedent').innerHTML ="";
            }

            /** POSTE ANTERIEUR */
            async function getposteant(){
                getlistPosteAnt();
            }

            async function getlistPosteAnt() {
                    try {
                        let response = await fetch("<?php echo e(route('GPPA')); ?>",
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
                                contenu += '<th> <span class="co-name">'+currentline["denomination"]+'</span></th>';
                                contenu += '<td>'+currentline["libelle"]+'</td>';
                                contenu += '<td>'+currentline["periodedebut"]+' au '+currentline["periodefin"]+'  </td>';
                                contenu += '<td>'+currentline["facteurnuissance"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateposteant('+currentline["id"]+', \''+currentline["denomination"]+'\', \''+currentline["libelle"]+'\', \''+currentline["periodedebut"]+'\', \''+currentline["periodefin"]+'\', \''+currentline["facteurnuissance"]+'\', '+currentline["entreprise"]+')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteposteant('+currentline["id"]+', \''+currentline["denomination"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuposteant').innerHTML = '<tr> <td colspan="5"><center> Aucun poste antrieurement occupé n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuposteant').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideposteant(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                denomination = document.getElementById("denominationposteant").value;
                factnuissance = document.getElementById("factnuissancepostant").value;
                periodedebut = document.getElementById("periodedebutposte").value;
                periodefin = document.getElementById("periodefinposte").value;
                entreprise = document.getElementById("entreprisepostant").value;
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || entreprise == 0 || periodefin == "" || periodedebut == "" || factnuissance == "" || denomination == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(entreprise == 0)
                        error += ". Le champ Entreprise ne peut pas être vide <br>";
                    if(periodefin == "")
                        error += ". Le champ Période fin ne peut pas être vide <br>";
                    if(periodedebut == "")
                        error += ". Le champ Période début ne peut pas être vide <br>";
                    if(factnuissance == "")
                        error += ". Le champ Facteurs de Nuisance ne peut pas être vide <br>";
                    if(denomination == "")
                        error += ". Le champ Période début ne peut pas être vide <br>";

                    document.getElementById('infoposteant').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, entreprise: entreprise, periodefin: periodefin, periodedebut: periodedebut, factnuissance: factnuissance, denomination: denomination, personnel: personnel,
                    };

                    document.getElementById("infoposteant").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SPAP')); ?>",
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
                                    document.getElementById("infoposteant").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getposteant();
                                }else{
                                    document.getElementById("infoposteant").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoposteant").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoposteant").innerHTML = error;
                        } 
                }
            }

            async function setdeleteposteant(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteposteant").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteposteant").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DPSP')); ?>",
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
                                document.getElementById("infodeleteposteant").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getposteant();
                            }
                            else{
                                document.getElementById("infodeleteposteant").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteposteant").innerHTML = error;
                        } 
            }

            function afficheajouterposteant() {
                document.getElementById('addplusposteant').style.display = "none";
                document.getElementById('bloquesuppposteant').style.display = "none";
                document.getElementById('bloqueaddposteant').style.display = "block"; 
                document.getElementById('periodefinposte').value = "";
                document.getElementById('periodedebutposte').value = "";
                document.getElementById('factnuissancepostant').value = "";
                
                document.getElementById('seetypeposteant').innerHTML = '<select type="text" id="entreprisepostant" name="entreprisepostant" class="form-control" required><?php $all = App\Providers\InterfaceServiceProvider::AllService();?> <option value="0">Sélectionner une entreprise</option><?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entreprise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($entreprise->id); ?>"> <?php echo e($entreprise->libelle); ?> </option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>';
                document.getElementById('infoposteant').innerHTML ="";
                document.getElementById('denominationposteant').value ="";
                document.getElementById('myModalLabelposteant').innerHTML = " POSTES DE TRAVAIL OCCUPES ANTERIEUREMENT :  ";
            }

            async function getupdateposteant(id, nom, entreprise, debut, fin, fact, identreprise){
                document.getElementById('infoposteant').innerHTML = "Vous voulez vraiment modifier les informations de "+nom+" ?";
                document.getElementById('myModalLabelposteant').innerHTML = "Modification : ";
                document.getElementById('bloquesuppposteant').style.display = "none";
                document.getElementById('bloqueaddposteant').style.display = "block"; 
                document.getElementById('modifpostant').innerHTML = "MODIFER";
                document.getElementById('seetypeposteant').innerHTML = '<select type="text" id="entreprisepostant" name="entreprisepostant" class="form-control" required><option value="'+identreprise+'">'+entreprise+'</option></select>';
                document.getElementById('addplusposteant').style.display = "block";
                document.getElementById('factnuissancepostant').value = fact;
                document.getElementById('periodedebutposte').value = debut;
                document.getElementById('periodefinposte').value = fin;
                document.getElementById("denominationposteant").value = nom;
            }

            async function getdeleteposteant(id, nom){
                document.getElementById('infodeleteposteant').innerHTML = "Vous voulez vraiment supprimer la ligne "+nom+" ?";
                document.getElementById('iddeleteposteant').value = id;
                document.getElementById('bloquesuppposteant').style.display = "block";
                document.getElementById('bloqueaddposteant').style.display = "none";
                document.getElementById('myModalLabelposteant').innerHTML = "Suppression : ";
                document.getElementById('addplusposteant').style.display = "block";
            }

            /** POSTE ACTUELLE */
            async function getposteactu(){
                getlistPosteActu();
            }

            async function getlistPosteActu() {
                    try {
                        let response = await fetch("<?php echo e(route('GPPAc')); ?>",
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
                                contenu += '<th> <span class="co-name">'+currentline["periodedebut"]+'<br> au <br>'+currentline["periodefin"]+'</span></th>';
                                contenu += '<td>'+currentline["poste"]+'</td>';
                                contenu += '<td>'+currentline["taches"]+'  </td>';
                                contenu += '<td>'+currentline["rythme"]+'</td>';
                                contenu += '<td>'+currentline["facteurnuissance"]+'</td>';
                                contenu += '<td> <b>Date : </b>'+currentline["metrodate"]+'<br> <b>Type : </b>'+currentline["metrotype"]+'<br> <b>R : </b> '+currentline["metror"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateposteactu('+currentline["id"]+', \''+currentline["poste"]+'\', \''+currentline["taches"]+'\', \''+currentline["periodedebut"]+'\', \''+currentline["periodefin"]+'\', \''+currentline["facteurnuissance"]+'\', \''+currentline["metrodate"]+'\', \''+currentline["metrotype"]+'\', \''+currentline["metror"]+'\', \''+currentline["rythme"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteposteactu('+currentline["id"]+', \''+currentline["poste"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuposteactu').innerHTML = '<tr> <td colspan="7"><center> Aucun poste actuel n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuposteactu').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideposteactu(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                periodedebut = document.getElementById("periodedebutposteactu").value;
                periodefin = document.getElementById("periodefinposteactu").value;
                poste = document.getElementById("posteactu").value;
                facteurnuissance = document.getElementById("factnuissancepostactu").value;
                taches = document.getElementById("tachesactu").value;
                rythme = document.getElementById("rythmeactu").value;
                metrodate = document.getElementById("metrodateactu").value;
                metrotype = document.getElementById("metrotypeactu").value;
                metror = document.getElementById("metroractu").value; 
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || poste == "" || periodefin == "" || periodedebut == "" || facteurnuissance == "" || taches == "" || rythme == "" || metrodate == "" || metrotype == "" || metror == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(poste == "")
                        error += ". Le champ Poste ne peut pas être vide <br>";
                    if(periodefin == "")
                        error += ". Le champ Période fin ne peut pas être vide <br>";
                    if(periodedebut == "")
                        error += ". Le champ Période début ne peut pas être vide <br>";
                    if(facteurnuissance == "")
                        error += ". Le champ Facteurs de Nuisance ne peut pas être vide <br>";
                    if(taches == "")
                        error += ". Le champ Tâches ne peut pas être vide <br>";
                    if(rythme == "")
                        error += ". Le champ Rythme ne peut pas être vide <br>";
                    if(metrodate == "")
                        error += ". Le champ Date ne peut pas être vide <br>";
                    if(metrotype == "")
                        error += ". Le champ Type ne peut pas être vide <br>";
                    if(metror == "")
                        error += ". Le champ R ne peut pas être vide <br>";

                    document.getElementById('infoposteactu').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, metror: metror, periodefin: periodefin, periodedebut: periodedebut, poste: poste, facteurnuissance: facteurnuissance, personnel: personnel, taches: taches, rythme: rythme, metrodate: metrodate, metrotype: metrotype, metror: metror, 
                    };

                    document.getElementById("infoposteactu").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SPAcP')); ?>",
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
                                    document.getElementById("infoposteactu").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getposteactu();
                                    initposteactu();
                                }else{
                                    document.getElementById("infoposteactu").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoposteactu").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoposteactu").innerHTML = error;
                        } 
                }
            }

            async function setdeleteposteactu(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteposteactu").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteposteactu").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DPAcP')); ?>",
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
                                document.getElementById("infodeleteposteactu").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getposteactu();
                            }
                            else{
                                document.getElementById("infodeleteposteactu").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteposteactu").innerHTML = error;
                        } 
            }

            function afficheajouterposteactu() {
                document.getElementById('addplusposteactu').style.display = "none";
                document.getElementById('bloquesuppposteactu').style.display = "none";
                document.getElementById('bloqueaddposteactu').style.display = "block"; 
                initposteactu();

                
                document.getElementById('myModalLabelposteactu').innerHTML = " POSTES DE TRAVAIL OCCUPES ACTUELLEMENT :  ";
            }

            async function getupdateposteactu(id, poste, taches, debut, fin, fact, mdate, mtype, mr, rythme){
                document.getElementById('infoposteactu').innerHTML = "Vous voulez vraiment modifier les informations de "+poste+" ?";
                document.getElementById('myModalLabelposteactu').innerHTML = "Modification : ";
                document.getElementById('bloquesuppposteactu').style.display = "none";
                document.getElementById('bloqueaddposteactu').style.display = "block"; 
                document.getElementById('modifpostactu').innerHTML = "MODIFER";
                document.getElementById('addplusposteactu').style.display = "block";
                document.getElementById('factnuissancepostactu').value = fact;
                document.getElementById('periodedebutposteactu').value = debut;
                document.getElementById('periodefinposteactu').value = fin;
                document.getElementById("posteactu").value = poste;
                document.getElementById('tachesactu').value = taches;
                document.getElementById('rythmeactu').value = rythme;
                document.getElementById('metrodateactu').value = mdate;
                document.getElementById("metrotypeactu").value = mtype;
                document.getElementById("metroractu").value = mr;
            }

            async function getdeleteposteactu(id, poste){
                document.getElementById('infodeleteposteactu').innerHTML = "Vous voulez vraiment supprimer la ligne "+poste+" ?";
                document.getElementById('iddeleteposteactu').value = id;
                document.getElementById('bloquesuppposteactu').style.display = "block";
                document.getElementById('bloqueaddposteactu').style.display = "none";
                document.getElementById('myModalLabelposteactu').innerHTML = "Suppression : ";
                document.getElementById('addplusposteactu').style.display = "block";
            }

            function initposteactu(){
                document.getElementById('factnuissancepostactu').value = "";
                document.getElementById('periodedebutposteactu').value = "";
                document.getElementById('periodefinposteactu').value = "";
                document.getElementById("posteactu").value = "";
                document.getElementById('tachesactu').value = "";
                document.getElementById('rythmeactu').value = "";
                document.getElementById('metrodateactu').value = "";
                document.getElementById("metrotypeactu").value = "";
                document.getElementById("metroractu").value = "";
            }

            /** VACCINATION */
            async function getvaccination(){
                getlistVaccination();
            }

            async function getlistVaccination() {
                    try {
                        let response = await fetch("<?php echo e(route('GVP')); ?>",
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
                                contenu += '<th>'+currentline["date"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["vaccin"]+'</span></td>';
                                contenu += '<td>'+currentline["lot"]+'  </td>';
                                contenu += '<td>'+currentline["type"]+'</td>';
                                contenu += '<td>'+currentline["dose"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateVaccination('+currentline["id"]+', \''+currentline["date"]+'\', \''+currentline["vaccin"]+'\', \''+currentline["lot"]+'\', \''+currentline["type"]+'\', \''+currentline["dose"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteVaccination('+currentline["id"]+', \''+currentline["vaccin"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuvacc').innerHTML = '<tr> <td colspan="6"><center> Aucune vaccination n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuvacc').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideVaccination(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                datevacc = document.getElementById("datevacc").value;
                vaccinvacc = document.getElementById("vaccinvacc").value;
                lotvacc = document.getElementById("lotvacc").value;
                dosevacc = document.getElementById("dosevacc").value;
                typevacc = document.getElementById("typevacc").value;
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || datevacc == "" || vaccinvacc == "" || lotvacc == "" || dosevacc == "" || typevacc == "" ){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(datevacc == "")
                        error += ". Le champ Date ne peut pas être vide <br>";
                    if(vaccinvacc == "")
                        error += ". Le champ Vaccin ne peut pas être vide <br>";
                    if(lotvacc == "")
                        error += ". Le champ Lot début ne peut pas être vide <br>";
                    if(dosevacc == "")
                        error += ". Le champ Dose ne peut pas être vide <br>";
                    if(typevacc == "")
                        error += ". Le champ Type ne peut pas être vide <br>";

                    document.getElementById('infovacc').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, date: datevacc, vaccin: vaccinvacc, lot: lotvacc, dose: dosevacc, type: typevacc, personnel: personnel,
                    };

                    document.getElementById("infovacc").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SVP')); ?>",
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
                                    document.getElementById("infovacc").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getvaccination();
                                    initVaccination();
                                }else{
                                    document.getElementById("infovacc").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infovacc").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infovacc").innerHTML = error;
                        } 
                }
            }

            async function setdeleteVaccination(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeletevacc").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeletevacc").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DVP')); ?>",
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
                                document.getElementById("infodeletevacc").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getvaccination();
                            }
                            else{
                                document.getElementById("infodeletevacc").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeletevacc").innerHTML = error;
                        } 
            }

            function afficheajouterVaccination() {
                document.getElementById('addplusvacc').style.display = "none";
                document.getElementById('bloquesupvacc').style.display = "none";
                document.getElementById('bloqueaddvacc').style.display = "block"; 
                initVaccination();

                document.getElementById('myModalLabelvacc').innerHTML = " VACCINATION :  ";
            }

            async function getupdateVaccination(id, date, vaccin, lot, type, dose){
                document.getElementById('infovacc').innerHTML = "Vous voulez vraiment modifier les informations du vaccin "+vaccin+" ?";
                document.getElementById('myModalLabelvacc').innerHTML = "Modification : ";
                document.getElementById('bloquesupvacc').style.display = "none";
                document.getElementById('bloqueaddvacc').style.display = "block"; 
                document.getElementById('modifvacc').innerHTML = "MODIFER";
                document.getElementById('addplusvacc').style.display = "block";
                document.getElementById('datevacc').value = date;
                document.getElementById('vaccinvacc').value = vaccin;
                document.getElementById('lotvacc').value = lot;
                document.getElementById("typevacc").value = type;
                document.getElementById('dosevacc').value = dose;
            }

            async function getdeleteVaccination(id, vaccin){
                document.getElementById('infodeletevacc').innerHTML = "Vous voulez vraiment supprimer le vaccin "+vaccin+" ?";
                document.getElementById('iddeletevacc').value = id;
                document.getElementById('bloquesupvacc').style.display = "block";
                document.getElementById('bloqueaddvacc').style.display = "none";
                document.getElementById('myModalLabelvacc').innerHTML = "Suppression : ";
                document.getElementById('addplusvacc').style.display = "block";
            }

            function initVaccination(){
                document.getElementById('datevacc').value = "";
                document.getElementById('vaccinvacc').value = "";
                document.getElementById('lotvacc').value = "";
                document.getElementById("typevacc").value = "";
                document.getElementById('dosevacc').value = "";
            }

            /** ABSENTEISME */
            async function getAbsenteisme(){
                getlistAbsenteisme();
            }

            async function getlistAbsenteisme() {
                    try {
                        let response = await fetch("<?php echo e(route('GABP')); ?>",
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
                                contenu += '<th>'+currentline["type"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["cause"]+'</span></td>';
                                contenu += '<td>'+currentline["debut"]+'  </td>';
                                contenu += '<td>'+currentline["reprise"]+'</td>';
                                contenu += '<td>'+currentline["njaa"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateAbsenteisme('+currentline["id"]+', \''+currentline["type"]+'\', \''+currentline["cause"]+'\', \''+currentline["debut"]+'\', \''+currentline["reprise"]+'\', \''+currentline["njaa"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteAbsenteisme('+currentline["id"]+', \''+currentline["debut"]+" au "+currentline["reprise"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuabse').innerHTML = '<tr> <td colspan="6"><center> Aucune période d\'absence n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuabse').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideAbsenteisme(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                typeabse = document.getElementById("typeabse").value;
                causeabse = document.getElementById("causeabse").value;
                debutabse = document.getElementById("debutabse").value;
                repriseabse = document.getElementById("repriseabse").value;
                nombrejoursarretabse = document.getElementById("nombrejoursarretabse").value;
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || nombrejoursarretabse == "" || typeabse == "" || causeabse == "" || debutabse == "" || repriseabse == "" ){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(nombrejoursarretabse == "")
                        error += ". Le champ Nombre de jours d'arrêt ne peut pas être vide <br>";
                    if(typeabse == "")
                        error += ". Le champ Type ne peut pas être vide <br>";
                    if(causeabse == "")
                        error += ". Le champ Cause ne peut pas être vide <br>";
                    if(debutabse == "")
                        error += ". Le champ Début ne peut pas être vide <br>";
                    if(repriseabse == "")
                        error += ". Le champ Reprise ne peut pas être vide <br>";

                    document.getElementById('infoabse').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, njaa: nombrejoursarretabse, type: typeabse, cause: causeabse, debut: debutabse, reprise: repriseabse, personnel: personnel,
                    };

                    document.getElementById("infoabse").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SABP')); ?>",
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
                                    document.getElementById("infoabse").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getAbsenteisme();
                                    initAbsenteisme();
                                }else{
                                    document.getElementById("infoabse").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoabse").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoabse").innerHTML = error;
                        } 
                }
            }

            async function setdeleteAbsenteisme(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteabse").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteabse").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DABP')); ?>",
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
                                document.getElementById("infodeleteabse").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getvaccination();
                            }
                            else{
                                document.getElementById("infodeleteabse").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteabse").innerHTML = error;
                        } 
            }

            function afficheajouterAbsenteisme() {
                document.getElementById('addplusabse').style.display = "none";
                document.getElementById('bloquesupabse').style.display = "none";
                document.getElementById('bloqueaddabse').style.display = "block"; 
                initAbsenteisme();

                document.getElementById('myModalLabelabse').innerHTML = " ABSENTEISME :  ";
            }

            async function getupdateAbsenteisme(id, type, cause, debut, reprise, nj){
                document.getElementById('infoabse').innerHTML = "Vous voulez vraiment modifier la période d'absence "+debut+" au "+reprise+" ?";
                document.getElementById('myModalLabelabse').innerHTML = "Modification : ";
                document.getElementById('bloquesupabse').style.display = "none";
                document.getElementById('bloqueaddabse').style.display = "block"; 
                document.getElementById('modifabse').innerHTML = "MODIFER";
                document.getElementById('addplusabse').style.display = "block";
                document.getElementById('typeabse').value = type;
                document.getElementById('causeabse').value = cause;
                document.getElementById('debutabse').value = debut;
                document.getElementById("repriseabse").value = reprise;
                document.getElementById('nombrejoursarretabse').value = nj;
            }

            async function getdeleteAbsenteisme(id, periode){
                document.getElementById('infodeleteabse').innerHTML = "Vous voulez vraiment supprimer le vaccin la période d'absence "+periode+"  ?";
                document.getElementById('iddeleteabse').value = id;
                document.getElementById('bloquesupabse').style.display = "block";
                document.getElementById('bloqueaddabse').style.display = "none";
                document.getElementById('myModalLabelabse').innerHTML = "Suppression : ";
                document.getElementById('addplusabse').style.display = "block";
            }

            function initAbsenteisme(){
                document.getElementById('typeabse').value = "";
                document.getElementById('causeabse').value = "";
                document.getElementById('debutabse').value = "";
                document.getElementById("repriseabse").value = "";
                document.getElementById('nombrejoursarretabse').value = "";
            }

            /** ACCIDENT */
            async function getAccident(){
                getlistAccident();
            }

            async function getlistAccident() {
                    try {
                        let response = await fetch("<?php echo e(route('GACCP')); ?>",
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
                                contenu += '<th>'+currentline["date"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["emc"]+'</span></td>';
                                contenu += '<td>'+currentline["ndl"]+'</td>';
                                contenu += '<td>'+currentline["poste"]+'</td>';
                                contenu += '<td>'+currentline["nja"]+'</td>';
                                contenu += '<td>'+currentline["ipp"]+'</td>';
                                contenu += '<td>'+currentline["obs"]+'</td>';

                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateAccident('+currentline["id"]+', \''+currentline["date"]+'\', \''+currentline["emc"]+'\', \''+currentline["ndl"]+'\', \''+currentline["poste"]+'\', \''+currentline["nja"]+'\', \''+currentline["ipp"]+'\', \''+currentline["obs"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteAccident('+currentline["id"]+', \''+currentline["ndl"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuacci').innerHTML = '<tr> <td colspan="8"><center> Aucune accident de travail n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuacci').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideAccident(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                dateacci = document.getElementById("dateacci").value;
                emcacci = document.getElementById("emcacci").value;
                ndlacci = document.getElementById("ndlacci").value;
                posteacci = document.getElementById("posteacci").value;
                njaacci = document.getElementById("njaacci").value;
                ippacci = document.getElementById("ippacci").value;
                obsacci = document.getElementById("obsacci").value;

                personnel = document.getElementById("personnel").value;
                

                if(token == "" || obsacci == "" || ippacci == "" || njaacci == "" || posteacci == "" || ndlacci == "" || dateacci == "" || emcacci == "" ){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(obsacci == "")
                        error += ". Le champ Observation ne peut pas être vide <br>";
                    if(ippacci == "")
                        error += ". Le champ Incapacité permanente partielle ne peut pas être vide <br>";
                    if(njaacci == "")
                        error += ". Le champ Nombre de jours ne peut pas être vide <br>";
                    if(posteacci == "")
                        error += ". Le champ Poste ne peut pas être vide <br>";
                    if(ndlacci == "")
                        error += ". Le champ Nature des lésions ne peut pas être vide <br>";
                    if(dateacci == "")
                        error += ". Le champ Date ne peut pas être vide <br>";
                    if(emcacci == "")
                        error += ". Le champ Element matériel causal ne peut pas être vide <br>";

                    document.getElementById('infoacci').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, emc: emcacci, date: dateacci, ndl: ndlacci, poste: posteacci, nja: njaacci, ipp: ippacci, obs: obsacci, personnel: personnel,
                    };

                    document.getElementById("infoacci").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                        try {
                            let response = await fetch("<?php echo e(route('SACCP')); ?>",
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
                                    document.getElementById("infoacci").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getAccident();
                                    initAccident();
                                }else{
                                    document.getElementById("infoacci").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoacci").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoacci").innerHTML = error;
                        } 
                }
            }

            async function setdeleteAccident(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteacci").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteacci").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    try {
                        let response = await fetch("<?php echo e(route('DACCP')); ?>",
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
                            document.getElementById("infodeleteacci").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                            getAccident();
                        }else{
                            document.getElementById("infodeleteacci").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteacci").innerHTML = error;
                        } 
            }

            function afficheajouterAccident() {
                document.getElementById('addplusacci').style.display = "none";
                document.getElementById('bloquesupacci').style.display = "none";
                document.getElementById('bloqueaddacci').style.display = "block"; 
                initAccident();

                document.getElementById('myModalLabelacci').innerHTML = " ACCIDENT DU TRAVAIL :  ";
            }

            async function getupdateAccident(id, date, emc, ndl, poste, nja, ipp, obs){
                document.getElementById('infoacci').innerHTML = "Vous voulez vraiment modifier la nature des lésions "+ndl+" ?";
                document.getElementById('myModalLabelacci').innerHTML = "Modification : ";
                document.getElementById('bloquesupacci').style.display = "none";
                document.getElementById('bloqueaddacci').style.display = "block";
                document.getElementById('modifacci').innerHTML = "MODIFER";
                document.getElementById('addplusacci').style.display = "block";
                document.getElementById("dateacci").value = date;
                document.getElementById("emcacci").value = emc;
                document.getElementById("ndlacci").value = ndl;
                document.getElementById("posteacci").value = poste;
                document.getElementById("njaacci").value = nja;
                document.getElementById("ippacci").value = ipp;
                document.getElementById("obsacci").value = obs;
            }

            async function getdeleteAccident(id, ndl){
                document.getElementById('infodeleteacci').innerHTML = "Vous voulez vraiment supprimer la nature des lésions "+ndl+"  ?";
                document.getElementById('iddeleteacci').value = id;
                document.getElementById('bloquesupacci').style.display = "block";
                document.getElementById('bloqueaddacci').style.display = "none";
                document.getElementById('myModalLabelacci').innerHTML = "Suppression : ";
                document.getElementById('addplusacci').style.display = "block";
            }

            function initAccident(){
                document.getElementById("dateacci").value = "";
                document.getElementById("emcacci").value = "";
                document.getElementById("ndlacci").value = "";
                document.getElementById("posteacci").value = "";
                document.getElementById("njaacci").value = "";
                document.getElementById("ippacci").value = "";
                document.getElementById("obsacci").value = "";
            }

            /** MALADIE */
            async function getMaladie(){
                getlistMaladie();
            }

            async function getlistMaladie() {
                    try {
                        let response = await fetch("<?php echo e(route('GMalP')); ?>",
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
                                contenu += '<th>'+currentline["date"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["maladie"]+'</span></td>';
                                contenu += '<td>'+currentline["tableau"]+'</td>';
                                contenu += '<td>'+currentline["agent"]+'</td>';
                                contenu += '<td>'+currentline["poste"]+'</td>';
                                contenu += '<td>'+currentline["decision"]+'</td>';

                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateMaladie('+currentline["id"]+', \''+currentline["date"]+'\', \''+currentline["maladie"]+'\', \''+currentline["tableau"]+'\', \''+currentline["agent"]+'\', \''+currentline["poste"]+'\', \''+currentline["decision"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteMaladie('+currentline["id"]+', \''+currentline["maladie"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenumala').innerHTML = '<tr> <td colspan="8"><center> Aucune maladie professionnelle n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenumala').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideMaladie(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                datemala = document.getElementById("datemala").value;
                maladiemala = document.getElementById("maladiemala").value;
                tableaumala = document.getElementById("tableaumala").value;
                agentmala = document.getElementById("agentmala").value;
                postemala = document.getElementById("postemala").value;
                decisionmala = document.getElementById("decisionmala").value;
                
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || datemala == "" || maladiemala == "" || tableaumala == "" || agentmala == "" || postemala == "" || decisionmala == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(datemala == "")
                        error += ". Le champ Date ne peut pas être vide <br>";
                    if(maladiemala == "")
                        error += ". Le champ Maladie ne peut pas être vide <br>";
                    if(tableaumala == "")
                        error += ". Le champ Numéro de tableau ne peut pas être vide <br>";
                    if(agentmala == "")
                        error += ". Le champ Agent causal ne peut pas être vide <br>";
                    if(postemala == "")
                        error += ". Le champ Poste ne peut pas être vide <br>";
                    if(decisionmala == "")
                        error += ". Le champ Décision ne peut pas être vide <br>";

                    document.getElementById('infomala').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, date: datemala, maladie: maladiemala, tableau: tableaumala, agent: agentmala, poste: postemala, decision: decisionmala, personnel: personnel,
                    };

                    document.getElementById("infomala").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                        try {
                            let response = await fetch("<?php echo e(route('SMalP')); ?>",
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
                                    document.getElementById("infomala").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getMaladie();
                                    initMaladie();
                                }else{
                                    document.getElementById("infomala").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infomala").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infomala").innerHTML = error;
                        } 
                }
            }

            async function setdeleteMaladie(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeletemala").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeletemala").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    try {
                        let response = await fetch("<?php echo e(route('DMalP')); ?>",
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
                            document.getElementById("infodeletemala").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                            getMaladie();
                        }else{
                            document.getElementById("infodeletemala").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeletemala").innerHTML = error;
                        } 
            }

            function afficheajouterMaladie() {
                document.getElementById('addplusmala').style.display = "none";
                document.getElementById('bloquesupmala').style.display = "none";
                document.getElementById('bloqueaddmala').style.display = "block"; 
                initMaladie();
                document.getElementById('myModalLabelmala').innerHTML = "MALADIE PROFESSIONNELLE :  ";
            }

            async function getupdateMaladie(id, date, maladie, tableau, agent, poste, decision){
                document.getElementById('infomala').innerHTML = "Vous voulez vraiment modifier la maladie "+maladie+" ?";
                document.getElementById('myModalLabelmala').innerHTML = "Modification : ";
                document.getElementById('bloquesupmala').style.display = "none";
                document.getElementById('bloqueaddmala').style.display = "block";
                document.getElementById('modifmala').innerHTML = "MODIFER";
                document.getElementById('addplusmala').style.display = "block";
                document.getElementById("datemala").value = date;
                document.getElementById("maladiemala").value = maladie;
                document.getElementById("tableaumala").value = tableau;
                document.getElementById("agentmala").value = agent;
                document.getElementById("postemala").value = poste;
                document.getElementById("decisionmala").value = decision;
            }

            async function getdeleteMaladie(id, maladie){
                document.getElementById('infodeletemala').innerHTML = "Vous voulez vraiment supprimer la maladie "+maladie+"  ?";
                document.getElementById('iddeletemala').value = id;
                document.getElementById('bloquesupmala').style.display = "block";
                document.getElementById('bloqueaddmala').style.display = "none";
                document.getElementById('myModalLabelmala').innerHTML = "Suppression : ";
                document.getElementById('addplusmala').style.display = "block";
            }

            function initMaladie(){
                document.getElementById("datemala").value = "";
                document.getElementById("maladiemala").value = "";
                document.getElementById("tableaumala").value = "";
                document.getElementById("agentmala").value = "";
                document.getElementById("postemala").value = "";
                document.getElementById("decisionmala").value = "";
            }

            /** Convocation */
            async function getConvocation(){
                getListConvocation();
            }

            async function getListConvocation() {
                    try {
                        let response = await fetch("<?php echo e(route('GConvP')); ?>",
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
                                contenu += '<th>'+currentline["motif"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["dateemission"]+'</span></td>';
                                contenu += '<td>'+currentline["dateconvocation"]+'</td>';
                                contenu += '<td>'+currentline["datepresentation"]+'</td>';
                                contenu += '<td>'+currentline["obs"]+'</td>';

                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateConvocation('+currentline["id"]+', \''+currentline["motif"]+'\', \''+currentline["dateemission"]+'\', \''+currentline["dateconvocation"]+'\', \''+currentline["datepresentation"]+'\', \''+currentline["obs"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteConvocation('+currentline["id"]+', \''+currentline["motif"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuconv').innerHTML = '<tr> <td colspan="7"><center> Aucune convocation n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuconv').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideConvocation(){
                // récupération des données du formulaire 

                token = document.getElementById("_token").value;
                motifconv = document.getElementById("motifconv").value;
                dateemissionconv = document.getElementById("dateemissionconv").value;
                dateconvocationconv = document.getElementById("dateconvocationconv").value;
                datepresentationconv = document.getElementById("datepresentationconv").value;
                obsconv = document.getElementById("obsconv").value;
                
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || motifconv == "" || dateemissionconv == "" || dateconvocationconv == "" || datepresentationconv == "" || obsconv == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(motifconv == "")
                        error += ". Le champ Motif ne peut pas être vide <br>";
                    if(dateemissionconv == "")
                        error += ". Le champ Date d'émission ne peut pas être vide <br>";
                    if(dateconvocationconv == "")
                        error += ". Le champ Numéro de tableau ne peut pas être vide <br>";
                    if(datepresentationconv == "")
                        error += ". Le champ Agent causal ne peut pas être vide <br>";
                    if(obsconv == "")
                        error += ". Le champ Observation ne peut pas être vide <br>";

                    document.getElementById('infoconv').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, motif: motifconv, dateemission: dateemissionconv, dateconvocation: dateconvocationconv, datepresentation: datepresentationconv, obs: obsconv, personnel: personnel,
                    };

                    document.getElementById("infoconv").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                        try {
                            let response = await fetch("<?php echo e(route('SConvP')); ?>",
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
                                    document.getElementById("infoconv").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getConvocation();
                                    initConvocation();
                                }else{
                                    document.getElementById("infoconv").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoconv").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoconv").innerHTML = error;
                        } 
                }
            }

            async function setdeleteConvocation(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteconv").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteconv").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    try {
                        let response = await fetch("<?php echo e(route('DConvP')); ?>",
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
                            document.getElementById("infodeleteconv").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                            getConvocation();
                        }else{
                            document.getElementById("infodeleteconv").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteconv").innerHTML = error;
                        } 
            }

            function afficheajouterCpnvocation() {
                document.getElementById('addplusconv').style.display = "none";
                document.getElementById('bloquesupconv').style.display = "none";
                document.getElementById('bloqueaddconv').style.display = "block"; 
                initConvocation();
                document.getElementById('myModalLabelconv').innerHTML = "CONVOCATION :  ";
            }

            async function getupdateConvocation(id, motif, emission, convocation, presentation, obs){
                document.getElementById('infoconv').innerHTML = "Vous voulez vraiment modifier la convocation "+motif+" ?";
                document.getElementById('myModalLabelconv').innerHTML = "Modification : ";
                document.getElementById('bloquesupconv').style.display = "none";
                document.getElementById('bloqueaddconv').style.display = "block";
                document.getElementById('modifconv').innerHTML = "MODIFER";
                document.getElementById('addplusconv').style.display = "block";
                document.getElementById("motifconv").value = motif;
                document.getElementById("dateemissionconv").value = emission;
                document.getElementById("dateconvocationconv").value = convocation;
                document.getElementById("datepresentationconv").value = presentation;
                document.getElementById("obsconv").value = obs;
            }

            async function getdeleteConvocation(id, obs){
                document.getElementById('infodeleteconv').innerHTML = "Vous voulez vraiment supprimer la convocation "+obs+"  ?";
                document.getElementById('iddeleteconv').value = id;
                document.getElementById('bloquesupconv').style.display = "block";
                document.getElementById('bloqueaddconv').style.display = "none";
                document.getElementById('myModalLabelconv').innerHTML = "Suppression : ";
                document.getElementById('addplusconv').style.display = "block";
            }

            function initConvocation(){
                document.getElementById("motifconv").value = "";
                document.getElementById("dateemissionconv").value = "";
                document.getElementById("dateconvocationconv").value = "";
                document.getElementById("datepresentationconv").value = "";
                document.getElementById("obsconv").value = "";
            }

             /** Consultation */
            async function getConsultation(){
                getListConsultationn();
            }

            async function getListConsultationn() {
                    try {
                        let response = await fetch("<?php echo e(route('GConsP')); ?>",
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
                                contenu += '<th>'+currentline["date"]+'</th>';
                                contenu += '<td> <span class="co-name">'+currentline["plainte"]+'</span></td>';
                                contenu += '<td>'+currentline["constante"]+'</td>';

                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateConsultation('+currentline["id"]+', \''+currentline["date"]+'\', \''+currentline["plainte"]+'\', \''+currentline["constante"]+'\', \''+currentline["examen"]+'\', \''+currentline["diagnostic"]+'\', \''+currentline["traite"]+'\', \''+currentline["bilan"]+'\', \''+currentline["obs"]+'\')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteConsultation('+currentline["id"]+', \''+currentline["plainte"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenucons').innerHTML = '<tr> <td colspan="4"><center> Aucune consultation n\'est enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenucons').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideConsultation(){
                // récupération des données du formulaire 

                token = document.getElementById("_token").value; 
                datecons = document.getElementById("datecons").value;
                plaintecons = document.getElementById("plaintecons").value;
                constantecons = document.getElementById("constantecons").value;
                examencons = document.getElementById("examencons").value;
                diagnosticcons = document.getElementById("diagnosticcons").value;
                bilancons = document.getElementById("bilancons").value;
                traitecons = document.getElementById("traitecons").value;
                obscons = document.getElementById("obscons").value;
                
                personnel = document.getElementById("personnel").value;
                

                if(token == "" || datecons == "" || plaintecons == "" || constantecons == "" || examencons == "" || diagnosticcons == "" || bilancons == "" || traitecons == "" || obscons == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(datecons == "")
                        error += ". Le champ Date ne peut pas être vide <br>";
                    if(plaintecons == "")
                        error += ". Le champ Painte ne peut pas être vide <br>";
                    if(constantecons == "")
                        error += ". Le champ Constante ne peut pas être vide <br>";
                    if(examencons == "")
                        error += ". Le champ Examen ne peut pas être vide <br>";
                    if(diagnosticcons == "")
                        error += ". Le champ Diagnostic ne peut pas être vide <br>";
                    if(bilancons == "")
                        error += ". Le champ Bilan ne peut pas être vide <br>";
                    if(traitecons == "")
                        error += ". Le champ Traitement ne peut pas être vide <br>";
                    if(obscons == "")
                        error += ". Le champ Observation ne peut pas être vide <br>";

                    document.getElementById('infocons').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, date: datecons, plainte: plaintecons, constante: constantecons, examen: examencons, diagnostic: diagnosticcons, bilan: bilancons, traite: traitecons, obs: obscons, personnel: personnel,
                    };

                    document.getElementById("infocons").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                        try {
                            let response = await fetch("<?php echo e(route('SConsP')); ?>",
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
                                    document.getElementById("infocons").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getConsultation();
                                    initConsultation();
                                }else{
                                    document.getElementById("infocons").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infocons").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infocons").innerHTML = error;
                        } 
                }
            }

            async function setdeleteConsultation(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeletecons").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeletecons").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    try {
                        let response = await fetch("<?php echo e(route('DConsP')); ?>",
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
                            document.getElementById("infodeletecons").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                            getConsultation();
                        }else{
                            document.getElementById("infodeletecons").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeletecons").innerHTML = error;
                        } 
            }

            function afficheajouterConsultation() {
                document.getElementById('addpluscons').style.display = "none";
                document.getElementById('bloquesupcons').style.display = "none";
                document.getElementById('bloqueaddcons').style.display = "block"; 
                initConsultation();
                document.getElementById('myModalLabelcons').innerHTML = "CONSULTATION :  ";
            }

            async function getupdateConsultation(id, date, plainte, constante, examen, dia, traite, bilan, obs){
                document.getElementById('infocons').innerHTML = "Vous voulez vraiment modifier la consultation "+plainte+" ?";
                document.getElementById('myModalLabelcons').innerHTML = "Modification : ";
                document.getElementById('bloquesupcons').style.display = "none";
                document.getElementById('bloqueaddcons').style.display = "block";
                document.getElementById('modifcons').innerHTML = "MODIFER";
                document.getElementById('addpluscons').style.display = "block";
                document.getElementById("datecons").value = date;
                document.getElementById("plaintecons").value = plainte;
                document.getElementById("constantecons").value = constante;
                document.getElementById("examencons").value = examen;
                document.getElementById("diagnosticcons").value = dia;
                document.getElementById("bilancons").value = bilan;
                document.getElementById("traitecons").value = traite;
                document.getElementById("obscons").value =obs;
            }

            async function getdeleteConsultation(id, plainte){
                document.getElementById('infodeletecons').innerHTML = "Vous voulez vraiment supprimer la consultation "+plainte+"  ?";
                document.getElementById('iddeletecons').value = id;
                document.getElementById('bloquesupcons').style.display = "block";
                document.getElementById('bloqueaddcons').style.display = "none";
                document.getElementById('myModalLabelcons').innerHTML = "Suppression : ";
                document.getElementById('addpluscons').style.display = "block";
            }

            function initConsultation(){
                document.getElementById("datecons").value ="";
                document.getElementById("plaintecons").value = "";
                document.getElementById("constantecons").value = "";
                document.getElementById("examencons").value ="";
                document.getElementById("diagnosticcons").value = "";
                document.getElementById("bilancons").value = "";
                document.getElementById("traitecons").value = "";
                document.getElementById("obscons").value ="";
                
            }

            /** Visite */
            async function getVisite(){
                getlistVisite();
            }

            async function getlistVisite() {
                    try {
                        let response = await fetch("<?php echo e(route('GVisiteP')); ?>",
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
                                contenu += '<th> <span class="co-name">'+currentline["plainte"]+'</span></th>';
                                contenu += '<td>'+currentline["examen"]+'</td>';
                                contenu += '<td>';
                                contenu += '<?php if(in_array("update_caract_outil", session("auto_action"))): ?> <button type="button" title="Modifier"  class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getupdateVisite('+currentline["id"]+', '+currentline+')"> <i class="material-icons">system_update_alt</i></button> <?php endif; ?>';
                                contenu += '<?php if(in_array("delete_outil", session("auto_action"))): ?><button type="button" title="Supprimer"  class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="getdeleteVisite('+currentline["id"]+', \''+currentline["plainte"]+'\')"><i class="material-icons">delete_sweep</i></a> </button> <?php endif; ?>';
                                contenu += "</td>";
                                contenu += '</tr>';
                            }); 
                            if(contenu == "")
                                document.getElementById('contenuantecedent').innerHTML = '<tr> <td colspan="4"><center> Aucune visite médicale enregistré. </center> </td> </tr>';
                            else
                                document.getElementById('contenuantecedent').innerHTML = contenu;
                        }
                        else{
                            return "";
                        }
                    } catch (error) {
                        return "";
                    }
            }

            async function valideVisite(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value;
                // I
                plaintevisite = document.getElementById("plaintevisite").value;
                examenvisite = document.getElementById("examenvisite").value;
                poidsvisite = document.getElementById("poidsvisite").value;
                taillevisite = document.getElementById("taillevisite").value;
                ptivisite = document.getElementById("ptivisite").value;
                ptevisite = document.getElementById("ptevisite").value;
                pavisite = document.getElementById("pavisite").value;
                poulvisite = document.getElementById("poulvisite").value;
                avvisite = document.getElementById("avvisite").value;
                odvisite = document.getElementById("odvisite").value;
                ogvisite = document.getElementById("ogvisite").value;
                tavisite = document.getElementById("tavisite").value;

                // II
                biovisite_gly = document.getElementById("biovisite_gly").value;
                biovisite_alb = document.getElementById("biovisite_alb").value;
                biovisite_glyc = document.getElementById("biovisite_glyc").value;
                biovisite_uree = document.getElementById("biovisite_uree").value;
                biovisite_ctnnm = document.getElementById("biovisite_ctnnm").value;
                biovisite_acuq = document.getElementById("biovisite_acuq").value;
                biovisite_tamgo = document.getElementById("biovisite_tamgo").value;
                biovisite_tamgt = document.getElementById("biovisite_tamgt").value;
                biovisite_cltrt = document.getElementById("biovisite_cltrt").value;
                biovisite_cltlhdl = document.getElementById("biovisite_cltlhdl").value;
                biovisite_cltlldl = document.getElementById("biovisite_cltlldl").value;
                biovisite_tgcd = document.getElementById("biovisite_tgcd").value;
                biovisite_nfs = document.getElementById("biovisite_nfs").value;
                biovisite_pqt = document.getElementById("biovisite_pqt").value;
                biovisite_aghs = document.getElementById("biovisite_aghs").value;
                biovisite_ahvc = document.getElementById("biovisite_ahvc").value;
                biovisite_hiv = document.getElementById("biovisite_hiv").value;
                biovisite_other = document.getElementById("biovisite_other").value;
                electrovisite = document.getElementById("electrovisite").value;
                audiovisite = document.getElementById("audiovisite").value;
                spiromvisite = document.getElementById("spiromvisite").value;
                rxpulmvisite = document.getElementById("rxpulmvisite").value;

                // III
                infosconduite = document.getElementById("infosconduite").value;
                infosordonnanceconduite = document.getElementById("infosordonnanceconduite").value;
                
                // IV
                aptvisite = document.getElementById("aptvisite").value;

                personnel = document.getElementById("personnel").value;
                
                aptitude = "";
                
                for (var checkbox of aptvisite)
                {
                    if (checkbox.checked) {
                        aptitude += "|"+checkbox.value;
                    }
                }
                

                if(token == "" || plaintevisite == "" || examenvisite == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(plaintevisite == "")
                        error += ". Le champ Plainte ne peut pas être vide <br>";
                    if(examenvisite == "")
                        error += ". Le champ Examen du Clinique ne peut pas être vide <br>";

                    document.getElementById('infovisi').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, plainte: plaintevisite, examen: examenvisite, poids: poidsvisite, og:ogvisite, ta:tavisite,
                        taille:taillevisite, pti:ptivisite, pte:ptevisite, pa:pavisite, poul:poulvisite, av:avvisite, od:odvisite,
                        bio_gly:biovisite_gly, bio_alb:biovisite_alb, bio_glyc:biovisite_glyc, bio_uree:biovisite_uree, bio_ctnnm:biovisite_ctnnm,
                        bio_acuq:biovisite_acuq, bio_tamgo:biovisite_tamgo, bio_tamgt:biovisite_tamgt, bio_cltrt:biovisite_cltrt, 
                        bio_cltlhdl:biovisite_cltlhdl, bio_cltlldl:biovisite_cltlldl, bio_tgcd:biovisite_tgcd, bio_nfs:biovisite_nfs,
                        bio_pqt:biovisite_pqt, bio_aghs:biovisite_aghs, bio_ahvc:biovisite_ahvc, bio_hiv:biovisite_hiv, bio_other:biovisite_other,
                        electro:electrovisite, audio:audiovisite, spirom:spiromvisite, rxpulm:rxpulmvisite, infosconduite:infosconduite, infosordonnanceconduite:infosordonnanceconduite, aptitude:aptitude
                         personnel: personnel,
                    };

                    document.getElementById("infovisi").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('SVisiteP')); ?>",
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
                                    document.getElementById("infovisi").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    getVisite();
                                    initVisite();
                                }else{
                                    document.getElementById("infovisi").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infovisi").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infovisi").innerHTML = error;
                        } 
                }
            }

            async function getdeleteVisite(id, nom){
                document.getElementById('infodeletevisi').innerHTML = "Vous voulez vraiment supprimer la visite dont la plainte est "+nom+" ?";
                document.getElementById('iddeletevisi').value = id;
                document.getElementById('bloquesupvisi').style.display = "block";
                document.getElementById('bloqueaddvisi').style.display = "none";
                document.getElementById('myModalLabelvisi').innerHTML = "Suppression : ";
                document.getElementById('addplusvisi').style.display = "block";
            }

            async function setdeleteVisite(){
                token = document.getElementById("_token").value;
                iddelete = document.getElementById("iddeleteantecedent").value;
                    
                dat = {_token: token, id: iddelete,};

                    document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                    
                    // En cours d'envoie
                        try {
                            let response = await fetch("<?php echo e(route('DPA')); ?>",
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
                                document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+data+'</strong></div>';
                                getlistAntecedent();
                            }
                            else{
                                document.getElementById("infodeleteantecedent").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infodeleteantecedent").innerHTML = error;
                        } 
            }

            function seedetailaptitude(aptitude) {
                tab = aptitude.split("|");

                    document.getElementById("apteapti").checked = false;
                    document.getElementById("apteavecrapti").checked = false;
                    document.getElementById("apteavecpapti").checked = false;
                    document.getElementById("inaptepapti").checked = false;
                    document.getElementById("inaptetapti").checked = false;
                    document.getElementById("inapteallpapti").checked = false;
                    document.getElementById("otherinapteapti").checked = false;

                if(tab.includes("apteapti"))
                    document.getElementById("apteapti").checked = true;
                if(tab.includes("apteavecrapti"))
                    document.getElementById("apteavecrapti").checked = true;
                if(tab.includes("apteavecpapti"))
                    document.getElementById("apteavecpapti").checked = true;
                if(tab.includes("inaptepapti"))
                    document.getElementById("inaptepapti").checked = true;
                if(tab.includes("inaptetapti"))
                    document.getElementById("inaptetapti").checked = true;
                if(tab.includes("inapteallpapti"))
                    document.getElementById("inapteallpapti").checked = true;
                if(tab.includes("otherinapteapti"))
                    document.getElementById("otherinapteapti").checked = true;
            }

            async function getupdateVisite(id, data){
                document.getElementById('infovisi').innerHTML = "Vous voulez vraiment modifier les informations de "+data['plainte']+" ?";
                document.getElementById('myModalLabelvisi').innerHTML = "Modification : ";
                document.getElementById('bloquesupvisi').style.display = "none";
                document.getElementById('bloqueaddvisi').style.display = "block"; 
                document.getElementById('modifvisi').innerHTML = "MODIFER";
                
                // I
                document.getElementById("plaintevisite").value = data['plainte'];
                document.getElementById("examenvisite").value = data['examen'];
                document.getElementById("poidsvisite").value = data['poids'];
                document.getElementById("taillevisite").value = data['taille'];
                document.getElementById("ptivisite").value = data['pti'];
                document.getElementById("ptevisite").value = data['pte'];
                document.getElementById("pavisite").value = data['pa'];
                document.getElementById("poulvisite").value = data['poul'];
                document.getElementById("avvisite").value = data['av'];
                document.getElementById("odvisite").value = data['od'];
                document.getElementById("ogvisite").value = data['og'];
                document.getElementById("tavisite").value = data['ta'];

                // II
                document.getElementById("see_biovisite_gly").value = '<select type="text" id="biovisite_gly" name="biovisite_gly" class="form-control"> <option> '+data['bio_gly']+'</option> <option>SUPERIEUR</option> <option>INFERIEUR</option> <option>EGAL</option> </select>';
                document.getElementById("see_biovisite_alb").value = '<select type="text" id="biovisite_alb" name="biovisite_alb" class="form-control"> <option>'+data['bio_alb']+' </option><option>SUPERIEUR</option><option>INFERIEUR</option><option>EGAL</option></select>';
                document.getElementById("see_biovisite_glyc").value = '<select type="text" id="biovisite_glyc" name="biovisite_glyc" class="form-control"> <option>'+data['bio_glyc']+' </option><option>SUPERIEUR</option><option>INFERIEUR</option><option>EGAL</option></select>';
                document.getElementById("see_biovisite_uree").value = '<select type="text" id="biovisite_uree" name="biovisite_uree" class="form-control"> <option>'+data['bio_uree']+' </option><option>SUPERIEUR</option><option>INFERIEUR</option><option>EGAL</option></select>';
                document.getElementById("see_biovisite_ctnnm").value = data['bio_ctnnm'];
                document.getElementById("see_biovisite_acuq").value = data['bio_acuq'];
                document.getElementById("see_biovisite_tamgo").value = data['bio_tamgo'];
                document.getElementById("see_biovisite_tamgt").value = data['bio_tamgt'];
                document.getElementById("see_biovisite_cltrt").value = data['bio_cltrt'];
                document.getElementById("see_biovisite_cltlhdl").value = data['bio_cltlhdl'];
                document.getElementById("see_biovisite_cltlldl").value = data['bio_cltlldl'];
                document.getElementById("see_biovisite_tgcd").value = data['bio_tgcd'];
                document.getElementById("see_biovisite_nfs").value = data['bio_nfs'];
                document.getElementById("see_biovisite_pqt").value = data['bio_pqt'];
                document.getElementById("see_biovisite_aghs").value = data['bio_aghs'];
                document.getElementById("see_biovisite_ahvc").value =data['bio_ahvc'];
                document.getElementById("see_biovisite_hiv").value = data['bio_hiv'];
                document.getElementById("see_biovisite_other").value = data['bio_other'];
                document.getElementById("see_electrovisite").value = data['electro'];
                document.getElementById("see_audiovisite").value = data['audio'];
                document.getElementById("see_spiromvisite").value = data['spirom'];
                document.getElementById("see_rxpulmvisite").value = data['rxpulm'];

                // III
                document.getElementById("infosconduite").value = data['infosconduite'];
                document.getElementById("infosordonnanceconduite").value = data['infosordonnanceconduite'];
                

                // IV
                seedetailaptitude(data['aptitude']);
                
                document.getElementById('addplusvisi').style.display = "block";
            }

            function initVisite(){
                // I
                document.getElementById("plaintevisite").value = "";
                document.getElementById("examenvisite").value = "";
                document.getElementById("poidsvisite").value = "";
                document.getElementById("taillevisite").value = "";
                document.getElementById("ptivisite").value = "";
                document.getElementById("ptevisite").value ="";
                document.getElementById("pavisite").value ="";
                document.getElementById("poulvisite").value ="";
                document.getElementById("avvisite").value ="";
                document.getElementById("odvisite").value = "";
                document.getElementById("ogvisite").value ="";
                document.getElementById("tavisite").value ="";

                // II
                document.getElementById("biovisite_gly").value;
                document.getElementById("biovisite_alb").value;
                document.getElementById("biovisite_glyc").value;
                document.getElementById("biovisite_uree").value;
                document.getElementById("biovisite_ctnnm").value;
                document.getElementById("biovisite_acuq").value;
                document.getElementById("biovisite_tamgo").value;
                document.getElementById("biovisite_tamgt").value;
                document.getElementById("biovisite_cltrt").value;
                document.getElementById("biovisite_cltlhdl").value;
                document.getElementById("biovisite_cltlldl").value;
                document.getElementById("biovisite_tgcd").value;
                document.getElementById("biovisite_nfs").value;
                document.getElementById("biovisite_pqt").value;
                document.getElementById("biovisite_aghs").value;
                document.getElementById("biovisite_ahvc").value;
                document.getElementById("biovisite_hiv").value;
                document.getElementById("biovisite_other").value;
                document.getElementById("electrovisite").value;
                document.getElementById("audiovisite").value;
                document.getElementById("spiromvisite").value;
                document.getElementById("rxpulmvisite").value;

                // III
                document.getElementById("infosconduite").value;
                document.getElementById("infosordonnanceconduite").value;
                
                // IV
                document.getElementById("aptvisite").value;
                
            }
        </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("model"); ?>

    <div class="modal fade" id="antecedentadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelant">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelant">Antécédent : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddantecedent">
                            <label id="infoantecedent"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label>Médicaux :</label> <br>
                                    <input type="checkbox" id="hta" name="medi" value="hta" class="filled-in chk-col-brown" />
                                    <label for="hta">Hypertension artérielle </label> <br>
                                    <input type="checkbox" id="hota" name="medi" value="hota" class="filled-in chk-col-brown" />
                                    <label for="hota">Hypotension  artérielle </label> <br>
                                    <input type="checkbox" id="dbt" name="medi" value="dbt" class="filled-in chk-col-brown" />
                                    <label for="dbt">Diabète  </label> <br>
                                    <input type="checkbox" id="ucr" name="medi" value="ucr" class="filled-in chk-col-brown" />
                                    <label for="ucr">Ulcère  </label> <br>
                                    <input type="checkbox" id="atm" name="medi" value="atm" class="filled-in chk-col-brown" />
                                    <label for="atm">Asthme  </label> <br>
                                    <input type="checkbox" id="snt" name="medi" value="snt" class="filled-in chk-col-brown" />
                                    <label for="snt">Sinusite  </label> <br>
                                    <input type="checkbox" id="mdh" name="medi" value="mdh" class="filled-in chk-col-brown" />
                                    <label for="mdh">Maladie hémorroïdaire  </label> <br>
                                    <input type="checkbox" id="epp" name="medi" value="epp" class="filled-in chk-col-brown" />
                                    <label for="epp">Epilepsie  </label> <br>
                                    <input type="checkbox" id="dpc" name="medi" value="dpc" class="filled-in chk-col-brown" />
                                    <label for="dpc">Drépanocytose </label> <br>
                                    <input type="checkbox" id="hptt" name="medi" value="hptt" class="filled-in chk-col-brown" />
                                    <label for="hptt">Hépatite </label> <br>
                                    <input type="checkbox" id="tbc" name="medi" value="tbc" class="filled-in chk-col-brown" />
                                    <label for="tbc">Tabac (café thé sommeil sedentarité )  </label> <br>
                                    <input type="checkbox" id="acl" name="medi" value="acl" class="filled-in chk-col-brown" />
                                    <label for="acl">Alcool  </label> <br>
                                    <input type="checkbox" id="ats" name="medi" value="ats" class="filled-in chk-col-brown" />
                                    <label for="ats">Autres  </label> <br>

                                </div>
                                <div class="col-md-6">
                                   <label for="chirurgicaux">Chirurgicaux :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="chirurgicaux" name="chirurgicaux" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="typeantecedent">Type : </label>
                                   <div class="form-group">
                                    <div class="form-line" id="seetype">
                                        <select type="text" id="typeantecedent" name="typeantecedent" class="form-control" required>
                                            <option>PERSONNELS</option>
                                            <option>PROFESSIONNELS</option>
                                            <option>FAMILIAUX</option>
                                            <option>SOCIAUX </option>
                                        </select>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <button onclick="valideantecedent()" id="modif" class="btn bg-deep-orange waves-effect">AJOUTER</button> <br><br>
                        </div>

                        <div id="bloquesuppantecedent" style="display: none;">
                            <label id="infodeleteantecedent"></label>
                            <input type="hidden" id="iddeleteantecedent" /> <br><br>
                            <button onclick="setdeleteantecedent()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">Type</th>
                                            <th data-priority="1">Médicaux</th>
                                            <th data-priority="1">Chirurgicaux</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuantecedent">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplus" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouter()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="posteantadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelposteant">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelposteant">POSTES DE TRAVAIL OCCUPES ANTERIEUREMENT : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddposteant">
                            <label id="infoposteant"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="denominationposteant">DENOMINATION :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="denominationposteant" name="denominationposteant" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="factnuissancepostant">FACTEURS DE NUISANCE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="factnuissancepostant" name="factnuissancepostant" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="periodedebutposte">PERIODE DEBUT : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="periodedebutposte" name="periodedebutposte" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="periodefinposte">PERIODE FIN : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="date" id="periodefinposte" name="periodefinposte" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="entreprisepostant">ENTREPRISE : </label>
                                   <div class="form-group">
                                    <div class="form-line" id="seetypeposteant">
                                        <select type="text" id="entreprisepostant" name="entreprisepostant" class="form-control" required>
                                            <?php 
                                                $all = App\Providers\InterfaceServiceProvider::AllService();
                                            ?> 
                                            <option value="0">Sélectionner une entreprise</option>
                                            <?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entreprise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($entreprise->id); ?>"> <?php echo e($entreprise->libelle); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <button onclick="valideposteant()" id="modifpostant" class="btn bg-deep-orange waves-effect">AJOUTER</button> <br><br>
                        </div>

                        <div id="bloquesuppposteant" style="display: none;">
                            <label id="infodeleteposteant"></label>
                            <input type="hidden" id="iddeleteposteant" /> <br><br>
                            <button onclick="setdeleteposteant()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">DENOMINATION</th>
                                            <th data-priority="1">ENTREPRISE</th>
                                            <th data-priority="1">PERIODE</th> 
                                            <th data-priority="1">FACTEURS</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuposteant">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusposteant" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterposteant()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="posteactuadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelposteactu">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelposteactu">POSTES OCCUPES ACTUELLEMENT : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddposteactu">
                            <label id="infoposteactu"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="periodedebutposteactu">PERIODE DEBUT : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="periodedebutposteactu" name="periodedebutposteactu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="periodefinposteactu">PERIODE FIN : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="date" id="periodefinposteactu" name="periodefinposteactu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="posteactu">POSTE :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="posteactu" name="posteactu" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="factnuissancepostactu">FACTEURS DE NUISANCE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="factnuissancepostactu" name="factnuissancepostactu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="tachesactu">TACHES :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tachesactu" name="tachesactu" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="rythmeactu">RYTHME DE TRAVAIL :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="rythmeactu" name="rythmeactu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="metrodateactu">METROLOGIE <br> Date  :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="metrodateactu" name="metrodateactu" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-4">
                                   <label for="metrotypeactu">METROLOGIE <br> TYPE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="metrotypeactu" name="metrotypeactu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                   <label for="metroractu">METROLOGIE <br> R :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="metroractu" name="metroractu" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <button onclick="valideposteactu()" id="modifpostactu" class="btn bg-deep-orange waves-effect">AJOUTER</button> <br><br>
                        </div>

                        <div id="bloquesuppposteactu" style="display: none;">
                            <label id="infodeleteposteactu"></label>
                            <input type="hidden" id="iddeleteposteactu" /> <br><br>
                            <button onclick="setdeleteposteactu()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">PERIODE</th>
                                            <th data-priority="1">POSTE</th>
                                            <th data-priority="1">TACHES</th> 
                                            <th data-priority="1">RYTHME</th> 
                                            <th data-priority="1">FACTEURS</th>
                                            <th data-priority="1">METROLOGIE</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuposteactu">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusposteactu" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterposteactu()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="vaccinationadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelvacc">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelvacc">VACCINATION : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddvacc">
                            <label id="infovacc"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="datevacc">DATE : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="datevacc" name="datevacc" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="vaccinvacc">VACCIN : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="text" id="vaccinvacc" name="vaccinvacc" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="lotvacc">LOT :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="lotvacc" name="lotvacc" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-4">
                                   <label for="typevacc">TYPE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="typevacc" name="typevacc" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="dosevacc">DOSE :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="dosevacc" name="dosevacc" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <button onclick="valideVaccination()" id="modifvacc" class="btn bg-deep-orange waves-effect">AJOUTER</button> <br><br>
                        </div>

                        <div id="bloquesupvacc" style="display: none;">
                            <label id="infodeletevacc"></label>
                            <input type="hidden" id="iddeletevacc" /> <br><br>
                            <button onclick="setdeleteVaccination()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">DATE</th>
                                            <th data-priority="1">VACCIN</th>
                                            <th data-priority="1">LOT</th> 
                                            <th data-priority="1">TYPE</th> 
                                            <th data-priority="1">DOSE</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuvacc">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusvacc" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterVaccination()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="absenteismeadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelabse">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelabse">ABSENTEISME : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddabse">
                            <label id="infoabse"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="typeabse">TYPE : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="typeabse" name="typeabse" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="causeabse">CAUSE : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="text" id="causeabse" name="causeabse" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="debutabse">DEBUT :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="debutabse" name="debutabse" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-4">
                                   <label for="repriseabse">REPRISE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="repriseabse" name="repriseabse" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="nombrejoursarretabse">N. JOURS D'ARRET :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="nombrejoursarretabse" name="nombrejoursarretabse" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <button onclick="valideAbsenteisme()" id="modifabse" class="btn bg-deep-orange waves-effect">AJOUTER</button> <br><br>
                        </div>

                        <div id="bloquesupabse" style="display: none;">
                            <label id="infodeleteabse"></label>
                            <input type="hidden" id="iddeleteabse" /> <br><br>
                            <button onclick="setdeleteAbsenteisme()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">TYPE</th>
                                            <th data-priority="1">CAUSE</th>
                                            <th data-priority="1">DEBUT</th> 
                                            <th data-priority="1">REPRISE</th> 
                                            <th data-priority="1">N. JOURS D'ARRET</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuabse">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusabse" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterAbsenteisme()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accidentadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelacci">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelacci">ACCIDENT DU TRAVAIL : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddacci">
                            <label id="infoacci"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="dateacci">DATE : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="dateacci" name="dateacci" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="emcacci">ELEMENT MATERIEL CAUSAL : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="text" id="emcacci" name="emcacci" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="ndlacci">NATURE DES LESIONS :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ndlacci" name="ndlacci" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="posteacci">POSTE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="posteacci" name="posteacci" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="njaacci">NBRE DE JOURS D’ARRET :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="njaacci" name="njaacci" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="ippacci">INCAPACITE PERMANENTE PARTIELLE :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ippacci" name="ippacci" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="obsacci">OBSERVATION :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="obsacci" name="obsacci" class="form-control" required>
                                        </div>
                                   </div>
                                </div>
                            </div>
                            <button onclick="valideAccident()" id="modifacci" class="btn bg-deep-orange waves-effect">AJOUTER</button><br><br>
                        </div>
                        <div id="bloquesupacci" style="display: none;">
                            <label id="infodeleteacci"></label>
                            <input type="hidden" id="iddeleteacci" /> <br><br>
                            <button onclick="setdeleteAccident()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">DATE</th>
                                            <th data-priority="1">ELEMENT MATERIEL CAUSAL</th>
                                            <th data-priority="1">NATURE DES LESIONS</th> 
                                            <th data-priority="1">POSTE</th> 
                                            <th data-priority="1">NBRE DE JOURS D’ARRET</th>
                                            <th data-priority="1">INCAPACITE PERMANENTE PARTIELLE</th>
                                            <th data-priority="1">OBSERVATION</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuacci">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusacci" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterAccident()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="maladieadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelmala">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelmala">MALADIE PROFESSIONNELLE : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddmala">
                            <label id="infomala"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="datemala">DATE : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="datemala" name="datemala" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="maladiemala">MALADIE : </label>
                                   <div class="form-group">
                                    <div class="form-line" >
                                        <input type="text" id="maladiemala" name="maladiemala" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="tableaumala">N° TABLEAU :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="tableaumala" name="tableaumala" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="agentmala">AGENT CAUSAL :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="agentmala" name="agentmala" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="postemala">POSTE :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="postemala" name="postemala" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="decisionmala">DECISION :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="decisionmala" name="decisionmala" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <button onclick="valideMaladie()" id="modifmala" class="btn bg-deep-orange waves-effect">AJOUTER</button><br><br>
                        </div>
                        <div id="bloquesupmala" style="display: none;">
                            <label id="infodeletemala"></label>
                            <input type="hidden" id="iddeletemala" /> <br><br>
                            <button onclick="setdeleteMaladie()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">DATE</th>
                                            <th data-priority="1">MALADIE</th>
                                            <th data-priority="1">TABLEAU</th> 
                                            <th data-priority="1">AGENT_CAUSAL</th> 
                                            <th data-priority="1">POSTE</th>
                                            <th data-priority="1">DECISION</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenumala">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusmala" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterMaladie()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="convocationadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelconv">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelconv">CONVOCATION : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddconv">
                            <label id="infoconv"></label>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label for="motifconv">Motif : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="motifconv" name="motifconv" class="form-control" required>
                                    </div>
                                   </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="dateemissionconv">Date d’émission :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="dateemissionconv" name="dateemissionconv" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                   <label for="dateconvocationconv">Date de convocation :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="dateconvocationconv" name="dateconvocationconv" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div> 
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="datepresentationconv">Date de présentation :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" id="datepresentationconv" name="datepresentationconv" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="obsconv">Observation :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="obsconv" name="obsconv" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <button onclick="valideConvocation()" id="modifconv" class="btn bg-deep-orange waves-effect">AJOUTER</button><br><br>
                        </div>
                        <div id="bloquesupconv" style="display: none;">
                            <label id="infodeleteconv"></label>
                            <input type="hidden" id="iddeleteconv" /> <br><br>
                            <button onclick="setdeleteConvocation()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">Motif</th>
                                            <th data-priority="1">Emission</th>
                                            <th data-priority="1">Convocation</th> 
                                            <th data-priority="1">Présentation</th> 
                                            <th data-priority="1">Observation</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuconv">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusconv" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterConvocation()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="consultationadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelcons">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelcons">CONSULTATION : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddcons">
                            <label id="infocons"></label>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="datecons">DATE : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" id="datecons" name="datecons" class="form-control" required>
                                    </div>
                                   </div> 
                                </div>
                                <div class="col-md-6">
                                    <label for="plaintecons">PLAINTES : </label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="plaintecons" name="plaintecons" class="form-control" required>
                                    </div>
                                   </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="constantecons">CONSTANTES :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="constantecons" name="constantecons" class="form-control" required>
                                        </div>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                   <label for="examencons">EXAMEN CLINIQUE :</label>
                                   <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="examencons" name="examencons" class="form-control" required>
                                    </div>
                                   </div>
                                </div> 
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="diagnosticcons">DIAGNOSTIC :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="diagnosticcons" name="diagnosticcons" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="bilancons">BILAN :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bilancons" name="bilancons" class="form-control" required>
                                        </div>
                                   </div> 

                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label for="traitecons">TRAITEMENT :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="traitecons" name="traitecons" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                                <div class="col-md-6">
                                    <label for="obscons">OBSERVATIONS :</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="obscons" name="obscons" class="form-control" required>
                                        </div>
                                   </div>

                                </div>
                            </div>
                            <button onclick="valideConsultation()" id="modifcons" class="btn bg-deep-orange waves-effect">AJOUTER</button><br><br>
                        </div>
                        <div id="bloquesupcons" style="display: none;">
                            <label id="infodeletecons"></label>
                            <input type="hidden" id="iddeletecons" /> <br><br>
                            <button onclick="setdeleteConsultation()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">DATE</th>
                                            <th data-priority="1">PLAINTES</th>
                                            <th data-priority="1">CONSTANTES</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenucons">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addpluscons" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterConsultation()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="visiteadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabelvisi">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelvisi">VISITE MEDICALE : </h4>
                </div>
                
                <div class="modal-body">
                        <input type="hidden" id="_token" name="_token" value="<?php echo e(csrf_token()); ?>" />
                        <div id="bloqueaddvisi">
                            <label id="infovisi"></label>
                            <div class="panel-group" id="cliniquepanel" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingClinique">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#cliniquepanel" href="#cliniquecontenu" aria-expanded="true" aria-controls="cliniquecontenu">
                                                I-    CLINIQUE
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="cliniquecontenu" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingClinique">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <label for="plaintevisite">Plaintes : </label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="plaintevisite" name="plaintevisite" class="form-control" required>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <label for="tableaumala">Mensurations :</label>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                           <label for="poidsvisite">Poids (kg) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="poidsvisite" name="poidsvisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="taillevisite">Taille (m) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="taillevisite" name="taillevisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="ptivisite">PTI (cm) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="ptivisite" name="ptivisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="ptevisite">PTE (cm) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="ptevisite" name="ptevisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="pavisite">PA (cm) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="pavisite" name="pavisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="poulvisite">Pouls (pls/mn): </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="poulvisite" name="poulvisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="avvisite">AV (/10): </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="avvisite" name="avvisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="odvisite">OD (/10) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="odvisite" name="odvisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="ogvisite">OG (/10) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="ogvisite" name="ogvisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <label for="tavisite">TA (mmHg) : </label>
                                                           <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="number" id="tavisite" name="tavisite" class="form-control">
                                                            </div>
                                                           </div>
                                                        </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <label for="examenvisite">EXAMEN CLINIQUE :</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="examenvisite" name="examenvisite" class="form-control">
                                                        </div>
                                                   </div>

                                                </div>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingExamCompl">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#examcompl" aria-expanded="false" aria-controls="examcompl">
                                                I-    Examens complémentaires
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="examcompl" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingExamCompl">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <label>Biologie :</label> <br>
                                                    <div class="col-md-6">
                                                        <label for="biovisite_gly">Glycosurie : </label>
                                                        <div class="form-group">
                                                        <div class="form-line" id="see_biovisite_gly">
                                                            <select type="text" id="biovisite_gly" name="biovisite_gly" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_alb">Albuminurie : </label>
                                                        <div class="form-group">
                                                        <div class="form-line" id="see_biovisite_alb">
                                                            <select type="text" id="biovisite_alb" name="biovisite_alb" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_glyc">Glycémie : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_glyc" name="biovisite_glyc" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_uree">Urée : </label>
                                                        <div class="form-group">
                                                        <div class="form-line" id="see_biovisite_uree">
                                                            <select type="text" id="biovisite_uree" name="biovisite_uree" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <label for="biovisite_ctnnm">Créatininémie : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_ctnnm" name="biovisite_ctnnm" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_acuq">Acide urique : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_acuq" name="biovisite_acuq" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_tamgo">Transaminases GO : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_tamgo" name="biovisite_tamgo" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_tamgt">Transaminases GT : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_tamgt" name="biovisite_tamgt" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_cltrt">Cholestérol T : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_cltrt" name="biovisite_cltrt" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_cltlhdl">Cholestérol HDL : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_cltlhdl" name="biovisite_cltlhdl" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_cltlldl">Cholestérol LDL : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_cltlldl" name="biovisite_cltlldl" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_tgcd">Triglycérides : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_tgcd" name="biovisite_tgcd" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_nfs">NFS : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_nfs" name="biovisite_nfs" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_pqt">Plaquettes : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_pqt" name="biovisite_pqt" class="form-control">
                                                                <option>SUPERIEUR</option>
                                                                <option>INFERIEUR</option>
                                                                <option>EGAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_aghs">AgHBs : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_aghs" name="biovisite_aghs" class="form-control">
                                                                <option>NORMAL</option>
                                                                <option>ANORMAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_ahvc">Ag HVC : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_ahvc" name="biovisite_ahvc" class="form-control">
                                                                <option>NORMAL</option>
                                                                <option>ANORMAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <label for="biovisite_hiv">HIV : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <select type="text" id="biovisite_hiv" name="biovisite_hiv" class="form-control">
                                                                <option>NORMAL</option>
                                                                <option>ANORMAL</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="biovisite_other">Autres biologie : </label>
                                                        <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="biovisite_other" name="biovisite_other" class="form-control">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                   <label for="electrovisite">Electrocardiogramme :</label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <select type="text" id="electrovisite" name="electrovisite" class="form-control">
                                                            <option>NORMAL</option>
                                                            <option>ANORMAL</option>
                                                        </select>
                                                    </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label for="audiovisite">Audiométrie :</label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <select type="text" id="audiovisite" name="audiovisite" class="form-control">
                                                            <option>NORMAL</option>
                                                            <option>ANORMAL</option>
                                                        </select>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                   <label for="spiromvisite">Spirométrie :</label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <select type="text" id="spiromvisite" name="spiromvisite" class="form-control">
                                                            <option>NORMAL</option>
                                                            <option>ANORMAL</option>
                                                        </select>
                                                    </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <label for="rxpulmvisite">Rx pulmonaire :</label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <select type="text" id="rxpulmvisite" name="rxpulmvisite" class="form-control">
                                                            <option>NORMAL</option>
                                                            <option>ANORMAL</option>
                                                        </select>
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                   <label for="otherexamvisite">Autres :</label>
                                                   <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" id="otherexamvisite" name="otherexamvisite" class="form-control">
                                                    </div>
                                                   </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingConduite">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#conduitevisite" aria-expanded="false" aria-controls="conduitevisite">
                                                III-    Conduite à tenir
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="conduitevisite" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingConduite">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <label for="infosconduite">Informations :</label> <br>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea type="text" id="infosconduite" name="infosconduite" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="infosordonnanceconduite">Ordonnance médicale :</label> <br>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea type="text" id="infosordonnanceconduite" name="infosordonnanceconduite" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingAptitude">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#aptitudevisiste" aria-expanded="false" aria-controls="aptitudevisiste">
                                                IV- Aptitude 
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="aptitudevisiste" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAptitude">
                                        <div class="panel-body">
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <input type="checkbox" id="apteapti" name="aptvisite" value="apteapti" class="filled-in chk-col-brown" />
                                                    <label for="apteapti">APTE</label> <br>

                                                    <input type="checkbox" id="apteavecrapti" name="aptvisite" value="apteavecrapti" class="filled-in chk-col-brown" />
                                                    <label for="apteavecrapti">APTE AVEC SUIVI MEDICAL REGULIER </label> <br>

                                                    <input type="checkbox" id="apteavecpapti" name="aptvisite" value="apteavecpapti" class="filled-in chk-col-brown" />
                                                    <label for="apteavecpapti">APTE  AVEC AMENAGEMENT DE POSTE </label> <br>

                                                    <input type="checkbox" id="inaptepapti" name="aptvisite" value="inaptepapti" class="filled-in chk-col-brown" />
                                                    <label for="inaptepapti">INAPTE  AU POSTE, mais APTE A UN AUTRE </label> <br>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="checkbox" id="inaptetapti" name="aptvisite" value="inaptetapti" class="filled-in chk-col-brown" />
                                                    <label for="inaptetapti">INAPTE  TEMPORAIREMENT </label> <br>

                                                    <input type="checkbox" id="inapteallpapti" name="aptvisite" value="inapteallpapti" class="filled-in chk-col-brown" />
                                                    <label for="inapteallpapti">INAPTE  A TOUS LES POSTES </label> <br>

                                                    <input type="checkbox" id="otherinapteapti" name="aptvisite" value="otherinapteapti" class="filled-in chk-col-brown" />
                                                    <label for="otherinapteapti">AUTRES  </label> <br>
                                                    


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button onclick="valideVisite()" id="modifvisi" class="btn bg-deep-orange waves-effect">AJOUTER</button><br><br>
                        </div>
                        <div id="bloquesupvisi" style="display: none;">
                            <label id="infodeletevisi"></label>
                            <input type="hidden" id="iddeletevisi" /> <br><br>
                            <button onclick="setdeleteVisite()" class="btn bg-deep-red waves-effect">SUPPRIMER</button> <br><br>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">PLAINTES</th>
                                            <th data-priority="1">EXAMEN</th>
                                            <th data-priority="1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="contenuvisi">

                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" title="Ajouter"  id="addplusvisi" class="btn btn-default btn-circle btn-xs  margin-bottom-10 waves-effect waves-light" onclick="afficheajouterVisite()" style="display:none;"><i class="material-icons" style="color: cyan;">add</i></a> </button>
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templatedste._temp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\medecindoc\resources\views/viewadmindste/actionsother.blade.php ENDPATH**/ ?>
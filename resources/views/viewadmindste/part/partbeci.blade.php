@extends('templatedste._temp')

@section('css')

    <!-- Bootstrap Select Css -->
    <link href="public/cssdste/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

@endsection

@section('content')

    <div class="container-fluid">
            <div class="block-header">
                @include('flash::message')
                <h2>
                    Paramètres > part beci
                    <small></small>
                </h2>
            </div>
            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Part de BECI
                                <button type="button" title="Part de BECI" style="margin-right: 30px; float: right; padding-right: 30px; padding-left: 30px; margin-bottom: -30px;" class="btn bg-deep-orange waves-effect" data-color="deep-orange" data-toggle="modal" data-target="#part"><i class="material-icons"> note_add </i> </button>
                            </h2>
                        </div>
                        <div class="body"> 
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">Projet</th>
                                            <th data-priority="1">Résultat</th>
                                            <th data-priority="6">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($parts as $index => $part)
                                            <tr>
                                                <td style="vertical-align:middle; text-align: center;">{{ $index + 1 }}</td>
                                                <td>
                                                    {{ $part->projettaux }} %
                                                </td>
                                                <td>
                                                    {{ $part->resultat }} %
                                                </td>
                                                <td style="vertical-align:middle; text-align: center;">
                                                    @if(in_array("update_service", session("auto_action")))
                                                        <button onclick="getupdate({{$part}})" type="button" title="Modifier" data-toggle="modal" data-target="#update" class="btn btn-primary btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">system_update_alt</i> 
                                                        </button>
                                                    @endif
                                                    @if(in_array("delete_service", session("auto_action")))
                                                        <button onclick="getdelete({{$part}})"type="button" title="Supprimer" data-toggle="modal" data-target="#delete" class="btn btn-danger btn-circle btn-xs  margin-bottom-10 waves-effect waves-light">
                                                            <i class="material-icons">delete_sweep</i> 
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4"><center>Pas de ligne devis enregistrer!!!</center></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

@endsection

@section("model")
    <div class="modal fade" id="part" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDevis">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelDevis">Définition de la part de BECI : </h4>
                </div>
                <div class="modal-body">
                        <label id="infodevis"></label>
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"  />
                        <input type="hidden" name="tableaumodevaleur" id="tableaumodevaleur">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="tauxp">Projet  ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" min="1" max="3" oninput="limiterLongueurChamp('tauxp'); seetauxprojet();" step="0.01" id="tauxp" name="tauxp" class="form-control" placeholder="">
                                    </div>
                                    <label id="seetauxp"></label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="result">Resultat( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        {{-- <input type="number" min="1" max="3" oninput="limiterLongueurChamp('result'); seeresultat();" step="0.01" id="result" name="result" class="form-control" placeholder=""> --}}
                                        <input type="number" min="1" max="3" oninput="limiterLongueurChamp('result');" step="0.01" id="result" name="result" class="form-control" placeholder="">
                                    </div>
                                    <label id="seeresult"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="periode">Période du Projet ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" oninput="updateDates()" onchange="updateDates()" min="1900" max="2099" step="1" id="periode" name="periode" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pdd">Période : Date début ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled step="1" id="pdd" name="pdd" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pdf">Période : Date fin ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled step="1" id="pdf" name="pdf" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix" style="border: 2px solid antiquewhite;">
                            <div class="col-md-6">
                                <label for="modebg">Mode ( <i style="color: red;">*</i> ): </label> 
                                <div class="form-group">
                                    <div class="form-line">
                                        <select type="text" id="modebg" name="modebg" class="form-control" placeholder="">
                                            @php 
                                                $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                            @endphp 
                                            @foreach($comptes as $compte)
                                                <option value="{{$compte->id}}">{{$compte->compte}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="valeurbg">Valeur ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" min="0" step="1" id="valeurbg" name="valeurbg" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <center> <button onclick="validemode_v()" id="modif" class="btn bg-default waves-effect">AJOUTER</button> <br><br> </center> 
                            </div>
                            <div class="col-md-12" id="seeerror">
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">#</th>
                                                <th data-priority="1">Mode</th>
                                                <th data-priority="1">Valeur</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenumode_v">
                                            
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="validepart()" id="addProjet" class="btn bg-deep-orange waves-effect">VALIDER</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabelDevis">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabelDevis">Définition de la part de BECI : </h4>
                </div>
                <div class="modal-body">
                        <label id="infoupdate_u"></label>
                        <input type="hidden" id="idupdat" name="idupdat" />
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}"  />
                        <input type="hidden" name="tableaumodevaleur_u" id="tableaumodevaleur_u">
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="tauxp_u">Projet  ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" min="1" max="3" oninput="limiterLongueurChamp('tauxp_u'); seetauxprojet();" step="0.01" id="tauxp_u" name="tauxp_u" class="form-control" placeholder="">
                                    </div>
                                    <label id="seetauxp_u"></label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="result_u">Resultat( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        {{-- <input type="number" min="1" max="3" oninput="limiterLongueurChamp('result'); seeresultat();" step="0.01" id="result" name="result" class="form-control" placeholder=""> --}}
                                        <input type="number" min="1" max="3" oninput="limiterLongueurChamp('result_u');" step="0.01" id="result_u" name="result_u" class="form-control" placeholder="">
                                    </div>
                                    <label id="seeresult_u"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-4">
                                <label for="periode_u">Période du Projet ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" oninput="updateDates()" onchange="updateDates()" min="1900" max="2099" step="1" id="periode_u" name="periode_u" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pdd_u">Période : Date début ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled step="1" id="pdd_u" name="pdd_u" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pdf_u">Période : Date fin ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" disabled step="1" id="pdf_u" name="pdf_u" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix" style="border: 2px solid antiquewhite;">
                            <div class="col-md-6">
                                <label for="modebg_u">Mode ( <i style="color: red;">*</i> ): </label> 
                                <div class="form-group">
                                    <div class="form-line" id="seemd_u">
                                        <select type="text" id="modebg_u" name="modebg_u" class="form-control" placeholder="">
                                            @php 
                                                $comptes = App\Providers\InterfaceServiceProvider::allsouscomptes();
                                            @endphp 
                                            @foreach($comptes as $compte)
                                                <option value="{{$compte->id}}">{{$compte->compte}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="valeurbg_u">Valeur ( <i style="color: red;">*</i> ) :</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" min="0" step="1" id="valeurbg_u" name="valeurbg_u" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <center> <button onclick="validemode_vu()" id="modif_u" class="btn bg-default waves-effect">AJOUTER</button> <br><br> </center> 
                            </div>
                            <div class="col-md-12" id="seeerror_u">
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">#</th>
                                                <th data-priority="1">Mode</th>
                                                <th data-priority="1">Valeur</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenumode_vu">
                                            
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">FERMER</button>
                    <button onclick="validepartupdate()" id="addProjet" class="btn bg-deep-orange waves-effect">VALIDER</button>
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

    <script type="text/javascript">
        let dataupdate = [];
        let data = [];
        function limiterLongueurChamp(inputId) {
            champ = document.getElementById(inputId);
            value = parseFloat(champ.value);
    
            if (isNaN(value) || value < 0 || value > 100) {
                champ.value = ""; 
            } else if (value.toString().length > 3) {
                champ.value = value.toString().slice(0, 3);
            }
        }

        function seetauxprojet() {
            tauxp = parseFloat(document.getElementById("tauxp").value);
            tauxp_u = parseFloat(document.getElementById("tauxp_u").value);
            
            if (tauxp === 0||tauxp_u === 0) {
                document.getElementById('seetauxp').innerHTML = "0 %";
                document.getElementById('seetauxp_u').innerHTML = "0 %";
            } else {
                document.getElementById('seetauxp').innerHTML = tauxp + " %";
                document.getElementById('seetauxp_u').innerHTML = tauxp_u + " %";
            }


            if (!isNaN(tauxp) && tauxp >= 0 && tauxp <= 100 || !isNaN(tauxp_u) && tauxp_u >= 0 && tauxp_u <= 100) {
                tv = 100 - tauxp;
                tv_u = 100 - tauxp_u;
                resultat = Math.max(tv, 1); 
                resultat_u = Math.max(tv_u, 1); 
                document.getElementById('result').value = resultat; 
                document.getElementById('result_u').value = resultat_u; 
                document.getElementById('seeresult').innerHTML = resultat + " %"; 
                document.getElementById('seeresult_u').innerHTML = resultat_u + " %"; 
            } else {
                document.getElementById('result').value = ""; 
                document.getElementById('result_u').value = ""; 
                document.getElementById('seeresult').innerHTML = "0"; 
                document.getElementById('seeresult_u').innerHTML = "0"; 
            }
        }
        
        
        // function seeresultat() {
        //     result = parseFloat(document.getElementById("result").value);
        //     document.getElementById('seeresult').innerHTML = result + " %";
        //     montant = parseFloat(document.getElementById("mht").value);

        //     if (!isNaN(tauxp) && !isNaN(montant) && montant > 0) {
        //          montanti = montant * tauxp / 100;

        //         document.getElementById('mimpot').innerHTML = new Intl.NumberFormat('fr-FR').format(montanti) + " F CFA";
        //     }
        // }


        function updateDates() {
            periode = parseInt(document.getElementById("periode").value);
            periode_u = parseInt(document.getElementById("periode_u").value);

            if (!isNaN(periode)|| !isNaN(periode_u)) {
                
                dateDebut = new Date(periode, 0, 1); 
                dateDebut_u = new Date(periode_u, 0, 1); 
                document.getElementById("pdd").value = formatDate(dateDebut);
                document.getElementById("pdd_u").value = formatDate(dateDebut_u);

               
                dateFin = new Date(periode, 11, 31);
                dateFin_u = new Date(periode_u, 11, 31);
                document.getElementById("pdf").value = formatDate(dateFin);
                document.getElementById("pdf_u").value = formatDate(dateFin_u);
            } else {
                
                document.getElementById("pdd").value = "";
                document.getElementById("pdd_u").value = "";
                document.getElementById("pdf").value = "";
                document.getElementById("pdf_u").value = "";
            }
        }

        function formatDate(date) {
            day = ("0" + date.getDate()).slice(-2);
            month = ("0" + (date.getMonth() + 1)).slice(-2);
            year = date.getFullYear();

            return year + "-" + month + "-" + day; 
        }

        function validemode_v() {
            selectElement = document.getElementById("modebg");
            if (selectElement) {
                selectedOption = selectElement.options[selectElement.selectedIndex];
                modeId = selectedOption.value;
                modeNom = selectedOption.text;
            } else {
                error = "";
                error += ". Veuillez sélectionner un mode <br>";
                document.getElementById('seeerror').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
            }

            valeurbg = document.getElementById("valeurbg").value;

            if (valeurbg == 0 || valeurbg == "" || modeId == "") {
                error = "";
                if (valeurbg == 0 || valeurbg == "") {
                    error += ". Veuillez renseigner la valeur <br>";
                }
                if (modeId == 0) {
                    error += ". Veuillez sélectionner un mode <br>";
                }
                document.getElementById('seeerror').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
            } else {
                dataactu = document.getElementById("tableaumodevaleur").value;
                let controle = 0;

                if (dataactu != "") {
                    tabdjson = JSON.parse(dataactu);

                    // Parcourir le tableau pour vérifier l'unicité
                    tabdjson.forEach(function(item, index, arr) {
                        if (item["modeId"] == modeId) controle = 1;
                    });
                }

                if (controle == 1) {
                    document.getElementById('seeerror').innerHTML = "<div class='alert alert-danger alert-block'> Ce mode figure dans la liste. Veuillez vérifier avant de continuer </div>";
                } else {
                    document.getElementById('seeerror').innerHTML = "";
                    // Création de l'objet de données avec un identifiant unique
                    let donnee = {
                        id: Date.now(),
                        modeId: modeId,
                        mode: modeNom,
                        valeurbg: valeurbg
                    };

                    dataupdate.push(donnee); // Ajout à l'objet JavaScript

                    let list = document.getElementById("contenumode_v");
                    let line = list.insertRow(-1);
                    line.setAttribute('mode-id', donnee.id);

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1;
                    line.insertCell(1).innerHTML = donnee.mode;
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(donnee.valeurbg);

                    // Ajout d'un bouton de suppression
                    cellAction = line.insertCell(3);
                    btnSupprimer = document.createElement("button");
                    btnSupprimer.innerHTML = "Suppr";
                    btnSupprimer.onclick = function() {
                        tr = this.closest("tr");
                        id = tr.getAttribute('mode-id'); // Récupère l'identifiant unique

                        // Suppression de l'élément de l'objet JavaScript
                        dataupdate = dataupdate.filter(d => d.id.toString() !== id);

                        // Suppression de la ligne du tableau
                        tr.remove();

                        // Mise à jour de la numérotation
                        line = list.getElementsByTagName("tr");
                        for ( i = 1; i < line.length; i++) {
                            line[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                        }

                        // Mettre à jour le champ caché avec les données du tableau
                        document.getElementById("tableaumodevaleur").value = JSON.stringify(dataupdate);

                        
                    };

                    cellAction.appendChild(btnSupprimer);

                    // Réinitialisation des champs du formulaire
                    document.getElementById("modebg").value = '';
                    document.getElementById("valeurbg").value = '';

                    // Mettre à jour le champ caché avec les données du tableau
                    document.getElementById("tableaumodevaleur").value = JSON.stringify(dataupdate);

                }
            }
        }

        async function validepart(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value; // token 
                tableaumodevaleur = document.getElementById("tableaumodevaleur").value; // Année d'exercice
                tauxp = document.getElementById("tauxp").value; // Taux du projet 
                result = document.getElementById("result").value; // Le resultat
                periode = document.getElementById("periode").value; // Période d'excercice du projet
                pdd = document.getElementById("pdd").value; // Période debut du projet
                pdf = document.getElementById("pdf").value; // Période de fin du projet
                
                
            
                if(token == "" || tauxp == "" || result == "" || periode == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(tauxp == "")
                        error += ". Le champ Taux du projet ne peut pas être vide <br>";
                    if((result + tauxp) != 100)
                        error += ". Le resultat ne peut pas être suppérieur à 100% <br>";
                    if(periode == "")
                        error += ". Le champ période ne peut pas être vide <br>";

                    document.getElementById('infodevis').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, modevaleur: tableaumodevaleur, tauxp: tauxp, result: result,
                        periode: periode, datedebut: pdd, datefin: pdf
                    };

                document.getElementById("infodevis").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                
                // En cours d'envoie
                    try {
                        let response = await fetch("{{route('ADMV')}}",
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
                                document.getElementById("infodevis").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                setTimeout(function(){
                                    window.location.href = "{{route('GPBC')}}";
                                }, 3000);
                            }else{
                                document.getElementById("infodevis").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                            }
                        }
                        else{
                            document.getElementById("infodevis").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                        }
                    } catch (error) {
                        document.getElementById("infodevis").innerHTML = error;
                    } 
                }
        }

        async function getupdate(data){
            document.getElementById('infoupdate_u').innerHTML = "Vous voulez vraiment modifier les informations <i style='color:#0F056B'> sur la période de "+data.dateD+" au "+data.dateF+" </i> ? <br>";

            document.getElementById('idupdat').value = data.id;
            document.getElementById("tauxp_u").value = data.projettaux;
            document.getElementById("result_u").value = data.resultat;
            document.getElementById("periode_u").value = data.periode;
            document.getElementById("pdd_u").value = data.dateD;
            document.getElementById("pdf_u").value = data.dateF;
            document.getElementById('tableaumodevaleur_u').value = data.tauxbeci;
            
            dataupdate = JSON.parse(data.tauxbeci);

            document.getElementById("contenumode_vu").innerHTML = "";

            dataupdate.forEach(function(item, index, arr) {
                let list = document.getElementById("contenumode_vu");
                let line = list.insertRow(-1); 
                line.setAttribute('mode-id', item["id"]);

                // Ajout du numéro d'ordre et des autres données
                line.insertCell(0).innerHTML = list.rows.length - 1; 
                line.insertCell(1).innerHTML = item["mode"];
                line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(item["valeurbg"]);

                // Ajout d'un bouton de suppression
                let cellAction = line.insertCell(3);
                let btnSupprimer = document.createElement("button");
                btnSupprimer.innerHTML = "Suppr" ;
                
                btnSupprimer.onclick = function() {
                    let tr = this.closest("tr");
                    let id = tr.getAttribute('mode-id'); // Récupère l'identifiant unique

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
                    document.getElementById("tableaumodevaleur_u").value = JSON.stringify(dataupdate);
                };

                cellAction.appendChild(btnSupprimer);

                // Réinitialisation des champs du formulaire
                document.getElementById("modebg_u").value = '';
                document.getElementById("valeurbg_u").value = '';

                // Mettre à jour le champ caché avec les données du tableau
                document.getElementById("tableaumodevaleur_u").value = JSON.stringify(dataupdate);
            });

        }

        function validemode_vu() {
            selectElement_u = document.getElementById("modebg_u");
            if (selectElement_u) {
                selectedOption = selectElement_u.options[selectElement_u.selectedIndex];
                modeId = selectedOption.value;
                modeNom = selectedOption.text;
            } else {
                error = "";
                error += ". Veuillez sélectionner un mode <br>";
                document.getElementById('seeerror_u').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
            }

            valeurbg = document.getElementById("valeurbg_u").value;

            if (valeurbg == 0 || valeurbg == "" || modeNom == "") {
                error = "";
                if (valeurbg == 0 || valeurbg == "") {
                    error += ". Veuillez renseigner la valeur <br>";
                }
                if (modeNom == 0) {
                    error += ". Veuillez sélectionner un mode <br>";
                }
                document.getElementById('seeerror_u').innerHTML = "<div class='alert alert-danger alert-block'> " + error + " </div>";
            } else {
                dataactu = document.getElementById("tableaumodevaleur_u").value;
                let controle = 0;

                if (dataactu != "") {
                    tabdjson = JSON.parse(dataactu);

                    // Parcourir le tableau pour vérifier l'unicité
                    tabdjson.forEach(function(item, index, arr) {
                        if (item["mode"] == modeNom) controle = 1;
                    });
                }

                if (controle == 1) {
                    document.getElementById('seeerror_u').innerHTML = "<div class='alert alert-danger alert-block'> Ce mode figure dans la liste. Veuillez vérifier avant de continuer </div>";
                } else {
                    document.getElementById('seeerror_u').innerHTML = "";
                    // Création de l'objet de données avec un identifiant unique
                    let donnee = {
                        id: Date.now(),
                        modeId: modeId,
                        mode: modeNom,
                        valeurbg: valeurbg
                    };

                    dataupdate.push(donnee); // Ajout à l'objet JavaScript

                    let list = document.getElementById("contenumode_vu");
                    let line = list.insertRow(-1);
                    line.setAttribute('mode-id', donnee.id);

                    // Ajout du numéro d'ordre et des autres données
                    line.insertCell(0).innerHTML = list.rows.length - 1;
                    line.insertCell(1).innerHTML = donnee.mode;
                    line.insertCell(2).innerHTML = new Intl.NumberFormat('fr-FR').format(donnee.valeurbg);

                    // Ajout d'un bouton de suppression
                    cellAction = line.insertCell(3);
                    btnSupprimer = document.createElement("button");
                    btnSupprimer.innerHTML = "Suppr";
                    btnSupprimer.onclick = function() {
                        tr = this.closest("tr");
                        id = tr.getAttribute('mode-id'); // Récupère l'identifiant unique

                        // Suppression de l'élément de l'objet JavaScript
                        dataupdate = dataupdate.filter(d => d.id.toString() !== id);

                        // Suppression de la ligne du tableau
                        tr.remove();

                        // Mise à jour de la numérotation
                        line = list.getElementsByTagName("tr");
                        for ( i = 1; i < line.length; i++) {
                            line[i].cells[0].innerHTML = i; // Mise à jour du numéro d'ordre
                        }

                        // Mettre à jour le champ caché avec les données du tableau
                        document.getElementById("tableaumodevaleur_u").value = JSON.stringify(dataupdate);

                        
                    };

                    cellAction.appendChild(btnSupprimer);

                    // Réinitialisation des champs du formulaire
                    document.getElementById("modebg_u").value = '';
                    document.getElementById("valeurbg_u").value = '';

                    // Mettre à jour le champ caché avec les données du tableau
                    document.getElementById("tableaumodevaleur_u").value = JSON.stringify(dataupdate);

                }
            }
        }

        async function validepartupdate(){
                // récupération des données du formulaire 
                token = document.getElementById("_token").value; // token 
                tableaumodevaleur = document.getElementById("tableaumodevaleur_u").value; // Année d'exercice
                tauxp = document.getElementById("tauxp_u").value; // Taux du projet 
                result = document.getElementById("result_u").value; // Le resultat
                periode = document.getElementById("periode_u").value; // Période d'excercice du projet
                pdd = document.getElementById("pdd_u").value; // Période debut du projet
                pdf = document.getElementById("pdf_u").value; // Période de fin du projet
                id = document.getElementById("idupdat").value
                
            
                if(token == "" || tauxp == "" || result == "" || periode == ""){
                    error = "";
                    if(token == "")
                        error += ". Veuillez vous reconnecter pour continuer <br>";
                    if(tauxp == "")
                        error += ". Le champ Taux du projet ne peut pas être vide <br>";
                    if((result + tauxp) != 100)
                        error += ". Le resultat ne peut pas être suppérieur à 100% <br>";
                    if(periode == "")
                        error += ". Le champ période ne peut pas être vide <br>";

                    document.getElementById('infoupdate_u').innerHTML = "<div class='alert alert-danger alert-block'> "+error+" </div>";
                }else{
                    
                    dat = {
                        _token: token, modevaleur: tableaumodevaleur, tauxp: tauxp, result: result,
                        periode: periode, datedebut: pdd, datefin: pdf, id: id
                    };

                    document.getElementById("infoupdate_u").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                
                    // En cours d'envoie
                        try {
                            let response = await fetch("{{route('ADMV')}}",
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
                                    document.getElementById("infoupdate_u").innerHTML = '<div class="alert alert-success alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                    setTimeout(function(){
                                        window.location.href = "{{route('GPBC')}}";
                                    }, 3000);
                                }else{
                                    document.getElementById("infoupdate_u").innerHTML = '<div class="alert alert-block alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+reponse.messages+'</strong></div>';
                                }
                            }
                            else{
                                document.getElementById("infoupdate_u").innerHTML = '<div class="alert alert-danger alert-block"> <button type="button" class="close" data-dismiss="alert">×</button><strong>Une erreur s\'est produite '+response.status+' </strong></div>';
                            }
                        } catch (error) {
                            document.getElementById("infoupdate_u").innerHTML = error;
                        } 
                }
        }

        async function getdelete(data){
            document.getElementById('infodelete').innerHTML = "Vous voulez vraiment supprimer les informations de <i style='color:#0F056B'>  sur la période de "+data.dateD+" au "+data.dateF+" </i> ?";
            document.getElementById('code_d').value = data.id;
        }

        async function validedelete(){
            token = document.getElementById("_token").value;
            iddelete = document.getElementById("code_d").value;
                
            dat = {_token: token, id: iddelete,};

            document.getElementById("infodelete").innerHTML = '<div class="alert alert-warning alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>En cours de traitement.. <br> Veuillez patienter! </strong></div>';
                        
            // En cours d'envoie
            try {
                let response = await fetch("{{route('DDMV')}}",
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
                            window.location.href = "{{route('GPBC')}}";
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
@endsection